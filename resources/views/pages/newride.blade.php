@extends('layouts.app-master')

@section('content')
    <header>
        <!-- Sidebar -->
        @include('layouts.partials.left-sidebar')
        <!-- Sidebar -->
        <!-- Navbar -->
        @include('layouts.partials.nav')
        <!-- Navbar -->
    </header>
    <!-- Vehicle -->
    <main class="ecs-main-body" style="height: 100vh;">
        <div class="container-fluid pt-4">

            <!-- Save -->
            @if (session('status_save') === 'true')
                <div class="ecs_alert alert alert-success" role="alert">
                    Driver has been registered successfully.
                </div>
            @elseif (session('status_save') === 'false')
                <div class="ecs_alert alert alert-danger" role="alert">
                    <b>Error:</b> Your driver could not be register.
                </div>
            @endif

            <!-- Edit -->
            @if (session('status_edit') === 'true')
                <div class="ecs_alert alert alert-success" role="alert">
                    Driver has been updated successfully.
                </div>
            @elseif (session('status_edit') === 'false')
                <div class="ecs_alert alert alert-danger" role="alert">
                    <b>Error:</b> Your driver could not be update.
                </div>
            @endif
            <div class="adddrivermain">

            <form action="{{ url('/rides/store') }}" method="post" enctype="multipart/form-data" id="rideForm"
                style="margin: 20px;background: white;">

                @csrf

                <div>
                    <h2 style="padding:3px; margin-left:10px;" class="modelheadings ">B2B Booking:</h2>
                    <div class="row mt-4 mb-3 " style=" margin-left:0px;">
                        <div class="col-md-2" style="margin-top: -15px;">
                            <label for="customer_id">ID Number</label>
                            <select class="form-control" style="width:110%;" name="customer_id" id="customer_id" required>
                                <option value="">Select Customer ID</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-2">
                            <div class="button">
                                <input onclick="showTab(this)" type="radio" id="airport" value="airport" name="catgory"
                                    checked />
                                <label class="checkbox-container btn btn-default" for="airport">Airport
                                    Pickup</label>
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
                                <input type="text" class="form-control" name="booking_pickup_airport"
                                    id="booking_pickup_airport" placeholder="936 Route" required>
                            </div>
                            <div class="col-md-3">
                                <label for="">To</label>
                                <input type="text" class="form-control" name="booking_drop_airport"
                                    id="booking_drop_airport" placeholder="936 Route" required>
                            </div>
                        </div>
                        <div class="row mb-2" style="padding:17px 8px 9px 11px;">
                            <div class="col-md-3" style="padding-left: 0px;">
                                <label for="">Pick Up Date</label>
                                <input type="date" class="form-control" name="booking_pickup_date_airport"
                                    id="booking_pickup_date_airport" placeholder="" required>
                            </div>
                            <div class="col-md-3">
                                <label for="">Pick Up Time</label>
                                <input type="time" class="form-control" name="booking_drop_time_airport"
                                    id="booking_drop_time_airport" placeholder="936 Kiehn Route" required>
                            </div>
                        </div>
                        <div class="col-md-3" style="padding-left: 0px;">
                            <label for="">Passangers</label>
                            <input type="number" class="form-control" name="passengers_airport" id="passengers_airport"
                                placeholder="0" required>
                        </div>
                        <div class="row mb-2" style="padding:20px 10px 15px 0px;">
                            <div class="col-md-5">
                                <label for="category">Category</label>
                                <select name="category" class="form-control" onchange="getVehicleByCategory(this)"
                                    id="category">
                                    <option value="">Choose Category</option>
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
                        <h2 class="modelheadings">Driver Information:</h2>
                        <div class="row mb-2" style="padding:20px 10px 10px 2px;">
                            <div class="col-md-3">
                                <label for="">Driver Pickup Sign</label>
                                <input type="text" class="form-control" name="driver_sign_airport"
                                    placeholder="Driver Pickup Sign" required>
                            </div>
                            <div class="col-md-3">
                                <label for="">Add a note to driver</label>
                                <input type="text" class="form-control" name="driver_note_airport" placeholder=""
                                    required>
                            </div>
                        </div>
                        <h2 class="modelheadings">Fare:</h2>
                        <div class="row mb-2">
                            <div class="col-md-3" style="padding: 13px;">
                                <label for="">Fare</label>
                                <input type="text" class="form-control" name="auto_fare" id="auto_fare"
                                    placeholder="Auto Fare"required>
                            </div>
                            <!--<div class="col-md-3">-->
                            <!--    <label for="">Trip Fare</label>-->
                            <!--    <input type="text" class="form-control" name="trip_fare" placeholder="Trip Fare" required>-->
                            <!--</div>-->
                        </div>
                        <h2 class="modelheadings">Airport Ride:</h2>
                        <div class="row mb-2" style="padding:16px 10px 15px 13px;">
                            <div class="col-md-3" style="padding-left: 0px;">
                                <label for="">Flight Number</label>
                                <input type="text" class="form-control" name="flight_number_airport"
                                    placeholder="Flight Number" required>
                            </div>
                            <div class="col-md-3">
                                <label for="">Terminal Number</label>
                                <input type="text" class="form-control" name="terminal_number_airport"
                                    placeholder="Terminal Number" required>
                            </div>
                        </div>

                    </div>
                    <div class="container hourly-div d-none">
                        <div class="row " style="padding:7px 0px;">
                            <div class="col-md-3">
                                <label for="">Pick & Drop</label>
                                <input type="text" class="form-control" name="booking_pickup_hourly"
                                    id="booking_pickup_hourly" placeholder="936 Route">
                            </div>
                            <div class="col-md-3">
                                <label for="">To</label>
                                <input type="text" class="form-control" name="booking_drop_hourly"
                                    id="booking_drop_hourly" placeholder="936 Route">
                            </div>
                        </div>
                        <div class="row mb-2" style="padding:10px;">
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
                        <div class="row mb-2" style="padding: 13px;">
                            <div class="col-md-3" style="padding-left: 0px;">
                                <label for="">Passengers</label>
                                <input type="number" class="form-control" name="passengers_hourly"
                                    id="passengers_hourly" placeholder="0">
                            </div>
                            <div class="col-md-3" style="padding-left: 0px;">
                                <label for="">Pickup Hours</label>
                                <input type="number" class="form-control" name="pickup_hours" id="pickup_hours"
                                    placeholder="0">
                            </div>
                        </div>
                        <div class="row mb-2" style="padding: 8px -8px 11px 11px;">
                            <div class="col-md-5">
                                <label for="category">Category</label>
                                <select name="category" class="form-control" onchange="getVehicleByCategoryHourly(this)"
                                    id="category">
                                    <option value="">Choose Category</option>
                                    <option value="Business">Business</option>
                                    <option value="Economy">Economy</option>
                                    <option value="First Class">First Class</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="vehicle_id">Vehicles</label>
                                <select name="vehicle_id" class="form-control" id="vehicle_id_hourly">
                                </select>
                            </div>
                        </div>
                        <h2 style="padding:13px 7px 13px 0px;" class="modelheadings">Driver Information:</h2>
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
                        <h2 class="modelheadings">Fare:</h2>
                        <div class="row mb-2" style="padding: 10px;">
                            <div class="col-md-3" style="padding: 6px;">
                                <label for="">Fare</label>
                                <input type="text" class="form-control" name="auto_fare" id="auto_fare"
                                    placeholder="Auto Fare">
                            </div>
                            <!--<div class="col-md-3">-->
                            <!--    <label for="">Trip Fare</label>-->
                            <!--    <input type="text" class="form-control" name="trip_fare" placeholder="Trip Fare">-->
                            <!--</div>-->
                        </div>

                    </div>
                    <div class="container fullday-div d-none">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Pick & Drop</label>
                                <input type="text" class="form-control" name="booking_pickup_full_day"
                                    id="booking_pickup_full_day" placeholder="936 Route">
                            </div>
                            <div class="col-md-3">
                                <label for="">To</label>
                                <input type="text" class="form-control" name="booking_drop_full_day"
                                    id="booking_drop_full_day" placeholder="936 Route">
                            </div>
                        </div>
                        <div class="row mb-2" style="padding: 20px 0px 8px 0px;">
                            <div class="col-md-3">
                                <label for="">Pick Up Date</label>
                                <input type="date" class="form-control" name="booking_pickup_date_full_day"
                                    id="booking_pickup_date_full_day" placeholder="">
                            </div>
                            <div class="col-md-3">
                                <label for="">Pick Up Time</label>
                                <input type="time" class="form-control" name="booking_drop_time_full_day"
                                    id="booking_drop_time_full_day" placeholder="936 Kiehn Route">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label for="">Passangers</label>
                                <input type="number" class="form-control" name="passengers_full_day"
                                    id="passengers_full_day" placeholder="1">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-5">
                                <label for="category">Category</label>
                                <select name="category" class="form-control" onchange="getVehicleByCategoryFull(this)"
                                    id="category">
                                    <option value="">Choose Category</option>
                                    <option value="Economy">Economy</option>
                                    <option value="Business">Business</option>
                                    <option value="First Class">First Class</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="vehicle_id">Vehicles</label>
                                <select name="vehicle_id" class="form-control" id="vehicle_id_full">
                                </select>
                            </div>
                        </div>
                        <h2 class="modelheadings">Driver Information:</h2>
                        <div class="row mb-2" style="padding-top: 10px;">
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
                        <h2 class="modelheadings">Fare:</h2>
                        <div class="row mb-2" style="padding: 15px;">
                            <div class="col-md-3" style="padding-left: 0px;">
                                <label for="">Auto Fare</label>
                                <input type="text" class="form-control" name="auto_fare" id="auto_fare"
                                    placeholder="Auto Fare">
                            </div>
                            <div class="col-md-3">
                                <label for="">Trip Fare</label>
                                <input type="text" class="form-control" name="trip_fare" placeholder="Trip Fare">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3" style="padding:0px 6px 5px 13px ;">
                        <a href="{{ url('rides') }}"><button type="button" data-dismiss="modal" aria-label="Close"
                                class="btn btn-white"
                                style=" box-shadow: 0px 4px 4px 0px #00000040;    margin-top: -5px; margin-right: 10px;">&#8592;
                                Back</button></a>
                        <button type="submit" class="btn btn-dark ">Submit</button>
                    </div>
                </div>

            </form>
            </div>
        </div>
        </form>
        </div>
    </main>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const input1 = document.getElementById('booking_pickup_airport');
        const autocomplete1 = new google.maps.places.Autocomplete(input1, {
            types: ['geocode'], // You can restrict the search to geographical locations
        });
        const input2 = document.getElementById('booking_drop_airport');
        const autocomplete2 = new google.maps.places.Autocomplete(input2, {
            types: ['geocode'], // You can restrict the search to geographical locations
        });


        const input3 = document.getElementById('booking_pickup_hourly');
        const autocomplete3 = new google.maps.places.Autocomplete(input3, {
            types: ['geocode'], // You can restrict the search to geographical locations
        });
        const input4 = document.getElementById('booking_drop_hourly');
        const autocomplete4 = new google.maps.places.Autocomplete(input4, {
            types: ['geocode'], // You can restrict the search to geographical locations
        });


        const input5 = document.getElementById('booking_pickup_full_day');
        const autocomplete5 = new google.maps.places.Autocomplete(input5, {
            types: ['geocode'], // You can restrict the search to geographical locations
        });
        const input6 = document.getElementById('booking_drop_full_day');
        const autocomplete6 = new google.maps.places.Autocomplete(input6, {
            types: ['geocode'], // You can restrict the search to geographical locations
        });


    });
