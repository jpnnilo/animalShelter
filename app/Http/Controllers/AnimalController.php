<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;


class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $header = "Animal List";
        $listings = Animal::all();
        return view('animal.index', compact('listings','header'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $header = "Create Animal";
        return view('animal.form', compact('header'));
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
            'age' =>'required',
            'gender' => 'required',
            'breed' => 'required',
            'type' => 'required',
        ]);
        
        Animal::create($validate);
        return redirect(route('animal.index'));
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
        $header = "Update Animal";
        $animal = Animal::find($id);
        return view('animal.form', compact('animal','header'));
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
            'age' => 'required',
            'gender' => 'required',
            'breed' => 'required',
            'type' => 'required'    
        ]);
        
        $animal = Animal::find($id);
        $animal->name = $request->name;
        $animal->age = $request->age;
        $animal->gender = $request->gender;
        $animal->breed = $request->breed;
        $animal->type = $request->type;
        $animal->save();
        return redirect(route('animal.index')); 
    }
        
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Animal::find($id)->delete();
        return redirect( route('animal.index'));
    }

}
