<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    public function dashboard()
    {
        return view('dashboard');
    }

    // public function index(Request $request)
    // {

    //     $data = new User;

    //     if ($request->get('search')) {
    //         $data = $data->where('name', 'LIKE', '%' . $request->get('search') . '%')
    //             ->orWhere('email', 'LIKE', '%' . $request->get('search') . '%');
    //     }

    //     $data = $data->get();

    //     return view('index', compact('data', 'request'));
    // }

    // public function create()
    // {
    //     return view('create');
    // }

    // public function edit(Request $request, $id)
    // {
    //     $data = User::find($id);

    //     return view('edit', compact('data'));
    // }

    // public function update(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|min:3|max:255',
    //         'email' => 'required|email|unique:users,email,' . $request->id,
    //         'password' => 'nullable',
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()
    //             ->back()
    //             ->withErrors($validator)
    //             ->withInput();
    //     }

    //     $data['name'] = $request->name;
    //     $data['email'] = $request->email;
    //     if ($request->password) {
    //         $data['password'] = \bcrypt($request->password);
    //     }

    //     User::where('id', $request->id)->update($data);

    //     return redirect()->route('admin.index');
    // }

    // public function delete(Request $request, $id)
    // {
    //     User::where('id', $id)->delete();

    //     return redirect()->route('admin.index');
    // }

    // public function store(Request $request)
    // {

    //     $validator = Validator::make($request->all(), [
    //         'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    //         'name' => 'required|min:3|max:255',
    //         'email' => 'required|email|unique:users,email',
    //         'password' => 'required|min:8|max:255',
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()
    //             ->back()
    //             ->withErrors($validator)
    //             ->withInput();
    //     }

    //     $image = $request->file('image');
    //     $fileName = date('Y-m-d') . $image->getClientOriginalName();
    //     $path = 'image-user/' . $fileName;

    //     Storage::disk('public')->put($path, file_get_contents($image));

    //     User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'image' => $fileName,
    //         'password' => \bcrypt($request->password),
    //     ]);

    //     return redirect()->route('admin.index');
    // }
}
