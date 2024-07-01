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

            <form action="{{ url('/customers/store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="adddrivermain">
                    <div>
                        <img class="driverimage" src="./assets/images/no driver.jpeg" alt="No driver">
                        <button class="driverbutton ">Upload Photo</button>
                    </div>

                    <hr class="ecs-custom-divder mt-3" />
                    <div class="personaldetails">Personal Details</div>

                    <div class="d-flex flex-row justify-content-between mt-4 flex-wrap" style="width: 90%">
                        <div class="mb-2">
                            <p class="driverinputnames">Name</p>
                            <input class="driverinputs" placeholder="Enter Name" type="text" name="name">
                        </div>
                        <div>
                            <p class="driverinputnames">Enter Number</p>
                            <input class="driverinputs" placeholder="Enter Number" type="number" name="mobile_number">
                        </div>
                        <div>
                            <p class="driverinputnames">Enter Iqama Number</p>
                            <input class="driverinputs" placeholder="Enter Iqama Number" type="text" name="iqama_number">
                        </div>
                        <div>
                            <p class="driverinputnames">Enter Email </p>
                            <input type="email" class="driverinputs" placeholder="Enter Email" type="email"
                                name="email">
                        </div>

                    </div>

                    <div class="d-flex flex-row justify-content-between mt-4 flex-wrap" style="width: 90%">

                        <div>
                            <p class="driverinputnames">Nationalality</p>
                            <input class="driverinputs" placeholder="Enter Nationalality" type="text" name="nationality">
                        </div>
                        <div>
                            <p class="driverinputnames">Company</p>
                            <input class="driverinputs" placeholder="Enter Company" type="text" name="company">
                        </div>
                        <div>
                            <p class="driverinputnames">Department</p>
                            <input class="driverinputs" placeholder="Enter Department" type="text" name="department">
                        </div>
                        <div>
                            <p class="driverinputnames">Designation</p>
                            <input class="driverinputs" placeholder="Enter Designantion" type="text" name="designation">
                        </div>
                    </div>

                    <div class="d-flex flex-row gap-5 mt-4 flex-wrap" style="width: 90%">

                        <div class="justify-content-start">
                            <label for="customer_img">Image</label>
                            <input type="file" class="form-control" name="customer_img" id="customer_img"
                                accept="image/png, image/gif, image/jpeg" required>
                        </div>
                        <div class="d-flex flex-row mt-5  justify-content-end">
                            <a class="bigbutton bg-light text-dark " style="border:1px solid black;"
                                href="{{ url('customers') }}">Back</a>
                            <button type="submit " class="bigbutton pt-0">Submit </button>
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
