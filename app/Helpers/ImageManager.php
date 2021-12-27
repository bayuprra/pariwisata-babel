<?php

declare(strict_types=1);

namespace App\Helpers;

use App\Models\NewsImageModel;
use App\Models\EventModel;
use CodeIgniter\HTTP\Files\UploadedFile;
use Config\Services;
use ReflectionException;

class ImageManager
{
    /** @var NewsImageModel */
    private $newsImage;

    /** @var EventModel */
    private $event;

    /**
     * ImageManager constructor.
     */
    public function __construct()
    {
        $this->newsImage = new NewsImageModel();
        $this->event = new EventModel();
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

        $image->move(FCPATH . 'image/' . $folderName, $fileName);
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

    public function eventImageProcessor(UploadedFile $image, &$data): void
    {
        $fileName = $image->getRandomName();
        $folderName = 'event';

        $image->move('image/' . $folderName, $fileName);
        $path = $image->getName();

        $data['picture'] = $path;
    }

    private function generateImages($originalPath, $fileName, $imageModel, $folderName): array
    {
        $imageLib = Services::image();
        $uploadDir = FCPATH . 'image/';

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
        unlink(strstr($imageModel->original, 'image'));
        unlink(strstr($imageModel->large, 'image'));
        unlink(strstr($imageModel->medium, 'image'));
        unlink(strstr($imageModel->small, 'image'));
    }
}
