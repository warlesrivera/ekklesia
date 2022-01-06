
@inject('users','App\Http\Controllers\UserController')

<div class="col-12 row justify-content-center">
    <select name="ids[]" class="selectpicker" data-live-search="true" multiple id="ids" >
        <option value=""></option>
        @foreach($users->userList() as $user )
            <option value="{{$user->id}}">{{$user->fullName}}</option>
        @endforeach
    </select>
</div>
