<?php

use App\Models\Car;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

it('testing trait has user id', function () {
    $u1 = User::factory()->create();
    $u2 = User::factory()->create();

    Auth::login($u1);
    Car::factory(5)->create();

    Auth::logout();
    Auth::login($u2);
    Car::factory(4)->create();

    $response = \Pest\Laravel\get(route('cars.index'));

    expect($response->status())->toBe(200)
        ->and($response->json('data'))->toBeArray()->toHaveCount(4);


});
