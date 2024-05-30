@extends('layouts.app-master')
<style>
    .card {
        padding: 20px
    }
    .card-header {
        display: flex;
        justify-content: space-between;
        background:#fff !important;
        border-bottom: none !important;
    }
    .card-body p{
        color: #6F7D7F;
        font-size: 14px
    }
    #left-row {
        display: flex;
        flex-direction: row;
        row-gap: 5px;
    }
    .card-body h3 {
        color: #000000;
        font-size: 15px;
    }
    #right-card .card-body {
        display: flex;
        flex-direction: column;
        row-gap: 20px;
    }
    #filter {
        color: white;
        background: #E12E2A;
        max-width: 130px;
    }
    #states-cards-row {
        margin: 15px 0px 15px 0px;
        display: flex;
        justify-content: center;
    }
    .center-element {
        margin-top: 20px;
    }
</style>
@section('content')
    <!-- Left Sidebar -->
    @include('layouts.partials.left-sidebar')
    <!-- ./Left Sidebar -->
    <?php
        $filters_data =
        [
            'today'=>'Today',
            'yesterday'=>'Yesterday',
            '1'=>'January',
            '2'=>'February',
            '3'=>'March',
            '4'=>'April',
            '5'=>'May',
            '6'=>'June',
            '7'=>'July',
            '8'=>'August',
            '9'=>'September',
            '10'=>'October',
            '11'=>'November',
            '12'=>'December',
        ];
    ?>
    <!-- Center -->
    <div id="center" class="col-lg-9" style="padding-right: 40px">
        <div class="center-element" id="Title">
            <h2 class="mt-5">HI! WELCOME ADMIN</h2>
            <div class="center-heading mb-3">
                <h6 class="color">Home >></h6>
                <h6>Dashboard</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="row" id="left-row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="heading">Total Drivers</div>
                                <img src="{{asset('assets/images/drivers_img.png')}}" alt="">
                            </div>
                            <div class="card-body">
                                <p class="count pl-0 mb-2">{{ count($drivers) }}</p>
                                <p class="desc pl-0">All Time Customers</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="heading">Total Customers</div>
                                <img src="{{asset('assets/images/bookings_img.png')}}" alt="">
                            </div>
                            <div class="card-body">
                                <p class="count pl-0 mb-2">{{ count($customers) }}</p>
                                <p class="desc pl-0">Customers who Booked rides</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="heading">Total Rides</div>
                                <img src="{{asset('assets/images/rides_img.png')}}" alt="">
                            </div>
                            <div class="card-body">
                                <p class="count pl-0 mb-2">{{ count($rides) }}</p>
                                <p class="desc pl-0">All the Rides</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="heading">Total Vehicles</div>
                                <img src="{{asset('assets/images/vehicles_img.png')}}" alt="">
                            </div>
                            <div class="card-body">
                                <p class="count pl-0 mb-2">{{ count($vehicles) }}</p>
                                <p class="desc pl-0">All Categories from all Vehicals</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card" id="right-card">
                    <div class="card-header">
                        <div class="heading">
                            <p class="pl-0">Total Revenue</p>
                            {{-- <p style="color: #6B7D7F" class="count pl-0 mb-2">data updated 8 minutes ago</p> --}}
                        </div>
                                <input type="date" class="form-control" name="date_filter"
                        id="date_filter" placeholder="" required>
                        <!--<select name="filter" class="form-control" id="filter" onchange="getFilterRecords(this)">-->
                           
                        <!--    @foreach ($filters_data as $key=>$month)-->
                        <!--        <option value="{{$key}}">{{$month}}</option>-->
                        <!--    @endforeach-->
                        <!--    <option value="">Last Month</option>-->
                        <!--</select>-->
                    </div>
                    <div class="card-body pt-0">
                        <p class="desc pl-0">All Time Customers</p>
                        <h3>SAR. <span id="total_revenue"></span></h3>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row" id="states-cards-row" style="">
            <div class="col-md-2 pr-0">
                <div class="card">
                    <p class="pl-0 card-heading">Total Rides</p>
                    <h3 class="text-center">1720</h3>
                </div>
            </div>
            <div class="col-md-2 pr-0">
                <div class="card">
                    <p class="pl-0 card-heading">Drivers</p>
                    <h3 class="text-center">1720</h3>
                </div>
            </div>
            <div class="col-md-2 pr-0">
                <div class="card">
                    <p class="pl-0 card-heading">Total Bookings</p>
                    <h3 class="text-center">1720</h3>
                </div>
            </div>
            <div class="col-md-2 pr-0">
                <div class="card">
                    <p class="pl-0 card-heading">Total Vehicles</p>
                    <h3 class="text-center">1720</h3>
                </div>
            </div>
            <div class="col-md-2 pr-0">
                <div class="card">
                    <p class="pl-0 card-heading">Total Revenue</p>
                    <h3 class="text-center">1720</h3>
                </div>
            </div>
        </div> --}}
        {{-- <div class="center-element" id="main-cards">
            <div class="card-container2">
                <div>
                    <img src="./assets/images/carr.png" class="card-logo" id="car-logo">
                </div>
                <div class="card-text">
                    <h6>Total Drivers</h6>
                    <h3>{{ count($drivers) }}</h3>
                </div>
            </div>
            <div class="card-container2">
                <div>
                    <img src="./assets/images/customerrs.png" class="card-logo" id="customer-logo">
                </div>
                <div class="card-text">
                    <h6>Total Customer</h6>
                    <h3>{{ count($customers) }}</h3>
                </div>
            </div>
            <div class="card-container2">
                <div>
                    <img src="./assets/images/bookingrs.png" class="card-logo" id="bookings-logo">
                </div>
                <div class="card-text">
                    <h6>Total Rides</h6>
                    <h3>{{ count($rides) }}</h3>
                </div>
            </div>
        </div> --}}
        {{-- <div class="center-element" id="graph">
            <div class="chat_title">
                <div class="chart_title_heading">
                    <h6 class="average_customer_heading">AVERAGE CUSTOMER</h6>
                    <div class="yearly-more">
                        <p class="how_many_more">(+5) more</p>
                        <p class="which_year">in 2023</p>
                    </div>
                </div>
                <div class="weekly_yearly">
                    <button class="btn btn-danger weekly_yearly_btn" id="weekly_btn">Weekly</button>
                    <button class="btn btn-danger weekly_yearly_btn" id="yearly_btn">Yearly</button>
                </div>
            </div>
            <div id="chart_div"></div>
        </div> --}}

        <!--<div class="center-element" id="table_div_in_dashboard">-->
        <!--    <div class="table_header">-->
        <!--        <h6 class="booking_heading">-->
        <!--            BOOKING-->
        <!--        </h6>-->
        <!--        <button class="btn btn-danger new_booking_btn">-->
        <!--            Add New-->
        <!--        </button>-->
        <!--    </div>-->
        <!--    <table id="bookingtable" class="display" style="width:100%">-->
        <!--        <thead>-->
        <!--            <tr>-->
        <!--                <th>Customer</th>-->
        <!--                <th>Booking Date</th>-->
        <!--                <th>Driver</th>-->
        <!--                <th>Vehicle</th>-->
        <!--                <th>Status</th>-->
        <!--                <th>Fare</th>-->
        <!--            </tr>-->
        <!--        </thead>-->
        <!--        <tbody>-->
        <!--            <tr>-->
        <!--                <td>-->
        <!--                    <div class="nameentry">-->
        <!--                        <img src="./assets/images/bookingcustomer1.png" class="customerpic">-->
        <!--                        <p>Jack</p>-->
        <!--                    </div>-->
        <!--                </td>-->
        <!--                <td>-->
        <!--                    <div class="dameentry">-->
        <!--                        <p class="datepart">14 Sep 2023</p>-->
        <!--                        <p class="datepart">at 08:00</p>-->
        <!--                    </div>-->
        <!--                </td>-->
        <!--                <td>Grady</td>-->
        <!--                <td>Eleanor</td>-->
        <!--                <td>-->
        <!--                    <div class="booking_status">Booked</div>-->
        <!--                </td>-->
        <!--                <td>200</td>-->
        <!--            </tr>-->
        <!--            <tr>-->
        <!--                <td>-->
        <!--                    <div class="nameentry">-->
        <!--                        <img src="./assets/images/bookingcustomer2.png" class="customerpic">-->
        <!--                        <p>Dan</p>-->
        <!--                    </div>-->
        <!--                </td>-->
        <!--                <td>-->
        <!--                    <div class="dateentry">-->
        <!--                        <p class="datepart">14 Sep 2023</p>-->
        <!--                        <p class="datepart">at 08:30</p>-->
        <!--                    </div>-->
        <!--                </td>-->
        <!--                <td>Alan</td>-->
        <!--                <td>Eleanor</td>-->
        <!--                <td>-->
        <!--                    <div class="booking_status">Completed</div>-->
        <!--                </td>-->
        <!--                <td>550</td>-->
        <!--            </tr>-->
        <!--            <tr>-->
        <!--                <td>-->
        <!--                    <div class="nameentry">-->
        <!--                        <img src="./assets/images/bookingcustomer3.png" class="customerpic">-->
        <!--                        <p>Jorden</p>-->
        <!--                    </div>-->
        <!--                </td>-->
        <!--                <td>-->
        <!--                    <div class="dateentry">-->
        <!--                        <p class="datepart">14 Sep 2023</p>-->
        <!--                        <p class="datepart">at 10:00</p>-->
        <!--                    </div>-->
        <!--                </td>-->
        <!--                <td>Alan</td>-->
        <!--                <td>Indestructible</td>-->
        <!--                <td>-->
        <!--                    <div class="booking_status">Completed</div>-->
        <!--                </td>-->
        <!--                <td>450</td>-->
        <!--            </tr>-->
        <!--            <tr>-->
        <!--                <td>-->
        <!--                    <div class="nameentry">-->
        <!--                        <img src="./assets/images/bookingcustomer4.png" class="customerpic">-->
        <!--                        <p>Karen</p>-->
        <!--                    </div>-->
        <!--                </td>-->
        <!--                <td>-->
        <!--                    <div class="dateentry">-->
        <!--                        <p class="datepart">15 Sep 2023</p>-->
        <!--                        <p class="datepart">at 08:00</p>-->
        <!--                    </div>-->
        <!--                </td>-->
        <!--                <td>Ishaan</td>-->
        <!--                <td>Brum</td>-->
        <!--                <td>-->
        <!--                    <div class="booking_status">Booked</div>-->
        <!--                </td>-->
        <!--                <td>600</td>-->
        <!--            </tr>-->
        <!--            <tr>-->
        <!--                <td>-->
        <!--                    <div class="nameentry">-->
        <!--                        <img src="./assets/images/bookingcustomer5.png" class="customerpic">-->
        <!--                        <p>Jimmy</p>-->
        <!--                    </div>-->
        <!--                </td>-->
        <!--                <td>-->
        <!--                    <div class="dateentry">-->
        <!--                        <p class="datepart">15 Sep 2023</p>-->
        <!--                        <p class="datepart">at 09:00</p>-->
        <!--                    </div>-->
        <!--                </td>-->
        <!--                <td>Charil</td>-->
        <!--                <td>Bumblebee</td>-->
        <!--                <td>-->
        <!--                    <div class="booking_status">Completed</div>-->
        <!--                </td>-->
        <!--                <td>440</td>-->
        <!--            </tr>-->
        <!--        </tbody>-->
        <!--        <tfoot>-->
        <!--            <tr>-->
        <!--                <th>Customer</th>-->
        <!--                <th>Booking Date</th>-->
        <!--                <th>Driver</th>-->
        <!--                <th>Vehicle</th>-->
        <!--                <th>Status</th>-->
        <!--                <th>Fare</th>-->
        <!--            </tr>-->
        <!--        </tfoot>-->
        <!--    </table>-->
        <!--</div>-->
                <table id="booking" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Ride Date</th>
                    <th>Pick Up</th>
                    <th>Drop Up</th>
                    <!--<th>Driver</th>-->
                    <th>Vehicle</th>
                    <th>Status</th>
                    <th>Fare</th>
                    {{-- <th>Action</th> --}}
                </tr>
            </thead>
            <tbody>
                @if (!empty($completed_rides))
                    @foreach ($completed_rides as $value)
                        <tr>
                            <td>
                                <div class="nameentry">
                                    <img src="{{ asset('/assets/images/avarat.png') }}" class="customerpic">
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
                            <!--<td>{{ $value->firstname . ' ' . $value->lastname }}</td>-->

                            <td>{{ $value->code }}</td>
                            <td>
                                <div class="booking_status">Completed</div>
                            </td>
                            <td>{{ $value->fare }}</td>

                        </tr>
                    @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th>Customer</th>
                    <th>Ride Date</th>
                    <th>Pick Up</th>
                    <th>Drop Up</th>
                    <!--<th>Driver</th>-->
                    <th>Vehicle</th>
                    <th>Status</th>
                    <th>Fare</th>
                    {{-- <th>Action</th> --}}
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- ./Center -->

    <!-- ./ Right Sidebar -->
    {{-- <div id="right-side-bar" class="col-lg-3">
        <div class="profile">
            <img src="./assets/images/notification.png" class="notification-icon">
            <img src="./assets/images/admin.png" class="admin-pic">
            <p class="admin-name">king Albert</p>
        </div>
        <div class="customer-list">
            <div class="heading_button">
                <h6 class="list_text">NEW CUSTOMERS</h6>
                <a href="{{ url('/customers') }}" class="btn btn-danger view-all">View all</a>
            </div>
            <ul class="list">
                @if (!empty($customers))
                    @foreach ($customers as $key => $value)
                        @if ($key < 5)
                            <li class="list-item">
                                <img src="{{ $value->img != '' ? asset('/uploads/' . $value->img) : asset('/assets/images/avarat.png') }}"
                                    class="driverpic">
                                <div>
                                    <p class="name">{{ $value->name }}</p>
                                    <p class="email">{{ $value->email }}</p>
                                </div>
                            </li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="driver-list">
            <div class="heading_button">
                <h6 class="list_text">NEW DRIVERS</h6>
                <a href="{{ url('/drivers') }}" class="btn btn-danger view-all">View all</a>
            </div>
            <ul class="list">
                @if (!empty($drivers))
                    @foreach ($drivers as $key => $value)
                        @if ($key < 5)
                            <li class="list-item">
                                <img src="{{ $value->img != '' ? asset('/uploads/' . $value->img) : asset('/assets/images/avarat.png') }}"
                                    class="driverpic">
                                <div>
                                    <p class="name">{{ $value->firstname . ' ' . $value->lastname }}</p>
                                    <p class="email">{{ $value->email_addr }}</p>
                                </div>
                            </li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
    </div> --}}
    <!-- ./ Right Sidebar -->
@endsection
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        getFilterRecords('#filter');
    });

    function getFilterRecords(value) {
        let filter = $(value).val();
        $.ajax({
            type: "GET",
            url: "{{route('get.fare')}}",
            data: {
                filter:filter
            },
            success: function (response) {
                if(response.status) {
                    $('#total_revenue').html(response.fare);
                }
            }
        });

    }
</script>
