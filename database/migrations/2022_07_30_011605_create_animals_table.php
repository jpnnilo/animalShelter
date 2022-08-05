<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rescuer_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('adopter_id')->constrained()->cascadeOnUpdate();
            $table->string('name');
            $table->string('breed');  
            $table->string('gender'); 
            $table->integer('age');
            $table->string('type');
            $table->string('location');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
};
