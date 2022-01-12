<div class="col-12 p-0 m-0 row">
    <div class="col-md-7 col-12 row mx-auto mx-md-0 px-auto row justify-content-start">
        @if(isset($blog))
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
            <div class="col-md-10 col-12 p-0 m-0 helvetica size-28">
                @if(isset($landing))
                    {!! \Illuminate\Support\Str::limit(strip_tags($blog->description),300) !!}...
                @else
                    {!! $blog->description !!}
                @endif
            </div>
            @if(isset($landing))
                <p class="col-4 border-bottom border-dark row ml-2 justify-content-end p-0">
                    <a href="{{route('blog.show',$blog->id)}}">
                        <span class="titulo-Myraid "> LEER  HISTORIA ></span>
                    </a>
                </p>
            @endif
        @else
            <div>
                <p>No hay BLogs Creados.</p>
            </div>
        @endif

    </div>
    <div class="col-md-5 p-0 row my-auto justify-content-end col-12">
        <img width="100%" src="{{asset('assets/images/personaBlog.png')}}" alt="">
    </div>
</div>


