

<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky ecs-sidebar">
        <div class="ecs-logo">
            <img src="./assets/images/logo.png" alt="logo" />
        </div>
        <div class="list-group list-group-flush mx-3 mt-4">
           
            <a href="{{ url('/') }}" class=" {{ Request::is('/') ? 'active' : '' }} list-group-item list-group-item-action py-2 ripple "
                aria-current="true">
                <i class="fas fa-tachometer-alt fa-fw me-3 ecs-font-logo"></i><span>Dashboard</span>
            </a>
            <a href="{{ url('rides') }}" class="{{ Request::is('rides') ? 'active' : '' }} list-group-item list-group-item-action py-2 ripple">
                <i class="fas fa-van-shuttle fa-fw me-3 ecs-font-logo"></i><span>Rides</span>
            </a>
            <hr class="ecs-custom-divder" />
            <a href="{{ url('drivers') }}" class=" {{ Request::is('drivers') ? 'active' : '' }} list-group-item list-group-item-action py-2 ripple"><i
                    class="fas fa-user fa-fw me-3 ecs-font-logo"></i><span>Drivers</span>
            </a>
            <a href="{{ url('vehicles') }}" class=" {{ Request::is('vehicles') ? 'active' : '' }} list-group-item list-group-item-action py-2 ripple"><i
                    class="fas fa-car fa-fw me-3 ecs-font-logo"></i><span>Vehicles</span>
            </a>
            <hr class="ecs-custom-divder" />
            <a href="{{ url('customers') }}" class=" {{ Request::is('customers') ? 'active' : '' }} list-group-item list-group-item-action py-2 ripple"><i
                    class="fas fa-users fa-fw me-3 ecs-font-logo"></i><span>Clients</span>
            </a>
            <a href="{{ url('finance') }}" class=" {{ Request::is('finance') ? 'active' : '' }} list-group-item list-group-item-action py-2 ripple"><i
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

