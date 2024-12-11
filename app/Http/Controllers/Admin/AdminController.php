<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Contact;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

        $contact = Contact::all();
        $certificates = Certificate::all();
        $project = Project::all();
        $skill = Skill::all();
        return view('admin.dashboard', compact('contact', 'certificates', 'project', 'skill'));
    }
}
