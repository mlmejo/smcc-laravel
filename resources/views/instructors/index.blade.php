@extends('layouts.admin')

@section('main')
<h1 class="h4">Instructor Management</h1>

<button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createInstructorModal">
  Create Instructor
</button>

<div class="table-responsive">
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Full name</th>
        <th>Email address</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($instructors as $instructor)
        <tr>
          <td>{{ $instructor->id }}</td>
          <td>{{ $instructor->user->name }}</td>
          <td>{{ $instructor->user->email }}</td>
          <td></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
