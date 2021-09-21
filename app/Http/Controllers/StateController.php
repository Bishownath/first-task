<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Requests\State\StoreRequest;
use App\Http\Requests\State\UpdateRequest;
use App\Models\District;
use Exception;

class StateController extends Controller
{

    public function index()
    {
        $state = State::get();
        return view('state.index')->with([
            'state' => $state,
        ]);
    }


    public function create()
    {
        return view('state.create');
    }


    public function store(StoreRequest $request)
    {
        $state = State::create($request->data());

        return redirect()->route('state.index')
            ->with([
                'success' => 'Stored Successfully',
            ]);
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

        return redirect()->route('state.index')
            ->with([
                'success' => 'Successfully Updated',
            ]);
    }


    public function destroy(State $state)
    {
        try{
            $state->delete();
            return redirect()->route('state.index')
            ->with([
                'success' => 'Successfully Deleted !!',
            ]);
        }
        catch(Exception $e){
            var_dump($e->errorInfo);
            return redirect()->route('state.index')
                ->with([
                    'error' => 'State cannot be deleted when it has the child data in it !!'
                ]);
        }
        
    }
}
