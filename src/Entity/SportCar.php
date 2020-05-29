<?php
namespace App\Entity;

use CarInterface;

class SportCar implements CarInterface
{
    private $brandName = 'Mazda';
    private $modelName = 'MX-5';
    private $price;

    public function getBrandName(): string
    {
        return $this->brandName;
    }

    public function getModelName(): string
    {
        return $this->modelName;
    }

    public function getPrice(): \Money\Money
    {
        return $this->price;
    }

    public function setPrice(\Money\Money $newPrice): void
    {
        $this->price = $newPrice;
    }

}