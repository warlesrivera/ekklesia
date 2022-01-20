@if($type=='light')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>

      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar brand -->
        <a class="navbar-brand mt-2 mt-lg-0" href="#">
          <img
            src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp"
            height="15"
            alt="MDB Logo"
            loading="lazy"
          />
        </a>
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Team</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Projects</a>
          </li>
        </ul>
        <!-- Left links -->
      </div>
      <!-- Collapsible wrapper -->

    </div>
    <!-- Container wrapper -->
  </nav>
@endif

@if($type=='dark')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled">Disabled</a>
            </li>
          </ul>

        </div>
      </div>
</nav>
@endif
@if($type=='transparent')
    <div class="view"  style="background-image: url('{{asset("assets/images/ciudadManizales.png")}}'); background-repeat: no-repeat; background-size: cover;">
        <nav class="navbar  navbar-expand-lg navbar-dark scrolling-navbar">
            <div class="container">

              <!-- Brand -->
              <a class="navbar-brand" href="#" target="_blank">
                <strong>MDB</strong>
              </a>

              <!-- Collapse -->
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <!-- Links -->
              <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left -->
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="#">Home
                      <span class="sr-only">(current)</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#" target="_blank">About MDB</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#" target="_blank">Free download</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#" target="_blank">Free tutorials</a>
                  </li>
                </ul>

                <!-- Right -->
                <ul class="navbar-nav nav-flex-icons">
                  <li class="nav-item">
                    <a href="#" class="nav-link" target="_blank">
                      <i class="fab fa-facebook-f"></i>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link" target="_blank">
                      <i class="fab fa-twitter"></i>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link border border-light rounded"
                      target="_blank">
                      <i class="fab fa-github mr-2"></i>MDB GitHub
                    </a>
                  </li>
                </ul>

              </div>
            </div>
        </nav>
    </div>
</div>
@endif

