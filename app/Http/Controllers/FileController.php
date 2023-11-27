<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{
    public function index(Request $request)
    {
        $data = new Files;

        if ($request->get('search')) {
            $data = $data->where('code', 'LIKE', '%' . $request->get('search') . '%')
                ->orWhere('title', 'LIKE', '%' . $request->get('search') . '%');
        }

        $data = $data->get();

        return view('page.files.index', compact('data', 'request'));
    }

    public function create()
    {
        return view('page.files.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:files',
            'title' => 'required|min:3',
            'date' => 'required|date',
            'desc' => 'required|min:3',
            'link' => 'required|min:3',
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
        $data['desc'] = $request->input('desc');
        $data['link'] = $request->input('link');

        Files::create($data);

        return redirect()->route('admin.file.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($code)
    {
        $data = Files::where('code', $code)->first();

        return view('page.files.edit', compact('data'));
    }

    public function update(Request $request, $code)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:files,code,' . $code . ',code',
            'title' => 'required|min:3',
            'date' => 'required|date',
            'desc' => 'required|min:3',
            'link' => 'required|min:3',
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
        $data['desc'] = $request->input('desc');
        $data['link'] = $request->input('link');

        Files::where('code', $code)->update($data);

        return redirect()->route('admin.file.index')->with('success', 'Data Berhasil Diubah');
    }

    public function delete($code)
    {
        Files::where('code', $code)->delete();

        return redirect()->route('admin.file.index')->with('success', 'Data Berhasil Dihapus');
    }
}
