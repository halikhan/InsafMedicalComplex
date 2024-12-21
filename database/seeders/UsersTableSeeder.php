<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@hospital.com',
                'phone' => '01784918947',
                'address' => 'Rupnagar R/A , Mirpur-02, Dhaka-1216',
                'usertype' => '1',
                'email_verified_at' => '2023-08-21 17:53:37',
                'password' => Hash::make('admin1234'),
                'doctor_id' => null,
                'remember_token' => null,
                'current_team_id' => null,
                'profile_photo_path' => null,
                'created_at' => '2023-08-21 17:52:29',
                'updated_at' => '2023-08-21 17:53:37',
            ],
            [
                'id' => 2,
                'name' => 'Hazrat Ali',
                'email' => 'imhalikhan@gmail.com',
                'phone' => '+1 (326) 917-3063',
                'address' => 'Minim nisi eos quae',
                'usertype' => '0',
                'email_verified_at' => '2024-12-05 14:12:11',
                'password' => Hash::make('user1234'),
                'doctor_id' => null,
                'remember_token' => null,
                'current_team_id' => null,
                'profile_photo_path' => null,
                'created_at' => '2024-12-05 14:11:41',
                'updated_at' => '2024-12-05 14:12:11',
            ],
            [
                'id' => 3,
                'name' => 'Baber Khan',
                'email' => 'hazratali0777@gmail.com',
                'phone' => '+1 (888) 611-1602',
                'address' => 'Odit consequuntur re',
                'usertype' => '0',
                'email_verified_at' => '2024-12-21 06:08:52',
                'password' => Hash::make('user1234'),
                'doctor_id' => null,
                'remember_token' => null,
                'current_team_id' => null,
                'profile_photo_path' => null,
                'created_at' => '2024-12-21 06:05:55',
                'updated_at' => '2024-12-21 06:08:52',
            ],
        ]);
    }
}
