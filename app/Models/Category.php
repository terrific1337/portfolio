<?php

namespace App\Models;

use App\Models\Skill;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function skill()
    {
        return $this->belongsToMany(Skill::class, 'skill_category');
    }
}
