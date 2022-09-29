<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'content',
        'page_id',
        'template_id',
        'index'
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}
