@extends('layouts.app')
@section('content')
<div class="col-md-10 col-12 p-0 mx-auto mt-2 pt-3  pb-5 border-top-black row justify-content-center">

    <div class="col-12 p-0 m-0 row">
        <div class="col-md-7 col-12 row mx-auto mx-md-0 px-auto row justify-content-start">
            <div class="col-12 p-0">
                <h1 class="titulo d-none d-md-block size-97 text-dark">
                    {{$blog->title}}
                </h1>

                <h1 class="titulo d-block d-md-none size-37 text-dark">
                    {{$blog->title}}
                </h1>
                <p class="col-12 ">
                    <span class="border-bottom border-dark"> por <b >{{$blog->user->full_name}}</b></span>
                </p>
            </div>
            <div class="col-md-8 col-12 p-0 px-md-4 m-0 helvetica size-28">
                {!! $blog->description !!}
            </div>
            <div class="col-md-4 p-0  row h-25  justify-content-center col-12">
                <img  src="{{asset('assets/images/logoNegro.png')}}" alt="">
            </div>
        </div>
        <div class="col-md-5 col-12">
            @include('blog.more_blog')
        </div>

    </div>
</div>
@endsection
