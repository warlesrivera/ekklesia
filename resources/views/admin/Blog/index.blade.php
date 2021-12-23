@extends('admin.layouts.app')
@section('content')
    @include('admin.Blog.modal_create')
    @include('admin.Blog.modal_edit')
    <div id="content-wrapper" class="d-flex flex-column">
        <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Blogs</h1>
            @include('admin.Blog.table')
        </div>
    </div>
@endsection



