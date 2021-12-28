<div class="col-12 col-md-12 pt-1 row">
    <input type="hidden" name="MoreimgGaleryPre" value="{{json_encode($images)}}">

    @foreach($images as $imgGalery)

    <div class=" col-md-4 col-6 galery-item text-center"
        data-img="{{$imgGalery}}" onclick="rmIMG(this)">
        <div class="">
            <a class="btn btn-primary btn-sm btn-fab btn-fab-mini btn-round pull-right"
                style="position: absolute;right: 0">
                <i class="ico-circulo fa fa-trash " title="Eliminar"></i>
            </a>
            <img src="{{$route.'/'. $imgGalery}}" width="50%">
        </div>
        <div class="space"></div>
    </div>
    @endforeach
</div>



