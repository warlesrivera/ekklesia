<div class="col table-responsive">
    <table class="table table-bordered " id="tableLandingPage" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th></th>
                <th>Sede </th>
                <th>Url</th>
                <th>visitas</th>
                <th>Estado</th>
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
        initTable("tableLandingPage",
        "{{route('landing.list')}}",
        [
           {data:'id'},
           {data:'headquarter'},
           {data:'url'},
           {data:'visits'},
           {data:'state'},
           {data:'acction'},
        ],
        [{
            "text": "Crear landing Page",
            "className": 'btn btn-dark mt-3  btn-xs text-black',
            'action':function(e, dt, button, config ){
                document.location.href='{{route("landing.create")}}'
            },
        }])
    }
</script>
@endpush
