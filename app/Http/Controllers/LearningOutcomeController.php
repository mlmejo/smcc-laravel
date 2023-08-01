<?php

namespace App\Http\Controllers;

use App\Models\Competency;
use App\Models\LearningOutcome;
use Illuminate\Http\Request;

class LearningOutcomeController extends Controller
{
    public function index(Competency $competency)
    {
        return view('learningOutcomes.index', [
            'qualification' => $competency->qualification,
            'competency' => $competency,
            'learningOutcomes' => $competency->learningOutcomes,
        ]);
    }

    public function store(Request $request, Competency $competency)
    {
        $validated = $request->validate([
            'description' => 'required|string',
        ]);

        $competency->learningOutcomes()->create($validated);

        return back()
            ->with('status', 'Learning outcome created successfully.');
    }

    public function update(Request $request, LearningOutcome $learningOutcome)
    {
        $validated = $request->validate([
            'description' => 'required|string',
        ]);

        $learningOutcome->update($validated);

        return back()
            ->with('status', 'Learning outcome updated successfully.');
    }

    public function destroy(LearningOutcome $learningOutcome)
    {
        $learningOutcome->delete();

        return back()
            ->with('status', 'Learning outcome deleted successfully.');
    }
}
