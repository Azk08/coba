<?php

namespace App\Http\Controllers;

use App\Models\Contact as ModelsContact;
use Illuminate\Http\Request;

class Contact extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact = ModelsContact::all();

        return view('admin.contact.index', compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contact.create',);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'description' => 'required',
        ]);

        ModelsContact::create($request->all());
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(ModelsContact $contact)
    {
        return view('admin.contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ModelsContact $contact)
    {
        return view('admin.contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModelsContact $contact)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'description' => 'required',
        ]);

        $contact->update($request->all());
        return redirect()->route('');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
