@extends('layouts.admin')

@section('main')
<h1 class="h4">Trainee Management</h1>

<button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createTraineeModal">
  Create Trainee
</button>

<div class="table-responsive">
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Last name</th>
        <th>First name</th>
        <th>Middle initial</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($trainees as $trainee)
        <tr>
          <td>{{ $trainee->id }}</td>
          <td>{{ $trainee->last_name }}</td>
          <td>{{ $trainee->first_name }}</td>
          <td>{{ $trainee->middle_initial }}</td>
          <td></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
