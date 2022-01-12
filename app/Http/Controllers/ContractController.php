<?php

namespace App\Http\Controllers;

use App\Contract;
use App\User;
use App\Area;
use App\Cargo;
use Illuminate\Http\Request;
use App\Http\Requests\ContractRequest;

class ContractController extends Controller
{
    public function index(Request $request)
    {
        $contract = Contract::all();
        $cargo = Cargo::all();
        // $searchCargo = $request->input('cargo');
        // $search = Contract::query()->where('cargo_id',$searchCargo)->get();
        return view('contract.index',compact('contract','cargo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $cargo = Cargo::all();
        return view('contract.create',compact('user','cargo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContractRequest $request)
    {
        $contract = Contract::create($request->all());
        $notification = "El contrado se guardo correctamente";
        return redirect()->route('contract.index')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(ContractRequest $contract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $contract = Contract::findOrFail($id);
        $user = User::all();
        $cargo = Cargo::all();
        return view('contract.edit',compact('contract','user','cargo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(ContractRequest $request,$id)
    {
        $contract = Contract::findOrFail($id);
        $contract->update($request->all());
        $notification = "El contrato de " .$contract->user->name." se edito correctamente";
        return redirect()->route('contract.index')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContractRequest $contract)
    {
        $contract->delete();
        $notification = "El contrado se elimino correctamente";
        return redirect()->route('contract.index')->with(compact('notification'));
    }
    public function search(Request $request)
    {
        $searchCargo = $request->input('cargo');
        $cargo = Cargo::all();
        $contract = Contract::all();

        $search = Contract::query()->where('cargo_id',$searchCargo)->get();
         //dd($search);
         return view('contract.search',compact('search','cargo','contract'));
    }
}
