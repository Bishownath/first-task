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
use App\Models\PersonImage;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class PersonController extends Controller
{

    public function index()
    {
        $persons = Person::get();

        return view('person.index', compact('persons'));
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

        if (request()->hasFile('image')) {
            $inputFile = request()->file('image');
            $filename = time() . Str::random(10) . '.' . $inputFile->getClientOriginalExtension();
            $inputFile->move('images/person', $filename);
            if ($filename) {
                $person->image = $filename;
            }
        }

        if (request()->hasFile('images')) {
            if ($files = request()->file('images')) {
                foreach ($files as $key => $file) {
                    $filename = time() . Str::random(10) . '.' . $file->getClientOriginalExtension();
                    $file->move('images/person', $filename);

                    PersonImage::create([
                        'people_id' => $person->id,
                        'images' => $filename,
                    ]);
                }
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

        Alert::success('Success', 'Successfully Stored!!');
        return redirect()->route('person.index');
    }


    public function show(Person $person)
    {
        $date_of_birth = $person->date_of_birth;
        $age = Carbon::parse($date_of_birth)->age;

        return view('person.show')->with([
            'person' => $person,
            'age' => $age,
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

        Alert::success('Success', 'Deleted Successfully');
        return redirect()->route('person.index');
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

    public function changeStatus($id)
    {
        $person = Person::where('id', '=', $id)
            ->first();

        if ($person->status == 1) {
            $person->status = 0;
        } else {
            $person->status = 1;
        }
        $person->save();

        Alert::success('Success', 'Status Changed');
        return redirect()->back();
    }


    public function deleted_person()
    {
        $persons = Person::onlyTrashed()->get();

        return view('person.deleted_person', compact('persons'));
    }
}
