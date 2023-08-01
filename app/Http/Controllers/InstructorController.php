<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\User;
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
            'name' => 'required|string',
            'email' => [
                'required',
                'string',
                'email',
                'unique:users',
            ],
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'instructor',
        ]);

        $user->instructor()->create();

        return redirect()
            ->route('instructors.index')
            ->with('status', 'Instructor account created successfully.');
    }

    public function update(
        Request $request,
        Instructor $instructor
    ) {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => [
                'required',
                'string',
                'email',
                Rule::unique('users')->ignore($instructor->user),
            ],
        ]);

        $instructor->user()->update($validated);

        return redirect()
            ->route('instructors.index')
            ->with('status', 'Instructor account updated successfully.');
    }

    public function destroy(Instructor $instructor)
    {
        $instructor->user->delete();

        return redirect()
            ->route('instructors.index')
            ->with('status', 'Instructor account updated successfully.');
    }
}
