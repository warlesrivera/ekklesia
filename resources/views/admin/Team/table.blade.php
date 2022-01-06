<div class="col table-responsive">
    <table class="table table-bordered " id="tableTeam" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th></th>
                <th>Nombre</th>
                <th>sede</th>
                <th>Números de voluntarios</th>
                <th>fecha de creacion</th>
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
        initTable("tableTeam",
        "{{route('team.list')}}",
        [
           {data:'id'},
           {data:'name'},
           {data:'hadquarter'},
           {data:'count_user'},
           {data:'date'},
           {data:'action'}
        ],
        [{
            "text": "Crear E-TEAM",
            "className": 'btn btn-dark mt-3  btn-xs text-black',
            'action':function(e, dt, button, config ){
            $('#new-team').modal('show')
            },
        }])
    }
    function limitDescription(type){
        val=document.getElementById("description_short_"+type).value;
        if(val.length >150){
            swal.fire({
                type: 'warning',
                title: 'Atención',
                html: 'no puede superar el numer de caracteres'
            });
            document.getElementById("description_short_"+type).value=val.substring(0,150);
        }
    }


    function show(id){

        location.href='{{url('team')}}/'+id;
    }
    function deleteElement(id){
        swal.fire({
              type: 'warning',
              title: '¡Atención!',
              html:'¿Desea eliminar este team?',

              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si',
              cancelButtonText:'No',
            }).then(function (result) {
                if (result.value) {
                    var url = "{{url('team')}}/"+id;
                    deleteAjax(url,'{{ csrf_token() }}')
                    .then(()=>{
                        deleteTable("tableTeam");
                        startTable();
                    });
                }
            });
    }

</script>
@endpush



