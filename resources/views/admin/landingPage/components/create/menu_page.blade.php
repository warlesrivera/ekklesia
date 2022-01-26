<div class="col-xl-8 col-lg-7 col-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Menu</h6>

        </div>
        <!-- Card Body -->
        <div class="card-body p-2">
            <form id="form_landing_page">
                <div class="col-12 row p-0 m-0">
                    <div class="col-md-7 col-12 p-0 m-0">
                        <div class="form-group p-0">
                            <label for="titulo">estilo del menu </label>
                                <select name="type_style" id="type_style" class="form-control" onchange="onChangeMenu()">
                                    <option value="none"> estilo menú</option>
                                    <option value="light">opcion light</option>
                                    <option value="dark">opcion dark</option>
                                    <option value="transparent">opcion transparent</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-5"></div>
                </div>
            </form>
        <div class="col-12 p-0 m-0" id="frame_menu">
        </div>
        </div>
    </div>
</div>

