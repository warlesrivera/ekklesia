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
<script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6Dl9aI_RHTocvznMm9GtS7ukBpxoJp_w&language=es&callback=initMapCh" ></script>

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


        var myLatlng = null;
        var marker = null;
        var markerAnimateWindow = false;
        var infowindow = null;
        var zoom = null;
        initMap();

        function initMap() {

            var geocoder = new google.maps.Geocoder();
            if($('#latitude').val()!='', $('#longitude').val()!=''){
                myLatlng = new google.maps.LatLng($('#latitude').val(), $('#longitude').val());
                        zoom = 16;
                        markerAnimateWindow = true;
            }
            else if ("geolocation" in navigator) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var lat=position.coords.latitude;
                        var long=position.coords.longitude;
                            myLatlng = new google.maps.LatLng(lat,long);
                            zoom = 16;
                            markerAnimateWindow = true;
                        var mapOptions = {
                                zoom: zoom,
                                center: myLatlng
                            }

                        map = new google.maps.Map(document.getElementById("map-ch"), mapOptions);
                        var marker = new google.maps.Marker({
                            position: myLatlng,
                            map: map,
                            draggable:false,
                            title:"Arrastrame!",
                        });

                    // Map open resize with modal
                    google.maps.event.trigger(map, "resize");
                    map.setCenter(myLatlng)

                    });
                    return
                } else {
                    myLatlng = new google.maps.LatLng(40.4114963,-3.7005299);
                    zoom = 16;
                    markerAnimateWindow = true;
            }
            var mapOptions = {
                zoom: zoom,
                center: myLatlng
            }

                map = new google.maps.Map(document.getElementById("map-ch"), mapOptions);
                var marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                    draggable:false,
                    title:"Arrastrame!",
                });
                google.maps.event.addListener(marker, "dragend", function (e) {
                    var lat, lng, address;
                    geocoder.geocode({ 'latLng': marker.getPosition() }, function (results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            lat = marker.getPosition().lat();
                            lng = marker.getPosition().lng();
                            address = results[0].formatted_address;
                            $('#latitude').val(lat);
                            $('#longitude').val(lng);
                            myLatlng = new google.maps.LatLng(lat,lng);
                            console.log("Latitude: " + $('#latitude').val() + "\nLongitude: " + $('#longitude').val()+ "\nAddress: " + address);
                        }
                    });
                })
            // Map open resize with modal
            google.maps.event.trigger(map, "resize");
            map.setCenter(myLatlng);


        }
        function showGps(data){
            obj=JSON.parse(data);
            $("#titleCompany").html('');
            $("#titleCompany").html(obj.name);
            $('#latitude').val(obj.latitude);
            $('#longitude').val(obj.longitude)
            initMap();
        }
</script>
@endpush



