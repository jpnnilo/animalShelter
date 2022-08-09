<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    protected $fillable = [ 'name', 'age', 'breed', 'gender', 'type' ];

    //many animal to one rescuer
    public function rescuer(){
        return $this->belongsTo(Rescuer::class);
    }

    public function adopter(){
        return $this->belongsTo(Adopter::class);
    }
    
    public function diseases(){
        return $this->belongsToMany(Disease::class)->withTimestamps();
    }

    public function animalImages(){
        return $this->hasMany(AnimalImage::class);
    }
}
