@extends('layouts.admin')

@push('meta')
  <meta name="chart_id" content="{{ $chart->id }}">

  @viteReactRefresh
  @vite([
    'resources/js/app.js',
    'resources/js/main.jsx',
  ])
@endpush

@section('main')
  <div id="chart"></div>
@endsection
