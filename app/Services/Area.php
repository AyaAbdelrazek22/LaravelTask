<?php

namespace App\Services;


use Httpful\Request;

class Area
{
    public function getCountries(){

        $response = Request::get('https://restcountries.eu/rest/v2/all')
                      ->send();

        return $response;
    }

}
