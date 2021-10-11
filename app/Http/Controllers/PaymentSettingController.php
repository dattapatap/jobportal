<?php

namespace App\Http\Controllers;

use App\Models\PaymentSetting;
use Illuminate\Http\Request;

class PaymentSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = PaymentSetting::find(1);
        return view('admin.others.package_settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $paymentSetting = PaymentSetting::findOrFail($request->post('id'));
        $this->validate($request, [
            'post_job' => 'required|numeric',
            'prof_view' => 'required|numeric',
            'prof_download' => 'required|numeric',
            'prof_interest' => 'required|numeric'
        ]);

        $paymentSetting->prof_view =$request->post('prof_view');
        $paymentSetting->prof_download = $request->post('prof_download');
        $paymentSetting->prof_interest = $request->post('prof_interest');
        $paymentSetting->post_job = $request->post('post_job');
        $paymentSetting->save();
        return redirect()->route('admin.package_settings')->with('success', 'Points Setting updated');

    }

    public function destroy(PaymentSetting $paymentSetting)
    {
        //
    }
}
