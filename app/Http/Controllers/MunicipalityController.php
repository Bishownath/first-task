<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Municipality;
use Illuminate\Http\Request;
use App\Http\Requests\Municipality\StoreRequest;
use App\Http\Requests\Municipality\UpdateRequest;

class MunicipalityController extends Controller
{

    public function index()
    {
        $municipality = Municipality::all();
        return view('municipality.index')
            ->with([
                'municipality' => $municipality,
            ]);
    }


    public function create()
    {
        $district = District::select('id','name')->pluck('name','id');
        return view('municipality.create')
            ->with([
                'district' => $district,
            ]);
    }


    public function store(StoreRequest $request)
    {
        $municipality = Municipality::create($request->data());
        return redirect()->route('municipality.index')
            ->with([
                'success' => 'Successfully Stored !!',
            ]);
    }


    public function show(Municipality $municipality)
    {
       
        return view('municipality.show')
            ->with([
                'municipality' => $municipality,
            ]);
    }


    public function edit(Municipality $municipality)
    {
        $district = District::select('id','name')->pluck('name','id');
        return view('municipality.edit')
            ->with([
                'municipality' => $municipality,
                'district' => $district,
            ]);
    }


    public function update(UpdateRequest $request, Municipality $municipality)
    {
        $municipality->update($request->data());
        return redirect()->route('municipality.index')
            ->with([
                'success' => 'Successfully Updated !!',
            ]);
    }


    public function destroy(Municipality $municipality)
    {
        $municipality->delete();
        return redirect()->route('municipality.index')
            ->with([
                'success' => 'Successfully Deleted !!',
            ]);
    }
}
