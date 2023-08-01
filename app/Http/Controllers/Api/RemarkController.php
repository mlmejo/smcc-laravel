<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chart;
use App\Models\Remark;
use Illuminate\Http\Request;

class RemarkController extends Controller
{
    public function index(Chart $chart)
    {
        return response()->json($chart->remarks()->with('trainee')->get());
    }

    public function update(Request $request, Chart $chart)
    {
        $request->validate([
            'trainee_id' => 'required|exists:trainees,id',
            'learning_outcome_id' => 'required|exists:learning_outcomes,id',
        ]);

        $remark = Remark::where([
            ['chart_id', $chart->id],
            ['trainee_id', $request->input('trainee_id')],
            ['learning_outcome_id', $request->input('learning_outcome_id')],
        ])->first();

        /**
         * Just invert the value.
         */
        $remark->update([
            'completed' => !($remark->completed),
        ]);

        return response()->json($chart->remarks()->with('trainee')->get());
    }
}
