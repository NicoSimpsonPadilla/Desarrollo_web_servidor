<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bebida;

class BebidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mensaje = "Estas son mis Bebidas";

        // $bebidas = [
        //     ["Coca-cola", 1.95, "Refresco"],
        //     ["sprite", 1.45, "Refresco"],
        //     ["cerveza", 2.5, "Alcohol"]
        // ];

        
        $bebidas = Bebida::all();

        return view('bebidas/index', 
            ['mensaje' => $mensaje, 'bebidas' => $bebidas]
        );
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
