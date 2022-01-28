<?php

declare(strict_types=1);

namespace App\Helpers;

use App\Models\NewsImageModel;
use App\Models\EventModel;
use App\Models\GuideModel;
use Aws\S3\S3Client;
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

    /**
     * ImageManager constructor.
     */
    public function __construct()
    {
        $this->newsImage = new NewsImageModel();
        $this->event = new EventModel();
        $this->guide = new GuideModel();

//        $s3Client = new S3Client([
//            'version' => 'latest',
//            'region'  => 'YOUR_AWS_REGION',
//            'credentials' => [
//                'key'    => 'ACCESS_KEY_ID',
//                'secret' => 'SECRET_ACCESS_KEY'
//            ]
//        ]);
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

    public function delete($imageModel): void
    {
        unlink(strstr($imageModel->original, getenv('image_folder')));
        unlink(strstr($imageModel->large, getenv('image_folder')));
        unlink(strstr($imageModel->medium, getenv('image_folder')));
        unlink(strstr($imageModel->small, getenv('image_folder')));
    }

    public function imageProcessor(UploadedFile $image, string $folderName): string
    {
        $fileName = $image->getRandomName();
        $image->move(getenv('image_folder') . '/' . $folderName, $fileName);

        return $folderName . '/' . $image->getName();
    }
}
