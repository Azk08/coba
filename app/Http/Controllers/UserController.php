<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Skill;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $skill = Skill::all();
        $certificate = Certificate::all();
        return view('welcome', compact('skill', 'certificate'));
    }
}
