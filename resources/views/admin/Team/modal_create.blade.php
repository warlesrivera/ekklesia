<div class="modal fade bd-example-modal-lg" id="new-team" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear E-TEAM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form name="create-team" id="create-team">
            @csrf
            @include('admin.Team.form',['type'=>'create'])
        </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" onclick="save()" class="btn btn-primary">Crear E-TEAM</button>
        </div>
    </div>
    </div>
</div>

@push('scripts')
<script>

    function save(){
        var formData = new FormData(document.getElementById("create-team"));
            formData.append('description',CKEDITOR.instances['description_create'].getData());
            formData.append('description_short',document.getElementById("description_short_create").value)
        var url = "{{route('team.store')}}";
        ajaxSend(url,'POST',formData).then((data)=>{
            deleteTable("tableTeam");
            startTable();
            $("#new-team").modal('hide');
            $("#create-team")[0].reset();
        })

    }
</script>
@endpush
