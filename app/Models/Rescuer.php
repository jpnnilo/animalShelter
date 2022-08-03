<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rescuer extends Model
{
    use HasFactory;
    protected $fillable = ['name','age','gender'];

    //get the animal for the rescuer 
    //one rescuer to many animal
    public function animals(){
        return $this->hasMany(Animal::class);
    }
}

