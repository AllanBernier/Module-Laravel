<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;


use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function store(ProductStoreRequest $request)
    {
        return Product::create($request->validated());
    }

    public function index()
    {
        return Product::paginate(5);
    }

    public function update(Product $product, ProductUpdateRequest $request)
    {
        $product->update( $request->validated());

        return $product;
    }

    public function byname(String $search)
    {
        return Product::whereName($search)->paginate(5);
    }

    public function search(\Illuminate\Http\Request $request)
    {

        return Product::query()->when($request->input('search'), function ($query, $search) {
            $query->searchingFields($search,['name', 'category']);
        })->paginate(25);
    }
}
