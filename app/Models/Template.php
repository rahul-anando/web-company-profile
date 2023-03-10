<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'blade',
        'image'
    ];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
