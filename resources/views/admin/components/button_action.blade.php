
<i  style="cursor: :pointer"  onclick="edit({{$row->id}})" class="text-secondary" ><span class="fa fa-edit"></span></i>

@if(Route::currentRouteName() =='blog.list')
<i class="text-info" onclick="show({{$row->id}},'{{Illuminate\Support\Str::of($row->title)->slug( '-')}}')" style="cursor: pointer"><span class="fa fa-eye"></span></i>
@else
<i class="text-info" onclick="show({{$row->id}})" style="cursor: pointer"><span class="fa fa-eye"></span></i>
@endif
<i class="text-danger" onclick="deleteElement({{$row->id}})" style="cursor: :pointer"  ><span class="fa fa-trash"></span></i>
@if (Route::currentRouteName() =='team.list')
<i class="text-warning" onclick="teamUser({{$row->id}})" style="cursor: :pointer" ><span class="fa fa-users"></span></i>
@endif

