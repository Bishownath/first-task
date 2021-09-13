<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Person;
use App\Models\District;
use Illuminate\Support\Str;
use App\Models\Municipality;
use Illuminate\Http\Request;
use App\Http\Requests\Person\StoreRequest;
use App\Http\Requests\Person\UpdateRequest;

class PersonController extends Controller
{

    public function index()
    {
        $state = State::get();
        $district = District::get();
        $municipality = Municipality::get();
        $person = Person::with('state', 'district', 'municipality')->get();

        return view('person.index', compact('state', 'district', 'municipality'))
            ->with([
                'person' => $person,
            ]);
    }


    public function create()
    {
        $state = State::get();
        $district = District::get();
        $municipality = Municipality::get();
        return view('person.create', compact('state', 'district', 'municipality'));
    }

    public function store(StoreRequest $request)
    {
        $person = Person::create($request->data());

        if ($request->hasFile('image')) {
            $inputFile = $request->file('image');
            $filename = Str::random(10) . '.' . $inputFile->getClientOriginalExtension();
            $inputFile->move('images/person', $filename);
            // $request->merge(['image' => $filename]);
            $person->image = $filename;
        }

        $person->save();

        return redirect()->route('person.index')
            ->with([
                'success' => 'Successfully Stored!!'
            ]);
    }


    public function show(Person $person)
    {
        return view('person.show')->with([
            'person' => $person,
        ]);
    }


    public function edit(Person $person)
    {
        $state = State::get();
        $district = District::get();
        $municipality = Municipality::get();
        return view('person.edit')->with([
            'person' => $person,
            'state' => $state,
            'district' => $district,
            'municipality' => $municipality,
        ]);
    }

    public function update(UpdateRequest $request, Person $person)
    {
        $person->update($request->data());
        return redirect()->route('person.index')
            ->with('success', 'Successfully Updated !!');
    }

    public function destroy(Person $person)
    {
        $person->delete();
        return redirect()->route('person.index')
            ->with('success', 'Deleted Successfully');
    }

    public function getDistrict(Request $request)
    {
        $state_id = $request->input('state_id');
        $district = District::where('state_id', $state_id)->get();

        $html = '<option value=""> Select District</option>';
        foreach ($district as $dt) {
            $html .= '<option value="' . $dt->id . '">' . $dt->name . ' </option>';
        }
        echo $html;
    }


    public function getMunicipality(Request $request)
    {
        $district_id = $request->input('district_id');

        $municipality = Municipality::where('district_id', $district_id)->get();

        $html = '<option>Select Municipality</option>';
        foreach ($municipality as $mn) {
            $html .= '<option value="' . $mn->id . '"> ' . $mn->name . '</option>';
        }
        echo $html;
    }
}
