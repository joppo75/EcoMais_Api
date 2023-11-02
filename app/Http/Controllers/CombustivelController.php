<?php

namespace App\Http\Controllers;

use App\Models\Combustivel;
use App\Http\Requests\StoreCombustivelRequest;
use App\Http\Requests\UpdateCombustivelRequest;
use Exception;

class CombustivelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            
            $obj = new Combustivel();
            $comb = $obj->all();

            return [
                'status' => 1,
                'data' => $comb
            ];

        } catch (Exception $e){

            return [
                "status" => 0,
                "error" => $e->getMessage(),
            ];

        }
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
    public function store(StoreCombustivelRequest $request)
    {
        try {
            
            $obj = new Combustivel();
            $comb = $obj->create($request->all());

            return [
                'status' => 1,
                'data' => $comb
            ];

        } catch (Exception $e){

            return [
                "status" => 0,
                "error" => $e->getMessage(),
            ];

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Combustivel $combustivel)
    {
        try {

            return [
                "status" => 1,
                "data" => $combustivel
            ];

        } catch (Exception $e){

            return [
                "status" => 0,
                "error" => $e->getMessage(),
            ];

        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Combustivel $combustivel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCombustivelRequest $request, Combustivel $combustivel)
    {
        try {

            $combustivel->update($request->all());

            return [
                "status" => 1,
                "data" => $combustivel
            ];

        } catch (Exception $e){

            return [
                "status" => 0,
                "error" => $e->getMessage()
            ];
            
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Combustivel $combustivel)
    {
        try {

            $combustivel->delete();

            return [
                "status" => 1,
                "data" => $combustivel
            ];

        } catch (Exception $e){

            return [
                "status" => 1,
                "error" => $e->getMessage()
            ];

        }
    }
}
