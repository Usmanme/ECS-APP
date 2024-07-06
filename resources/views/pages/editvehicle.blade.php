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
                    Vehicle has been registered successfully.
                </div>
            @elseif (session('status_save') === 'false')
                <div class="ecs_alert alert alert-danger" role="alert">
                    <b>Error:</b> Your vehicle could not be register.
                </div>
            @endif

            <!-- Edit -->
            @if (session('status_edit') === 'true')
                <div class="ecs_alert alert alert-success" role="alert">
                    Vehicle has been updated successfully.
                </div>
            @elseif (session('status_edit') === 'false')
                <div class="ecs_alert alert alert-danger" role="alert">
                    <b>Error:</b> Your vehicle could not be update.
                </div>
            @endif

            <form action="{{ url('/vehicles/update/' . $vehicle->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="adddrivermain">
                    <div>
                        <img class="driverimage" src="{{ asset('/uploads/' . $vehicle->img) }}">
                        <button  class="driverbutton " data-toggle="modal" data-target="#vehicleModal">Upload Photo</button>
                    </div>

                    <div class="modal fade" id="vehicleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="background: white;">
                            </div>
                            <div class="modal-body m-auto mb-4">
                                <p class="logoutsure">Upload Picture</p>
                                <div class="form-group">
                                    <label for="vehicle_img">Car Image</label>
                                    <input type="file" class="form-control" name="vehicle_img" id="vehicle_img"
                                        accept="image/png, image/gif, image/jpeg" >
                                </div>
                            </div>
                            <div class=" m-auto d-flex flex-row " style="gap: 17px;padding-bottom:27px;">
                                <button type="button" class="rideseditsubmit"
                                    style="width: 160px;background-color:white;border:2px solid red;color:red"
                                    data-dismiss="modal">Close</button>
                                <button data-dismiss="modal" class=" rideseditsubmit"
                                    style="width: 160px; ">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

                    <hr class="ecs-custom-divder mt-3" />
                    <div class="personaldetails">Vehicle Details</div>

                    <div class="d-flex flex-row justify-content-between mt-4 flex-wrap" style="width: 90%">
                        <div class="mb-2">
                            <label class="driverinputnames" id="vehicle_brand">Brand</label>
                            <input type="text" class="form-control" name="vehicle_brand" id="vehicle_brand"
                                placeholder="Enter Brand" required value="{{ $vehicle->brand }}">
                        </div>
                        <div class="mb-2">
                            <label for="vehicle_model">Model</label>
                            <input type="text" class="form-control" name="vehicle_model" id="vehicle_model"
                                placeholder="Enter Model" required value="{{ $vehicle->model }}">
                        </div>
                        <div class="mb-2">
                            <label for="vehicle_year">Year</label>
                            <input type="text" class="form-control" name="vehicle_year" id="vehicle_year"
                                placeholder="Enter Year" required value="{{ $vehicle->year }}">
                        </div>
                        <div class="mb-2">
                            <label for="vehicle_type">Type</label>
                            <input type="text" class="form-control" name="vehicle_type" id="vehicle_type"
                                placeholder="Enter Type" required value="{{ $vehicle->type }}">
                        </div>
                    </div>

                    <div class="d-flex flex-row justify-content-between mt-4 flex-wrap" style="width: 90%">
                        <div class="mb-2">
                            <label for="registration_no">Registration No.</label>
                            <input type="text" class="form-control" name="registration_no" id="registration_no"
                                placeholder="Enter Registration No." required value="{{ $vehicle->reg_no }}">
                        </div>
                        <div class="mb-2">
                            <label for="vehicle_pass_cap">Passenger Capacity</label>
                            <input type="text" class="form-control" name="vehicle_pass_cap" id="vehicle_pass_cap"
                                placeholder="Enter Passenger Capacity" required value="{{ $vehicle->pass_cap }}">
                        </div>
                        <div class="mb-2">
                            <label for="vehicle_category">Category</label>
                            <input type="text" class="form-control" name="vehicle_category" id="vehicle_category"
                                placeholder="Enter Category" required value="{{ $vehicle->category }}">
                        </div>
                        <div class="mb-2">
                            <label for="vehicle_insurance">Insurance</label>
                            <input type="text" class="form-control" name="vehicle_insurance" id="vehicle_insurance"
                                placeholder="Enter Insurance" required value="{{ $vehicle->insurance }}">
                        </div>
                    </div>

                    <div class="d-flex flex-row  mt-4 flex-wrap" style="width: 90%;gap:60px;">
                        <div class="mb-2">
                            <label for="vehicle_color">Color</label>
                            <input type="text" class="form-control" name="vehicle_color" id="vehicle_color"
                                placeholder="Enter Color" required value="{{ $vehicle->color }}">
                        </div>

                        
                        <div class="mb-2">
                            <label for="vehicle_attachment">Registration Attachment</label>
                            <input type="file" class="form-control" name="vehicle_attachment" id="vehicle_attachment"
                                accept=".pdf" >
                        </div>
                    </div>

                    <div class="d-flex flex-row mt-5  justify-content-end">
                        <a class="bigbutton bg-light text-dark " style="border:1px solid black;"
                            href="{{ url('drivers') }}">Back</a>
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
