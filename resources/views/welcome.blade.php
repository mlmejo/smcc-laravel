@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/signin.css') }}">
@endpush

@section('content')
<main class="form-signin w-100 m-auto">
  <form action="{{ route('login') }}" method="post">
    @csrf

    <img class="mb-4" src="{{ asset('img/technical_department.png') }}" alt="">
    <h1 class="h4 mb-3 fw-normal">Please sign in</h1>

    <div class="text-start mb-3">
      <label for="email" class="col-form-label col-form-label-sm">Email address</label>
      <input type="email" name="email" id="email" class="form-control form-control-sm">
    </div>

    <div class="text-start mb-3">
      <label for="password" class="col-form-label col-form-label-sm">Password</label>
      <input type="password" name="password" id="password" class="form-control form-control-sm">
    </div>

    <button type="submit" class="w-100 btn btn-sm btn-primary">Sign in</button>
  </form>
</main>
@endsection
