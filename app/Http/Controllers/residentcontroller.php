<?php

namespace App\Http\Controllers;

use App\Models\resident;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class residentcontroller extends Controller
{
    public function index(){

        $residents = resident::with('user')->paginate(5);

        return view('pages.resident.index',[
             'residents' => $residents,
        ]);
    }

    //function create//
    public function create(){
        return view('pages.resident.create');
    }

    //function request//
    public function store(request $request){
        $validatedData = $request->validate([
            'nik' => ['required', 'min:16', 'max:16'],
            'name' => ['required', 'max:100'],
            'gender' => ['required', Rule::in(['male', 'female'])],
            'birth_date' => ['required', 'string'],
            'birth_place' => ['required', 'max:100'],
            'address' => ['required', 'max:700'],
            'religion' => ['nullable', 'max:50'],
            'material_status' => ['required', Rule::in(['single', 'married', 'divorced', 'widowed'])],
            'occupation' => ['nullable', 'max:100'],
            'phone' => ['nullable', 'max:15'],
            'status' => ['required', Rule::in(['active', 'moved', 'deceased'])],
        ]);

        resident::create($validatedData);
        return redirect('/resident')->with('success', 'berhasil menambahkan data');
    }

    //function edite//
    public function edit($id){
        $resident = resident::findOrFail($id);
        return view('pages.resident.edit', [
            'resident' => $resident,
        ]);
    }

    //function update//
    public function update(Request $request, $id){
         $validatedData = $request->validate([
            'nik' => ['required', 'min:16', 'max:16'],
            'name' => ['required', 'max:100'],
            'gender' => ['required', Rule::in(['male', 'female'])],
            'birth_date' => ['required', 'string'],
            'birth_place' => ['required', 'max:100'],
            'address' => ['required', 'max:700'],
            'religion' => ['nullable', 'max:50'],
            'material_status' => ['required', Rule::in(['single', 'married', 'divorced', 'widowed'])],
            'occupation' => ['nullable', 'max:100'],
            'phone' => ['nullable', 'max:15'],
            'status' => ['required', Rule::in(['active', 'moved', 'deceased'])],
        ]);

        resident::findOrFail($id)->update($validatedData);
        return redirect('/resident')->with('success', 'berhasil mengupdate data');
    }


     public function delete($id){

        $resident = resident::findOrFail($id);
        $resident->delete();
        return redirect('/resident')->with('success', 'berhasil apus data');
    }
}
