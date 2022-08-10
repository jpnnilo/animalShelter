<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Disease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isEmpty;

class AnimalController extends Controller
{   


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $route = Route::currentRouteName();
        $header = "Animal List";
        $listings = Animal::all();

    
        if ($route == "animal.index") {
            return view('animal.index', compact('listings','header'));
        } else {
            return view('animal.list', compact('listings', 'header'));
        }
       
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
            'age' => ['required','numeric'],
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
        $header = "Animal Health Status";
        $animal = Animal::with('diseases')->find($id);
        return view('animal.health', compact('header', 'animal')); 
    }

    //show diseases per animal
    public function showDiseases($id){
        $animal = Animal::with('diseases')->find($id);
        foreach ($animal->diseases as $diseases) {
             $disease_array[] = $diseases->pivot->disease_id;
        }
        if(empty($disease_array)){
            $disease = Disease::all();
              
        }else{
            $disease = Disease::whereNotIn('id', $disease_array)->get();
        }
            
        return response()->json(compact('animal','disease'));
    }

    //add diseases per animal
    public function addDisease(Request $request, $id){
        
        $validate = $request->validate([
            'disease'=>'required'
        ]);
        
        $animal = Animal::find($id);
        $animalId = $animal->id;
        $animal->diseases()->attach($request->disease);
        $diseaseId = $request->disease;
        $status = "200";
        $message = "Disease has been added";

        return response()->json(compact('status','message'));
        
    }

    //remove diseases per animal
    public function removeDisease(Request $request, $id){
        $animal = Animal::find($id);
        $animal->diseases()->detach($request->disease_id);
        $status = "200";
        return response()->json(compact('status'));
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
            'age' => ['required','numeric'],
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
        Animal::find($id)->delete();
        return redirect( route('animal.index'));
    }

}
