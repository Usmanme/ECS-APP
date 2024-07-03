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

            <div class="d-flex flex-row justify-content-between text-light">
                <div class="ecs-card-header-left">
                    <span class="heading pageheading">Drivers</span>
                    @php
                        $drivers = DB::table('drivers')->get();
                    @endphp
                    <span class="stats totalnumber"><span class="num">{{ count($drivers) }}</span></span>
                </div>
                <div class="d-flex flex-row">
                    <span class="material-symbols-outlined p-2">
                        refresh
                    </span>
                    <span class="material-symbols-outlined p-2">
                        download
                    </span>
                    <a class="bigbutton" href="{{ url('newdriver') }}">Add Driver</a>
                </div>
            </div>
            <div class="miniheading">(Total Drivers)</div>

            <div class="text-end ">
                <span class="material-symbols-outlined searchicon"> search </span>
                <input class="searchbars" id="myInput" onkeyup="myFunction()" placeholder="Search" type="text">
            </div>

            <div class="ecs-table-card">
                {{-- <p class="ecs-table-heading-main">Drivers</p> --}}
                <div class="ecs-table-container">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-hover">
                            <thead class="ecs-custom-header">
                                <tr>
                                    <th>ID</th>
                                    <th>Driver</th>
                                    <th>Email Address</th>
                                    <th>Number</th>
                                    <th>Vehicle Assigned</th>
                                    <th>Status</th>
                                    <th>Vehicle Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="ecs-custom-body">
                                @if (!empty($data))
                                    @foreach ($data as $key => $value)
                                        <tr>
                                            <td>{{ $value->phone_number }}</td>
                                            <td>
                                                <div class="nameentry">
                                                    <img height="70px ;"
                                                        src="{{ $value->img != '' ? asset('/uploads/' . $value->img) : asset('/assets/images/avarat.png') }}"
                                                        class="customerpic mb-3">
                                                    <p>{{ $value->firstname . ' ' . $value->lastname }}</p>
                                                </div>
                                            </td>
                                            <td>{{ $value->email_addr }}</td>
                                            <td>{{ $value->phone_number }}</td>
                                            <td></td>
                                            <td>
                                                <div class="booking_status">Available</div>
                                            </td>
                                            <td></td>
                                            <td>
                                                <a href="{{ url('editdriver/' . $value->id) }}">
                                                    <img src="{{ url('/assets/images/edit-icon.png') }}">
                                                </a>
                                            </td>
                                            <input type="hidden" data-firstname="{{ $value->firstname }}"
                                                data-lastname="{{ $value->lastname }}"
                                                data-phone_number="{{ $value->phone_number }}"
                                                data-iqama_number="{{ $value->iqama_number }}"
                                                data-email_addr="{{ $value->email_addr }}"
                                                data-img="{{ $value->img != '' ? asset('/uploads/' . $value->img) : asset('/assets/images/avarat.png') }}">
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="ecs-table-pagination-main">
                        <form method="GET" action="{{ route('drivers') }}" style="display: flex">
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
    <!-- ./Vehicle -->



    <!-- Edit Modal -->
    <div class="modal fade modal_form" id="editDriverModal" tabindex="-1" role="dialog"
        aria-labelledby="editDriverModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDriverModalLabel">Edit Driver</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" name="firstname" id="firstname"
                                placeholder="Enter First Name" required>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" name="lastname" id="lastname"
                                placeholder="Enter Last Name" required>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Number</label>
                            <input type="text" class="form-control" name="phone_number" id="phone_number"
                                placeholder="Enter Phone Number" required>
                        </div>
                        <div class="form-group">
                            <label for="iqama_number">Iqama Number</label>
                            <input type="text" class="form-control" name="iqama_number" id="iqama_number"
                                placeholder="Enter Iqama Number" required>
                        </div>
                        <div class="form-group">
                            <label for="email_addr">Email Address</label>
                            <input type="text" class="form-control" name="email_addr" id="email_addr"
                                placeholder="Enter Email Address" required>
                        </div>
                        <div class="form-group">
                            <label for="driver_img">Vehicle</label>
                            <select name="vehicle_id" class="form-control" id="vehicle_id">
                                @forelse ($vehicle_data as $vehicle)
                                    <option value="{{ $vehicle->id }}">{{ $vehicle->reg_no }}</option>
                                @empty
                                    <option value="">--No Vehicle Found--</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="driver_img">Image</label>
                            <input type="file" class="form-control" name="driver_img" id="driver_img"
                                accept="image/png, image/gif, image/jpeg">
                            <img src="" class="edit_modal_img">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-black">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Edit Modal -->
@endsection
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
</script>
