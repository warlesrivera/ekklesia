<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('welcome')}}">
    <div class="sidebar-brand-icon rotate-n-15">
        <img src="{{asset('assets/icon/logo-white.png')}}" width="80%" alt="">
    </div>
    <div class="sidebar-brand-text mx-3">Comunife <sup>A</sup><sup>P</sup><sup>P</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="{{route('home')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Home
</div>
<li class="nav-item">
    @if (@Auth::user()->hasRole('Manager'))
    <a class="nav-link" href="{{route('landing.index')}}">
        <i class="fas fa-fw fa-cog "></i>
        <span>Landing page</span>
    </a>
    @endif
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMinistery"
        aria-expanded="true" aria-controls="collapseMinistery">
        <i class="fas fa-fw fa-cog"></i>
        <span>Minsterios</span>
    </a>
    <div id="collapseMinistery" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Ministerios</h6>
            @if (@Auth::user()->hasRole('Manager'))
            <a class="collapse-item" href="{{route('ministerio.create')}}">Nuevo...</a>
            @endif
            {{-- @foreach (\App\Ministery::all() as $ministery)
                <a class="collapse-item" href="{{route('ministerio.show',$ministery->id)}}">{{$ministery->name}}</a>

            @endforeach --}}
        </div>
    </div>
</li>
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMeeting"
        aria-expanded="true" aria-controls="collapseMeeting">
        <i class="fas fa-meetup"></i>
        <span>Reuniones</span>
    </a>
    <div id="collapseMeeting" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Reuniones</h6>
            <a class="collapse-item" href="#">Precenciales</a>
            <a class="collapse-item" href="#">YouTube</a>
        </div>
    </div>
</li>
<hr class="sidebar-divider">
<li class="nav-item">
    <a class="nav-link" href="#">
        <i class="fas  fa-map-marker "></i>
        <span>Celulas</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="#">
        <i class="fas fa-pray "></i>
        <span>Oraciones</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="#">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Devocionales</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="#">
        <i class="fas fa-fw fa-user"></i>
        <span>Usuarios</span></a>
</li>
<hr class="sidebar-divider d-none d-md-block">
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
<div class="sidebar-card">
    <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="">
    <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
    <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
</div>

</ul>
<!-- End of Sidebar -->
