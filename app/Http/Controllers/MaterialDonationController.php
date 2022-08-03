<?php

namespace App\Http\Controllers;

use App\Models\MaterialDonation;
use Illuminate\Http\Request;

class MaterialDonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = "Material Donation List";
        $listings = MaterialDonation::all();
        return view('donation.material.index', compact('header','listings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $header = "Create Material Donation";
        return view('donation.material.form', compact('header'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'item' => 'required',
            'quantity' => 'required|numeric',
            'date' => 'required'
        ]);
        
        $materialdonation = new MaterialDonation();
        $materialdonation->donor = $request->name;
        $materialdonation->item = $request->item;
        $materialdonation->quantity = $request->quantity;
        $materialdonation->date = $request->date;
        $materialdonation->save();

        return redirect(route('materialdonation.index'));
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
        $header = "Update Material Donation";
        $materialdonation = MaterialDonation::find($id);
        return view('donation.material.form', compact('header','materialdonation'));
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
        $request->validate([
            'name' => 'required',
            'item' => 'required',
            'quantity' => 'required|numeric',
            'date' => 'required'
        ]);

        $materialdonation = MaterialDonation::find($id);
        $materialdonation->donor = $request->name;
        $materialdonation->item = $request->item;
        $materialdonation->quantity = $request->quantity;
        $materialdonation->date = $request->date;
        $materialdonation->save();
        return redirect(route('materialdonation.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MaterialDonation::find($id)->delete();
        return redirect(route('materialdonation.index'));
    }
}
