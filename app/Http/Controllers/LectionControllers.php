<?php

namespace App\Http\Controllers;

use App\Models\Skripsi_File;
use App\Models\Skripsi_Panduan;
use App\Models\Skripsi_Pengumuman;
use App\Models\Skripsi_Syarat;
use App\Models\Subjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LectionControllers extends Controller
{
    public function subjectIndex(Request $request)
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

    public function subjectCreate()
    {
        return view('page.subject.create');
    }

    public function subjectStore(Request $request)
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

        return redirect()->route('admin.subject.index')->with('success', 'Mata Kuliah baru berhasil ditambahkan');
    }

    public function subjectEdit($id)
    {
        $data = Subjects::find($id);

        return view('page.subject.edit', compact('data'));
    }

    public function subjectUpdate(Request $request, $id)
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

        Subjects::where('id', $id)->update($data);

        return redirect()->route('admin.subject.index')->with('success', 'Data Mata Kuliah berhasil diubah');
    }

    public function subjectDelete($id)
    {
        Subjects::where('id', $id)->delete();

        return redirect()->route('admin.subject.index')->with('success', 'Data Mata Kuliah berhasil dihapus');
    }

    public function skripsi_index()
    {
        $skripsi_syarat = new Skripsi_Syarat;
        $skripsi_panduan = new Skripsi_Panduan;
        $skripsi_pengumuman = new Skripsi_Pengumuman();
        $skripsi_file = new Skripsi_File;

        $skripsi_syarat = $skripsi_syarat->get();
        $skripsi_panduan = $skripsi_panduan->get();
        $skripsi_pengumuman = $skripsi_pengumuman->get();
        $skripsi_file = $skripsi_file->get();

        return view('page.skripsi.index', compact('skripsi_syarat', 'skripsi_panduan', 'skripsi_pengumuman', 'skripsi_file'));
    }

    //Lection/Skripsi/Syarat Controller
    public function skripsi_syarat_create()
    {
        return view('page.skripsi.syarat.create');
    }

    public function skripsi_syarat_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3|max:255',
            'desc' => 'required|min:3|max:255',
            'file' => 'required|mimes:pdf,docs|max:10000',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data['title'] = $request->input('title');
        $data['desc'] = $request->input('desc');

        $file = $request->file('file');
        $file_name = time() . "_" . $file->getClientOriginalName();
        $file->move('uploads/skripsi/syarat', $file_name);

        $data['file'] = $file_name;

        Skripsi_Syarat::create($data);

        return redirect()->route('admin.skripsi.index')->with('success', 'Syarat Skripsi baru berhasil ditambahkan');
    }
}
