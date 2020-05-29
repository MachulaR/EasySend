<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Zadanie1Controller extends AbstractController {

    const COLORS = 'czerwony;fioletowy;niebieski;czarny;sino-koperkowy róż;buraczkowy;zielony';

    /**
     * @Route("/zadanie1", name="zadanie1")
     */
    public function mainPage() {
        $colorsArray = explode(';', self::COLORS);
        $colors = '';
        foreach ($colorsArray as $color) {
            strpos($color, 'cz') !== false ? NULL : $colors .= ucwords($color).', ';
        }
        $viewData = [
            'colors' => $colors,
        ];

        return $this->render('zadanie1.html.twig', $viewData);
    }
}

