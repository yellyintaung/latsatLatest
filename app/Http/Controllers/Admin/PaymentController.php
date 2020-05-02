<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Payment;

class PaymentController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $payment = Payment::orderBy('created_at', 'desc')->get();
        return view('la.payment.index')->with('payment',$payment);
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        //
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $payment = Payment::find($id);
        return view('la.payment.show')->with('payment',$payment);
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $payment = Payment::find($id);
        return view('la.payment.edit')->with('payment',$payment);
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $payment = Payment::find($id);
        $payment->status = $request->status;
        $payment->save();
        return redirect('/admin/payment');
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $payment = Payment::find($id);

        if(count($payment->porder)==0){
            $payment->delete();
            return redirect('/admin/payment');
            }
            else{
                return redirect('/admin/payment')->with('alert', 'ယခု‌ Paymentနဲ့ဆိုင်တဲ့ Order listကိုအရင်ဖျက်ပါ!');
            }
    }
}
