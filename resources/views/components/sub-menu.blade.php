<div id="{{$nameId}}" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
    <div class="{{$nameId =='responsive'?'text-dark bg-white':'text-white my-3'}} ">
        <ul>
            @foreach (App\Models\Team::all() as $team )
                <li style="list-style: none" >{{$team->name}}</li>
            @endforeach
        </ul>
    </div>
</div>
