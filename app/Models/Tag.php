<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_tag');
    }
}
