<?php

namespace App\Http\Controllers;

use App\Models\Historico;
use App\Http\Requests\StoreHistoricoRequest;
use App\Http\Requests\UpdateHistoricoRequest;
use Exception;

class HistoricoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            
            $obj = new Historico();
            $his = $obj->all();

            return [
                'status' => 1,
                'data' => $his
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
    public function store(StoreHistoricoRequest $request)
    {
        try {
            
            $obj = new Historico();
            $his = $obj->create($request->all());

            return [
                'status' => 1,
                'data' => $his
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
    public function show(Historico $historico)
    {
        try {

            return [
                "status" => 1,
                "data" => $historico
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
    public function edit(Historico $historico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHistoricoRequest $request, Historico $historico)
    {
        try {

            $historico->update($request->all());

            return [
                "status" => 1,
                "data" => $historico
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
    public function destroy(Historico $historico)
    {
        try {

            $historico->delete();

            return [
                "status" => 1,
                "data" => $historico
            ];

        } catch (Exception $e){

            return [
                "status" => 1,
                "error" => $e->getMessage()
            ];

        }
    }
}
