@extends('layouts.app-master')

@section('content')
    <!-- Left Sidebar -->
    @include('layouts.partials.left-sidebar')
    <!-- ./Left Sidebar -->

    <!-- Ride -->
    <div class="col-lg-9 p-0" id="booking_right_part">
        <div class="booking_header_part">
            <div class="booking_header_title" id="Title">
                <h2>Rides</h2>
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

        <!-- Save -->
        @if (session('status_save') === 'true')
            <div class="ecs_alert alert alert-success" role="alert">
                Ride has been Created successfully.
            </div>
        @elseif (session('status_save') === 'false')
            <div class="ecs_alert alert alert-danger" role="alert">
                <b>Error:</b> Your ride could not be Created.
            </div>
        @endif

        <!-- Edit -->
        @if (session('status_edit') === 'true')
            <div class="ecs_alert alert alert-success" role="alert">
                Ride has been updated successfully.
            </div>
        @elseif (session('status_edit') === 'false')
            <div class="ecs_alert alert alert-danger" role="alert">
                <b>Error:</b> Your ride could not be update.
            </div>
        @endif

        <table id="bookingtable_in_booking" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Ride Date</th>
                    <th>Pick Up</th>
                    <th>Drop Up</th>
                    <!--<th>Driver</th>-->
                    <th>Vehicle</th>
                    <th>Category</th>
                    <th>Passenger</th>
                    <th>Status</th>
                    <th>Fare</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($data))
                    @foreach ($data as $key => $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>
                                <div class="nameentry">
                                    <img src="{{ asset('/assets/images/avarat.png') }}" class="customerpic">
                                    <p>{{ $value->customer_name }}</p>
                                </div>
                            </td>
                            <td>
                                <div class="dameentry">
                                    <p class="datepart">{{ $value->booking_pickup }}</p>
                                    <p class="datepart">{{ $value->booking_drop }}</p>
                                </div>
                            </td>
                            <td>{{ $value->hotel_pickup }}</td>
                            <td>{{ $value->hotel_drop }}</td>
                            <!--<td>Demo</td>-->
                            <td>{{ $value->car_name }}</td>
                            <td>{{ $value->category }}</td>
                            <td>{{ $value->passengers }}</td>
                            <!--<td>-->
                            <!--    <div class="booking_status">{{ Str::ucfirst($value->status) }}</div>-->
                            <!--</td>-->
                            <!--<td>-->
                            <!--    @if ($value->status == 'Completed')
    -->
                            <!--        <div class="booking_status_completed">{{ Str::ucfirst($value->status) }}</div>-->
                            <!--
@elseif ($value->status == 'Ride Created')
    -->
                            <!--        <div class="booking_status_created">{{ Str::ucfirst($value->status) }}</div>-->
                            <!--
@elseif($value->status == 'Driver Assigned')
    -->
                            <!--        <div class="booking_status_driver">{{ Str::ucfirst($value->status) }}</div>-->
                            <!--
@elseif($value->status == 'Waiting For Payment')
    -->
                            <!--        <div class="booking_status_waiting">{{ Str::ucfirst($value->status) }}</div>-->
                            <!--
    @endif-->
                            <!--</td>-->
                            <td>
                                @if ($value->status == 'Completed')
                                    <a href="javascript:void(0)" class="edit_ride_btn" data-id="{{ $value->id }}"
                                        style="    background-color: #00da3d;
    color: #f4f4f4;
    border-radius: 20px;
    display: inline-block;
    padding: 5px;
    border-radius: 10;">{{ Str::ucfirst($value->status) }}</a>
                                @elseif ($value->status == 'Ride Created')
                                    <a href="javascript:void(0)" class="edit_ride_btn" data-id="{{ $value->id }}"
                                        style="    background-color: #b6da00;
    color: #f4f4f4;
    border-radius: 20px;
    display: inline-block;
    padding: 5px;
    border-radius: 10;">{{ Str::ucfirst($value->status) }}</a>
                                @elseif($value->status == 'Driver Assigned')
                                    <a href="javascript:void(0)" class="edit_ride_btn" data-id="{{ $value->id }}"
                                        style="    background-color: #da9c00;
    color: #f4f4f4;
    border-radius: 20px;
    display: inline-block;
    padding: 5px;
    border-radius: 10;">{{ Str::ucfirst($value->status) }}</a>
                                @elseif($value->status == 'Waiting For Payment')
                                    <a href="javascript:void(0)" class="edit_ride_btn" data-id="{{ $value->id }}"
                                        style="    background-color: #0b00da;
    color: #f4f4f4;
    border-radius: 20px;
    display: inline-block;
    padding: 5px;
    border-radius: 10;">{{ Str::ucfirst($value->status) }}</a>
                                @endif
                            </td>
                            <td>{{ $value->fare }}</td>
                            <td>
                                <a href="javascript:void(0)" class="edit_ride_button" data-id="{{ $value->id }}">
                                    <img src="{{ url('/assets/images/edit-icon.png') }}">
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th>Customer</th>
                    <th>Ride Date</th>
                    <th>Pick Up</th>
                    <th>Drop Up</th>
                    <!--<th>Driver</th>-->
                    <th>Vehicle</th>
                    <th>Status</th>
                    <th>Fare</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- ./Ride -->
    <div class="modal fade modal_form" id="addRideModal" tabindex="-1" role="dialog" aria-labelledby="addRideModalLabel"
        aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addRideModalLabel">Add New Ride</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/rides/store') }}" method="post" enctype="multipart/form-data" id="rideForm">

                    @csrf

                    <div class="modal-body">
                        <h2>B2B Booking</h2>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="customer_id">ID Number</label>
                                <select class="form-control" name="customer_id" id="customer_id" required>
                                    <option value="">Select Customer ID</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <div class="button">
                                    <input onclick="showTab(this)" type="radio" id="airport" value="airport"
                                        name="catgory" checked />
                                    <label class="checkbox-container btn btn-default" for="airport">Airport
                                        Transfer</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="button">
                                    <input onclick="showTab(this)" type="radio" id="hourly" value="hourly"
                                        name="catgory" />
                                    <label class="btn btn-default" for="hourly">Hourly</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="button">
                                    <input onclick="showTab(this)" type="radio" id="full_day" value="fullday"
                                        name="catgory" />
                                    <label class="btn btn-default" for="full_day">Full Day</label>
                                </div>
                            </div>
                        </div>
                        <div class="container airport-div d-none">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Pick & Drop</label>
                                    <input type="text" class="form-control" name="booking_pickup_airport" id="booking_pickup_airport"
                                        placeholder="936 Route">
                                </div>
                                <div class="col-md-3">
                                    <label for="">To</label>
                                    <input type="text" class="form-control" name="booking_drop_airport" id="booking_drop_airport"
                                        placeholder="936 Route">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-3" style="padding-left: 0px;">
                                    <label for="">Pick Up Date</label>
                                    <input type="date" class="form-control" name="booking_pickup_date_airport"
                                        id="booking_pickup_date_airport" placeholder="">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Pick Up Time</label>
                                    <input type="time" class="form-control" name="booking_drop_time_airport"
                                        id="booking_drop_time_airport" placeholder="936 Kiehn Route">
                                </div>
                            </div>
                            <div class="col-md-3" style="padding-left: 0px;">
                                <label for="">Passangers</label>
                                <input type="number" class="form-control" name="passengers_airport" id="passengers_airport"
                                    placeholder="0">
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-5">
                                    <label for="category">Category</label>
                                    <select name="category" class="form-control" onchange="getVehicleByCategory(this)"
                                        id="category">
                                        <option value="Business">Business</option>
                                        <option value="Economy">Economy</option>
                                        <option value="First Class">First Class</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="vehicle_id">Vehicles</label>
                                    <select name="vehicle_id" class="form-control" id="vehicle_id">
                                    </select>
                                </div>
                            </div>
                            <h2>Driver Information:</h2>
                            <div class="row mb-2">
                                <div class="col-md-3">
                                    <label for="">Driver Pickup Sign</label>
                                    <input type="text" class="form-control" name="driver_sign_airport"
                                        placeholder="Driver Pickup Sign">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Add a note to driver</label>
                                    <input type="text" class="form-control" name="driver_note_airport" placeholder="">
                                </div>
                            </div>
                            <h2>Fare:</h2>
                            <div class="row mb-2">
                                <div class="col-md-3" style="padding-left: 0px;">
                                    <label for="">Fare</label>
                                    <input type="text" class="form-control" name="auto_fare" id="auto_fare"
                                        placeholder="Auto Fare">
                                </div>
                                {{-- <div class="col-md-3">
                                    <label for="">Trip Fare</label>
                                    <input type="text" class="form-control" name="trip_fare" placeholder="Trip Fare">
                                </div> --}}
                            </div>
                            <h2>Airport Ride:</h2>
                            <div class="row mb-2">
                                <div class="col-md-3" style="padding-left: 0px;">
                                    <label for="">Flight Number</label>
                                    <input type="text" class="form-control" name="flight_number_airport"
                                        placeholder="Flight Number">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Terminal Number</label>
                                    <input type="text" class="form-control" name="terminal_number_airport"
                                        placeholder="Terminal Number">
                                </div>
                            </div>

                        </div>
                        <div class="container hourly-div d-none">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Pick & Drop</label>
                                    <input type="text" class="form-control" name="booking_pickup_hourly" id="booking_pickup_hourly"
                                        placeholder="936 Route">
                                </div>
                                <div class="col-md-3">
                                    <label for="">To</label>
                                    <input type="text" class="form-control" name="booking_drop_hourly" id="booking_drop_hourly"
                                        placeholder="936 Route">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-3" style="padding-left: 0px;">
                                    <label for="">Pick Up Date</label>
                                    <input type="date" class="form-control" name="booking_pickup_date"
                                        id="booking_pickup_date" placeholder="">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Pick Up Time</label>
                                    <input type="time" class="form-control" name="booking_drop_time"
                                        id="booking_drop_time" placeholder="936 Kiehn Route">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-3" style="padding-left: 0px;">
                                    <label for="">Passengers</label>
                                    <input type="number" class="form-control" name="passengers_hourly" id="passengers_hourly"
                                        placeholder="0">
                                </div>
                                <div class="col-md-3" style="padding-left: 0px;">
                                    <label for="">Pickup Hours</label>
                                    <input type="number" class="form-control" name="pickup_hours" id="pickup_hours"
                                        placeholder="0">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-5">
                                    <label for="category">Category</label>
                                    <select name="category" class="form-control" onchange="getVehicleByCategory(this)"
                                        id="category">
                                        <option value="Business">Business</option>
                                        <option value="Economy">Economy</option>
                                        <option value="First Class">First Class</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="vehicle_id">Vehicles</label>
                                    <select name="vehicle_id" class="form-control" id="vehicle_id">
                                    </select>
                                </div>
                            </div>
                            <h2>Driver Information:</h2>
                            <div class="row mb-2">
                                <div class="col-md-3">
                                    <label for="">Driver Pickup Sign</label>
                                    <input type="text" class="form-control" name="driver_sign_hourly"
                                        placeholder="Driver Pickup Sign">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Add a note to driver</label>
                                    <input type="text" class="form-control" name="driver_note" placeholder="">
                                </div>
                            </div>
                            <h2>Fare:</h2>
                            <div class="row mb-2">
                                <div class="col-md-3" style="padding-left: 0px;">
                                    <label for="">Fare</label>
                                    <input type="text" class="form-control" name="auto_fare" id="auto_fare"
                                        placeholder="Auto Fare">
                                </div>
                                {{-- <div class="col-md-3">
                                    <label for="">Trip Fare</label>
                                    <input type="text" class="form-control" name="trip_fare" placeholder="Trip Fare">
                                </div> --}}
                            </div>

                        </div>
                        <div class="container fullday-div d-none">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Pick & Drop</label>
                                    <input type="text" class="form-control" name="booking_pickup_full_day" id="booking_pickup_full_day"
                                        placeholder="936 Route" >
                                </div>
                                <div class="col-md-3">
                                    <label for="">To</label>
                                    <input type="text" class="form-control" name="booking_drop_full_day" id="booking_drop_full_day"
                                        placeholder="936 Route" >
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-3">
                                    <label for="">Pick Up Date</label>
                                    <input type="date" class="form-control" name="booking_pickup_date_full_day" id="booking_pickup_date_full_day"
                                        placeholder="" >
                                </div>
                                <div class="col-md-3">
                                    <label for="">Pick Up Time</label>
                                    <input type="time" class="form-control" name="booking_drop_time_full_day" id="booking_drop_time_full_day"
                                        placeholder="936 Kiehn Route" >
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-3">
                                    <label for="">Passangers</label>
                                    <input type="number" class="form-control" name="passengers_full_day" id="passengers_full_day"
                                        placeholder="1" >
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-5">
                                    <label for="category">Category</label>
                                    <select name="category" class="form-control" onchange="getVehicleByCategory(this)"
                                        id="category">
                                        <option value="Economy">Economy</option>
                                        <option value="Business">Business</option>
                                        <option value="First Class">First Class</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="vehicle_id">Vehicles</label>
                                    <select name="vehicle_id" class="form-control" id="vehicle_id">
                                    </select>
                                </div>
                            </div>
                            <h2>Driver Information:</h2>
                            <div class="row mb-2">
                                <div class="col-md-3">
                                    <label for="">Driver Pickup Sign</label>
                                    <input type="text" class="form-control" name="driver_sign_full_day"
                                        placeholder="Driver Pickup Sign">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Add a note to driver</label>
                                    <input type="text" class="form-control" name="driver_note_full_day" placeholder="">
                                </div>
                            </div>
                            <h2>Fare:</h2>
                            <div class="row mb-2">
                                <div class="col-md-3" style="padding-left: 0px;">
                                    <label for="">Fare</label>
                                    <input type="text" class="form-control" name="auto_fare" id="auto_fare"
                                        placeholder="Auto Fare">
                                </div>
                                {{-- <div class="col-md-3">
                                    <label for="">Trip Fare</label>
                                    <input type="text" class="form-control" name="trip_fare" placeholder="Trip Fare">
                                </div> --}}
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-black">Submit</button>
                        </div>
                    </div>

                </form>


            </div>
        </div>
    </div>
    </div>

    <!-- ./ Edit Modal -->
    <div class="modal fade modal_form" id="editModal" tabindex="-1" role="dialog"
        aria-labelledby="editRideModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRideModalLabel">Edit Ride</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Customer Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder=""
                                readonly value="">
                        </div>
                        <div class="form-group">
                            <label for="mobile_number">Ride Date</label>
                            <input type="text" class="form-control" name="mobile_number" id="mobile_number"
                                placeholder="" readonly value="">
                        </div>
                        <div class="form-group">
                            <label for="email">Pickup</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder=""
                                readonly value="">
                        </div>
                        <div class="form-group">
                            <label for="nationality">Drop Off</label>
                            <input type="text" class="form-control" name="nationality" id="nationality"
                                placeholder="" readonly value="">
                        </div>
                        <div class="form-group">
                            <label for="company">Vhicle</label>
                            <input type="text" class="form-control" name="company" id="company" placeholder=""
                                readonly value="">
                        </div>
                        <div class="form-group">
                            <label for="department">Category</label>
                            <input type="text" class="form-control" name="department" id="department" placeholder=""
                                readonly value="">
                        </div>
                        <div class="form-group">
                            <label for="designation">Passenger</label>
                            <input type="text" class="form-control" name="designation" id="designation"
                                placeholder="" readonly value="">
                        </div>
                        <div class="form-group">
                            <label for="designation">Status</label>
                            <input type="text" class="form-control" name="designation" id="designation"
                                placeholder="" readonly value="">
                        </div>
                        <div class="form-group">
                            <label for="designation">Fare</label>
                            <input type="text" class="form-control" name="designation" id="designation"
                                placeholder="" readonly value="">
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal_form" id="editRideModal" tabindex="-1" role="dialog"
        aria-labelledby="editRideModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRideModalLabel">Edit Ride</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('ride.update') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <input type="hidden" id="ride_id" name="id">

                            <div class="col-lg-6">

                                <label style="margin-left:200px" for="">Status</label>
                                <select name="status" class="form-control" id="edit_status"
                                    style="text-align-centers; margin-left:121px">
                                    <option value="">Select Status</option>
                                    <option value="Created">Ride Created</option>
                                    <option value="Waiting For Payment">Waiting For Payment</option>
                                    <option value="Driver Assigned">Driver Assigned</option>
                                    <option value="Completed">Completed</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-group mt-2" style="text-align:center">
                            <button type="submit" class="btn btn-black">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(document).on('click', '.edit_ride_btn', function() {
        let ride_id = $(this).attr('data-id');
        $.ajax({
            type: "GET",
            url: "{{ route('rides.edit') }}",
            data: {
                id: ride_id
            },
            success: function(response) {
                if (response.status) {
                    let data = response.ride;
                    $('#editRideModal').modal('show');
                    $('#ride_id').val(data.id);
                    $('#edit_status').val(data.status);
                }
            }
        });
    })



    function getVehicleByCategory(obj) {
        let category = $(obj).val();
        console.log("xate", category);
        console.log("category", category);
        $.ajax({
            type: "GET",
            url: "{{ route('rides.vehicles') }}",
            data: {
                category: category
            },
            beforeSend: function() {
                $('#vehicle_id').empty();
            },
            success: function(response) {
                if (response.status) {
                    console.log(response);
                    let data = response.vehicles;
                    let auto_fare;
                    let html = '';
                    if (data.length > 0) {
                        data.forEach(vehicle => {
                            html += `<option value=${vehicle.brand}>${vehicle.brand}</option>`;

                        });
                        $('#vehicle_id').append(html);

                        data.forEach(vehicle => {
                            $('#auto_fare').val(vehicle.fare);
                        });

                    } else {
                        html += `<option>No Vehicle Found</option>`;
                        $('#vehicle_id').append(html);
                    }
                }
            }
        });
    }
</script>

<script>
    $(document).on('click', '.edit_ride_button', function() {
        let ride_id = $(this).attr('data-id');
        $.ajax({
            type: "GET",
            url: "{{ route('rides.edit') }}",
            data: {
                id: ride_id
            },
            success: function(response) {
                if (response.status) {
                    let data = response.ride;
                    $('#editModal').modal('show');
                    $('#ride_id').val(data.id);
                    $('#edit_status').val(data.status);
                }
            }
        });
    })

    function showTab(obj) {
        let category_value = $(obj).val();
        console.log("val", category_value);
        if (category_value == 'airport') {
            $('.airport-div').removeClass('d-none');
            $('.fullday-div').addClass('d-none')
            $('.hourly-div').addClass('d-none');
        } else if (category_value == 'hourly') {
            $('.airport-div').addClass('d-none')
            $('.fullday-div').addClass('d-none')
            $('.hourly-div').removeClass('d-none');
        } else if (category_value == 'fullday') {
            $('.airport-div').addClass('d-none')
            $('.hourly-div').addClass('d-none');
            $('.fullday-div').removeClass('d-none')
        }
    }

    $('#rideForm').submit(function(event) {
        event.preventDefault(); // Prevent default form submission

        // Collect data from the active tab and submit the form
        submitForm();
    });

    function submitForm() {
        let formData = $('#rideForm').serialize(); // Serialize form data

        $.ajax({
            type: "POST",
            url: "{{ url('/rides/store') }}",
            data: formData,
            success: function(response) {
                // Handle success response
                console.log("Form submitted successfully:", response);
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error("Error submitting form:", error);
            }
        });
    }
</script>
