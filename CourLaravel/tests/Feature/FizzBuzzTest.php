<?php

use function Pest\Laravel\get;

it('has a route to play fizz buzz', function () {

    $response = get(route('fizzbuzz', ['action' => 8]));
    expect($response->status())->toBe(200);
});

it('when send 3, should recieve fizz', function () {

    $response = get(route('fizzbuzz', ['action' => 3]));
    expect($response->status())->toBe(200);
    expect($response->json('data.value'))->toBe("fizz");

});

it('when send 5, should recieve buzz', function () {

    $response = get(route('fizzbuzz', ['action' => 5]));
    expect($response->status())->toBe(200);
    expect($response->json('data.value'))->toBe("buzz");

});

it('when send 10, should recieve buzz', function () {

    $response = get(route('fizzbuzz', ['action' => 10]));
    expect($response->status())->toBe(200);
    expect($response->json('data.value'))->toBe("buzz");

});


it('when send 7, should recieve 7', function () {

    $response = get(route('fizzbuzz', ['action' => 7]));
    expect($response->status())->toBe(200);
    expect($response->json('data.value'))->toBe('7');

});


it('when send 15, should recieve 15', function () {

    $response = get(route('fizzbuzz', ['action' => 15]));
    expect($response->status())->toBe(200);
    expect($response->json('data.value'))->toBe("fizzbuzz");

});

it('when send other than a number, should recieve status 403', function () {

    $response = get(route('fizzbuzz', ['action' => 'toto']));
    expect($response->status())->toBe(403);
});

it('when send nothing, should recieve status 404', function () {

    $response = get('/fizzbuzz/');
    expect($response->status())->toBe(404);
});
