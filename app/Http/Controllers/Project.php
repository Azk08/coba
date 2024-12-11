<?php

namespace App\Http\Controllers;

use App\Models\Project as ModelsProject;
use Illuminate\Http\Request;

class Project extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project = ModelsProject::all();
        return view('admin.project.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'url' => 'required',
        ]);

        ModelsProject::create($request->all());

        return redirect()->route('admin.project.index')->with('added', true);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModelsProject $project)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'url' => 'required',
            'screenshot' => 'required'
        ]);

        $project->update($request->all());

        return redirect()->route('admin.project.index')->with('edited', true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModelsProject $project)
    {
        ModelsProject::destroy($project);
        return redirect()->route('admin.project.index')->with('deleted', true);
    }
}
