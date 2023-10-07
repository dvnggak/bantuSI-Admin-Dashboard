<?php

namespace App\Http\Controllers;

use App\Models\Subjects;
use Illuminate\Http\Request;

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
}
