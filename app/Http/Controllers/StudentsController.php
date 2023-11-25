<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

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
}
