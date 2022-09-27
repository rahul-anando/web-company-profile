<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Dashboard</li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
            </ul>
          </li>
          <li class="menu-header">Starter</li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Management</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-user"></i>User</a></li>
              <li><a class="nav-link" href="{{ route('menus.index') }}"><i class="fas fa-list"></i>Menus</a></li>
              <li><a class="nav-link" href="#">Top Navigation</a></li>
              <li><a class="nav-link" href="#">Navigation</a></li>
              <li><a class="nav-link" href="#">Top </a></li>
            </ul>
          </li>
          <li class="active"><a class="nav-link" href="{{ route('home') }}"><i class="far fa-square"></i> <span>Blank Page</span></a></li>
    </aside>
  </div>
