<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
    $menu = Menu::all();
    return view('menu.index', compact('menus'));
    }
}
