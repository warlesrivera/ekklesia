<div class="modal fade bd-example-modal-lg" id="team-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Asignar usario a el E-TEAM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form name="form-team-user" id="form-team-user">
            {{ csrf_field() }}
            <input type="hidden" name="id" id="id_teams_user">
            @include('admin.components.select_users')
        </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" onclick="send()" class="btn btn-primary">Editar E-TEAM</button>
        </div>
    </div>
    </div>
</div>


@push('scripts')
<script>
    function teamUser(id){

        $("#id_teams_user").val(id);
        $("#team-user").modal('show');

    }
    function send(){
        var formData = new FormData(document.getElementById("form-team-user"));
        var url     = "{{url('/team/users')}}/"+$("#id_teams_user").val();
        ajaxSend(url,'POST',formData).then((data)=>{
            deleteTable("tableTeam");
            startTable();
            $("#team-user").modal('hide');
            $("#form-team-user")[0].reset();
        });
    }
</script>
@endpush
