<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!User::all()->count() > 0){
            User::create([
                'name' => 'guest',
                'email' => 'guest@findMyJob.com',
                'email_verified_at' => Carbon::now(),
                'password' => 'secret@Pass'
            ]);
        }
    }
}
