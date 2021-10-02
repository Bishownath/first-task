<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\State;
use App\Models\District;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\State\StoreRequest;
use App\Http\Requests\State\UpdateRequest;

class StateController extends Controller
{

    public function index()
    {
        $states = State::get();
        return view('state.index')->with([
            'states' => $states,
        ]);
    }


    public function create()
    {
        return view('state.create');
    }


    public function store(StoreRequest $request)
    {
        State::create($request->data());

        Alert::success('Success','Stored Successfully');
        return redirect()->route('state.index');
    }


    public function show(State $state)
    {
        return view('state.show')->with([
            'state' => $state,
        ]);
    }


    public function edit(State $state)
    {
        return view('state.edit')->with([
            'state' => $state,
        ]);
    }


    public function update(UpdateRequest $request, State $state)
    {
        $state->update($request->data());

        Alert::success('Success','Updated Successfully');
        return redirect()->route('state.index');
    }


    public function destroy(State $state)
    {
        try{
            $state->delete();

            Alert::success('Success', 'Successfully Deleted !!');
            
            return redirect()->route('state.index');
        }
        catch(Exception $e){
            var_dump($e->errorInfo);
            Alert::warning("Error","State cannot be deleted when it has the child data in it !!");
            return redirect()->route('state.index');
        }
        
    }
}
