<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = "Disease List";
        $listings = Disease::all();
        return view('disease.index',compact('header','listings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $header = "Create Disease";
        return view('disease.form', compact('header'));
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
            'description' => 'required',
        ]);

        $disease = new Disease();
        $disease->name = $request->name;
        $disease->description = $request->description;
        $disease->save();

        return  redirect(route('disease.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $header = "Update Disease";
        $disease = Disease::find($id);
        return view('disease.form', compact('header','disease'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $disease = Disease::find($id);
        $disease->name = $request->name;
        $disease->description = $request->description;
        $disease->save();
        return redirect(route('disease.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Disease::find($id)->delete();
        return redirect(route('disease.index'));
    }
}
