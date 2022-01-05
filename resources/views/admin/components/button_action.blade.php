
<i  style="cursor: :pointer"  onclick="edit({{$row->id}})" class="text-secondary" ><span class="fa fa-edit"></span></i>
<i class="text-info" onclick="show({{$row->id}})" style="cursor: pointer"><span class="fa fa-eye"></span></i>
<i class="text-danger" onclick="deleteElement({{$row->id}})" style="cursor: :pointer"  ><span class="fa fa-trash"></span></i>
@if (Route::currentRouteName() =='team.list')
<i class="text-warning"  style="cursor: :pointer"  ><span class="fa fa-users"></span></i>
@endif

