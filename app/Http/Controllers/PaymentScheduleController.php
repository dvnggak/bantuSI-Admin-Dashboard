<?php

namespace App\Http\Controllers;

use App\Models\PaymentSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentScheduleController extends Controller
{
    public function payment_schedule_index(Request $request)
    {
        $data = new PaymentSchedule;

        if ($request->get('search')) {
            $data = $data->where('title', 'LIKE', '%' . $request->get('search') . '%')
                ->orWhere('batch', 'LIKE', '%' . $request->get('search') . '%')
                ->orWhere('desc', 'LIKE', '%' . $request->get('search') . '%');
        }

        $data = $data->get();

        return view('page.payment.schedule.index', compact('data', 'request'));
    }

    public function payment_schedule_create()
    {
        return view('page.payment.schedule.create');
    }

    public function payment_schedule_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
            'publisher' => 'required|min:3',
            'recipient' => 'required|min:3',
            'batch' => 'required|min:3',
            'start_date' => 'required|min:3',
            'end_date' => 'required|min:3',
            'desc' => 'required|min:3',
            'link' => 'required|min:3',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data['title'] = $request->input('title');
        $data['publisher'] = $request->input('publisher');
        $data['recipient'] = $request->input('recipient');
        $data['batch'] = $request->input('batch');
        $data['start_date'] = $request->input('start_date');
        $data['end_date'] = $request->input('end_date');
        $data['desc'] = $request->input('desc');
        $data['link'] = $request->input('link');

        PaymentSchedule::create($data);

        return redirect()->route('admin.payment.schedule.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function payment_schedule_edit($id)
    {
        $data = PaymentSchedule::findOrFail($id);

        return view('page.payment.schedule.edit', compact('data'));
    }

    public function payment_schedule_update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
            'publisher' => 'required|min:3',
            'recipient' => 'required|min:3',
            'batch' => 'required|min:3',
            'start_date' => 'required|min:3',
            'end_date' => 'required|min:3',
            'desc' => 'required|min:3',
            'link' => 'required|min:3',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data['title'] = $request->input('title');
        $data['publisher'] = $request->input('publisher');
        $data['recipient'] = $request->input('recipient');
        $data['batch'] = $request->input('batch');
        $data['start_date'] = $request->input('start_date');
        $data['end_date'] = $request->input('end_date');
        $data['desc'] = $request->input('desc');
        $data['link'] = $request->input('link');

        PaymentSchedule::where('id', $id)->update($data);

        return redirect()->route('admin.payment.schedule.index')->with('success', 'Data berhasil diubah');
    }

    public function payment_schedule_delete($id)
    {
        PaymentSchedule::findOrFail($id)->delete();

        return redirect()->route('admin.payment.schedule.index')->with('success', 'Data berhasil dihapus');
    }
}
