<?php

namespace App\Http\Controllers;

use App\Models\MajoringProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MajoringProfileController extends Controller
{
    public function majoring_profile_index(Request $request)
    {
        $data = new MajoringProfile;

        if ($request->get('search')) {
            $data = $data->where('majoring', 'LIKE', '%' . $request->get('search') . '%')
                ->orWhere('faculty', 'LIKE', '%' . $request->get('search') . '%')
                ->orWhere('university', 'LIKE', '%' . $request->get('search') . '%');
        }

        $data = $data->get();

        return view('page.majoring.profile.index', compact('data', 'request'));
    }

    public function majoring_profile_create()
    {
        return view('page.majoring.profile.create');
    }

    public function majoring_profile_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'majoring' => 'required|min:3',
            'faculty' => 'required|min:3',
            'university' => 'required|min:3',
            'program_type' => 'required|min:3',
            'accreditation' => 'required',
            'study_time' => 'required|min:3',
            'vision' => 'required|min:3',
            'mission' => 'required|min:3',
            'student_competence' => 'required|min:3',
            'description' => 'required|min:3',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data['majoring'] = $request->input('majoring');
        $data['faculty'] = $request->input('faculty');
        $data['university'] = $request->input('university');
        $data['program_type'] = $request->input('program_type');
        $data['accreditation'] = $request->input('accreditation');
        $data['study_time'] = $request->input('study_time');
        $data['vision'] = $request->input('vision');
        $data['mission'] = $request->input('mission');
        $data['student_competence'] = $request->input('student_competence');
        $data['description'] = $request->input('description');

        MajoringProfile::create($data);

        return redirect()->route('admin.majoring.profile.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function majoring_profile_edit($id)
    {
        $data = MajoringProfile::findOrFail($id);

        return view('page.majoring.profile.edit', compact('data'));
    }

    public function majoring_profile_update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'majoring' => 'required|min:3',
            'faculty' => 'required|min:3',
            'university' => 'required|min:3',
            'program_type' => 'required|min:3',
            'accreditation' => 'required',
            'study_time' => 'required|min:3',
            'vision' => 'required|min:3',
            'mission' => 'required|min:3',
            'student_competence' => 'required|min:3',
            'description' => 'required|min:3',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data['majoring'] = $request->input('majoring');
        $data['faculty'] = $request->input('faculty');
        $data['university'] = $request->input('university');
        $data['program_type'] = $request->input('program_type');
        $data['accreditation'] = $request->input('accreditation');
        $data['study_time'] = $request->input('study_time');
        $data['vision'] = $request->input('vision');
        $data['mission'] = $request->input('mission');
        $data['student_competence'] = $request->input('student_competence');
        $data['description'] = $request->input('description');

        MajoringProfile::where('id', $id)->update($data);

        return redirect()->route('admin.majoring.profile.index')->with('success', 'Data berhasil diubah');
    }

    public function majoring_profile_delete($id)
    {
        MajoringProfile::where('id', $id)->delete();

        return redirect()->route('admin.majoring.profile.index')->with('success', 'Data berhasil dihapus');
    }
}
