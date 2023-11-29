<?php

namespace App\Http\Controllers;

use App\Models\PaymentGuide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentGuideController extends Controller
{
    public function payment_guide_index(Request $request)
    {
        $data = new PaymentGuide;

        if ($request->get('search')) {
            $data = $data->where('title', 'LIKE', '%' . $request->get('search') . '%')
                ->orWhere('category', 'LIKE', '%' . $request->get('search') . '%')
                ->orWhere('year', 'LIKE', '%' . $request->get('search') . '%');
        }

        $data = $data->get();

        return view('page.payment.guide.index', compact('data', 'request'));
    }

    public function payment_guide_create()
    {
        return view('page.payment.guide.create');
    }

    public function payment_guide_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
            'desc' => 'required|min:3',
            'category' => 'required|min:3',
            'batch' => 'required|min:3',
            'year' => 'required|min:3',
            'link' => 'required|min:3',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data['title'] = $request->input('title');
        $data['desc'] = $request->input('desc');
        $data['category'] = $request->input('category');
        $data['batch'] = $request->input('batch');
        $data['year'] = $request->input('year');
        $data['link'] = $request->input('link');

        PaymentGuide::create($data);

        return redirect()->route('admin.payment.guide.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function payment_guide_edit($id)
    {
        $data = PaymentGuide::findOrFail($id);

        return view('page.payment.guide.edit', compact('data'));
    }

    public function payment_guide_update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
            'desc' => 'required|min:3',
            'category' => 'required|min:3',
            'batch' => 'required|min:3',
            'year' => 'required|min:3',
            'link' => 'required|min:3',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data['title'] = $request->input('title');
        $data['desc'] = $request->input('desc');
        $data['category'] = $request->input('category');
        $data['batch'] = $request->input('batch');
        $data['year'] = $request->input('year');
        $data['link'] = $request->input('link');

        PaymentGuide::where('id', $id)->update($data);

        return redirect()->route('admin.payment.guide.index')->with('success', 'Data berhasil diubah');
    }

    public function payment_guide_delete($id)
    {
        PaymentGuide::findOrFail($id)->delete();

        return redirect()->route('admin.payment.guide.index')->with('success', 'Data berhasil dihapus');
    }
}
