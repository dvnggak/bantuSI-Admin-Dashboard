<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{
    public function index(Request $request)
    {
        $data = new Students;

        if ($request->get('search')) {
            $data = $data->where('nim', 'LIKE', '%' . $request->get('search') . '%')
                ->orWhere('name', 'LIKE', '%' . $request->get('search') . '%')
                ->orWhere('email', 'LIKE', '%' . $request->get('search') . '%');
        }

        $data = $data->get();

        return view('page.students.index', compact('data', 'request'));
    }

    public function create()
    {
        return view('page.students.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nim' => 'required|min:10|max:25|unique:students',
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:students',
            'phone_number' => 'required|min:5|max:15',
            'first_name' => 'required|min:3|max:255',
            'last_name' => 'required|min:3|max:255',
            'gender' => 'required',
            'batch' => 'required|min:4|max:4',
            'faculty' => 'required|min:3|max:255',
            'study_program' => 'required|min:3|max:255',
        ], [
            'gender.not_in' => 'Please Select a Gender Option From The Dropdown Menu',
            'faculty.not_in' => 'Please Select a Faculty Option From The Dropdown Menu',
            'study_program.not_in' => 'Please Select a Study Program Option From The Dropdown Menu',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data['nim'] = $request->input('nim');
        $data['name'] = $request->input('name');
        $data['email'] = $request->input('email');
        $data['phone_number'] = $request->input('phone_number');
        $data['first_name'] = $request->input('first_name');
        $data['last_name'] = $request->input('last_name');
        $data['gender'] = $request->input('gender');
        $data['batch'] = $request->input('batch');
        $data['faculty'] = $request->input('faculty');
        $data['study_program'] = $request->input('study_program');

        Students::create($data);

        return redirect()->route('admin.student.index')->with('success', 'Data Mahasiswa/i Berhasil Ditambahkan');
    }
}
