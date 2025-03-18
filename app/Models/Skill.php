<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{

    public $timestamps = false;
    protected $fillable = [
        'name',
        'icon',
    ];

    public function category()
    {
        return $this->belongsToMany(Category::class, 'skill_category');
    }
}