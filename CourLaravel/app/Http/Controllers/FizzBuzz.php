<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use function PHPUnit\Framework\isNan;

class FizzBuzz extends Controller
{


    public function index(String $action)
    {

        if (!is_numeric($action) ){
            abort(403);
        }

        $response = $action;

        if ($action % 15 == 0){
            $response = "fizzbuzz";
        } else if ($action % 5 == 0){
            $response = "buzz";
        } else if ($action % 3 == 0) {
            $response = "fizz";
        }

        return new JsonResource(['value' => $response]);
    }

}
