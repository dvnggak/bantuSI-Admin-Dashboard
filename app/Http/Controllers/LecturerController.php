<?php

namespace App\Http\Controllers;

use App\Models\Lecturers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LecturerController extends Controller
{
    public function majoring_lecturers_index(Request $request)
    {
        $data = new Lecturers;

        if ($request->get('search')) {
            $data = $data->where('name', 'LIKE', '%' . $request->get('search') . '%')
                ->orWhere('nik', 'LIKE', '%' . $request->get('search') . '%')
                ->orWhere('nidn', 'LIKE', '%' . $request->get('search') . '%');
        }

        $data = $data->get();

        return view('page.majoring.lecturers.index', compact('data', 'request'));
    }

    public function majoring_lecturers_create()
    {
        return view('page.majoring.lecturers.create');
    }

    public function majoring_lecturers_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required|min:3',
            'nidn' => 'min:3',
            'name' => 'required|min:3',
            'gender' => 'required|min:3',
            'university' => 'required|min:3',
            'faculty' => 'required|min:3',
            'study_program' => 'required|min:3',
            'functional_position' => 'required|min:3',
            'employment_status' => 'required|min:3',
            'highest_education' => 'required',
            'status' => 'required|min:3',
            'email' => 'required|min:3|email',
            'phone_number' => 'required|min:3|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data['nik'] = $request->input('nik');
        $data['nidn'] = $request->input('nidn');
        $data['name'] = $request->input('name');
        $data['gender'] = $request->input('gender');
        $data['university'] = $request->input('university');
        $data['faculty'] = $request->input('faculty');
        $data['study_program'] = $request->input('study_program');
        $data['functional_position'] = $request->input('functional_position');
        $data['employment_status'] = $request->input('employment_status');
        $data['highest_education'] = $request->input('highest_education');
        $data['status'] = $request->input('status');
        $data['email'] = $request->input('email');
        $data['phone_number'] = $request->input('phone_number');

        Lecturers::create($data);

        return redirect()->route('admin.majoring.lecturers.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function majoring_lecturers_edit($nik)
    {
        $data = Lecturers::where('nik', $nik)->firstOrFail();

        return view('page.majoring.lecturers.edit', compact('data'));
    }

    public function majoring_lecturers_update(Request $request, $nik)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required|min:3',
            'nidn' => 'min:3',
            'name' => 'required|min:3',
            'gender' => 'required|min:3',
            'university' => 'required|min:3',
            'faculty' => 'required|min:3',
            'study_program' => 'required|min:3',
            'functional_position' => 'required|min:3',
            'employment_status' => 'required|min:3',
            'highest_education' => 'required',
            'status' => 'required|min:3',
            'email' => 'required|min:3|email',
            'phone_number' => 'required|min:3|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data['nik'] = $request->input('nik');
        $data['nidn'] = $request->input('nidn');
        $data['name'] = $request->input('name');
        $data['gender'] = $request->input('gender');
        $data['university'] = $request->input('university');
        $data['faculty'] = $request->input('faculty');
        $data['study_program'] = $request->input('study_program');
        $data['functional_position'] = $request->input('functional_position');
        $data['employment_status'] = $request->input('employment_status');
        $data['highest_education'] = $request->input('highest_education');
        $data['status'] = $request->input('status');
        $data['email'] = $request->input('email');
        $data['phone_number'] = $request->input('phone_number');

        Lecturers::where('nik', $nik)->update($data);

        return redirect()->route('admin.majoring.lecturers.index')->with('success', 'Data berhasil diubah');
    }

    public function majoring_lecturers_delete($nik)
    {
        Lecturers::where('nik', $nik)->delete();

        return redirect()->route('admin.majoring.lecturers.index')->with('success', 'Data berhasil dihapus');
    }
}
