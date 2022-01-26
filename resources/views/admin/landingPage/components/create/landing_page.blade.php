<div class="col-xl-4 col-lg-5 col-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Landing Page</h6>

        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="col-12 row p-0 m-0">
                <form id="form_landing_page">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="titulo">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" id="name" aria-describedby="nameHelp"  placeholder="Nombre ...">
                            <small id="nameHelp" class="form-text text-muted">En la url despues de "/"" </small>
                        </div>
                    </div>
                    <div class="col-12">
                        <span class="badge badge-secondary h3" id="url">{{url('/')}}/</span>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
