<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\TagFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TagFactory::new()->count(10)->create();
    }
}
