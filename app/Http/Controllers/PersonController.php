<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Person;
use App\Models\District;
use Illuminate\Support\Str;
use App\Models\Municipality;
use App\Http\Requests\Person\StoreRequest;
use App\Http\Requests\Person\UpdateRequest;

class PersonController extends Controller
{

    public function index()
    {
        $state = State::get();
        $district = District::get();
        $municipality = Municipality::get();
        // $person = Person::get();
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

        // $person = new Person();
        // $person->name = $request->name;
        // $person->address = $request->address;
        // $person->address_2 = $request->address_2;
        // $person->email = $request->email;
        // $person->phone_number = $request->phone_number;
        // $person->mobile_number = $request->mobile_number;
        // $person->age = $request->age;
        // $person->gender = $request->gender;
        // $person->state_id = $request->state_id;
        // $person->district_id = $request->district_id;
        // $person->municipality_id = $request->municipality_id;
        // $person->citizenship_number = $request->citizenship_number;
        // $person->passport_number = $request->passport_number;
        // $person->blood_group = $request->blood_group;
        // $person->date_of_birth = $request->date_of_birth;
        // $person->grandfather_name = $request->grandfather_name;
        // $person->father_name = $request->father_name;
        // $person->issue_date = $request->issue_date;
        // $person->validity_date = $request->validity_date;
        // $person->issued_from = $request->issued_from;
        // $person->issued_from = $request->issued_from;
        // $person->issued_by = $request->issued_by;

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
}
