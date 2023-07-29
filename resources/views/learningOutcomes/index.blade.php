@extends('layouts.admin')

@section('main')
<h1 class="h4 text-uppercase">
  <span class="">{{ $competency->title }}</span> Learning Outcomes
</h1>

<button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createQualificationModal">
  Create Learning Outcome
</button>

<div class="table-responsive">
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Description</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($learningOutcomes as $learningOutcome)
        <tr>
          <td>{{ $learningOutcome->id }}</td>
          <td>{{ $learningOutcome->description }}</td>
          <td></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
