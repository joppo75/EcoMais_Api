<?php

namespace App\Http\Controllers;

use App\Models\GasCarbonicoEmitido;
use App\Http\Requests\StoreGasCarbonicoEmitidoRequest;
use App\Http\Requests\UpdateGasCarbonicoEmitidoRequest;
use Exception;

class GasCarbonicoEmitidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            
            $obj = new GasCarbonicoEmitido();
            $gas = $obj->orderByDesc('id')->take(5)->get();

            return [
                'status' => 1,
                'data' => $gas
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
    public function store(StoreGasCarbonicoEmitidoRequest $request)
    {
        try {
            
            $obj = new GasCarbonicoEmitido();
            $gas = $obj->create($request->all());

            return [
                'status' => 1,
                'data' => $gas
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
    public function show(GasCarbonicoEmitido $gasCarbonicoEmitido)
    {
        try {

            return [
                "status" => 1,
                "data" => $gasCarbonicoEmitido
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
    public function edit(GasCarbonicoEmitido $gasCarbonicoEmitido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGasCarbonicoEmitidoRequest $request, GasCarbonicoEmitido $gasCarbonicoEmitido)
    {
        try {

            $gasCarbonicoEmitido->update($request->all());

            return [
                "status" => 1,
                "data" => $gasCarbonicoEmitido
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
    public function destroy(GasCarbonicoEmitido $gasCarbonicoEmitido)
    {
        try {

            $gasCarbonicoEmitido->delete();

            return [
                "status" => 1,
                "data" => $gasCarbonicoEmitido
            ];

        } catch (Exception $e){

            return [
                "status" => 1,
                "error" => $e->getMessage()
            ];

        }
    }
}
