@extends('admin.layouts.app')
@section('content')
    @include('admin.Team.modal_create')
    @include('admin.Team.modal_edit')
    @include('admin.Team.modal_user')
    <div id="content-wrapper" class="d-flex flex-column">
        <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">E-TEAMS</h1>
            @include('admin.Team.table')
        </div>
    </div>
@endsection


