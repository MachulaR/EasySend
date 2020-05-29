<?php

namespace App\Controller;

use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Zadanie2Controller extends AbstractController {

    /**
     * @Route("/zadanie2", name="zadanie2")
     */
    public function mainPage() {
        $str1 = 'I love batman';
        $str2 = 'Batman is awesome!';
        if ((strpos(strtolower($str2), 'batman') === false)){
            throw new Exception;
        }
//Błąd wynika z faktu, że strpos zwraca false, albo liczbę, która mówi nam o pozycji w której zaczyna się substring.
//W związku z czym, jeśli string zaczyna się substringiem, strpos zwróci 0, co przez if'a interpretowane jest jako false
//Rozwiązaniem jest
//1. sprawdzenie, czy warunek jest tylko i wyłącznie false, poprzez silne typowanie (rozwiązanie powyżej)
//2. sprawdzenie, czy warunek jest większy od jakiejkolwiek liczby ujemnej.

        return $this->render('zadanie2.html.twig');
    }
}