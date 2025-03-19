<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'description',
        'repo',
        'screenshot',
        'demo',
        'status',
        'category',
        'featured',
        'order'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'project_tag');
    }
}
