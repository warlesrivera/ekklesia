
<i  style="cursor: :pointer"  onclick="edit({{$row->id}})" class="text-secondary" ><span class="fa fa-edit"></span></i>
<i class="text-info" onclick="location.href={{$row->url}}" style="cursor: pointer"><span class="fa fa-eye"></span></i>
<i class="text-danger" onclick="deleteElement('{{$type}}','{{$row->url_destroy}}')" style="cursor: :pointer"  ><span class="fa fa-trash"></span></i>
<form method="POST" id="form-delete" action="{{$row->url_destroy}}">
    {{ csrf_field() }}
</form>

@if (Route::currentRouteName() =='team.list')
<i class="text-warning" onclick="teamUser({{$row->id}})" style="cursor: :pointer" ><span class="fa fa-users"></span></i>
@endif

