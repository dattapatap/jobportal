<?php

namespace App\Http\Controllers;

use App\Models\EmployerPackage;
use App\Models\Package;
use App\Models\Payments;
use Carbon\Carbon;
use Facade\FlareClient\Api as FlareClientApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Razorpay\Api\Api;

class PaymentsController extends Controller
{



    public function payment(Request $request)
    {
        $input = $request->all();
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $payment = $api->payment->fetch($request->razorpay_payment_id);
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            DB::beginTransaction();
            try {
                $recrId = Auth::user()->recruiter->id;
                $packageInfo = Package::find($request->pk_id);

                $modelPayment = new Payments();
                $modelPayment->payment_id = $payment->id;
                $modelPayment->	payment_tax_id = $this->generateRandomString();
                $modelPayment->	payment_amount = round($payment->amount /100, 2);
                $modelPayment->payment_actual_amount = $request->amount;
                $modelPayment->package_id = $request->pk_id;
                $modelPayment->rec_id = $recrId;
                $modelPayment->status = $payment->status;
                $modelPayment->payment_date = Carbon::now();
                $modelPayment->payment_method = $payment->method;
                $modelPayment->save();

                $empPackage = new EmployerPackage();
                $empPackage->package_id =   $request->pk_id;
                $empPackage->rec_id = $recrId;
                $empPackage->selected_date = Carbon::now();
                $empPackage->expiry_date = Carbon::now()->addDays($packageInfo->maxdays);
                $empPackage->avl_points = round($payment->amount /100, 2);
                $empPackage->package_status = 'Active';
                $empPackage->save();
                DB::commit();

                $request->session()->flash('success','Payment Successfull');
                return response()->json(['code'=>200, 'message'=> "Payment Successfull"], 200);

            } catch (\Exception $e) {
                DB::rollback();
                echo $e->getMessage();
                $request->session()->flash('error','Payment Unsuccessfull, please try again');
                return response()->json(['code'=>200, 'message'=> "Payment Unsuccessfull, please try again"], 200);
            }
        }
    }


    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}
