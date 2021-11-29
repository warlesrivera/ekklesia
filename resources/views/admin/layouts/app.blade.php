<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name', 'Comunife Manizales') }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('assets/assets/stylesAdm/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel=stylesheet href="{{asset("vendors/bootstrap-datepicker/css/datepicker.css")}}">
    <!-- Custom styles for this template-->
    <link href="{{asset('assets/stylesAdm/css/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{asset('assets/chat/css/chat.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/imagePicker/image-picker/image-picker.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/assets/stylesAdm/css/emojionearea.min.css')}}">
    <link href="{{asset("assets/libraries/bootstrap-select/bootstrap-select.min.css")}}" rel="stylesheet">
    <link href="{{asset('css/splide-min.css')}}" rel="stylesheet">
    <link href="{{asset('css/splide-core.min.css')}}" rel="stylesheet">

    <link type="text/css" rel="preload" href="{{asset('assets/libraries/sweetalert2/sweetalert2.min.css')}}" as="style" onload="this.rel='stylesheet'" />
    <link href="{{asset("assets/libraries/bootstrap-fileinput/css/fileinput.min.css")}}" rel="stylesheet">
    <link href="{{asset("assets/libraries/bootstrap-tagsinput-latest/src/bootstrap-tagsinput.css")}}" rel="stylesheet">
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    @yield('style')

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <div style="position: fixed; z-index:100">
            @include('admin.layouts._sidebar')
        </div>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <div class="col-12 row p-0  m-0">
                        <div class="col-2 d-none d-block"></div>
                        <div class="col-md-9 col-12 p-0 m-0">
                            @include('admin.layouts._topBar')
                            <!-- Begin Page Content -->
                            <div class="col-12 p-0 m-0 pt-5 mt-5 pl-2 ml-2">

                                <div id="cameraHome" class="row d-none justify-content-center m-3 col-12 p-0 m-0">
                                    <div class="col-11">
                                        <select id="optionQr" onchange="changeQr()" class="form-control" id=""></select>
                                    </div>
                                    <div class="col-4 p-0">
                                        <video id="previewHome" style="height:300px;width:300px"> </video>
                                    </div>
                                    <div class="col-12 p-0 m-0 row justify-content-center">
                                        <a class=" btn btn-dark text-white" onclick="closeCameraQR()">Cerrar </a>
                                    </div>
                                </div>
                                <div id="cameraBarCode" class="d-none">
                                    <div id="modal" title="Escáner de código de barras">
                                        <span class="found"></span>
                                        <div id="interactive" class="viewport"></div>
                                    </div>
                                    <a id="stop" href="#" class="btn btn-dark d-none">Cerrar camara</a>
                                </div>
                                @yield('content')
                            </div>
                            <!-- /.container-fluid -->
                        </div>
                    <!-- lista de aliados -->
                    <div class="col-1 pl-3 pt-5 p-0 m-0">
                        @include('admin.messages.partials.listAllice')
                    </div>
                    @include('admin.messages.layouts.chatFloat')
                </div>
            </div>
            <!-- End of Main Content -->

            @include('admin.layouts._footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top" style="left: 250px;">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleciona  "Salir" a continuación, si está listo para finalizar su sesión actual.</div>
                <div class="modal-footer">

                        <form id="'logout-form" action="{{ route('logout') }}" method="POST" >
                            @csrf
                                <button class="btn btn-primary" type="submit">Salir</button>

                        </form>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>

                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('assets/stylesAdm/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/stylesAdm/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/stylesAdm/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset("assets/libraries/bootstrap-tagsinput-latest/src/bootstrap-tagsinput.js")}}">
    <!-- Core plugin JavaScript-->
    <script src="{{asset('assets/stylesAdm/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset('assets/stylesAdm/js/sb-admin-2.min.js')}}"></script>
    <!-- Page level plugins -->
    <script src="{{asset('assets/stylesAdm/vendor/chart.js/Chart.min.js')}}"></script>
    <!-- Page level custom scripts -->
    <script src="{{asset('js/splide.min.js')}}"></script>
    <script type="text/javascript" src="{{asset("assets/libraries/sweetalert2/sweetalert2.min.js")}}"></script>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"> </script>
    <script type="text/javascript" src="{{asset("assets/libraries/serratus-quaggaJS-862df88/dist/quagga.min.js")}}">
    </script>
    <script type="text/javascript" src="{{asset("assets/libraries/cameras.js")}}"></script>

    <script src="{{asset('stylesAdm/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('/vendors/ckeditor/ckeditor.js') }}"></script>
    <script src="{{asset("vendors/moment/moment.min.js")}}"></script>
    <script src="{{asset("vendors/fullCalendar/fullcalendar.min.js")}}"></script>
    <script src="{{asset("vendors/bootstrap-datepicker/js/bootstrap-datepicker.js")}}"></script>
    <script src="{{asset("vendors/imagePicker/image-picker/image-picker.min.js")}}"></script>
    <script src="https://www.gstatic.com/firebasejs/7.10.0/firebase-app.js"></script>
    <script type="text/javascript" src="{{asset("js/firebase.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("js/keyFirebase.js")}}"></script>
    <script data-cfasync="false" async src="{{asset('js/emojionearea.min.js')}}"></script>
    <script src="{{asset('assets/chat/js/chat.js')}}?v={{date('ynjgi')}}"></script>
    <script src="{{ asset('assets/libraries/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
    <script type="text/javascript" src="{{asset("assets/libraries/bootstrap-select/bootstrap-select.min.js")}}"></script>

    <script>
        var __baseUrl = "{{url('/')}}";
        var __readMessageUrl = "{{route('ajax::message.readed')}}";
        var __sendMessageUrl = "{{route('ajax::message.new')}}";
        var __deleteMessageUrl = "{{route('ajax::message.delete')}}";
        var __fileMessageUrl = "{{route('ajax::message.file')}}";
        var _urlMesaggeLast="{{route('ajax::message.last')}}";
        var _urlredaFrbs="{{route('ajax::message.readFrbs')}}";
    </script>
    <script type="text/javascript">
            online({{auth()->user()->id}});
            readChat({{auth()->user()->id}});
            setInterval(() => {
            online({{auth()->user()->id}},'badge-warning');
            }, 30000);
    </script>
    <!-- scripts Chart-->
    @yield('scriptsChart')
    <!-- scripts -->
    @yield('scripts')
    <!-- scripts Tables -->
    @yield('scriptsTable')
    <!-- scripts maps -->
    @yield('scriptsMap')

</body>

</html>
