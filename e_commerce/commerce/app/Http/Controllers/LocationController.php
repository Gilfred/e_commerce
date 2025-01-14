<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FedaPay\FedaPay;
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
        FedaPay::setApiKey(env('FEDAPAY_SECRET_KEY'));
        FedaPay::setEnvironment(env('FEDAPAY_ENV','sandbox'));
        $transaction = \FedaPay\Transaction::create([
            'description' => $request->input('description'),
            'amount' => $request->input('amount'),  // Montant en francs CFA
            'currency' => $request->input('currency'),
            'customer' => [
                'firstname' => $request->input('firstname'),
                'lastname' => $request->input('lastname'),
                'email' => $request->input('email'),
                'phone_number' => [
                    'number' => $request->input('number'),
                    'country' => $request->input('country'),
                ]
            ]

        ]);
        // dd($transaction);

       return redirect($transaction->generateToken()->url);

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
