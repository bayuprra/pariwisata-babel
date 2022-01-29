<?php

declare(strict_types=1);

namespace App\Helpers;

use App\Entities\NewsImage;
use App\Models\NewsImageModel;
use App\Models\EventModel;
use App\Models\GuideModel;
use Aws\S3\Exception\S3Exception;
use CodeIgniter\HTTP\Files\UploadedFile;
use Config\Services;
use ReflectionException;

class ImageManager
{
    /** @var NewsImageModel */
    private $newsImage;

    /** @var EventModel */
    private $event;

    /** @var GuideModel */
    private $guide;

    /** AWS Configuration. */
    private $aws;

    /**
     * ImageManager constructor.
     */
    public function __construct()
    {
        $this->newsImage = new NewsImageModel();
        $this->event = new EventModel();
        $this->guide = new GuideModel();
        $this->aws = service('aws')->createClient('s3',['version' => 'latest', 'region'  => 'ap-southeast-1']);
    }

    /**
     * @param UploadedFile  $image
     * @param int           $newsId
     * @param bool          $isExist
     *
     * @return bool
     * @throws ReflectionException
     */
    public function newsImageProcessor(UploadedFile $image, int $newsId, bool $isExist = false): bool
    {
        $fileName = $image->getRandomName();
        $folderName = 'news';

        $image->move(FCPATH . getenv('image_folder') . '/' . $folderName, $fileName);
        $path = $folderName . '/' . $image->getName();

        $images = $this->generateImages($path, $fileName, $this->newsImage, $folderName);

        $params = array_merge($images, [
            'news_id' => $newsId,
            'original' => $path,
        ]);

        if (getenv('CI_ENVIRONMENT') === 'production') {
            $file = FCPATH . getenv('image_folder') . '/' . $path;
            $name = explode('/', $file);
            $original = $this->aws->upload(getenv('bucketName'), $name[count($name) - 1], fopen($file, 'rb'), 'public-read');
            $params = [
                'news_id' => $newsId,
                'original' => $original->get('ObjectURL')
            ];

            foreach ($images as $key => $value) {
                $uploadDir = FCPATH . getenv('image_folder') . '/' . $value;
                $name = explode('/', $uploadDir);
                $result = $this->aws->upload(getenv('bucketName'), $name[count($name) - 1], fopen($uploadDir, 'rb'), 'public-read');
                $params[$key] = $result->get('ObjectURL');
            }
        }

        if ($isExist) {
            $newsImage = $this->newsImage->where(['news_id' => $newsId])->first();
            $this->delete($newsImage);

            return $this->newsImage->update($newsImage->id, $params);
        }


        return $this->newsImage->save($params);
    }

    private function generateImages($originalPath, $fileName, $imageModel, $folderName): array
    {
        $imageLib = Services::image();
        $uploadDir = FCPATH . getenv('image_folder') . '/';

        list($name, $extension) = explode('.', $fileName);

        $images = [];
        foreach ($imageModel::IMAGE_SIZES as $size => $sizeDetails) {
            $imagePath = $folderName . '/' . $name . '_' . $size . '.' . $extension;
            $imageLib->withFile($uploadDir . $originalPath)
                ->fit($sizeDetails['width'], $sizeDetails['height'])
                ->save($uploadDir . $imagePath);

            $images[$size] = $imagePath;
        }

        return $images;
    }

    public function delete($image): void
    {
        if ($image instanceof NewsImage) {
            $allowedKeys = ['original', 'large', 'medium', 'small'];

            foreach ($allowedKeys as $key) {
                if (getenv('CI_ENVIRONMENT') !== 'production') {
                    unlink(strstr($image->{$key}, getenv('image_folder')));
                } else {
                    $file = explode('/', $image->{$key});

                    $this->aws->deleteObject([
                        'Bucket' => getenv('bucketName'),
                        'Key' => $file[count($file) - 1],
                    ]);
                }
            }
        } else {
            if (getenv('CI_ENVIRONMENT') !== 'production') {
                unlink(strstr($image, getenv('image_folder')));
            } else {
                $image = explode('/', $image);

                $this->aws->deleteObject([
                    'Bucket' => getenv('bucketName'),
                    'Key' => $image[count($image) - 1],
                ]);
            }
        }
    }

    public function imageProcessor(UploadedFile $image, string $folderName): string
    {
        $fileName = $image->getRandomName();

        if (getenv('CI_ENVIRONMENT') !== 'production') {
            $image->move(getenv('image_folder') . '/' . $folderName, $fileName);

            return $folderName . '/' . $image->getName();
        }

        $result = $this->aws->upload(getenv('bucketName'), $fileName, fopen($image->getTempName(), 'rb'), 'public-read');

        return $result->get('ObjectURL');
    }
}
