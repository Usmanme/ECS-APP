@extends('layouts.app-master')
<style>

</style>
@section('content')
    <!-- Sidebar -->
    @include('layouts.partials.left-sidebar')
    <!-- Sidebar -->
    <!-- Navbar -->
    @include('layouts.partials.nav')
    <!-- Navbar -->
    <!-- Ride -->
    <main class="ecs-main-body" style="height: 100vh;">
        <div class="container-fluid pt-4">


            <!-- Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background: black;">
                            <h5 class="modal-title m-auto text-light" id="exampleModalLabel">Edit Rides</h5>
                        </div>
                        <form action="{{ route('ride.update') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="modal-body m-auto">
                                <input type="hidden" name="ride_id" id="ride_id">
                                <select name="status" class="selectmodal" id="edit_status"
                                    style="text-align-center; margin-left:40px">
                                    <option value="">Select Status</option>
                                    <option value="Created">Ride Created</option>
                                    <option value="Driver Assigned">Driver Assigned</option>
                                    <option value="Completed">Completed</option>
                                </select>
                                @php
                                    $drivers = DB::table('drivers')->get();
                                @endphp
                                <select name="driver_assigned_option" class="selectmodal" id="driver_assigned_option"
                                    style="display: none; text-align-center; margin-left:40px">
                                    <option value="">Select Option</option>
                                    @foreach ($drivers as $driver)
                                        <option value="{{ $driver->id }}">{{ $driver->firstname . $driver->lastname }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="modal-footer m-auto">
                                <button type="submit" class="rideseditsubmit m-auto">Submit</button>
                            </div>
                        </form>
                    </div>
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

            <div class="d-flex flex-row justify-content-between text-light">
                <div class="ecs-card-header-left">
                    <span class="heading pageheading">Rides</span>
                    @php
                        $rides = DB::table('rides')->get();
                    @endphp
                    <span class="stats totalnumber"><span class="num">{{ count($rides) }}</span></span>
                </div>
                <div class="d-flex flex-row">
                    <span class="material-symbols-outlined p-2">
                        refresh
                    </span>
                    <span class="material-symbols-outlined p-2">
                        download
                    </span>
                    <a class="bigbutton" href="{{ url('newride') }}">Book A Ride</a>
                </div>
            </div>
            <div class="miniheading">(Total Rides)</div>
            <div class="text-end "> <span class="material-symbols-outlined searchicon"> search
                </span><input class="searchbars" id="myInput" onkeyup="myFunction()" placeholder="Search" type="text">
            </div>


            <div class="ecs-table-card">
                {{-- <p class="ecs-table-heading-main">Drivers</p> --}}
                <div class="ecs-table-container">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-hover">
                            <thead class="ecs-custom-header">
                                <tr>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Ride Date</th>
                                    <th>Pick Up</th>
                                    <th>Drop Up</th>
                                    <th>Driver</th>
                                    <th>Vehicle</th>
                                    <th>Category</th>
                                    <th>Passenger</th>
                                    <th>Status</th>
                                    <th>Fare</th>
                                    <!--<th>Action</th>-->
                                </tr>
                            </thead>
                            <tbody class="ecs-custom-body">
                                @if (!empty($data))
                                    @foreach ($data as $key => $value)
                                        <tr>
                                            <!--<td>{{ $value->id }}</td>-->
                                            <td><a href="{{ route('rides.edits', $value->id) }}">{{ $value->id }}</a>
                                            </td>
                                            <td>
                                                <div class="nameentry">
                                                    {{-- <img width="100px" src="{{ asset('/assets/images/avarat.png') }}"
                                                        class="customerpic"> --}}
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
                                           <td>{{ $value->firstname . " ". $value->lastname}}</td>
                                            <td>{{ $value->car_name }}</td>
                                            <td>{{ $value->category }}</td>
                                            <td>{{ $value->passengers }}</td>
                                            <td>
                                                @if ($value->status == 'Completed')
                                                    <a href="javascript:void(0)" class="edit_ride_btn statusfont"
                                                        data-id="{{ $value->id }}"
                                                        style="color: #00CC39;  border-radius: 20px; display: inline-block; padding: 5px; border-radius: 10;">
                                                        {{ Str::ucfirst($value->status) }}
                                                    </a>
                                                @elseif ($value->status == 'Ride Created')
                                                    <a href="javascript:void(0)" class="edit_ride_btn statusfont"
                                                        data-id="{{ $value->id }}"
                                                        style="color: #FF0000;  border-radius: 20px; display: inline-block; padding: 5px; border-radius: 10;">
                                                        {{ Str::ucfirst($value->status) }}
                                                    </a>
                                                @elseif($value->status == 'Driver Assigned')
                                                    <a href="javascript:void(0)" class="edit_ride_btn statusfont"
                                                        data-id="{{ $value->id }}"
                                                        style="color: #FF0000;  border-radius: 20px; display: inline-block; padding: 5px; border-radius: 10;">
                                                        {{ Str::ucfirst($value->status) }}
                                                    </a>
                                                @elseif($value->status == 'Waiting For Payment')
                                                    <a href="javascript:void(0)" class="edit_ride_btn statusfont"
                                                        data-id="{{ $value->id }}"
                                                        style="color: #0b00da;  border-radius: 20px; display: inline-block; padding: 5px; border-radius: 10;">
                                                        {{ Str::ucfirst($value->status) }}
                                                    </a>
                                                @endif
                                            </td>
                                            <td>{{ $value->fare }} SAR</td>
                                            <!--<td>-->
                                            <!--    <a href="javascript:void(0)" class="edit_ride_button" data-id="{{ $value->id }}">-->
                                            <!--        <img src="{{ url('/assets/images/edit-icon.png') }}">-->
                                            <!--    </a>-->
                                            <!--</td>-->
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="ecs-table-pagination-main">
                        <form method="GET" action="{{ route('rides') }}" style="display: flex">
                            <p class="rows-txt">Rows per page</p>
                            <select name="per_page" class="custom-pages-ddl" style="height:23px;"
                                onchange="this.form.submit()">
                                <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                                <option value="55" {{ request('per_page') == 55 ? 'selected' : '' }}>55</option>
                                <option value="75" {{ request('per_page') == 75 ? 'selected' : '' }}>75</option>
                            </select>
                            <p class="rows-txt">{{ $data->firstItem() }}-{{ $data->lastItem() }} of {{ $data->total() }}
                            </p>
                        </form>
                        <div class="rows-clicks-main">
                            <a href="{{ $data->url(1) }}"><img src="{{ asset('assets/icons/fast-left.png') }}"
                                    alt="arrow-fast-left" /></a>
                            <a href="{{ $data->previousPageUrl() }}"><img src="{{ asset('assets/icons/left.png') }}"
                                    alt="arrow-left" /></a>
                            <a href="{{ $data->nextPageUrl() }}"><img src="{{ asset('assets/icons/right.png') }}"
                                    alt="arrow-right" /></a>
                            <a href="{{ $data->url($data->lastPage()) }}"><img
                                    src="{{ asset('assets/icons/fast-right.png') }}" alt="arrow-fast-right" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>


    <!-- Small modal -->

@endsection
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, j, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        // Loop through all table rows
        for (i = 0; i < tr.length; i++) {
            // Skip the header row (assuming it's the first row)
            if (i === 0) continue;

            // Initialize a variable to indicate if any column matches the filter
            var matchFound = false;

            // Loop through all table columns in the current row
            for (j = 0; j < tr[i].getElementsByTagName("td").length; j++) {
                td = tr[i].getElementsByTagName("td")[j];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    // Check if the current column's text matches the filter
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        matchFound = true;
                        break; // No need to check further columns in this row
                    }
                }
            }

            // Display or hide the row based on whether any column matched the filter
            if (matchFound) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }

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
                    $('#editModal').modal('show');
                    $('#ride_id').val(data.id);
                    $('#edit_status').val(data.status);
                }
            }
        });
    });


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
        console.log(ride_id);
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
<script>
    document.getElementById('edit_status').addEventListener('change', function() {
        var driverAssignedOption = document.getElementById('driver_assigned_option');
        if (this.value === 'Driver Assigned') {
            driverAssignedOption.style.display = 'block';
        } else {
            driverAssignedOption.style.display = 'none';
        }
    });
</script>
