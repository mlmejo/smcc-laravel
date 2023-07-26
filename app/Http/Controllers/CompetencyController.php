<?php

namespace App\Http\Controllers;

use App\Models\Competency;
use App\Models\Qualification;
use Illuminate\Http\Request;

class CompetencyController extends Controller
{
    public function index(Qualification $qualification)
    {
        return view('competencies.index', [
            'competencies' => $qualification->competencies,
        ]);
    }

    public function store(
        Qualification $qualification,
        Request $request,
    ) {
        $validated = $request->validate([
            'title' => ['required', 'string'],
        ]);

        $qualification->competencies()->create($validated);

        return redirect()
            ->route('qualifications.competencies.index', $qualification);
    }

    public function update(
        Competency $competency,
        Request $request,
    ) {
        $validated = $request->validate([
            'title' => ['required', 'string'],
        ]);

        $competency->update($validated);

        return redirect()
            ->route(
                'qualifications.competencies.index',
                $competency->qualification
            );
    }

    public function destroy(Competency $competency)
    {
        $competency->delete();

        return back();
    }
}
