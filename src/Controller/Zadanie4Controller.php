<?php

namespace App\Controller;

use App\Entity\FamilyCar;
use App\Entity\SportCar;
use App\Form\CarsForm;
use Symfony\Component\HttpFoundation\Request;
use Money\Money;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Zadanie4Controller extends AbstractController {

    const NUMBER_OF_CARS = 4;

    /**
     * @Route("/zadanie4", name="zadanie4")
     * @param Request $request
     * @return Response
     */
    public function mainPage(Request $request) {
        $cars = [];
        $json = [];
        $form = $this->createForm(CarsForm::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $json = $form->getData()['cars'];
            $jsonArray = json_decode($form->getData()['cars']);
            foreach ($jsonArray as $json){
                $car = unserialize($json);
                $cars[] = $car;
            }
            $cars = $this->descendingSort($cars);

            $viewData = [
                'cars' => $cars,
                'json' => $json,
                'form' => $form->createView(),
            ];

            return $this->render('zadanie4.html.twig', $viewData);
        }

        for ($i=0 ; $i < self::NUMBER_OF_CARS ; $i++) {
            $cars[] = $this->createRandomCar();
            $json[] = serialize($cars[$i]);
        }
        $viewData = [
            'cars' => $cars,
            'json' => json_encode($json),
            'form' => $form->createView(),
        ];

        return $this->render('zadanie4.html.twig', $viewData);
    }

    private function discount(array $cars){
        foreach ($cars as $car) {
            if ($car instanceof SportCar) {
                $newPrice = $car->getPrice()->multiply(0.93);
                $car->setPrice($newPrice);
            }
        }
        return $cars;
    }

    private function descendingSort(array $cars) {
        usort($cars, array($this, "cmp"));
        return $cars;
    }

    private function cmp($a, $b) {
        return strcmp($a->getPrice()->getAmount(), $b->getPrice()->getAmount());
    }

    private function createRandomCar() {
        if (rand(1, 10) % 2) {
            $car = new FamilyCar();
        } else {
            $car = new SportCar();
        }
        $car->setPrice(Money::EUR(rand(100, 1000)));
        return $car;
    }
}

