<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ route('home') }}">Administrator</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">Cms</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Dashboard</li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="#">General Dashboard</a></li>
            </ul>
          </li>
          <li class="menu-header">Starter</li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Management</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-user"></i>User</a></li>
              <li><a class="nav-link" href="{{ route('pages.index') }}"><i class="fas fa-file"></i>Pages</a></li>
              {{-- <li><a class="nav-link" href="{{ route('sections.index') }}"><i class="fas fa-puzzle-piece"></i>Sections</a></li> --}}
              <li><a class="nav-link" href="{{ route('templates.index') }}"><i class="fas fa-table"></i>Templates </a></li>
            </ul>
          </li>
          <li class="active"><a class="nav-link" href="{{ route('menus.index') }}"><i class="fas fa-list"></i> <span>Menus</span></a></li>
          <li><a class="nav-link" href="{{ route('home') }}"><i class="far fa-square"></i> <span>Blank Page</span></a></li>
    </aside>
  </div>
