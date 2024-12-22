<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
<<<<<<< HEAD
        $this->call(UsersTableSeeder::class);
        $this->call(DoctorSeeder::class);

    }
    
=======
    }
>>>>>>> 4d0cdcbbad56ca35cf2064831b8fbef357107b1f
}
