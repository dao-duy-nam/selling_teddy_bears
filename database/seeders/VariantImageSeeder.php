<?php

namespace Database\Seeders;

use App\Models\VariantImage;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VariantImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VariantImage::factory()->count(100)->create();
    }
}
