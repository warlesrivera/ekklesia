 <div class="col-3 p-0 m-0  border-right row">
    @auth
        <a class="col-12 row p-0 m-0 "  style="text-decoration: none " onclick="like({{$blog->id}})">
            <div class="col-6 p-0 m-0 row justify-content-end">
                <span><i class="fa fa-thumbs-up text-dark" style="font-size:32px"></i></span>
            </div>
            <div class="col-6 pl-2 p-0 m-0 row justify-content-start">
                <h4 class="text-dark" id="count_blog">{{$blog->likes->count()}}</h4>
            </div>
        </a>
    @else
        <div class="col-6 p-0 m-0 row justify-content-end">
            <span><i class="fa fa-thumbs-up text-dark" style="font-size:32px"></i></span>
        </div>
        <div class="col-6 pl-2 p-0 m-0 row justify-content-start">
            <h4 class="text-dark" id="count_blog">{{$blog->likes->count()}}</h4>
        </div>
    @endauth
</div>
<div class="col-3 p-0 m-0  border-right row">
    <div class="col-6 p-0 m-0 row justify-content-end">
        <span><i class="fa fa-comments text-dark" style="font-size:32px"></i></span>
    </div>
    <div class="col-6 pl-2 p-0 m-0 row justify-content-start">
        <h4 class="text-dark">{{$blog->comment->count()}}</h4>
    </div>
</div>
<div class="col-3 p-0 m-0  border-right row">
    <div class="col-6 p-0 m-0 row justify-content-end">
        <span><i class="fa fa-eye text-dark" style="font-size:32px"></i></span>
    </div>
    <div class="col-6 pl-2 p-0 m-0 row justify-content-start">
        <h4 class="text-dark">{{$blog->count}}</h4>
    </div>
</div>
<div class="col-3 p-0 m-0 border-right row">
    <div class="col ">
        <a class="addthis_button_facebook" addthis:url="{{route('blog.show',$blog->id)}}" addthis:title="">
            <img src="{{asset('assets/images/icons/facebook-icon.png')}}" border="0" alt="facebook_share">
        </a>
        <a class="addthis_button_twitter" addthis:url="{{route('blog.show',$blog->id)}}" addthis:title="">
            <img src="{{asset('assets/images/icons/twitter-icon.png')}}" border="0" alt="facebook_share">
        </a>
        <a class="addthis_button_whatsapp" addthis:url="{{route('blog.show',$blog->id)}}" addthis:title="">
            <img src="{{asset('assets/images/icons/whatsapp-icon.png')}}" border="0" alt="facebook_share">
        </a>
    </div>
</div>

@push('scripts')
    <script>
    function like(id){
        var url = "{{url('blog/like')}}/"+id
        ajaxSend(url,'get').then((data)=>{
            console.log(data);
            $("#count_blog").html(data.data.like)
        })
    }
    </script>

@endpush


