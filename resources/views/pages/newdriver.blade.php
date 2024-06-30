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

            <form action="{{ url('/drivers/store') }}" method="post" enctype="multipart/form-data">
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
                        <p class="driverinputnames">First name</p>
                        <input class="driverinputs" placeholder="Enter First Name" type="text">
                    </div>
                    <div>
                        <p class="driverinputnames">Last name</p>
                        <input class="driverinputs" placeholder="Enter Last Name" type="text">
                    </div>
                    <div>
                        <p class="driverinputnames">Enter Number</p>
                        <input class="driverinputs" placeholder="Enter Number" type="text">
                    </div>
                    <div>
                        <p class="driverinputnames">Enter Iqama Number</p>
                        <input class="driverinputs" placeholder="Enter Iqama Number" type="text">
                    </div>
                    <div>
                        <p class="driverinputnames">Enter Email </p>
                        <input type="email" class="driverinputs" placeholder="Enter Email" type="text">
                    </div>
                </div>

                <div class="personaldetails mt-4">Legal Details</div>

                <div class="d-flex flex-row gap-5 mt-4 flex-wrap" style="width: 90%">
                    <div class="mb-2">
                        <p class="driverinputnames">Choose vehicle</p>
                        <input class="driverinputs" placeholder="Choose vehicle" type="text">
                    </div>
                    <div>
                        <p class="driverinputnames">License Number</p>
                        <input class="driverinputs" placeholder="License Number" type="text">
                    </div>
                    <div>
                        <p class="driverinputnames">National Id</p>
                        <input class="driverinputs" placeholder="National id No" type="text">
                    </div>
                  
                </div>
                <div class="personaldetails mt-4">Vehicle Details</div>

                <div class="d-flex flex-row justify-content-between mt-4 flex-wrap" style="width: 90%">
                    <div>
                        <div class="personaldetails ">Vehicle Category</div>
                        <p class="driverinputnames">Economy</p>
                    </div>
                    <div>
                        <div class="personaldetails ">Vehicle Name</div>
                        <p class="driverinputnames">BMW</p>
                    </div>
                    <div>
                        <div class="personaldetails ">Plate No</div>
                        <p class="driverinputnames">2819</p>
                    </div>
                    <div>
                        <div class="personaldetails ">Vehicle Model year</div>
                        <p class="driverinputnames">2819</p>
                    </div>
                    <div>
                        <div class="personaldetails ">Vehicle color</div>
                        <p class="driverinputnames">Black</p>
                    </div>
                </div>

                <div class="d-flex flex-row mt-5  justify-content-end" >
                    <a  class="bigbutton bg-light text-dark " style="border:1px solid black;"  href="{{ url('driver') }}">Back</a> 
                    <button type="submit " class="bigbutton pt-0" >Submit </button> 
                </div>
            </div>
    </form>
        </div>
    </main>
    <!-- ./Vehicle -->
@endsection
