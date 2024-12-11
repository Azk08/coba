<?php

namespace App\Http\Controllers;

use App\Models\Skill as ModelsSkill;
use Illuminate\Http\Request;

class Skill extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skill = ModelsSkill::all();

        return view('admin.skill.index', compact('skill'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.skill.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        ModelsSkill::create($request->all());
        return redirect()->route('skill.index')->with('success', 'data berhasil di simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(ModelsSkill $skill)
    {
        return view('admin.skill.show', compact('skill'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ModelsSkill $skill)
    {
        return view('admin.skill.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModelsSkill $skill)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $skill->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return redirect()->route('skill.index')->with('success', 'data berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModelsSkill $skill)
    {
        $skill->delete();
        return redirect()->route('skill.index')->with('success', 'data berhasil di hapus');
    }
}
