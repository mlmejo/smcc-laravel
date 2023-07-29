<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Qualification;
use Illuminate\Http\Request;

class QualificationController extends Controller
{
    public function index(Program $program)
    {
        return view('qualifications.index', [
            'program' => $program,
            'qualifications' => $program->qualifications,
        ]);
    }

    public function store(Request $request, Program $program)
    {
        $validated = $request->validate([
            'title' => 'required|string|unique:qualifications',
        ]);

        $program->qualifications()->create($validated);

        return back()
            ->with('status', 'Qualification created successfully.');
    }

    public function update(Request $request, Qualification $qualification)
    {
        $validated = $request->validate([
            'title' => 'required|string|unique:qualifications',
        ]);

        $qualification->update($validated);

        return back()
            ->with('status', 'Qualification updated successfully.');
    }

    public function destroy(Qualification $qualification)
    {
        $qualification->delete();

        return back()
            ->with('status', 'Qualification deleted successfully.');
    }
}
