<?php

namespace App\Http\Controllers;

use App\Cargo;
use App\Area;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargo = Cargo::all();
        return view('cargo.index',compact('cargo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $area = Area::all();
        return view('cargo.create',compact('area'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $cargo = Cargo::create($request->all());
        $notification = "Se registro el cargo $cargo->nom_cargo correctamente";
        return redirect()->route('cargo.index')->with(compact('notification'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cargo $cargo)
    {
        $cargo ->delete();
        $notification = "Se elimino el cargo correctamente";
        return redirect()->route('cargo.index')->with(compact('notification'));
    }
}
