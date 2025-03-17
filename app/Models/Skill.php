<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'name',
        'icon',
    ];

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
}