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
                    Customer has been registered successfully.
                </div>
            @elseif (session('status_save') === 'false')
                <div class="ecs_alert alert alert-danger" role="alert">
                    <b>Error:</b> Your customer could not be register.
                </div>
            @endif

            <!-- Edit -->
            @if (session('status_edit') === 'true')
                <div class="ecs_alert alert alert-success" role="alert">
                    Customer has been updated successfully.
                </div>
            @elseif (session('status_edit') === 'false')
                <div class="ecs_alert alert alert-danger" role="alert">
                    <b>Error:</b> Your customer could not be update.
                </div>
            @endif

            <form action="{{ url('/drivers/update/' . $driver->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="adddrivermain">
                    <div>
                        <img class="driverimage" src="{{ asset('/uploads/' . $driver->img) }}">
                        <button class="driverbutton">Upload Photo</button>
                    </div>

                    <hr class="ecs-custom-divder mt-3" />
                    <div class="personaldetails">Personal Details</div>

                    <div class="d-flex flex-row justify-content-between mt-4 flex-wrap" style="width: 90%">
                        <div class="mb-2">
                            <p class="driverinputnames">First Name</p>
                            <input class="driverinputs" placeholder="Enter Name" type="text" name="firstname"
                                value="{{ $driver->firstname }}">
                        </div>
                        <div class="mb-2">
                            <p class="driverinputnames">Last Name</p>
                            <input class="driverinputs" placeholder="Enter Name" type="text" name="lastname"
                                value="{{ $driver->lastname }}">
                        </div>
                        <div>
                            <p class="driverinputnames">Number</p>
                            <input class="driverinputs" placeholder="Enter Number" type="number" name="phone_number"
                                value="{{ $driver->phone_number }}">
                        </div>
                        <div>
                            <p class="driverinputnames">Iqama Number</p>
                            <input class="driverinputs" placeholder="Enter Iqama Number" type="text" name="iqama_number"
                                value="{{ $driver->iqama_number }}">
                        </div>
                        <div>
                            <p class="driverinputnames">Enter Email </p>
                            <input type="email" class="driverinputs" placeholder="Enter Email" name="email"
                                value="{{ $driver->email_addr }}">
                        </div>
                    </div>

                    <div class="d-flex flex-row gap-5 mt-4 flex-wrap" style="width: 90%;">
                        <div class="mt-3">
                            <p class="driverinputnames">Choose vehicle</p>
                            <select class="form-control" name="vehicles" id="vehicleSelect" required>
                                @php
                                    $vehicle_data = DB::table('vehicles')->get();
                                @endphp
                                @if (!empty($vehicle_data))
                                    <option value="" selected disabled>Choose vehicle</option>
                                    @foreach ($vehicle_data as $key => $value)
                                        <option value="{{ $value->id }}">
                                            {{ $value->reg_no }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="d-flex flex-row justify-content-between mt-4 flex-wrap">
                            <label for="driver_img">Image</label>
                            <input type="file" class="form-control" name="driver_img" id="driver_img"
                                accept="image/png, image/gif, image/jpeg" required>
                        </div>
                        
                        
                    </div>
                    <div class="d-flex flex-row gap-5 mt-4 flex-wrap" style="width: 90%;">
                        

                        <div class="d-flex flex-row mt-5 justify-content-end">
                            <a class="bigbutton bg-light text-dark" style="border:1px solid black;"
                                href="{{ url('drivers') }}">Back</a>
                            <button type="submit" class="bigbutton pt-0">Submit</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#vehicleSelect').change(function() {
                var selectedId = $(this).val();
                console.log('Selected Vehicle ID:', selectedId);

                // Send AJAX request
                $.ajax({
                    url: '/getvehicle', // Replace with your route
                    method: 'GET', // or 'POST' depending on your route
                    data: {
                        vehicle_id: selectedId
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log('Response:', response);

                        // Update HTML elements with the response data
                        $('#vehicleCategory').text(response.category);
                        $('#vehicleName').text(response.name);
                        $('#plateNo').text(response.plate_no);
                        $('#vehicleModelYear').text(response.model_year);
                        $('#vehicleColor').text(response.color);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            });
        });
    </script>
    <!-- ./Vehicle -->
@endsection
