<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        return view('programs.index', [
            'programs' => Program::all(),
        ]);
    }
}