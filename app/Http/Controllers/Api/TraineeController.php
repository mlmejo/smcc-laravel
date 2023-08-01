<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chart;
use App\Models\Remark;
use App\Models\Trainee;
use Illuminate\Http\Request;

class TraineeController extends Controller
{
    public function index()
    {
        $trainees = Trainee::all();

        return response()->json($trainees);
    }

    public function store(Request $request, Chart $chart)
    {
        $request->validate([
            'trainee_id' => ['required', 'exists:trainees,id'],
        ]);

        $trainee = Trainee::find($request->input('trainee_id'));
        $chart->trainees()->attach($request->input('trainee_id'));

        foreach ($chart->qualification->competencies as $competency) {
            foreach ($competency->learningOutcomes as $learningOutcome) {
                $remark = new Remark;

                $remark->chart()->associate($chart);
                $remark->learningOutcome()->associate($learningOutcome);
                $remark->trainee()->associate($trainee);

                $remark->save();
            }
        }

        return back()
            ->with('status', 'Trainee added to monitoring chart.');
    }

    public function destroy(Trainee $trainee)
    {
        $trainee->delete();
        return response()->noContent();
    }
}
