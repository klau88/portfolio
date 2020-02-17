<?php

namespace App\Http\Controllers;

use App\Experience;

class ExperienceController extends Controller
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
        $experiences = Experience::all();

        return view('experiences.index', compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('experiences.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Experience::create(request()->validate([
            'start' => 'date|nullable',
            'end' => 'date|nullable',
            'type_id' => 'required|int',
            'position' => 'required',
            'company' => 'required',
            'description' => 'text'
        ]));

        return redirect()->route('experiences.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience)
    {
        return view('experiences.show', compact('experience'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function edit(Experience $experience)
    {
        return view('experiences.edit', compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(Experience $experience)
    {
        $experience->update(request()->validate([
            'start' => 'date|nullable',
            'end' => 'date|nullable',
            'type_id' => 'required|int',
            'position' => 'required',
            'company' => 'required',
            'description' => 'text'
        ]));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Experience $experience
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Experience $experience)
    {
        $experience->delete();

        return redirect()->route('experiences.index');
    }
}
