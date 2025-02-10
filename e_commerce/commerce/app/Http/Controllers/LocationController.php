<?php

namespace App\Http\Controllers;
//
// use App\Services\FedapayService;
use Illuminate\Http\Request;
// use FedaPay\FedaPay;
// use FedaPay\Transaction;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user=auth()->user();
        return view('layouts.navigation',compact('user'));
    }
    public function affichagePage(){
        return view('payment');
    }
    public function confirmation(Request $request){
        if($request->input('action')==='ok'){
            return redirect()->route('fedaypay');
         }//elseif($request->input('action')==='cancel'){
        //     return redirect()->route('welcome');
        // }

        // return redirect()->route('welcome');

    }

    public function paymentPage(){
        return view('pagefeda');
   }
   public function validation(Request $request){
    $request->validate([
        // 'firstname'=>['request','string'],
        // 'lastname'=>['required','string'],
        // 'amount'=>['required','numeric'],
        // 'number'=>['required','numeric'],
        // 'email'=>['required','email'],
        // 'country'=>['required','sting','max:2'],
        // 'currency'=>['required','']
    ]);
    \FedaPay\Fedapay::setApiKey('sk_sandbox_UsN1t7yNIO5lb82QYD69fXPp');
    \FedaPay\FedaPay::setEnvironment('sandbox');

    \FedaPay\Payout::create([
      "amount" => 2000,
      "currency" =>  "XOF",
      //'payment_method' => ['name' => 'mtn_open'],
      "customer" => [ // Non obligatoire.
          "firstname" => $request->firstname, //"John",
          "lastname" => $request->lastname, //"Doe",
          "email" => $request->email, //"john.doe@example.com",
          "phone_number" => [
              "number" =>$request->number,  //"+22997808080",
              "country" =>$request->country,// "bj",
          ],
      ],
    ]);

       return redirect()->route('articles');

   }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
