<?php

interface CarInterface
{
    public function getBrandName(): string;
    public function getModelName(): string;
    public function getPrice(): \Money\Money;
    public function setPrice(\Money\Money $newPrice): void;
}