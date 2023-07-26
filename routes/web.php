<?php

use App\Http\Controllers\CompetencyController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\LearningOutcomeController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\QualificationController;
use App\Http\Controllers\TraineeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('programs', ProgramController::class)
    ->middleware('auth');

Route::resource('programs.qualifications', QualificationController::class)
    ->shallow()->middleware('auth');

Route::resource('qualifications.competencies', CompetencyController::class)
    ->shallow()->middleware('auth');

Route::resource('competencies.learningOutcomes', LearningOutcomeController::class)
    ->shallow()->middleware('auth');

Route::resource('instructors', InstructorController::class)
    ->middleware('auth');

Route::resource('trainees', TraineeController::class)
    ->middleware('auth');

require __DIR__ . '/auth.php';
