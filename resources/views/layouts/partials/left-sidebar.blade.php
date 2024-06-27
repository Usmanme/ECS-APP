<div id="left-side-bar">
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
    <div>
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
</div>
