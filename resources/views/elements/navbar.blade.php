<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
      </ul>
    </form>
    <ul class="navbar-nav navbar-right">
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
        <div class="dropdown-menu dropdown-menu-right">
            <div class="info text-center">
                <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mb-3" width="30%">
                <p class="name font-weight-bold mb-0">{{ Auth::user()->name }}</p>
                <p class="email text-muted mb-3">{{ Auth::user()->email }}</p>
            </div>
          <div class="dropdown-divider"></div>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline text-center">
              @csrf
              <button type="submit" class="btn dropdown-item text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
          </form>
        </div>
      </li>
    </ul>
  </nav>