</script>

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

    function getVehicleByCategoryHourly(obj) {
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
                $('#vehicle_id_hourly').empty();
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
                        $('#vehicle_id_hourly').append(html);

                        data.forEach(vehicle => {
                            $('#auto_fare').val(vehicle.fare);
                        });

                    } else {
                        html += `<option>No Vehicle Found</option>`;
                        $('#vehicle_id_hourly').append(html);
                    }
                }
            }
        });
    }

    function getVehicleByCategoryFull(obj) {
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
                $('#vehicle_id_full').empty();
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
                        $('#vehicle_id_full').append(html);

                        data.forEach(vehicle => {
                            $('#auto_fare').val(vehicle.fare);
                        });

                    } else {
                        html += `<option>No Vehicle Found</option>`;
                        $('#vehicle_id_full').append(html);
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
<script>
    function toggleDriverSelect(obj) {
        var status = $(obj).val();
        var driverSelectRow = $('#driver_select_row');
        if (status === 'Driver Assigned') {
            driverSelectRow.show();
            getDrivers();
        } else {
            driverSelectRow.hide();
        }
    }

    function getDrivers() {
        $.ajax({
            type: "GET",
            url: "{{ route('rides.driver') }}",
            beforeSend: function() {
                $('#driver_id').empty();
            },
            success: function(response) {
                if (response.status) {
                    // console.log(response);
                    let data = response.driver;
                    let html = '<option value="">Select Driver</option>';
                    if (data.length > 0) {
                        data.forEach(driver => {
                            html +=
                                `<option value="${driver.id}">${driver.firstname} ${driver.lastname}</option>`;
                        });
                    } else {
                        html += `<option>No Driver Found</option>`;
                    }
                    $('#driver_id').append(html);
                } else {
                    $('#driver_id').append('<option>Error: Unexpected response format</option>');
                }
            },
            error: function(xhr, status, error) {
                console.error("Error fetching drivers:", error);
                console.log("XHR:", xhr);
                console.log("Status:", status);
                $('#driver_id').append('<option>Error fetching drivers</option>');
            }
        });
    }
</script>
