<?php

namespace App\Http\Controllers;

use App\Models\Adopter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AdopterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $route = Route::currentRouteName() == 'adopter.index'? 'adopter.index': 'adopter.list' ;
        $header = "Adopter List";
        $listings = Adopter::all();

        return view($route, compact('listings', 'header'));
     
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $header = "Create Adopter";
        return view('adopter.form', compact('header'));
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
            'email' => 'required',
            'age' => 'required|numeric',
            'gender' => 'required',
            'address' => 'required',
        ]);

        $adopter = new Adopter();
        $adopter->name = $request->name;
        $adopter->email = $request->email;
        $adopter->age = $request->age;
        $adopter->gender = $request->gender;
        $adopter->address = $request->address;

        $adopter->save();

        return redirect(route('adopter.list'));
    }

    /**
     * Display the adopted animals
     * Display the specified resource.
     * 
     * @param  \App\Models\Adopters  $adopters
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $header = "Adopter Information";
        $adopter = Adopter::find($id);
        return view('adopter.information', compact('header','adopter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Adopters  $adopters
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $header = "Update Adopter";
        $adopter = Adopter::find($id);

        return view('adopter.form', compact('header', 'adopter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Adopters  $adopters
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'age' => 'required|numeric',
            'gender' => 'required',
            'address'=> 'required'
        ]);
        
        $adopter = Adopter::find($id);
        $adopter->name = $request->name;
        $adopter->email = $request->email;
        $adopter->age = $request->age;
        $adopter->gender = $request->gender;
        $adopter->address = $request->address;
        $adopter->save();

        return redirect(route('adopter.list'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Adopters  $adopters
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Adopter::find($id)->delete();
        return redirect(route('adopter.list'));
    }
}
