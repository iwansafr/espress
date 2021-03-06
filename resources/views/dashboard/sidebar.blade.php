<aside class="main-sidebar sidebar-light-secondary elevation-4">
  <!-- Brand Logo -->
  <a href="/" class="brand-link text-sm">
    <img src="/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="/assets/dist/img/avatar4.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block border-bottom"> {{ Auth::user()->name }}</a>
        <a href="/logout" class="text-danger"><i class="fa fa-sign-out-alt"></i> Logout</a>
      </div>
    </div>

    @livewire('dashboard.sidebar')
  </div>
  <!-- /.sidebar -->
</aside>