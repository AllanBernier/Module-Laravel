<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarStoreRequest;
use App\Http\Requests\CarUpdateRequest;
use App\Models\Car;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class CarController extends Controller
{
    public function store(CarStoreRequest $request)
    {
        $request_data = $request->validated();
        $car = Car::create(Arr::except($request_data, 'options'));
        $car->options()->attach($request_data['options'] ?? []);
        return new JsonResource( $car );
    }

    public function index()
    {
        return Car::paginate(5);
    }


    public function show(Car $car)
    {


        $car->load('options');
        return new JsonResource( $car );
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return new JsonResource( $car);
    }


    public function update(Car $car, CarUpdateRequest $request)
    {
        $request_data = $request->validated();
        $car->update(Arr::except($request_data, 'options' ));
        $car->options()->sync($request_data['options'] ?? []);
        $car->refresh();
        return new JsonResource( $car );
    }



}
