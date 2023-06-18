<?php

namespace Database\Seeders;


use run;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SampleAccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            'name' => 'Johan Liebert',
            'email' => 'jliebert@gmail.com',
            'password' => bcrypt('password'),
        ]);
        
        
    }
}
