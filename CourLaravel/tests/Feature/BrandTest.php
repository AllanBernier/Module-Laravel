<?php

use App\Models\Brand;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\delete;
use function Pest\Laravel\post;
use function Pest\Laravel\get;
use function Pest\Laravel\put;

it('can store new brands', function () {
    $brand_data = Brand::factory()->make();

    $response = post(route('brands.store'), $brand_data->toArray());

    expect($response->status())->toBe(201)
        ->and(Brand::count())->toBe(1)
        ->and($response->json('data.name'))->toBe($brand_data->name)
        ->and($response->json('data.siren'))->toBe($brand_data->siren);
});

it('can retrieve brands with pagination', function () {
    Brand::factory(8)->create();

    $response = get(route('brands.index'));

    expect($response->status())->toBe(200)
        ->and($response->json('data'))->toHaveCount(5)
        ->and($response->json('total'))->toBe(8)
        ->and($response->json('last_page'))->toBe(2);
});

it('can retrieve by id', function () {
    $brand = Brand::factory()->create();

    $response = get(route('brands.show', ['brand' => $brand->id]));
    expect($response->status())->toBe(200)
        ->and($response->json('data.id'))->toBe($brand->id);
});


it('can delete by id', function () {
    $brand = Brand::factory()->create();

    $response = delete(route('brands.destroy', ['brand' => $brand->id]));
    expect($response->status())->toBe(200)
        ->and(Brand::count())->toBe(0);
    assertDatabaseMissing('brands', $brand->toArray());
});



it('can update brands', function () {

    $brand = Brand::factory()->create();
    $updated_brand = Brand::factory()->make();

    $response = put(route('brands.update', ['brand' => $brand->id]), $updated_brand->toArray());

    $brand->refresh();
    expect($response->status())->toBe(200)
        ->and(Brand::count())->toBe(1)
        ->and($brand->name)->toBe($updated_brand->name)
        ->and($brand->siren)->toBe($updated_brand->siren);
});
