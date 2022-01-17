<div class="modal fade bd-example-modal-lg" id="new-blog-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form name="create-blog-edit" id="create-blog-edit">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <input type="hidden" name="id" id="id">
            @include('admin.Blog.form',['type'=>'edit'])

            <div id="sectionImages"></div>
        </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" onclick="update()" class="btn btn-primary">Editar Blog</button>
        </div>
    </div>
    </div>
</div>


@push('scripts')
    <script>

        function edit(id){
                var url = "{{url('blog')}}/"+id+'/edit';
                ajaxSend(url,'GET').then((data)=>{
                    obj=data.data;
                    $("#create-blog-edit #id").val(obj.data.id);
                    $("#title_edit").val(obj.data.title);
                    CKEDITOR.instances['description_edit'].setData(obj.data.description)
                    $("#new-blog-edit").modal('show');
                    if(obj.data.state==1)
                        // document.getElementById("state_edit").checked = true;
                    if(obj.data.elementImage!= undefined)
                        $("#sectionImages").html(obj.data.elementImage)


                })
        }

        function update(){
                var formData = new FormData(document.getElementById("create-blog-edit"));
                    formData.append('description',CKEDITOR.instances['description_edit'].getData());
                var url = "{{url('blog')}}/"+$("#id").val();
                ajaxSend(url,'POST',formData)
                .then((data)=>{
                    deleteTable("tableBlog");
                    startTable();
                    $("#new-blog-edit").modal('hide');
                    $("#form-team-editt")[0].reset();
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
