<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
            return view("home", ["pageTitle" => "Home"]);
    }


    // public function profile(int $id)
    // {   
    //     $name = User::find($id)->name;
    //     return view("profile", ["name" => $name]);
    // }
}
