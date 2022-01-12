@if(blank($comments))
            <div class="comment mt-4 text-justify float-right ">
                <img src="https://i.imgur.com/yTFUilP.jpg" alt="" class="rounded-circle" width="40" height="40">
                <p>No hay comentarios.</p>
            </div>
            @else

            @foreach ($comments as $index=>$item )
                <div class="comment mt-4 text-justify {{ ($index%2==0)?'float-right':'float-left'}} "> <img src="{{($index%2==0)?"https://i.imgur.com/yTFUilP.jpg":"https://i.imgur.com/CFpa3nK.jpg"}}" alt="" class="rounded-circle" width="40" height="40">
                    <h4>{{$item->user->fullname}}</h4> <span>- {{$item->date}}</span> <br>
                    <p>{!! $item->message !!}</p>
                </div>
            @endforeach
            @endif

