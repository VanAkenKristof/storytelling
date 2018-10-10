<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function index()
    {
        $title = 'home';

        return view('home.index', compact('title'));
    }
}
