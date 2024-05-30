@extends('layouts.app-master')

@section('content')
    <!-- Left Sidebar -->
    @include('layouts.partials.left-sidebar')
    <div class="col-lg-9 p-0" id="booking_right_part">
        <div class="booking_header_part">
            <div class="booking_header_title" id="Title">
                <h2>Ride Detail </h2>
                <h2>{{ $ride->customer_name }}</h2>
                <div class="center-heading">
                    <h6 class="color01">Home >></h6>
                    <h6 class="color02">Dashboard</h6>
                </div>
            </div>
            <div class="profile">
                <img src="./assets/images/notification.png" class="notification-icon">
                <img src="./assets/images/admin.png" class="admin-pic">
                <p class="admin-name">king Albert</p>
            </div>
        </div>
    <div class="container mt-8">
        <div class="modal-body">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="name">Customer Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="" readonly value="{{ $ride->customer_name }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="name">Customer Email</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="" readonly value="{{ $ride->customer_email }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="name">Customer Number</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="" readonly value="{{ $ride->cutomer_number }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="mobile_number">Booking Date</label>
                    <input type="text" class="form-control" name="mobile_number" id="mobile_number" placeholder="" readonly value="{{ $ride->booking_pickup }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="mobile_number">Booking Time</label>
                    <input type="text" class="form-control" name="mobile_number" id="mobile_number" placeholder="" readonly value="{{ $ride->booking_drop }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="email">Pickup Location</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="" readonly value="{{ $ride->hotel_pickup }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="nationality">Drop Off</label>
                    <input type="text" class="form-control" name="nationality" id="nationality" placeholder="" readonly value="{{ $ride->hotel_drop }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="company">Vehicle</label>
                    <input type="text" class="form-control" name="company" id="company" placeholder="" readonly value="{{ $ride->car_name }}">
                </div>
            </div>
            <div class="form-row">

                <div class="form-group col-md-3">
                    <label for="department">Passenger</label>
                    <input type="text" class="form-control" name="department" id="department" placeholder="" readonly value="{{ $ride->passengers }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" name="status" id="status" placeholder="" readonly value="{{ $ride->status }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="fare">Fare</label>
                    <input type="text" class="form-control" name="fare" id="fare" placeholder="" readonly value="{{ $ride->fare }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="status">Category</label>
                    <input type="text" class="form-control" name="status" id="status" placeholder="" readonly value="{{ $ride->category }}">
                </div>
            </div>
            <div class="form-row">

                <div class="form-group col-md-3">
                    <label for="fare">AirLine</label>
                    <input type="text" class="form-control" name="fare" id="fare" placeholder="" readonly value="{{ $ride->airline_name }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="status">Flight Number</label>
                    <input type="text" class="form-control" name="status" id="status" placeholder="" readonly value="{{ $ride->flight_number }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="fare">Driver Pickup Sign</label>
                    <input type="text" class="form-control" name="fare" id="fare" placeholder="" readonly value="{{ $ride->driver_pick_up_sign }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="fare">Driver Note</label>
                    <input type="text" class="form-control" name="fare" id="fare" placeholder="" readonly value="{{ $ride->additional_info }}">
                </div>
            </div>

        </div>
    </div>
@endsection
