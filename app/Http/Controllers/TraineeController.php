<?php

namespace App\Http\Controllers;

use App\Models\Trainee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TraineeController extends Controller
{
    public function index()
    {
        return view('trainees.index', [
            'trainees' => Trainee::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'trainee_number' => 'required|unique:trainees',
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'middle_initial' => 'required|string',
        ]);

        Trainee::create($validated);

        return redirect()
            ->route('trainees.index')
            ->with('status', 'Trainee entry created successfully.');
    }

    public function update(Request $request, Trainee $trainee)
    {
        $validated = $request->validate([
            'trainee_number' => [
                'required',
                Rule::unique('trainees')->ignore($trainee),
            ],
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'middle_initial' => 'required|string',
        ]);

        $trainee->update($validated);

        return redirect()
            ->route('trainees.index')
            ->with('status', 'Trainee entry updated successfully');
    }

    public function destroy(Trainee $trainee)
    {
        $trainee->delete();

        return redirect()
            ->route('trainees.index')
            ->with('status', 'Trainee entry deleted successfully.');
    }
}
