<?php

namespace App\Location\Drivers;

use Illuminate\Support\Fluent;
use Stevebauman\Location\Position;
use Stevebauman\Location\Drivers\Driver;
use Stevebauman\Location\Drivers\HttpDriver;

class MyDriver extends HttpDriver
{
    // public function url()
    // {
    //     return '';
    // }
    public function url(string $ip): string
    {
        return "http://driver-url.com?ip=$ip";
    }

    // protected function hydrate(Position $position, Fluent $location) : string
    // {
    //     $position->countryCode = $location->country_code;

    //     return $position;
    // }
    protected function hydrate(Position $position, Fluent $location): Position
    {
        $position->countryCode = $location->country_code;

        return $position;
    }

    // protected function process($ip)
    // {
    //     try {
    //         $response = json_decode(file_get_contents($this->url().$ip), true);

    //         return new Fluent($response);
    //     } catch (\Exception $e) {
    //         return false;
    //     }
    // }


}
