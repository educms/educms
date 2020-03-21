<aside class="main-sidebar sidebar-dark-indigo elevation-4">
  <!-- Brand Logo -->
  <a href="{{ url('/') }}" class="brand-link bg-indigo">
    <img src="{{ $backend_asset }}images/educms.png" alt="EDUCMS Logo" class="brand-image" >
    <span class="brand-text font-weight-bold">{{ FunctionStatic::versi_app() }}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ $backend_asset }}dist/img/profile.jpeg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block text-truncate">{{ session('user_displayname') }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column text-sm" data-widget="treeview" role="menu" data-accordion="false">
        @include('backend::partials.menu')
        <li class="nav-item">
          <a href="##" onclick="confirm_logout()" class="nav-link">
            <i class="nav-icon far fa fa-sign-out-alt"></i>
            <p>
              LOGOUT
            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
