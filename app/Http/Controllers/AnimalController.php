<?php

namespace App\Http\Controllers;
use Validator;

use App\Models\Animal;
use Symfony\Component\HttpFoundation\Request;

class AnimalController extends Controller
{

   
    //show all information from animal table
    public function index(){
        $header ='Animals';
        $listings = Animal::all();
        return view('animal', compact('header','listings'));
    }

    //show specific information 
    public function edit($animal){

        $header = "Animal";
        $animal = Animal::find($animal);
        return view('animalupdate', compact('header','animal'));
    }

    public function update(Request $request, $id){
        

        $validate = $request->validate([
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'breed' => 'required',
            'type' => 'required'    
        ]);

        
        $id = Animal::find($id);
        $id->name = $request->name;
        $id->age = $request->age;
        $id->gender = $request->gender;
        $id->breed = $request->breed;
        $id->type = $request->type;
        $id->save();
        return redirect('/animal'); 

    }

    
    public function create(){

        $header = "Add";

        return view('animaladd', compact('header'));
    }


    public function store(Request $request){

        $validate = $request->validate([
            'name' => 'required',
            'age' =>'required',
            'gender' => 'required',
            'breed' => 'required',
            'type' => 'required',
        ]);
        
        Animal::create($validate);
        return redirect('/animal');
    }


    public function destroy($id){
         $id = Animal::find($id)->delete();
        return redirect('/animal');
    }
    
}
