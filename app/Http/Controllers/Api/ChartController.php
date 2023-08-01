<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chart;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function show(Chart $chart)
    {
        return response()->json(
            $chart->with(
                'instructor.user',
                'qualification.competencies',
                'qualification.competencies.learningOutcomes',
                'trainees',
                'trainees.remarks',
            )->first(),
        );
    }
}
