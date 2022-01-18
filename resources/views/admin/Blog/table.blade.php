<div class="col table table-responsive">
    <table class="table table-striped table-bordered dt-responsive nowrap" id="tableBlog" width="100%" cellspacing="0">
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

<script>
    $(function () {
        startTable();
    });
    function startTable(){
        initTable("tableBlog","{{route('blog.list')}}",
                  [
                    {data:'id'},
                    {data:'title'},
                    {data:'count'},
                    {data:'date'},
                    {data:'user'},
                    {data:'state'},
                    {data:'action'},
                  ],
                  [{
                        "text": "Crear Blog",
                        "className": 'btn btn-dark mt-3  btn-xs text-black',
                        'action':function(e, dt, button, config ){
                            $("#form-blog")[0].reset();
                            ckEditor.data.set('');
                            crearBtn('form-blog')

                            },
                  }]
                )

    }

</script>
@endpush



