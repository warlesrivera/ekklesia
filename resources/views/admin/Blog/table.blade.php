<div class="col table-responsive">
    <table class="table table-bordered " id="tableBlog" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th></th>
                <th>Nombre</th>
                <th>vista</th>
                <th>fecha de creacion</th>
                <th>usuario</th>
                <th>estado</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

@push('scripts')
<script src="{{asset('assets/stylesAdm/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/stylesAdm/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<script src="{{asset("assets/stylesAdm/vendor/datatables/dataTables.buttons.min.js")}}"></script>
<script src="{{asset("assets/stylesAdm/vendor/datatables/buttons.bootstrap4.min.js")}}"></script>
<script src="{{asset("assets/stylesAdm/vendor/datatables/jszip.min.js")}}"></script>
<script src="{{asset("assets/stylesAdm/vendor/datatables/pdfmake.min.js ")}}"></script>
<script src="{{asset("assets/stylesAdm/vendor/datatables/vfs_fonts.js")}}"></script>
<script src="{{asset("assets/stylesAdm/vendor/datatables/buttons.html5.min.js")}}"></script>
<script src="{{asset("assets/stylesAdm/vendor/datatables/buttons.print.min.js")}}"></script>
<script src="{{asset("assets/stylesAdm/vendor/datatables/buttons.colVis.min.js")}}"></script>


<script>
    $(function () {
        startTable();
    });
    function startTable(){
        initTable("tableBlog",
                  "{{route('blog.list')}}",
                  [
                    {data:'id'},
                    {data:'title'},
                    {data:'count'},
                    {data:'date'},
                    {data:'user'},
                    {data:'state'},
                    {data:'action'}
                  ],
                  [{
                        "text": "Crear Blog",
                        "className": 'btn btn-dark mt-3  btn-xs text-black',
                        'action':function(e, dt, button, config ){

                            $('#new-blog').modal('show')
                            },
                  }]
                )

    }
    function show(id,name){
        location.href='{{url('blog')}}/'+id+'-'+name;
    }
    function deleteElement(id){
        swal.fire({
              type: 'warning',
              title: '¡Atención!',
              html:'¿Desea eliminar este blog?',

              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si',
              cancelButtonText:'No',
            }).then(function (result) {
                if (result.value) {
                    var url = "{{url('blog')}}/"+id;
                    deleteAjax(url,'{{ csrf_token() }}')
                    .then(()=>{
                        deleteTable("tableBlog");
                        startTable();
                    });
                }
            });
    }





</script>
@endpush



