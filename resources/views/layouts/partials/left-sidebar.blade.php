<div id="left-side-bar" class="col-lg-3">
    <div>
        <div class="logo-container">
            {{-- <img src="./assets/images/logo.png" class="logo"> --}}
        </div>
        <div class="extra"></div>
    </div>
    <div class="buttons">
        <a href="{{ url('/') }}" class="button" id="dashboard"><img src="{{ asset('/assets/images/Home.png') }}" class="icon-logo">
            <p>Dashboard</p>
        </a>
        <!-- <a href="{{ url('booking') }}" class="button" id="booking"><img src="{{ asset('/assets/images/Booking.png') }}" class="icon-logo">
            <p>Bookings</p>
        </a> -->
        <a href="{{ url('drivers') }}" class="button" id="drivers"><img src="{{ asset('/assets/images/Drivers.png') }}" class="icon-logo">
            <p>Drivers</p>
        </a>
        <a href="{{ url('vehicles') }}" class="button" id="vehicles"><img src="{{ asset('/assets/images/Vehicles.png') }}" class="icon-logo">
            <p>Vehicles</p>
        </a>
        <a href="{{ url('rides') }}" class="button" id="vehicles"><img src="{{ asset('/assets/images/ride-icon.png') }}" class="icon-logo">
            <p>Booking</p>
        </a>
        <a href="{{ url('customers') }}" class="button" id="vehicles"><img src="{{ asset('/assets/images/client-icon.png') }}" class="icon-logo">
            <p>Customers</p>
        </a>
         <a href="{{ url('finance') }}" class="button" id="vehicles"><img src="{{ asset('/assets/images/bookingrs.png') }}" class="icon-logo">
            <p>Finance</p>
        </a>
    </div>
    <a href="{{ url('/logout') }}" class="btn btn-danger logout">Logout</a>
</div>
