<?php

namespace App\Http\Controllers;

use App\Project;
use App\Skill;

class AppController extends Controller
{
    public function home()
    {
        $projects = Project::with('images')->get();
        $skills = Skill::all();

        return view('home', compact('projects', 'skills'));
    }

    public function contact()
    {
        request()->validate([
            'name' => 'required',
            'email' => 'email|required',
            'message' => 'required'
        ]);

        return redirect()->route('login');
    }
}
