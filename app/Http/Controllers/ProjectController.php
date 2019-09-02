<?php

namespace App\Http\Controllers;

use App\Project;

class ProjectController extends Controller
{
    /**
     * ProjectController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Project::create(request()->validate([
            'title' => 'required|max:255',
            'description' => 'required'
        ]));

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Project $project)
    {
        $project->update(request()->validate([
            'title' => 'required|max:255',
            'description' => 'required'
        ]));

        return redirect()->route('projects.edit', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Project $project
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index');
    }
}
