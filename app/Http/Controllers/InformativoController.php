<?php

namespace App\Http\Controllers;

use App\Models\Informativo;
use App\Http\Requests\StoreInformativoRequest;
use App\Http\Requests\UpdateInformativoRequest;
use Exception;

class InformativoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $obj = new Informativo();
            $info = $obj->all();

            return [
                'status' => 1,
                'data' => $info
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
    public function store(StoreInformativoRequest $request)
    {
        try {
            
            $obj = new Informativo();
            $info = $obj->create($request->all());

            return [
                'status' => 1,
                'data' => $info
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
    public function show(Informativo $informativo)
    {
        try {

            return [
                "status" => 1,
                "data" => $informativo
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
    public function edit(Informativo $informativo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInformativoRequest $request, Informativo $informativo)
    {
        try {
            $informativo->update($request->all());

            return [
                "status" => 1,
                "data" => $informativo
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
    public function destroy(Informativo $informativo)
    {
        try {

            $informativo->delete();

            return [
                "status" => 1,
                "data" => $informativo
            ];

        } catch (Exception $e){

            return [
                "status" => 1,
                "error" => $e->getMessage()
            ];

        }
    }
}
