<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Requests\District\StoreRequest;
use App\Http\Requests\District\UpdateRequest;

class DistrictController extends Controller
{

    public function index()
    {
        $district = District::get();

        return view('district.index')
            ->with([
                'district' => $district,
            ]);
    }


    public function create()
    {
        $state = State::select('id','name')->pluck('name','id');
        return view('district.create')
            ->with([
                'state' => $state,
            ]);
    }


    public function store(StoreRequest $request)
    {
        $district = District::create($request->data());
        return redirect()->route('district.index')
            ->with([
                'success' => 'Successfully Stored !!',
            ]);
    }


    public function show(District $district)
    {
        return view('district.show')->with([
            'district' => $district,
        ]);
    }


    public function edit(District $district)
    {
        $state = State::select('id','name')->pluck('name','id');
        return view('district.edit')->with([
            'district' => $district,
            'state' => $state,
        ]);
    }


    public function update(UpdateRequest $request, District $district)
    {
        $district->update($request->data());

        return redirect()->route('district.index')
            ->with([
                'success' => "Successfully Updated !!",
            ]);
    }


    public function destroy(District $district)
    {
        $district->delete();

        return redirect()->route('district.index')
            ->with([
                'success' => 'Successfully Deleted !!',
            ]);
    }
}
