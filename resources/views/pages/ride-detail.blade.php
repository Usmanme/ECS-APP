
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


            <div class="adddrivermain">
                <div>
                    {{-- <img class="driverimage" src="./assets/images/no driver.jpeg" alt="No driver"> --}}
                    <div class="personaldetails">Booking Details {{ $ride->customer_name }}</div>
                    {{-- <button class="driverbutton ">Upload Photo</button> --}}
                </div>
                <hr class="ecs-custom-divder mt-3" />

                <div class="d-flex flex-row justify-content-between mt-4 flex-wrap" style="width: 90%">
                    <div class="mb-2">
                        <label for="name">Customer Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="" readonly
                            value="{{ $ride->customer_name }}">
                    </div>
                    <div class="mb-2">
                        <label for="name">Customer Email</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="" readonly
                            value="{{ $ride->customer_email }}">
                    </div>
                    <div class="mb-2">
                        <label for="name">Customer Number</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="" readonly
                            value="{{ $ride->cutomer_number }}">
                    </div>
                    <div class="mb-2">
                        <label for="mobile_number">Booking Date</label>
                        <input type="text" class="form-control" name="mobile_number" id="mobile_number" placeholder=""
                            readonly value="{{ $ride->booking_pickup }}">
                    </div>
                </div>

                <div class="d-flex flex-row justify-content-between mt-4 flex-wrap" style="width: 90%">
                    <div class="mb-2">
                        <label for="mobile_number">Booking Time</label>
                        <input type="text" class="form-control" name="mobile_number" id="mobile_number" placeholder=""
                            readonly value="{{ $ride->booking_drop }}">
                    </div>
                    <div class="mb-2">
                        <label for="email">Pickup Location</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="" readonly
                            value="{{ $ride->hotel_pickup }}">
                    </div>
                    <div class="mb-2">
                        <label for="nationality">Drop Off</label>
                        <input type="text" class="form-control" name="nationality" id="nationality" placeholder=""
                            readonly value="{{ $ride->hotel_drop }}">
                    </div>
                    <div class="mb-2">
                        <label for="company">Vehicle</label>
                        <input type="text" class="form-control" name="company" id="company" placeholder="" readonly
                            value="{{ $ride->car_name }}">
                    </div>
                </div>

                <div class="d-flex flex-row justify-content-between mt-4 flex-wrap" style="width: 90%">
                    <div class="mb-2">
                        <label for="department">Passenger</label>
                        <input type="text" class="form-control" name="department" id="department" placeholder="" readonly
                            value="{{ $ride->passengers }}">
                    </div>
                    <div class="mb-2">
                        <label for="status">Status</label>
                        <input type="text" class="form-control" name="status" id="status" placeholder="" readonly
                            value="{{ $ride->status }}">
                    </div>
                    <div class="mb-2">
                        <label for="fare">Fare</label>
                        <input type="text" class="form-control" name="fare" id="fare" placeholder="" readonly
                            value="{{ $ride->fare }}">
                    </div>
                    <div class="mb-2">
                        <label for="status">Category</label>
                        <input type="text" class="form-control" name="status" id="status" placeholder=""
                            readonly value="{{ $ride->category }}">
                    </div>
                </div>

                <div class="d-flex flex-row justify-content-between mt-4 flex-wrap" style="width: 90%">
                    <div class="mb-2">
                        <label for="fare">AirLine</label>
                        <input type="text" class="form-control" name="fare" id="fare" placeholder=""
                            readonly value="{{ $ride->airline_name }}">
                    </div>
                    <div class="mb-2">
                        <label for="status">Flight Number</label>
                        <input type="text" class="form-control" name="status" id="status" placeholder=""
                            readonly value="{{ $ride->flight_number }}">
                    </div>
                    <div class="mb-2">
                        <label for="fare">Driver Pickup Sign</label>
                        <input type="text" class="form-control" name="fare" id="fare" placeholder=""
                            readonly value="{{ $ride->driver_pick_up_sign }}">
                    </div>
                    <div class="mb-2">
                        <label for="fare">Driver Note</label>
                        <input type="text" class="form-control" name="fare" id="fare" placeholder=""
                            readonly value="{{ $ride->additional_info }}">
                    </div>
                </div>

            </div>
            </form>
        </div>
    </main>
@endsection
