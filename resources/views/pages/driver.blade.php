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

            <div class="ecs-table-card">
                <p class="ecs-table-heading-main">Drivers</p>
                <div class="ecs-table-container">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="ecs-custom-header">
                                <tr>
                                    <th>ID</th>
                                    <th>Driver</th>
                                    <th>Email Address</th>
                                    <th>Number</th>
                                    <th>Status</th>
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
                                                    <img height="100px"
                                                        src="{{ $value->img != '' ? asset('/uploads/' . $value->img) : asset('/assets/images/avarat.png') }}"
                                                        class="customerpic">
                                                    <p>{{ $value->firstname . ' ' . $value->lastname }}</p>
                                                </div>
                                            </td>
                                            <td>{{ $value->email_addr }}</td>
                                            <td>{{ $value->phone_number }}</td>
                                            <td>
                                                <div class="booking_status">Available</div>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)" class="edit_driver_btn"
                                                    data-target="#editDriverModal" data-toggle="modal"
                                                    data-edit_action="{{ url('/drivers/update/' . $value->id) }}">
                                                    <img height="100px" src="{{ url('/assets/images/edit-icon.png') }}">
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
    <div class="modal fade modal_form" id="addDriverModal" tabindex="-1" role="dialog"
        aria-labelledby="addDriverModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDriverModalLabel">Add New Driver</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/drivers/store') }}" method="post" enctype="multipart/form-data">
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
                            <label for="vehicles">Vehicle</label>
                            <select class="form-control" name="vehicles" id="vehicles" required>
                                @if (!empty($vehicle_data))
                                    <option value="" selected disabled>Choose vehicle</option>
                                    <!--@foreach ($vehicle_data as $key => $value)
    -->
                                    <!--    <option value="{{ $value->id }}">-->
                                    <!--        {{ $value->code . ' ' . $value->type . '(' . $value->color . ')' }}</option>-->
                                    <!--
    @endforeach -->
                                    @foreach ($vehicle_data as $key => $value)
                                        <option value="{{ $value->id }}">
                                            {{ $value->reg_no }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="driver_img">Image</label>
                            <input type="file" class="form-control" name="driver_img" id="driver_img"
                                accept="image/png, image/gif, image/jpeg" required>
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
