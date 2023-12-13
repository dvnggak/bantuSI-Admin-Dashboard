<?php

namespace App\Http\Controllers;

use App\Models\InternshipGuide;
use App\Models\InternshipRequisite;
use App\Models\SkripsiGuide;
use App\Models\SkripsiRequisite;
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

    //Lection/Skripsi Syarat Controller
    public function skripsi_requisite_index(Request $request)
    {
        $data = new SkripsiRequisite;

        if ($request->get('search')) {
            $data = $data->where('title', 'LIKE', '%' . $request->get('search') . '%')
                ->orWhere('desc', 'LIKE', '%' . $request->get('search') . '%');
        }

        $data = $data->get();

        return view('page.skripsi.requisite.index', compact('data', 'request'));
    }

    public function skripsi_requisite_create()
    {
        return view('page.skripsi.requisite.create');
    }

    public function skripsi_requisite_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'title' => 'required|min:3|max:255',
            'desc' => 'required|min:3|max:255',
            'link' => 'required|min:3|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data['code'] = $request->input('code');
        $data['title'] = $request->input('title');
        $data['desc'] = $request->input('desc');
        $data['link'] = $request->input('link');

        SkripsiRequisite::create($data);

        return redirect()->route('admin.skripsi.requisite.index')->with('success', 'Syarat Skripsi baru berhasil ditambahkan');
    }

    public function skripsi_requisite_edit($code)
    {
        $data = SkripsiRequisite::where('code', $code)->first();

        return view('page.skripsi.requisite.edit', compact('data'));
    }

    public function skripsi_requisite_update(Request $request, $code)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'title' => 'min:3|max:255',
            'desc' => 'min:3|max:255',
            'link' => 'min:3|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data['code'] = $request->input('code');
        $data['title'] = $request->input('title');
        $data['desc'] = $request->input('desc');
        $data['link'] = $request->input('link');

        SkripsiRequisite::where('code', $code)->update($data);

        return redirect()->route('admin.skripsi.requisite.index')->with('success', 'Data Syarat Skripsi berhasil diubah');
    }

    public function skripsi_requisite_delete($code)
    {
        SkripsiRequisite::where('code', $code)->delete();

        return redirect()->route('admin.skripsi.requisite.index')->with('success', 'Data Syarat Skripsi berhasil dihapus');
    }

    //Lection/Skripsi Panduan Controller
    public function skripsi_guide_index(Request $request)
    {
        $data = new SkripsiGuide;

        if ($request->get('search')) {
            $data = $data->where('title', 'LIKE', '%' . $request->get('search') . '%')
                ->orWhere('desc', 'LIKE', '%' . $request->get('search') . '%');
        }

        $data = $data->get();

        return view('page.skripsi.guide.index', compact('data', 'request'));
    }

    public function skripsi_guide_create()
    {
        return view('page.skripsi.guide.create');
    }

    public function skripsi_guide_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'title' => 'required|min:3|max:255',
            'desc' => 'required|min:3|max:255',
            'link' => 'required|min:3|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data['code'] = $request->input('code');
        $data['title'] = $request->input('title');
        $data['desc'] = $request->input('desc');
        $data['link'] = $request->input('link');

        SkripsiGuide::create($data);

        return redirect()->route('admin.skripsi.guide.index')->with('success', 'Panduan Skripsi baru berhasil ditambahkan');
    }

    public function skripsi_guide_edit($code)
    {
        $data = SkripsiGuide::where('code', $code)->first();

        return view('page.skripsi.guide.edit', compact('data'));
    }

    public function skripsi_guide_update(Request $request, $code)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'title' => 'min:3|max:255',
            'desc' => 'min:3|max:255',
            'link' => 'min:3|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data['code'] = $request->input('code');
        $data['title'] = $request->input('title');
        $data['desc'] = $request->input('desc');
        $data['link'] = $request->input('link');

        SkripsiGuide::where('code', $code)->update($data);

        return redirect()->route('admin.skripsi.guide.index')->with('success', 'Data Panduan Skripsi berhasil diubah');
    }

    public function skripsi_guide_delete($code)
    {
        SkripsiGuide::where('code', $code)->delete();

        return redirect()->route('admin.skripsi.guide.index')->with('success', 'Data Panduan Skripsi berhasil dihapus');
    }

    //Lection/Kerja Praktek Syarat Controller
    public function internship_requisite_index(Request $request)
    {
        $data = new InternshipRequisite;

        if ($request->get('search')) {
            $data = $data->where('title', 'LIKE', '%' . $request->get('search') . '%')
                ->orWhere('description', 'LIKE', '%' . $request->get('search') . '%');
        }

        $data = $data->get();

        return view('page.internship.requisite.index', compact('data', 'request'));
    }

    public function internship_requisite_create()
    {
        return view('page.internship.requisite.create');
    }

    public function internship_requisite_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'title' => 'required|min:3|max:255',
            'desc' => 'required|min:3|max:255',
            'link' => 'required|min:3|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data['code'] = $request->input('code');
        $data['title'] = $request->input('title');
        $data['desc'] = $request->input('desc');
        $data['link'] = $request->input('link');

        InternshipRequisite::create($data);

        return redirect()->route('admin.internship.requisite.index')->with('success', 'Syarat Kerja Praktek baru berhasil ditambahkan');
    }

    public function internship_requisite_edit($code)
    {
        $data = InternshipRequisite::where('code', $code)->first();

        return view('page.internship.requisite.edit', compact('data'));
    }

    public function internship_requisite_update(Request $request, $code)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'title' => 'min:3|max:255',
            'desc' => 'min:3|max:255',
            'link' => 'min:3|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data['code'] = $request->input('code');
        $data['title'] = $request->input('title');
        $data['desc'] = $request->input('desc');
        $data['link'] = $request->input('link');

        InternshipRequisite::where('code', $code)->update($data);

        return redirect()->route('admin.internship.requisite.index')->with('success', 'Data Syarat Kerja Praktek berhasil diubah');
    }

    public function internship_requisite_delete($code)
    {
        InternshipRequisite::where('code', $code)->delete();

        return redirect()->route('admin.internship.requisite.index')->with('success', 'Data Syarat Kerja Praktek berhasil dihapus');
    }

    //Lection/Kerja Praktek/Panduan Controller
    public function internship_guide_index(Request $request)
    {
        $data = new InternshipGuide;

        if ($request->get('search')) {
            $data = $data->where('title', 'LIKE', '%' . $request->get('search') . '%')
                ->orWhere('desc', 'LIKE', '%' . $request->get('search') . '%');
        }

        $data = $data->get();

        return view('page.internship.guide.index', compact('data', 'request'));
    }

    public function internship_guide_create()
    {
        return view('page.internship.guide.create');
    }

    public function internship_guide_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'title' => 'required|min:3|max:255',
            'desc' => 'required|min:3|max:255',
            'file' => 'required|min:3|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data['code'] = $request->input('code');
        $data['title'] = $request->input('title');
        $data['desc'] = $request->input('desc');
        $data['file'] = $request->input('file');

        InternshipGuide::create($data);

        return redirect()->route('admin.internship.guide.index')->with('success', 'Panduan Kerja Praktek baru berhasil ditambahkan');
    }

    public function internship_guide_edit($code)
    {
        $data = InternshipGuide::where('code', $code)->first();

        return view('page.internship.guide.edit', compact('data'));
    }

    public function internship_guide_update(Request $request, $code)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'title' => 'min:3|max:255',
            'desc' => 'min:3|max:255',
            'file' => 'min:3|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data['code'] = $request->input('code');
        $data['title'] = $request->input('title');
        $data['desc'] = $request->input('desc');
        $data['file'] = $request->input('file');

        InternshipGuide::where('code', $code)->update($data);

        return redirect()->route('admin.internship.guide.index')->with('success', 'Data Panduan Kerja Praktek berhasil diubah');
    }

    public function internship_guide_delete($code)
    {
        InternshipGuide::where('code', $code)->delete();

        return redirect()->route('admin.internship.guide.index')->with('success', 'Data Panduan Kerja Praktek berhasil dihapus');
    }
}
