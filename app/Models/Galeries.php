<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeries extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'status'
    ];

    public function takeImage()
    {
        return '/image/' . $this->image;
    }
}
