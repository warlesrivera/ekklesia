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
                $("#form-team")[0].reset();
                editarBtn()
            },
        }])
    }
    function limitDescription(){
        val=document.getElementById("description_short").value;
        if(val.length >150){
            swal.fire({
                type: 'warning',
                title: 'Atención',
                html: 'no puede superar el numer de caracteres'
            });
            document.getElementById("description_short").value=val.substring(0,150);
        }
    }
</script>
@endpush



