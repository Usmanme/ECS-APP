@extends('layouts.app-master')

@section('content')
    <!-- Sidebar -->
    @include('layouts.partials.left-sidebar')
    <!-- Sidebar -->
    <!-- Navbar -->
    @include('layouts.partials.nav')
    <!-- Navbar -->

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

            <div class="d-flex flex-row justify-content-between text-light">
                <div class="ecs-card-header-left">
                    <span class="heading pageheading">Vehicles</span>
                    @php
                        $vehicles = DB::table('vehicles')->get();
                    @endphp
                    <span class="stats totalnumber"><span class="num">{{ count($vehicles) }}</span></span>
                </div>
                <div class="d-flex flex-row">
                    <span class="material-symbols-outlined p-2">
                        refresh
                    </span>
                    <span class="material-symbols-outlined p-2">
                        download
                    </span>
                    <a class="bigbutton" href="{{ url('newvehicle') }}">Add Vehicle</a>
                </div>
            </div>
            <div class="miniheading">(Registered)</div>
            <div class="text-end "> <span class="material-symbols-outlined searchicon"> search
            </span><input class="searchbars" placeholder="Search" type="text"></div>

            <div class="ecs-table-card">
                {{-- <p class="ecs-table-heading-main">Vehicles</p> --}}
                <div class="ecs-table-container">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="ecs-custom-header">
                                <tr>
                                    <td>ID</td>
                                    <th>Image</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Year</th>
                                    <th>Registration Number</th>
                                    <th>Passenger Capacity</th>
                                    <th>Category</th>
                                    <th>Insurance</th>
                                    <th>Color</th>
                                    <th>Attachment</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="ecs-custom-body">
                                @if (!empty($data))
                                    @foreach ($data as $key => $value)
                                        <tr>
                                            <td>{{ $value->reg_no }}</td>

                                            <td>
                                                <div class="nameentry">
                                                    <img width="100px" src="{{ $value->img != '' ? asset('/uploads/' . $value->img) : asset('/assets/images/avarat.png') }}"
                                                        class="customerpic">
                                                </div>
                                            </td>
                                            <td>{{ $value->brand }}</td>
                                            <td>{{ $value->model }}</td>
                                            <td>{{ $value->year }}</td>
                                            <td>{{ $value->reg_no }}</td>
                                            <td>{{ $value->pass_cap }}</td>
                                            <td>{{ $value->category }}</th>
                                            <td>{{ $value->insurance }}</td>
                                            <td>{{ $value->color }}</td>
                                            <th>
                                                <a href="{{ $value->attachment != '' ? asset('/uploads/' . $value->attachment) : '#' }}"
                                                    target="_blank">View</a>
                                            </th>
                                            <td>
                                                <a href="javascript:void(0)" class="edit_vehicle_btn"
                                                    data-target="#editVehicleModal" data-toggle="modal"
                                                    data-edit_action="{{ url('/vehicles/update/' . $value->id) }}">
                                                    <img src="{{ url('/assets/images/edit-icon.png') }}">
                                                </a>
                                            </td>
                                            <input type="hidden" data-brand="{{ $value->brand }}"
                                                data-model="{{ $value->model }}" data-year="{{ $value->year }}"
                                                data-type="{{ $value->type }}" data-code="{{ $value->code }}"
                                                data-reg_no="{{ $value->reg_no }}" data-pass_cap="{{ $value->pass_cap }}"
                                                data-category="{{ $value->category }}"
                                                data-insurance="{{ $value->insurance }}" data-color="{{ $value->color }}"
                                                data-fare="{{ $value->fare }}"
                                                data-destination-type="{{ $value->destination_type }}"
                                                data-img="{{ $value->img != '' ? asset('/uploads/' . $value->img) : asset('/assets/images/avarat.png') }}"
                                                data-attachment="{{ $value->attachment != '' ? asset('/uploads/' . $value->attachment) : '#' }}">
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="ecs-table-pagination-main">
                        <p class="rows-txt">Rows per page</p>
                        <select class="custom-pages-ddl">
                            <option>25</option>
                            <option>55</option>
                            <option>75</option>
                        </select>
                        <p class="rows-txt">1-75 of 89,33</p>
                        <div class="rows-clicks-main">



                            <img src="{{ asset('assets/icons/fast-left.png') }}" alt="arrow-fast-left" />
                            <img src="{{ asset('assets/icons/left.png') }}" alt="arrow-left" />
                            <img src="{{ asset('assets/icons/right.png') }}" alt="arrow-right" />
                            <img src="{{ asset('assets/icons/fast-right.png') }}" alt="arrow-fast-right" />
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- ./Vehicle -->

    <!-- Add Modal -->
    <div class="modal fade modal_form" id="addVehicleModal" tabindex="-1" role="dialog"
        aria-labelledby="addVehicleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addVehicleModalLabel">Add New Vehicle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/vehicles/store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="vehicle_brand">Brand</label>
                            <input type="text" class="form-control" name="vehicle_brand" id="vehicle_brand"
                                placeholder="Enter Brand" required>
                        </div>
                        <div class="form-group">
                            <label for="vehicle_model">Model</label>
                            <input type="text" class="form-control" name="vehicle_model" id="vehicle_model"
                                placeholder="Enter Model" required>
                        </div>
                        <div class="form-group">
                            <label for="vehicle_year">Year</label>
                            <input type="text" class="form-control" name="vehicle_year" id="vehicle_year"
                                placeholder="Enter Year" required>
                        </div>
                        <div class="form-group">
                            <label for="vehicle_type">Type</label>
                            <input type="text" class="form-control" name="vehicle_type" id="vehicle_type"
                                placeholder="Enter Type" required>
                        </div>
                        <!--<div class="form-group">-->
                        <!--    <label for="vehicle_code">Code</label>-->
                        <!--    <input type="text" class="form-control" name="vehicle_code" id="vehicle_code"-->
                        <!--        placeholder="Enter Code" required>-->
                        <!--</div>-->
                        <div class="form-group">
                            <label for="registration_no">Registration No.</label>
                            <input type="text" class="form-control" name="registration_no" id="registration_no"
                                placeholder="Enter Registration No." required>
                        </div>
                        <div class="form-group">
                            <label for="vehicle_pass_cap">Passenger Capacity</label>
                            <input type="text" class="form-control" name="vehicle_pass_cap" id="vehicle_pass_cap"
                                placeholder="Enter Passenger Capacity" required>
                        </div>
                        <!-- <div class="form-group">-->
                        <!--    <label for="luggage">Luggage</label>-->
                        <!--    <input type="text" class="form-control" name="luggage" id="luggage"-->
                        <!--        placeholder="Enter Luggage" required>-->
                        <!--</div>-->
                        <div class="form-group">
                            <label for="vehicle_category">Category</label>
                            <input type="text" class="form-control" name="vehicle_category" id="vehicle_category"
                                placeholder="Enter Category" required>
                        </div>
                        <div class="form-group">
                            <label for="vehicle_insurance">Insurance</label>
                            <input type="text" class="form-control" name="vehicle_insurance" id="vehicle_insurance"
                                placeholder="Enter Insurance" required>
                        </div>
                        <div class="form-group">
                            <label for="vehicle_color">Color</label>
                            <input type="text" class="form-control" name="vehicle_color" id="vehicle_color"
                                placeholder="Enter Color" required>
                        </div>
                        <!--<div class="form-group">-->
                        <!--    <label for="vehicle_destination_type">Destination Type</label>-->
                        <!--    <select name="vehicle_destination_type" id="vehicle_destination_type" class="form-control">-->
                        <!--        <option value="airport">Airport</option>-->
                        <!--        <option value="fullday">Full Day</option>-->
                        <!--        <option value="hourly">Hourly</option>-->
                        <!--        <option value="pointtopoint">Point to Point</option>-->
                        <!--    </select>-->
                        <!--</div>-->
                        <!--<div class="form-group">-->
                        <!--    <label for="vehicle_fare">Fare</label>-->
                        <!--    <input type="text" class="form-control" name="vehicle_fare" id="vehicle_fare"-->
                        <!--        placeholder="Enter Fare" required>-->
                        <!--</div>-->
                        <div class="form-group">
                            <label for="vehicle_img">Car Image</label>
                            <input type="file" class="form-control" name="vehicle_img" id="vehicle_img"
                                accept="image/png, image/gif, image/jpeg" required>
                        </div>
                        <div class="form-group">
                            <label for="vehicle_attachment">Registration Attachment</label>
                            <input type="file" class="form-control" name="vehicle_attachment" id="vehicle_attachment"
                                accept=".pdf" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-black">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Add Modal -->

    <!-- Edit Modal -->
    <div class="modal fade modal_form" id="editVehicleModal" tabindex="-1" role="dialog"
        aria-labelledby="editVehicleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editVehicleModalLabel">Edit Vehicle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="vehicle_brand">Brand</label>
                            <input type="text" class="form-control" name="vehicle_brand" id="vehicle_brand"
                                placeholder="Enter Brand" required>
                        </div>
                        <div class="form-group">
                            <label for="vehicle_model">Model</label>
                            <input type="text" class="form-control" name="vehicle_model" id="vehicle_model"
                                placeholder="Enter Model" required>
                        </div>
                        <div class="form-group">
                            <label for="vehicle_year">Year</label>
                            <input type="text" class="form-control" name="vehicle_year" id="vehicle_year"
                                placeholder="Enter Year" required>
                        </div>
                        <div class="form-group">
                            <label for="vehicle_type">Type</label>
                            <input type="text" class="form-control" name="vehicle_type" id="vehicle_type"
                                placeholder="Enter Type" required>
                        </div>
                        <div class="form-group">
                            <label for="vehicle_code">Code</label>
                            <input type="text" class="form-control" name="vehicle_code" id="vehicle_code"
                                placeholder="Enter Code" required>
                        </div>
                        <div class="form-group">
                            <label for="registration_no">Registration No.</label>
                            <input type="text" class="form-control" name="registration_no" id="registration_no"
                                placeholder="Enter Registration No." required>
                        </div>
                        <div class="form-group">
                            <label for="vehicle_pass_cap">Passenger Capacity</label>
                            <input type="text" class="form-control" name="vehicle_pass_cap" id="vehicle_pass_cap"
                                placeholder="Enter Passenger Capacity" required>
                        </div>
                        <div class="form-group">
                            <label for="vehicle_category">Category</label>
                            <input type="text" class="form-control" name="vehicle_category" id="vehicle_category"
                                placeholder="Enter Category" required>
                        </div>
                        <div class="form-group">
                            <label for="vehicle_insurance">Insurance</label>
                            <input type="text" class="form-control" name="vehicle_insurance" id="vehicle_insurance"
                                placeholder="Enter Insurance" required>
                        </div>
                        <div class="form-group">
                            <label for="vehicle_color">Color</label>
                            <input type="text" class="form-control" name="vehicle_color" id="vehicle_color"
                                placeholder="Enter Color" required>
                        </div>
                        <div class="form-group">
                            <label for="vehicle_destination_type">Destination Type</label>
                            <select name="vehicle_destination_type" id="vehicle_destination_type" class="form-control">
                                <option value="" selected disabled>Choose destination type</option>
                                <option value="airport">Airport</option>
                                <option value="fullday">Full Day</option>
                                <option value="hourly">Hourly</option>
                                <option value="pointtopoint">Point to Point</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="vehicle_fare">Fare</label>
                            <input type="text" class="form-control" name="vehicle_fare" id="vehicle_fare"
                                placeholder="Enter Fare" required>
                        </div>
                        <div class="form-group">
                            <label for="vehicle_img">Image</label>
                            <input type="file" class="form-control" name="vehicle_img" id="vehicle_img"
                                accept="image/png, image/gif, image/jpeg">
                            <img src="" class="edit_modal_img">
                        </div>
                        <div class="form-group">
                            <label for="vehicle_attachment">Attachment</label>
                            <input type="file" class="form-control" name="vehicle_attachment" id="vehicle_attachment"
                                accept=".pdf">
                            <a href="" class="edit_modal_attachment">View</a>
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
    function toggleSidebar() {
        const sidebar = document.getElementById("sidebarleft");
        const mainContent = document.getElementById("booking_right_part");
        const onnav = document.getElementById("onnav");
        const onmain = document.getElementById("onmain");
        if (sidebar.classList.contains("widthsideberopen")) {
            sidebar.classList.remove("widthsideberopen");
            mainContent.classList.remove("widthmainopen");
            sidebar.classList.add("widthsideberclose");
            mainContent.classList.add("widthmainclose");
            onmain.classList.remove("hidebars");
            onmain.classList.add("showbars");

        } else {
            sidebar.classList.remove("widthsideberclose");
            mainContent.classList.remove("widthmainclose");
            sidebar.classList.add("widthsideberopen");
            mainContent.classList.add("widthmainopen");
            onmain.classList.add("hidebars");
            onmain.classList.remove("showbars");
        }
    }
</script>
