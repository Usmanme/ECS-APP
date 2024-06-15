<div id="left-side-bar">

    <div id="onnav"> <button class="togle" style="left:240" onclick="toggleSidebar()">
            <span class="material-symbols-outlined">
                menu
            </span>
        </button></div>


    <div>
        <div class="logo-container">
            <img src="./assets/images/logo.png" class="logo">
        </div>
    </div>

    <div class="buttons ">
        <a href="{{ url('/') }}" class="button" id="dashboard">
            <span class="material-symbols-outlined icon-logo">
                Dashboard
            </span>
            <p>Dashboard</p>
        </a>
        <a href="{{ url('rides') }}" class="button" id="vehicles">
            <span class="material-symbols-outlined icon-logo">
                airport_shuttle
            </span>
            <p>Rides</p>
        </a>
        <div class="buttons" style="border-bottom: 2px solid #D3D3D3;"></div>

        <!-- <a href="{{ url('booking') }}" class="button" id="booking">
            <img src="{{ asset('/assets/images/Booking.png') }}" class="icon-logo">
            <p>Bookings</p>
        </a> -->

        <a href="{{ url('drivers') }}" class="button" id="drivers">
            <span class="material-symbols-outlined icon-logo">
                person
            </span>
            <p>Drivers</p>
        </a>
        <a href="{{ url('vehicles') }}" class="button" id="vehicles">
            <span class="material-symbols-outlined icon-logo">
                directions_car
            </span>
            <p>Vehicles</p>
        </a>
        <div class="buttons" style="border-bottom: 2px solid #D3D3D3;"></div>
        <a href="{{ url('customers') }}" class="button" id="vehicles">
            <span class="material-symbols-outlined icon-logo">
                group
            </span>
            <p>Clients</p>
        </a>
        <a href="{{ url('finance') }}" class="button" id="vehicles">
            <span class="material-symbols-outlined icon-logo">
                Finance
            </span>
            <p>Finance</p>
        </a>
        <a href="{{ url('/logout') }}" class="btn btn-danger logout mt-auto">Logout</a>
    </div>



</div>

<style>
    #left-side-bar {
        display: flex;
        flex-direction: column;
        Width: 301px;
    }

    .buttons {
        flex-grow: 1;
    }

    .logout {
        margin-top: auto;
        width: 288px;
        height: 50px;
        top: 705px;
        gap: 0px;
        border-radius: 5px 5px 0px 0px;
        opacity: 0px;

    }
</style>
