@extends('layouts.app')
@include('components.menu',['ubication'=>'show'])

@section('content')
<div class="w-100 mt-5 pt-4"></div>
<div class="col-md-11 col-12 p-0 mx-auto mt-2 pt-3  pb-5 border-top-black row justify-content-center ">
    <div class="col-12 p-0 m-0 row">
        <div class="col-md-9 col-12 row mx-auto mx-md-0 px-md-0 px-auto row justify-content-start">
            @include('blog.element_show')
        </div>
        <div class="col-md-3 col-12">
            @include('blog.more_blog')
        </div>
    </div>
</div>
<div class="col-12 row p-0 m-0">
    <div class="container row">
        @include('components.actions_info')

    </div>
    @include('components.comments',['id'=>$blog->id])
</div>
@endsection
