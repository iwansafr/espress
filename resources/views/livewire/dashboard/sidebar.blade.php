<div>
    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" wire:model="search" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-legacy nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          @if (!empty($menu))
              @foreach ($menu as $key  => $value)
                <li class="nav-header">{{ $key }}</li>
                @foreach ($value as $vkey => $item)
                    <li class="nav-item">
                        <a href="{{ $item['link'] }}" class="nav-link">
                            <i class="nav-icon {{ $item['icon'] }}"></i>
                            <p>
                              {{ $item['title'] }}
                              @if (!empty($item['child']))
                                <i class="right fas fa-angle-left"></i>
                              @endif
                            </p>
                        </a>
                        @if (!empty($item['child']))
                            <ul class="nav nav-treeview">
                                @foreach ($item['child'] as $ikey => $ivalue)
                                    <li class="nav-item">
                                        <a href="{{ $ivalue['link'] }}" class="nav-link">
                                            <i class="far {{ $ivalue['icon'] }} nav-icon"></i>
                                            <p>{{ $ivalue['title'] }}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
              @endforeach
          @endif
          <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Important</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Warning</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Informational</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
</div>
