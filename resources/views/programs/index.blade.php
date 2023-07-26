@extends('layouts.admin')

@section('main')
<h1 class="h4">Programs Monitoring</h1>

<button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createProgramModal">
  Create Program
</button>

<div class="table-responsive">
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Instructor</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($programs as $program)
        <tr>
          <td>{{ $program->id }}</td>
          <td>{{ $program->name }}</td>
          <td>{{ $program->instructor->user->name }}</td>
          <td></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
