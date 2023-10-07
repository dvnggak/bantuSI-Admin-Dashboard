<?php

namespace App\Http\Controllers;

use App\Models\Subjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LectionControllers extends Controller
{
    public function index(Request $request)
    {
        $data = new Subjects;

        if ($request->get('search')) {
            $data = $data->where('subject_code', 'LIKE', '%' . $request->get('search') . '%')
                ->orWhere('subject_name', 'LIKE', '%' . $request->get('search') . '%')
                ->orWhere('subject_lecturer', 'LIKE', '%' . $request->get('search') . '%');
        }

        $data = $data->get();

        return view('page.subject.index', compact('data', 'request'));
    }

    public function create()
    {
        return view('page.subject.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject-code' => 'required|min:1|max:255',
            'subject-name' => 'required|min:3|max:255',
            'subject-type' => 'required|min:3|max:255',
            'subject-credit' => 'required|min:1|max:255',
            'subject-lecturer' => 'required|min:3|max:255',
            'subject-day' => 'required|min:3|max:255',
            'subject-time' => 'required',
            'subject-enrollment-code' => 'required|min:3|max:255',
            'subject-enrollment-link' => 'required|min:3|max:255',
            'subject-group-link' => 'required|min:3|max:255',
        ], [
            'subject-type.not_in' => 'Please select an option from the select tag.',
            'subject-time.not_in' => 'Please select an option from the select tag.',
            'subject-day.not_in' => 'Please select an option from the select tag.',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }



        $data['subject_code'] = $request->input('subject-code');
        $data['subject_name'] = $request->input('subject-name');
        $data['subject_type'] = $request->input('subject-type');
        $data['subject_credit'] = $request->input('subject-credit');
        $data['subject_lecturer'] = $request->input('subject-lecturer');
        $data['subject_day'] = $request->input('subject-day');
        $data['subject_time'] = $request->input('subject-time');
        $data['subject_enrollment_code'] = $request->input('subject-enrollment-code');
        $data['subject_enrollment_link'] = $request->input('subject-enrollment-link');
        $data['subject_group_link'] = $request->input('subject-group-link');

        Subjects::create($data);

        return redirect()->route('admin.subject.index')->with('success', 'Data berhasil ditambahkan');
    }
}
