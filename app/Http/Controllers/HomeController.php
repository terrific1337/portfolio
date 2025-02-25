<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if (1) {
            return view("home", ["test" => "piet"]);
        } else {
            return view("home");
        }
    }

    public function profile(int $id)
    {   
        $name = User::find($id)->name;
        return view("profile", ["name" => $name]);
    }
}
