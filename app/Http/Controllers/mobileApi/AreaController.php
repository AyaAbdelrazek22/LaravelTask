<?php

namespace App\Http\Controllers\mobileApi;

use App\Http\Controllers\Controller ;
use App\Services\Area;
use Illuminate\Http\Request;
class AreaController extends Controller
{

    public  $area ;
    public function __construct()
    {
        $this->area = new Area();
    }


    public function getData(Request $request){

         return response( $this->area->getCountries() , 200);

    }


}
