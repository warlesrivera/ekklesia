@extends('admin.layouts.app')
@section('content')
    <div class="col-12 p-0 m-0 row">
        @include('admin.LandingPage.components.create.landing_page')
        @include('admin.LandingPage.components.create.menu_page')
        @include('admin.LandingPage.components.create.section')
    </div>
@endsection



@push('scripts')
<script>

    function onChangeMenu(){
        $("#frame_menu").html(spinner())
        id =$("#type_style").val();
        if(id=='none')
            $("#frame_menu").html('')

        ajaxSend(`{{url("change/menu/")}}/${id}`,'GET').then((data)=>{
                obj=data.data;
                $("#frame_menu").html(obj.html)
        })
    }
</script>
@endpush
