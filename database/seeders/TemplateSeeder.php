<?php

namespace Database\Seeders;

use App\Models\Template;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    public function run()
    {
        Template::create([
            'blade' => 'Slider',
            'image' => ''
        ]);
        Template::create([
            'blade' => 'Service',
            'image' => ''
        ]);
        Template::create([
            'blade' => 'About',
            'image' => ''
        ]);
        Template::create([
            'blade' => 'Review',
            'image' => ''
        ]);
    }
}
