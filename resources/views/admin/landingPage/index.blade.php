@extends('admin.layouts.app')
@section('content')

    <div id="content-wrapper" class="d-flex flex-column">
        <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Landing Pages</h1>
            @include('admin.LandingPage.table')
        </div>
    </div>
@endsection

@push('scripts')
@endpush
