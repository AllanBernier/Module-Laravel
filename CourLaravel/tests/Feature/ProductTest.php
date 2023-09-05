<?php


use App\Models\Product;

it('can store a new product', function () {
    $response = $this->post(route('products.store'), [
        "name" => "product",
    ]);

    expect($response)->status()->toBe(201)
        ->and(Product::first())->name->toBe('product');
});



it('can store a new product with all fields', function () {
    $response = $this->post(route('products.store'), [
        "name" => "product",
        "category" => "cat",
        "price" => 12.5,
        "quantity" => 5
    ]);

    $product = Product::first();

    expect($response)->status()->toBe(201)
        ->and($product->name)->toBe('product')
        ->and($product->category)->toBe('cat')
        ->and($product->price)->toBe(12.5)
        ->and($product->quantity)->toBe(5);
});

it('sends paginated product when the index page is called', function(){
    Product::factory(12)->create();
    $response = $this->get(route('products.index'));

    $response->assertStatus(200);
    expect($response->json('data'))->toBeArray()->toHaveCount(5)
        ->and($response->json('total'))->toBe(12);
});


it('can update a product', function () {
    $product = Product::factory()->create();
    $response = $this->put(route('products.update', ['product' => $product->id]), [
        "name" => "New name ProductName",
    ]);

    expect($response)->status()->toBe(200)
        ->and(Product::first())->name->toBe("New name ProductName");
});


it('can search product by name', function () {
    Product::factory(2)->create(['name' => 'azerty']);
    Product::factory(5)->create();

    $response = $this->get(route('products.byname', ['search' => 'azerty']));

    expect($response->status())->toBe(200)
        ->and($response->json('data'))->toBeArray()->toHaveCount(2);
});

it('can search product by name and category', function () {
//    Product::all()->delete();

    Product::factory(2)->create(['name' => 'totoo', 'category' => 'tifeti']);
    Product::factory(2)->create(['name' => 'totooal', 'category' => 'tifezfezf']);
    Product::factory(5)->create();

    $response = $this->post(route('products.search'), ['search' => 'totoo tife']);

    expect($response->status())->toBe(200)
        ->and($response->json('data'))->toBeArray()->toHaveCount(4);
});

it('can get paginate product', function () {
    Product::factory(2)->create(['name' => 'totoo', 'category' => 'tifeti']);
    Product::factory(2)->create(['name' => 'totooal', 'category' => 'tifezfezf']);
    Product::factory(5)->create();

    $response = $this->post(route('products.search'));

    expect($response->status())->toBe(200)
        ->and($response->json('data'))->toBeArray()->toHaveCount(9);
});



