<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::create([
           'name'=>'Khoa học', 
        ]);
        
        Category::create([
           'name'=>'Du lịch' 
        ]);
        $this->call([
            posts::class
        ]);
    }
}