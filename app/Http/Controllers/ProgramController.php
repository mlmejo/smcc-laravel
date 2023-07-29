<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProgramController extends Controller
{
    public function index()
    {
        return view('programs.index', [
            'programs' => Program::all(),
            'instructors' => Instructor::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'instructor' => 'required|exists:instructors,id',
            'name' => 'required|string|unique:programs',
        ]);

        $instructor = Instructor::find($request->instructor);
        $instructor->programs()->create($request->only('name'));

        return redirect()
            ->route('programs.index')
            ->with('status', 'Program created successfully.');
    }

    public function update(Request $request, Program $program)
    {
        $request->validate([
            'instructor' => 'required|exists:instructors,id',
            'name' => [
                'required',
                'string',
                Rule::unique('programs')->ignore($program),
            ],
        ]);

        $instructor = Instructor::find($request->instructor);

        $program->instructor()->associate($instructor);
        $program->name = $request->name;
        $program->save();

        return redirect()
            ->route('programs.index')
            ->with('status', 'Program updated successfully.');
    }

    public function destroy(Program $program)
    {
        $program->delete();

        return redirect()
            ->route('programs.index')
            ->with('status', 'Program deleted successfully.');
    }
}
