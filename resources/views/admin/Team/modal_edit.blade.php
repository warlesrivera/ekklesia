<div class="modal fade bd-example-modal-lg" id="team-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar E-TEAM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form name="form-team-edit" id="form-team-edit">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <input type="hidden" name="id" id="id">
            @include('admin.Team.form',['type'=>'edit'])
            <div id="sectionImages"></div>
        </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" onclick="update()" class="btn btn-primary">Editar E-TEAM</button>
        </div>
    </div>
    </div>
</div>


@push('scripts')
<script>

    function edit(id){
        var url = "{{url('team')}}/"+id+'/edit';
        ajaxSend(url,'GET').then((data)=>{
            obj=data.data;
            $("#team-edit #id").val(obj.data.id);
            $("#name_edit").val(obj.data.name);
            CKEDITOR.instances['description_edit'].setData(obj.data.description)
            $("#description_short_edit").val(obj.data.description_short)
            $("#team-edit").modal('show');
            if(obj.data.elementImage!= undefined)
                $("#sectionImages").html(obj.data.elementImage)
        })

    }

    function update(){
        var formData = new FormData(document.getElementById("form-team-edit"));
            formData.append('description',CKEDITOR.instances['description_edit'].getData());
            formData.append('description_short',document.getElementById("description_short_edit").value)
        var url     = "{{url('team')}}/"+$("#id").val();
        ajaxSend(url,'POST',formData).then((data)=>{
            deleteTable("tableTeam");
            startTable();
            $("#new-blog-edit").modal('hide');
            $("#form-team-edit")[0].reset();
        });
    }

    function rmIMG(element) {
        element.remove();
        var imgs = [];
        for (var i = $('.galery-item').length - 1; i >= 0; i--) {
            imgs.push($($('.galery-item')[i]).data('img'));
        }
        $('[name="MoreimgGaleryPre"]').val(JSON.stringify(imgs));
    }

</script>
@endpush
