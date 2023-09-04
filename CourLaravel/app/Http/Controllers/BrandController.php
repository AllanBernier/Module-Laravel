<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandStoreRequest;
use App\Http\Requests\BrandUpdateRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BrandController extends Controller
{

    public function index()
    {
        return Brand::paginate(5);
    }


    public function store(BrandStoreRequest $request)
    {
        $brand = Brand::create($request->validated());
        return new JsonResource( $brand );
    }


    public function show(Brand $brand)
    {
        $brand->load('cars');
        return new JsonResource( $brand );
    }

    public function update(BrandUpdateRequest $request, Brand $brand)
    {
        $brand->update($request->validated());

        return new JsonResource( $brand );
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return new JsonResource( $brand );
    }
}
