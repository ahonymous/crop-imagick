<?php

namespace CropImagickBundle\Twig;

class TwigExtension extends \Twig_Extension
{
    /**
     * @var
     */
    private $cropImagickCache;

    public function __construct($cropImagickCache)
    {
        $this->cropImagickCache = $cropImagickCache;
    }

    public function getFilters() {
        return [
            'crop_imagick' => new \Twig_Filter_Method($this, 'cropImagickFilter'),
        ];
    }

    public function cropImagickFilter($image, $filterName)
    {
        return $this->cropImagickCache . "/$filterName" . $image;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'crop_imagick.twig_extension';
    }
}
