<?php

namespace App\Http\Controllers;

use App\Models\CashDonation;
use Illuminate\Http\Request;

class CashDonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = "Cash Donation List";
        $listings = CashDonation::all();
        return view('donation.cash.index', compact('header','listings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $header = "Create Cash Donation";
        return view('donation.cash.form', compact('header'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'amount' => 'required|numeric',
            'date' => 'required'
        ]);

        $cashdonation = new CashDonation();
        $cashdonation->donor = $request->name;
        $cashdonation->amount = $request->amount;
        $cashdonation->date = $request->date;
        $cashdonation->save();

        return redirect(route('cashdonation.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $header = "Update Cash Donation";
        $cashdonation = CashDonation::find($id);
        return view('donation.cash.form',compact('header','cashdonation'));
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
        $validate = $request->validate([
            'name' => 'required',
            'amount' => 'required|numeric',
            'date' => 'required'
        ]);

        $cashdonation = CashDonation::find($id);
        $cashdonation->donor = $request->name;
        $cashdonation->amount = $request->amount;
        $cashdonation->date = $request->date;
        $cashdonation->save();
        
        return redirect(route('cashdonation.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CashDonation::find($id)->delete();
        
        return redirect(route('cashdonation.index'));
    }
}
