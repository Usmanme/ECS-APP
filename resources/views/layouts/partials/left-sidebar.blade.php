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
    <div class="position-sticky ecs-sidebar">
        <div class="ecs-logo">
            <img src="./assets/images/logo.png" alt="logo" />
        </div>
        <div class="list-group list-group-flush mx-3 mt-4">
            <!-- Use active class for highlighted menu option -->
            <a href="{{ url('/') }}" class="list-group-item list-group-item-action py-2 ripple active"
                aria-current="true">
                <i class="fas fa-tachometer-alt fa-fw me-3 ecs-font-logo"></i><span>Dashboard</span>
            </a>
            <a href="{{ url('rides') }}" class="list-group-item list-group-item-action py-2 ripple">
                <i class="fas fa-van-shuttle fa-fw me-3 ecs-font-logo"></i><span>Rides</span>
            </a>
            <hr class="ecs-custom-divder" />
            <a href="{{ url('drivers') }}" class="list-group-item list-group-item-action py-2 ripple"><i
                    class="fas fa-user fa-fw me-3 ecs-font-logo"></i><span>Drivers</span>
            </a>
            <a href="{{ url('vehicles') }}" class="list-group-item list-group-item-action py-2 ripple"><i
                    class="fas fa-car fa-fw me-3 ecs-font-logo"></i><span>Vehicles</span>
            </a>
            <hr class="ecs-custom-divder" />
            <a href="{{ url('customers') }}" class="list-group-item list-group-item-action py-2 ripple"><i
                    class="fas fa-users fa-fw me-3 ecs-font-logo"></i><span>Clients</span>
            </a>
            <a href="{{ url('finance') }}" class="list-group-item list-group-item-action py-2 ripple"><i
                    class="fas fa-chart-area fa-fw me-3 ecs-font-logo"></i><span>Finance</span>
            </a>
        </div>
    </div>
    <button type="button" class="ecs-btn-logout" data-toggle="modal" data-target="#exampleModal">Logout</button>
       
    
    
</nav>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: white;">
              </div>
            <div class="modal-body m-auto">
                <p class="logoutsure">Are You Sure You want to logout?</p>
            </div>
            <div class=" m-auto d-flex flex-row " style="gap: 17px;padding-bottom:27px;">
                <button type="button" class="rideseditsubmit" style="width: 160px;background-color:white;border:2px solid red;color:red" data-dismiss="modal">Close</button>
                <a href="{{ url('/logout') }}" class=" rideseditsubmit" style="width: 160px; padding: 12px 0px 0px 50px;" >Logout</a>
                
            </div>
        </div>
    </div>
</div>

