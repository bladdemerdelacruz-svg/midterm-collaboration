<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;  

class SectionSeeder extends Seeder
{
    
    public function run(): void
    {
        Section::create(['sectionName' => 'Section A', 'room' => 'Room 101']);
        Section::create(['sectionName' => 'Section B', 'room' => 'Room 102']);
    }
}
