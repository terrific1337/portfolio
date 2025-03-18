<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    protected $table = 'jobs';
    
    protected $fillable = [
        'companyname',
        'startdate',
        'enddate',
        'companydescription',
        'location',
        'jobtitle',
        'status',
        'intern',
        'contactperson',
        'jobdescription',
        'companysector',
        'companywebsite',
        'companylogo',
    ];
}
