<?php

namespace Ahonymous\CropImagickBundle\Imagick;

class ImagickService
{
    /**
     * @var array
     */
    private $sizes;

    /**
     * @var string
     */
    private $cachePath;

    /**
     * @var string
     */
    private $fullCachePath;

    /**
     * @param $kernelPath
     * @param array $sizes
     * @param $cachePath
     */
    public function __construct($kernelPath, array $sizes, $cachePath)
    {
        $this->cachePath = $cachePath;
        $this->sizes = $sizes;
        $this->fullCachePath = $kernelPath . '/../web/' . $cachePath;
        $this->checkPath($this->fullCachePath);
    }

    /**
     * @param $path
     */
    protected function checkPath($path)
    {
        if (!is_dir($path)) {
            mkdir($path, '0777');
        }
    }

    /**
     * @param $file
     * @return string
     */
    public function thumbnail($file)
    {
        $format = '';
        $name = md5((new \DateTime())->format('c'));

        foreach ($this->sizes as $size) {
            $image = new \Imagick($file);
            $imageRatio = $image->getImageWidth()/$image->getImageHeight();
            $width = $size['width'];
            $height = $size['height'];
            $customRation = $width/$height;

            if ($customRation < $imageRatio) {
                $widthThumb = 0;
                $heightThumb = $height;
            } else {
                $widthThumb = $width;
                $heightThumb = 0;
            }

            $image->thumbnailImage($widthThumb, $heightThumb);
            $image->cropImage(
                $width,
                $height,
                ($image->getImageWidth() - $width)/2,
                ($image->getImageHeight() - $height)/2
            );
            $image->setCompressionQuality(100);
            $format = strtolower($image->getImageFormat());
            $pp = $this->cachePath . '/' . $size['name'] . "_$name." . $format;
            $image->writeImage($pp);
        }

        return "_$name." . $format;
    }
}
