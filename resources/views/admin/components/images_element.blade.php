<div class="col-12 col-md-12 pt-1 row">
    <input type="hidden" name="MoreimgGaleryPre" value="{{json_decode($images)}}">

    @foreach($images as $imgGalery)

    <div class=" col-md-4 col-6 galery-item text-center"
        data-img="{{$imgGalery}}" onclick="rmIMG(this)">
        <div class="">
            <a class="btn btn-primary btn-sm btn-fab btn-fab-mini btn-round pull-right"
                style="position: absolute;right: 0">
                <i class="ico-circulo fa fa-trash " title="Eliminar"></i>
            </a>
            <img src="{{asset('storage'.$route.$imgGalery)}}" width="50%">
        </div>
        <div class="space"></div>
    </div>
    @endforeach
</div>


@push('scripts')
<script>
    function rmIMG(element) {
        alert();
        element.remove();
        var imgs = [];
        for (var i = $('.galery-item').length - 1; i >= 0; i--) {
            imgs.push($($('.galery-item')[i]).data('img'));
        }
        $('[name="MoreimgGaleryPre"]').val(JSON.stringify(imgs));
        }
</script>
@endpush
