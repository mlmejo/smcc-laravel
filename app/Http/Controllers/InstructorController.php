<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class InstructorController extends Controller
{
    public function index()
    {
        return view('instructors.index', [
            'instructors' => Instructor::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => [
                'required',
                'string',
                'email',
                'unique:users',
            ],
            'password' => ['required', 'string'],
        ]);

        $instructor = Instructor::create();
        $instructor->user()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('instructors.index');
    }

    public function update(
        Instructor $instructor,
        Request $request,
    ) {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'email' => [
                'required',
                'string',
                'email',
                Rule::unique('users')->ignore($instructor->user),
            ],
        ]);

        $instructor->user()->update($validated);

        return redirect()->route('instructors.index');
    }

    public function destroy(Instructor $instructor)
    {
        $instructor->user->delete();

        return redirect()->route('instructors.index');
    }
}
