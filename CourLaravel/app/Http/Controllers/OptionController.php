<?php

namespace App\Http\Controllers;

use App\Http\Requests\OptionStoreRequest;
use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Option::paginate(5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OptionStoreRequest $request)
    {
        $option = Option::create($request->validated());
        return new JsonResource($option);
    }

    /**
     * Display the specified resource.
     */
    public function show(Option $options)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Option $options)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Option $options)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $options)
    {
        //
    }
}
