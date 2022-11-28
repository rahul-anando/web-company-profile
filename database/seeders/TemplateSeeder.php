<?php

namespace Database\Seeders;

use App\Models\Template;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    public function run()
    {
        Template::create([
            'blade' => 'slider',
            'image' => ''
        ]);
        Template::create([
            'blade' => 'service',
            'image' => ''
        ]);
        Template::create([
            'blade' => 'about',
            'image' => ''
        ]);
        Template::create([
            'blade' => 'review',
            'image' => ''
        ]);
    }
}
