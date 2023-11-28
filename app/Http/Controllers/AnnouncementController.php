<?php

namespace App\Http\Controllers;

use App\Models\Announcements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnnouncementController extends Controller
{
    public function index(Request $request)
    {
        $data = new Announcements;

        if ($request->get('search')) {
            $data = $data->where('code', 'LIKE', '%' . $request->get('search') . '%')
                ->orWhere('title', 'LIKE', '%' . $request->get('search') . '%');
        }

        $data = $data->get();

        return view('page.announcement.index', compact('data', 'request'));
    }

    public function create()
    {
        return view('page.announcement.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:announcements',
            'title' => 'required|min:3',
            'date' => 'required|date',
            'category' => 'required|min:3',
            'publisher' => 'required|min:3',
            'desc' => 'required|min:3',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data['code'] = $request->input('code');
        $data['title'] = $request->input('title');
        $data['date'] = $request->input('date');
        $data['category'] = $request->input('category');
        $data['publisher'] = $request->input('publisher');
        $data['desc'] = $request->input('desc');
        $data['link'] = $request->input('link');

        Announcements::create($data);

        return redirect()->route('admin.announcement.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($code)
    {
        $data = Announcements::where('code', $code)->first();

        return view('page.announcement.edit', compact('data'));
    }

    public function update(Request $request, $code)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'title' => 'required|min:3',
            'date' => 'required|date',
            'category' => 'required|min:3',
            'publisher' => 'required|min:3',
            'desc' => 'required|min:3',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data['code'] = $request->input('code');
        $data['title'] = $request->input('title');
        $data['date'] = $request->input('date');
        $data['category'] = $request->input('category');
        $data['publisher'] = $request->input('publisher');
        $data['desc'] = $request->input('desc');
        $data['link'] = $request->input('link') ?? ''; // Set empty string if link field is empty

        Announcements::where('code', $code)->update($data);

        return redirect()->route('admin.announcement.index')->with('success', 'Data berhasil diubah');
    }

    public function delete($code)
    {
        Announcements::where('code', $code)->delete();

        return redirect()->route('admin.announcement.index')->with('success', 'Data berhasil dihapus');
    }
}
