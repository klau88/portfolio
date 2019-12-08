<?php

namespace App\Http\Controllers;

use App\Skill;

class SkillController extends Controller
{
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
        $skills = Skill::all();

        return view('skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('skills.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Skill::create(request()->validate([
            'title' => 'required|max:255',
            'description' => 'required'
        ]));

        return redirect()->route('skills.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Skill $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        return view('skills.show', compact('skill'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Skill $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        return view('skills.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Skill $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Skill $skill)
    {
        $skill->update(request()->validate([
            'title' => 'required|max:255',
            'description' => 'required'
        ]));

        return redirect()->route('skills.edit', compact('skill'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Skill $skill
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()->route('skills.index');
    }
}
