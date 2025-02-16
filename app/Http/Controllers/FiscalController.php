<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fiscal;
use App\Models\FiscalStatus;
use App\Http\Requests\Fiscal\StoreRequest;

class FiscalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $fiscals=Fiscal::with('client')->with('latestStatus')->paginate(10);
       //dd($fiscals);
       return view('fiscal.index',['data'=>$fiscals]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fiscal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data=$request->validated();
        //dd($data);
        $fm=$data['fm'];
        $fiscal=Fiscal::create(
            [
                "fm"=> strtoupper($fm)
            ]
        );
        FiscalStatus::create(
            [
                "fiscal_id"=>$fiscal->id,
                "name"=>"new"

            ]
        );
        return to_route('fiscals.index');
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
