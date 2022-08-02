<?php

namespace App\Http\Controllers;

use App\Models\Rescuer;
use Illuminate\Http\Request;

class RescuerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = "Rescuer List";
        $listings = Rescuer::all();
        return view('rescuer.index', compact('header', 'listings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $header = "Add Rescuer";
        return view('rescuer.form', compact('header'));
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
            'age' => ['required', 'numeric'],
            'gender' => 'required',
        ]);

        Rescuer::create($validate);
        return redirect(route('rescuer.index'));
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
        $header = "Update Rescuer";
        $rescuer = rescuer::find($id);
        return view('rescuer.form', compact('header', 'rescuer'));
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
            'name'=> 'required',
            'age' => ['required','numeric'],
            'gender' => 'required'
        ]);

        $rescuer = Rescuer::find($id);
        $rescuer->name = $request->name;
        $rescuer->age = $request->age;
        $rescuer->gender = $request->gender;
        $rescuer->save();

        return redirect(route('rescuer.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rescuer::find($id)->delete();
        return redirect(route('rescuer.index'));
    }
}
