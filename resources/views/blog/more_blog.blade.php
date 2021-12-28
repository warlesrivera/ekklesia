<div class="col-12 px-4 py-3">
    @foreach (\App\Models\Blog::inRandomOrder()->limit(5)->get() as $blog)
        <a class="row p-2 my-2 bg-white border rounded col-12 shadow-sm text-dark" href="{{route('blog.show',$blog->id)}}" style="cursor: pointer; text-decoration: none">
            @if(!filled($blog->images))
             <div class="col-md-3 mt-1"><img class="avatar" src="{{asset('assets/images/logoNegro.png')}}"></div>
            @else
            <div class="col-md-3 mt-1"><img class="avatar" src="{{asset('storage/img/blog').'/'. $blog->user_id.'/'.json_decode($blog->images)[0]}}"></div>
            @endif
            <div class="col-md-9 mt-1">
                <h5>{{$blog->title}}</h5>
                 <p class="text-justify text-truncate para mb-0">
                    <small>
                        {{ \Illuminate\Support\Str::limit(strip_tags($blog->description),100)}} ...
                    </small>
                    <br><br>
                </p>
            </div>
            <div class="col-12 px-3 py-2">
                por <cite title="Source Title">{{$blog->user->full_name}}</cite>
            </div>
        </a>
    @endforeach
</div>
