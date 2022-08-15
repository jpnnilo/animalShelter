<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Adopter;
use App\Models\Disease;
use App\Models\AnimalImage;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\isEmpty;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;

class AnimalController extends Controller
{   


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $route = Route::currentRouteName() == 'animal.index' ? 'animal.index' : 'animal.list' ;
        $header = "Animal List";
        $listings = Animal::all();
        
        return view($route, compact('listings', 'header'));
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
    
    //view all adoptable animals
    public function adoptable(){
        
        $adoptables = Animal::doesntHave('diseases')->wherenull('adopter_id')->get();
        return response()->json(compact('adoptables'));
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
        
        $animal = new Animal();
        $animal->name = $request->name;
        $animal->age = $request->age;
        $animal->gender = $request->gender;
        $animal->breed = $request->breed;
        $animal->type = $request->type;
        $animal->save();

        $animal_id = $animal->id;

        if($request->hasFile('images')){
            foreach($request->file('images') as $image){
                $animalImages = new AnimalImage(); 
                $animalImages->animal_id = $animal_id;
                $animalImages->image = $image->store('images','public');
                $animalImages->save();
            }
        }
        
        return redirect(route('animal.list'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    public function show($id)
    {   
        $header = "Animal Information";
        $animal = Animal::with('diseases')->find($id);
        $image = AnimalImage::where('animal_id', $id)->first();
        return view('animal.information', compact('header', 'animal','image')); 
    }

    //get animal details
    public function animalDetails($id){
        $animal = Animal::find($id);
        return response()->json(compact('animal'));
    }   


    //show diseases per animal
    public function showDiseases($id){
        
        $animal = Animal::with('diseases')->find($id);
        foreach ($animal->diseases as $diseases) {
             $disease_array[] = $diseases->pivot->disease_id;
             //get all diseases id from pivot table the pass it to array
        }
        if(empty($disease_array)){
            $disease = Disease::all();
              
        }else{
            $disease = Disease::whereNotIn('id', $disease_array)->get();
            //select all diseases id where not in id of array $disease_array
        }

        //check if someone is login ayaw gumana
       $auth = (isset(auth()->user()->name) ? auth()->user()->name : '');

        return response()->json(compact('animal','disease','auth'));
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
        $diseases = $animal->diseases; // for check if animal still has diseases
        return response()->json(compact('diseases'));
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
        return redirect(route('animal.list')); 
    }
    
    // PUT/update adopter_id to animal
    public function adopt(Request $request){

        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'age' => 'required|numeric',
            'gender' => 'required',
            'address' => 'required'
        ]);

        $adopter = Adopter::firstOrNew(['email' => $request->email]);
        $adopter->name = $request->name;
        $adopter->email = $request->email;
        $adopter->age = $request->age;
        $adopter->gender = $request->gender;
        $adopter->address = $request->address;
        $adopter->save();
        
        $animal = Animal::find($request->animal_id);
        $animal->adopter_id = $adopter->id;
        $animal->save();
        $animal_id = $animal->id;
        $message = "Animal has been adopted";
        return response()->json(compact('message','validate','animal_id'));
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
        return redirect( route('animal.list'));
    }

}
