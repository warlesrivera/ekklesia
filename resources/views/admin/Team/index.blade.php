@extends('admin.layouts.app')
@section('content')
@include('admin.Team.modal_user')
<div class="col-12 row p-0 m-0">
    <div class="col-md-6 col-12">
        <div id="content-wrapper" class="d-flex flex-column">
            <div class="container-fluid">
                <h1 class="h3 mb-2 text-gray-800">E-TEAMS</h1>
                @include('admin.Team.table')
            </div>
        </div>
    </div>
    <div class="col-md-6 col-12">
        <form name="form-team" id="form-team">
            @include('admin.Team.form',['type'=>'create'])
        </form>
        <button type="button" id="btn-guardar" onclick="save('form-team','team')" class="btn btn-primary">Crear Team</button>
        <button type="button" id="btn-editar" onclick="update('form-team','team')" class="btn btn-primary d-none">Editar Team</button>
    </div>
</div>
@endsection

@push('scripts')
<script>
    builCKeditor('description').then((data)=>{
            ckEditor=data;
        });
    function edit(id){
        var url = "{{url('team')}}/"+id+'/edit';
        ajaxSend(url,'GET').then((data)=>{
            obj=data.data;
            $("#form-team #id").val(obj.data.id);
            $("#name").val(obj.data.name);
            ckEditor.data.set(obj.data.description);
            $("#description_short").val(obj.data.description_short)
            $("#team").modal('show');
            if(obj.data.elementImage!= undefined)
                $("#sectionImages").html(obj.data.elementImage)
                editarBtn()
        })
    }
</script>
@endpush
