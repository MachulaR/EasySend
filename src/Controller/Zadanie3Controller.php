<?php

namespace App\Controller;

use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Zadanie3Controller extends AbstractController {

    const DATES = [
        "19.03.1989",
        "20.02.2002",
        "21.05.2010",
        "24.12.2015",
        "05.03.2019",
        "22.02.2022",
    ];

    /**
     * @Route("/zadanie3", name="zadanie3")
     */
    public function mainPage() {

        $dateArray = [];
        foreach (self::DATES as $date) {
            $date = DateTime::createFromFormat('d.m.Y', $date);
            if(!($date->format('m') % 2)) {
                $dateArray[] = $date->format('Y-m-d');
            }

        }
        $viewData = [
            'dates' => $dateArray,
        ];

        return $this->render('zadanie3.html.twig', $viewData);
    }
}