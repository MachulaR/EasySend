<?php
namespace App\Entity;

use CarInterface;

class FamilyCar implements CarInterface
{
    private $brandName = 'Honda';
    private $modelName = 'CR-V 2.2 i-CTDi';
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