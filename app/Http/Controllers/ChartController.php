<?php

namespace App\Http\Controllers;

use App\Models\Chart;
use App\Models\Instructor;
use App\Models\Qualification;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index(Qualification $qualification)
    {
        return view('charts.index', [
            'qualification' => $qualification,
            'instructors' => Instructor::all(),
            'charts' => $qualification->charts,
        ]);
    }

    public function store(Request $request, Qualification $qualification)
    {
        $request->validate([
            'instructor' => 'required|string|exists:instructors,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $instructor = Instructor::find($request->instructor);

        $chart = new Chart;

        $chart->qualification()->associate($qualification);
        $chart->instructor()->associate($instructor);
        $chart->fill($request->only(['start_date', 'end_date']));

        $chart->save();

        return back()
            ->with('status', 'Monitoring chart successfully created.');
    }

    public function show(Chart $chart)
    {
        return view('charts.show', [
            'chart' => $chart,
        ]);
    }

    public function update(Request $request, Chart $chart)
    {
        return back()
            ->with('status', 'Monitoring chart successfully updated.');
    }

    public function destroy(Chart $chart)
    {
        $chart->delete();

        return back()
            ->with('status', 'Monitoring chart deleted successfully.');
    }
}
