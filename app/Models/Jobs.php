<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    protected $table = 'jobs';
    
    protected $fillable = [
        'companyname', 
        'companydescription', 
        'startdate', 
        'enddate', 
        'location', 
        'jobtitle', 
        'status', 
        'intern', 
        'contactperson'
    ]; 
}
