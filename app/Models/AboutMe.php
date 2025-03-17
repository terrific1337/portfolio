<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutMe extends Model
{
    protected $table = 'aboutme';

    protected $fillable = [
        'name',
        'text',
        'image',
    ];
}
