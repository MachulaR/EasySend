<?php

declare(strict_types=1);

namespace App\Service;

final class ExchangeRateProvider
{
    const API_URL = 'https://api.exchangeratesapi.io/latest?symbols=';
    private static $config = [
        'url' => '', //declared later, due to data we receive
        'referer' => 'https://www.google.com/',
        'returntransfer' => 1,
        'followlocation' => 1,
    ];

    public function fetch(string $baseCurrency, $quoteCurrency): float
    {
        self::$config['url'] = self::API_URL.$baseCurrency.','.$quoteCurrency;

        $ch = curl_init();
        $this->curl_setup($ch);
        curl_setopt($ch, CURLOPT_URL, self::$config['url']);
        $result=curl_exec($ch);

        $result = json_decode($result);
        curl_close($ch);

        return $result->rates->$baseCurrency;
    }

    private function  curl_setup($ch){
        curl_setopt($ch, CURLOPT_URL, self::$config['url']);
        curl_setopt($ch, CURLOPT_REFERER, self::$config['referer']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, self::$config['returntransfer']);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, self::$config['followlocation']);
    }
}

