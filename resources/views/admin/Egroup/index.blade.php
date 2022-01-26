@extends('admin.layouts.app')
@section('content')
   <div class="col-12 row p-0 m-0">
       <div class="col-md-6 col-12 p-0 m-0">
            <div id="content-wrapper" class="d-flex flex-column">
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">E-GROUPS</h1>
                    @include('admin.Egroup.table')
                </div>
            </div>
       </div>
       <div class="col-md-6 col-12 p-0 m-0">
            <form name="form-blog" id="form-blog">
                @include('admin.Egroup.form')
            </form>

            <button type="button" id="btn-guardar" onclick="save('form-egroup','egroup')" class="btn btn-primary">Crear E-GROUP</button>
            <button type="button" id="btn-editar" onclick="update('form-egroup','egroup')" class="btn btn-primary d-none">Editar E-GROUP</button>
       </div>
   </div>
@endsection

@push('scripts')
    <script>
        var ckEditor;
        builCKeditor('description').then((data)=>{
            ckEditor=data;
        });
        function edit(id){

            var url = "{{url('egroup')}}/"+id+'/edit';
            ajaxSend(url,'GET').then((data)=>{
                obj=data.data;
                $("#form-egroup #id").val(obj.data.id);
                $("#title").val(obj.data.title);
                $("#description").val(obj.data.description)
                ckEditor.data.set(obj.data.description);
                editarBtn()

                // if(obj.data.state==1)
                    // document.getElementById("state_edit").checked = true;
                // if(obj.data.elementImage!= undefined)
                //     $("#sectionImages").html(obj.data.elementImage)

            })
        }

    </script>
@endpush



