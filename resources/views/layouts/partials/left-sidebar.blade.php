{{-- <div id="left-side-bar">
    <div id="onnav">
        <button class="togle" style="left:240" onclick="toggleSidebar()">
            <span class="material-symbols-outlined">menu</span>
        </button>
    </div>
    <div>
        <div class="logo-container">
            <img src="./assets/images/logo.png" class="logo">
        </div>
    </div>
    <div style="height: 86vh">
        <div class="buttons">
            <a href="{{ url('/') }}" class="button {{ Request::is('/') ? 'active' : '' }}" id="dashboard">
                <span class="material-symbols-outlined icon-logo">Dashboard</span>
                <p>Dashboard</p>
            </a>
            <a href="{{ url('rides') }}" class="button {{ Request::is('rides') ? 'active' : '' }}" id="vehicles">
                <span class="material-symbols-outlined icon-logo">airport_shuttle</span>
                <p>Rides</p>
            </a>
            <div class="buttons" style="border-bottom: 2px solid #D3D3D3;"></div>
            <a href="{{ url('drivers') }}" class="button {{ Request::is('drivers') ? 'active' : '' }}" id="drivers">
                <span class="material-symbols-outlined icon-logo">person</span>
                <p>Drivers</p>
            </a>
            <a href="{{ url('vehicles') }}" class="button {{ Request::is('vehicles') ? 'active' : '' }}" id="vehicles">
                <span class="material-symbols-outlined icon-logo">directions_car</span>
                <p>Vehicles</p>
            </a>
            <div class="buttons" style="border-bottom: 2px solid #D3D3D3;"></div>
            <a href="{{ url('customers') }}" class="button {{ Request::is('customers') ? 'active' : '' }}"
                id="vehicles">
                <span class="material-symbols-outlined icon-logo">group</span>
                <p>Clients</p>
            </a>
            <a href="{{ url('finance') }}" class="button {{ Request::is('finance') ? 'active' : '' }}" id="vehicles">
                <span class="material-symbols-outlined icon-logo">Finance</span>
                <p>Finance</p>
            </a>
        </div>
        <a href="{{ url('/logout') }}" class="btn btn-danger logout mt-auto">Logout</a>
    </div>
</div> --}}

<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-3 mt-4">
        <!-- Use active class for highlighted menu option -->
        <a href="#" class="list-group-item list-group-item-action py-2 ripple active" aria-current="true">
          <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
        </a>
        <a href="#" class="list-group-item list-group-item-action py-2 ripple">
          <i class="fas fa-van-shuttle fa-fw me-3"></i><span>Rides</span>
        </a>
        <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
            class="fas fa-user fa-fw me-3"></i><span>Drivers</span>
        </a>
        <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
            class="fas fa-car fa-fw me-3"></i><span>Vehicles</span>
        </a>
        <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
            class="fas fa-users fa-fw me-3"></i><span>Clients</span>
        </a>
        <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
            class="fas fa-chart-area fa-fw me-3"></i><span>Finance</span>
        </a>
      </div>
    </div>
  </nav>