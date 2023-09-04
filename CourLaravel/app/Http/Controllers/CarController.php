<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarStoreRequest;
use App\Http\Requests\CarUpdateRequest;
use App\Models\Car;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarController extends Controller
{
    public function store(CarStoreRequest $request)
    {

        return new JsonResource( Car::create($request->validated()));
    }

    public function index()
    {
        return Car::paginate(5);
    }


    public function show(Car $car)
    {
        return new JsonResource( $car );
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return new JsonResource( $car);
    }


    public function update(Car $car, CarUpdateRequest $request)
    {
        $car->update($request->validated());
        $car->refresh();
        return new JsonResource( $car );
    }



}
