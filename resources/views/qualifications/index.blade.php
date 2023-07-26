@extends('layouts.admin')

@section('main')
<h1 class="h4">{{ $program->name }} Qualifications</h1>

<button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createQualificationModal">
  Create Qualification
</button>

<div class="table-responsive">
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($qualifications as $qualification)
        <tr>
          <td>{{ $qualification->id }}</td>
          <td>{{ $qualification->title }}</td>
          <td></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
