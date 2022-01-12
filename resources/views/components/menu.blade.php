<div class="d-none d-md-block">
    <nav id="menu" class="navbar navbar-expand-lg navbar-light color-transparent row justify-content-end m-0 col-12 px-1" style=" {{isset($ubication)?'background-color:#0e0e0e73' :''}}">
        <a class="navbar-brand col-3 row text-center" href="#" style="position: absolute;top: 15px; left:2%;">
            <img width="70%" id="logo-white"  src="{{ asset('assets/images/ekklesiaManizales.png') }}" alt="">
            <img width="70%" id="logo-black"  class="d-none" src="{{ asset('assets/images/ekklesiaManizalesNegro.png') }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse px-0 col-9" id="navbarSupportedContent">
            <ul id="items-menu" class="navbar-nav ml-auto px-0 col-12 text-white">
                @auth
                    <li class="nav-item col px-0 text-center">
                        <a class="nav-link text-white" href="{{route('home')}}">DASHBOARD</a>
                    </li>
                    <li class="nav-item  col px-0 text-center">
                        <a class="nav-link text-white" href="#"><small>BLOG</small> </a>
                    </li>
                    <li class="nav-item  col px-0 text-center">
                        <a class="nav-link text-white" href="#"><small>E-GROUP</small> </a>
                    </li>
                @else
                    <li class="nav-item col px-0 text-center">
                        <a class="nav-link text-white" href="#">Home</a>
                    </li>
                    <li class="nav-item  col px-0 text-center">
                        <a class="nav-link text-white" href="#">Nosotros</a>
                    </li>
                    <li class="nav-item  col px-0 text-center">
                        <a class="nav-link text-white" href="#">Experiencia</a>
                    </li>
                    <li class="nav-item  col px-0 text-center">
                        <a class="nav-link text-white" href="#">Para ti</a>
                    </li>
                    <li class="nav-item  col-1 px-0 text-center">
                        <a class="nav-link text-white" href="#">Blog</a>
                    </li>
                    <li class="nav-item  col-2 px-0 text-center">
                        <a class="nav-link text-white" href="#" data-toggle="collapse" data-target="#web" aria-expanded="false" aria-controls="web">¿Nuevo aquí?</a>
                        @include('components.sub-menu',['nameId'=>'web'])

                    </li>
                    <li class="nav-item  col px-0 text-center">
                        <a class="nav-link text-white" href="#">Generosidad</a>
                    </li>
                    <li class="nav-item  col px-0 text-center">
                        <a class="nav-link text-white" href="#">Contacto</a>
                    </li>
                @endauth
                <li class="nav-item   col px-0 text-center">
                    <a class="nav-link" onclick="openMenu()">
                        <i id="menu-bars" class="fa fa-bars text-white" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<div class="d-md-none d-block">
    <div id="content-menu-responsive" class="col-12 row p-0 m-0">
        <div class="col-10 pt-2">
            <img width="70%" src="{{ asset('assets/images/ekklesiaManizales.png') }}" alt="">
        </div>
        <span id="btn-menu-responsive" class="text-white rounded border border-white px-2" onclick="openNav()">&#9776;
        </span>
    </div>
    <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="overlay-content">
            <a href="#">Home</a>
            <a href="#">Nosotros</a>
            <a href="#">Experiencia</a>
            <a href="#">Para ti</a>
            <a href="#">Blog</a>
            <div id="accordion">
                    <a class="btn btn-outline-light text-secondary" data-toggle="collapse" data-target="#responsive" aria-expanded="false" aria-controls="responsive">
                        ¿Nuevo aquí?
                    </a>
                    @include('components.sub-menu',['nameId'=>'responsive'])

              </div>
            <a href="#">Generosidad</a>
            <a href="#">Contacto</a>
        </div>
    </div>
</div>
