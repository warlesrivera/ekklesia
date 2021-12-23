<div class="modal fade bd-example-modal-lg" id="new-blog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form name="create-blog" id="create-blog">
            @csrf
            @include('admin.Blog.form',['type'=>'create'])
        </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" onclick="save()" class="btn btn-primary">Crear Blog</button>
        </div>
    </div>
    </div>
</div>

@push('scripts')
<script>
    function save(){
        var formData = new FormData(document.getElementById("create-blog"));
            formData.append('description',CKEDITOR.instances['description_create'].getData());

            console.log(CKEDITOR.instances['description_create'].getData())
        var url = "{{route('blog.store')}}"
        $.ajax({
            url: url,
            method: 'POST',
            processData: false,
            contentType: false,
            data: formData,
            success: function(data) {
                  swal.fire({
                    type: 'success',
                    title: 'Datos guardados',
                    html: data.message
                  });
                  deleteTable();
                  initTable();
                  $("#new-blog").modal('hide');
            },
            error: function() {
                swal({
                    type:'error',
                    title:'Ups ocurrio un error',
                    html:'Nose ha podido procesar tu solicitud. Vuelve a intentarlo.'
                });
                $('form[name="update-user-form"] .submit').removeAttr('disabled');
                $('form[name="update-user-form"] .overlay').addClass('hidden');
            }
        });
    }
</script>
@endpush
