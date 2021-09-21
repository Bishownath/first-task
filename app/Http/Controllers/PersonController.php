<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Person;
use App\Models\District;
use Illuminate\Support\Str;
use App\Models\Municipality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Person\StoreRequest;
use App\Http\Requests\Person\UpdateRequest;
use App\Models\Child;
use App\Models\Family;

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
            $filename = time() . Str::random(10) . '.' . $inputFile->getClientOriginalExtension();
            $inputFile->move('images/person', $filename);
            if ($filename) {
                $person->image = $filename;
            }
        }
        $person->save();

        Family::create([
            'people_id' => $person->id,
            'father_name' => request()->father_name,
            'grandfather_name' => request()->grandfather_name,
            'grandmother_name' => request()->grandmother_name,
            'mother_name' => request()->mother_name,
            'wife_name' => request()->wife_name,
        ]);

        if ($request->son_name) {
            foreach ($request->son_name as $key => $son_name) {
                Child::create([
                    'people_id' => $person->id,
                    'son_name' => $son_name,
                    'daughter_name' => request()->daughter_name[$key],
                ]);
            }
        }

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

    public function update(UpdateRequest $request, $id)
    {
        $person = Person::findOrFail($id);
        if ($request->hasFile('image') && $request->image != '') {
            $imagePath = ("images/person/" . $person->image);

            if (File::exists($imagePath)) {
                unlink($imagePath);
            }

            $inputFile = $request->file('image');
            $filename = Str::random(10) . '.' . $inputFile->getClientOriginalExtension();
            $inputFile->move('images/person', $filename);
            $person->image = $filename;
        }
        $person->update($request->data());

        $person->family->where('people_id', $id)
            ->find($id);

        $person->family->update([
            'father_name' => request()->father_name,
            'grandfather_name' => request()->grandfather_name,
            'grandmother_name' => request()->grandmother_name,
            'mother_name' => request()->mother_name,
            'wife_name' => request()->wife_name,
        ]);

        $person->children->where('people_id', $id)->find($id);

        foreach ($request->son_name as $key => $son_name) {
            $person->children[$key]->update([
                'son_name' => $son_name,
                'daughter_name' => request()->daughter_name[$key],
            ]);
        }

        return redirect()->route('person.index')
            ->with('success', 'Successfully Updated !!');
    }

    public function destroy(Person $person)
    {
        $person->delete();

        $person->family->where('people_id', $person->id)->delete();

        $person->children[0]->where('people_id', $person->id)->delete();
        return redirect()->route('person.index')
            ->with('success', 'Deleted Successfully');
    }

    public function getDistrict(Request $request)
    {
        $state_id = $request->input('state_id');
        $district = District::where('state_id', $state_id)->get();

        $html = '<option value="">Select District</option>';
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
