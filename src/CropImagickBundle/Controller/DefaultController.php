<?php

namespace CropImagickBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $path = $this->getParameter('kernel.root_dir') . '/../web/' . 'apple-touch-icon.png';

        return ['image' => $this->get('crop_imagick.imagick_service')->thumbnail($path)];
    }
}
