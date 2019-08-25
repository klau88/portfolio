<?php

namespace App\Http\Controllers;

use App\Project;

class AppController extends Controller
{
    public function home()
    {
        $projects = Project::all();

        return view('home');
    }
}
