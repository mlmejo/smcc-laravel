@extends('layouts.admin')

@push('meta')
<meta name="chart_id" content="{{ $chart->id }}">

@viteReactRefresh
@vite([
'resources/js/app.js',
'resources/js/main.jsx',
])
@endpush

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/print.css') }}" media="print">
@endpush

@section('main')
<button class="px-4 btn btn-sm btn-primary" id="printButton">Print</button>
<button class="px-4 btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#importTraineeModal">
  Import CSV
</button>
<div id="chart"></div>
<div class="modal fade" id="importTraineeModal" tabindex="-1" aria-labelledby="importTraineeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="importTraineeModalLabel">Import Trainees via CSV</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('trainees.csv.store', $chart) }}" method="post" enctype="multipart/form-data" id="importTraineeForm">
          @csrf

          <div class="mb-3">
            <input type="file" name="document" id="document" class="form-control form-control-sm">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-sm btn-primary" form="importTraineeForm">Import</button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  $(() => {
    $("#printButton").on("click", () => {
      $("#chart").printThis({
        importCss: true,
        importStyle: true,
      });
    });
  });
</script>
@endpush
