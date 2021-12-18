<?php

declare(strict_types=1);

namespace App\Helpers;

use App\Models\NewsImageModel;
use CodeIgniter\HTTP\Files\UploadedFile;
use Config\Services;

class ImageManager
{
    private $newsImage;

    /**
     * ImageManager constructor.
     */
    public function __construct()
    {
        $this->newsImage = new NewsImageModel();
    }

    public function newsImageProcessor(UploadedFile $image, int $newsId, bool $isExist = false): bool
    {
        $newsImage = $this->newsImage;

        if ($isExist) {
            $newsImage = $this->newsImage->where(['news_id' => $newsId])->first();
            $this->delete($newsImage);
        }

        $fileName = $image->getRandomName();
        $folderName = 'news';

        $image->move(FCPATH . 'image/' . $folderName, $fileName);
        $path = $folderName . '/' . $image->getName();

        $images = $this->generateImages($path, $fileName, $newsImage, $folderName);

        $params = array_merge($images, [
            'news_id' => $newsId,
            'original' => $path,
        ]);

        return $newsImage->save($params);
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
                ->fit($sizeDetails['width'], $sizeDetails['height'], 'center')
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