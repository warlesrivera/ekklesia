<div style="width:1675px; height:869px; background:#00000087 ">

<!-- Social Links -->

<nav class="social-nav">
    <ul>
        <li><a href="https://www.facebook.com/lahauscol"><img src="{{ asset('assets/images/build/images/facebook.png') }}" width="32px"   target="_blank"/></a></li>
        <li><a href="https://www.instagram.com/lahauscol"><img src="{{ asset('assets/images/build/images/instagram.png') }}" width="32px"  target="_blank"/></a></li>
        <li><a href="https://www.youtube.com/channel/UC0eJUCpya3t-PRl9gb40_Dg"><img src="{{ asset('assets/images/build/images/youtube.png') }}"  width="32px"   target="_blank"/></a></li>
    </ul>
</nav>

<!-- Switch to full screen -->
<button class="full-screen" onclick="$(document).toggleFullScreen()"></button>

<!-- Site Logo -->
<div id="logo">La haus </div>

<!-- Main Navigation -->
<nav class="main-nav">
    <ul>
        <li><a href="#home" class="active">Home</a></li>
        <li><a href="#about">Nosotros</a></li>
        <li><a href="#contact">Contactanos</a></li>
        <li><a href="#buys">Donaciones</a></li>
    </ul>
</nav>

<!-- Slider Controls -->
<a href="" id="arrow_left"><img src="{{ asset('assets/images/build/images/arrow-left.png') }}"
        alt="Slide Left" /></a>
<a href="" id="arrow_right"><img src="{{ asset('assets/images/build/images/arrow-right.png') }}"
        alt="Slide Right" /></a>

<!-- Home Page -->
<section class="content show" id="home">
        <h1 style="; color:#FFF; padding-left:8px">Bienvenidos</h1>
        <h4 style=" color:#FFF; margin:0; padding-left:8px; padding-bottom:10px">Una nueva Haus en linea está a punto de llegar!</h4>
        <p style=" color:#FFF; padding-left:8px;font-size:18px"> Un nuevo lugar web esta por llegar, donde podras concer más acerca de nostros </p>
</section>

<!-- About Page -->
<section class="content hide" id="about">
    <h1>Nosotros</h1>
    <h5  style=" color:#FFF; margin:0; padding-left:8px ; padding-bottom:10px">Un lugar donde puedes pertenecer incluso antres de creer.</h5>
    <p style=" color:#FFF; padding-left:8px; font-size:18px"> Creemos en una iglesia que ama a todas las personas, que no discrimina ni tiene favoritismos,
        que no juzga ni señala el pecado de nadie y que honra y dignifica a cada persona por igual. No somos perfectos, pero somos honestos.
        Aunque no juzgamos ni señalamos el pecado, tampoco lo celebramos. Creemos en la transformación de vidas, la cual sucede únicamente por
        medio de una relación íntima y personal con Dios Padre por medio de la persona de Jesucristo y en medio de dinámicas
        comunitarias saludables donde adoramos a Dios como familia. Solo el Espíritu Santo y su poder puede hacernos mejores.</p>

</section>

<!-- Contact Page -->
<section class="content hide" id="contact">
    <h3>Contactos</h3>
    <p  style="color:#fff; margin:0;padding:5px; font-size:18px" >Email: <a  style="background:#000000ad ;color:#fff"  href="#">admin@lahauscol.com</a><br />
        Celular: 123.456.7890<br /></p>
    <p  style="color:#fff; margin:0;padding:5px; font-size:18px" >Cra. 22 #70b-31<br />
        Manizales, Caldas</p>
</section>
<!-- Donaciones Page -->
<section class="content hide" id="buys">
    <h3>Donaciones </h3>
    <img width="250px" style="padding-bottom:10px" src="{{ asset('assets/images/build/bancolombia.png') }}" alt="Slide Left" />
    <p  style="color:#fff; margin:0;padding:5px; font-size:18px" >Bancolombia: <a  style="color:#fff"  href="#">No: 62300002793.  cuenta de ahorros</a><br />
        Nit: 901487140. <br /></p>
    <p  style="color:#fff; margin:0;padding:5px; font-size:18px" >Iglesia Cristiana Ekklesia </p>
    {{-- <img width="200px" style="padding-top:10px;position: absolute;left: 120px;" src="{{ asset('assets/images/build/qr.jpeg') }}" alt="Slide Left" /> --}}

</section>

<!-- Background Slides -->

    <div id="maximage" >
        <div>
            <img src="{{ asset('assets/images/build/images/backgrounds/bg-img-1.jpeg') }}" alt="" />
        </div>
        <div>
            <img src="{{ asset('assets/images/build/images/backgrounds/bg-img-2.jpeg') }}" alt="" />
        </div>
        <div>
            <img src="{{ asset('assets/images/build/images/backgrounds/bg-img-3.jpeg') }}"alt="" />
        </div>
        <div>
            <img src="{{ asset('assets/images/build/images/backgrounds/bg-img-4.jpeg') }}" alt="" />
        </div>
        <div>
            <img src="{{ asset('assets/images/build/images/backgrounds/bg-img-5.jpeg') }}" alt="" />
        </div>
    </div>

</div>
