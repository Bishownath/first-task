<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\District;
use App\Models\Municipality;
use Illuminate\Http\Request;
use App\Http\Requests\Municipality\StoreRequest;
use App\Http\Requests\Municipality\UpdateRequest;

class MunicipalityController extends Controller
{

    public function index()
    {

        $state = State::get();
        $district = District::get();
        $municipalities = Municipality::with('state', 'district')->get();

        return view('municipality.index', compact('state', 'district', 'municipalities'));
    }


    public function create()
    {
        $district = District::select('id', 'name')->pluck('name', 'id');
        return view('municipality.create')
            ->with([
                'district' => $district,
            ]);
    }


    public function store(StoreRequest $request)
    {
        Municipality::create($request->data());
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
        $district = District::select('id', 'name')->pluck('name', 'id');
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
