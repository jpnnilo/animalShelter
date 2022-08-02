<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Animal;
use App\Models\Rescuer;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Database\Seeders\AdopterSeeder;
use Database\Seeders\EmployeeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        
        //this is the correct way to use seeder and factory
        $adopter = AdopterSeeder::class;
        $employee = EmployeeSeeder::class;
        $this->call(compact('employee','adopter'));

        //however, you can also use seeder by directly call model
        User::factory(4)->create();
        Animal::factory(4)->create();
        $rescuer = Rescuer::factory(4)->create();
        

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
