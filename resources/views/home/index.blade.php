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
    .widthsideber{
        width: 23%;
    }
    .widthmain{
        width: 77%;
        padding-left: 30px;
    }
    
</style>
@section('content')
   <div class="d-flex flex-column widthsideber">
    @include('layouts.partials.left-sidebar')
   </div>
    
  
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
    <div id="center"  class="widthmain" style="padding-right: 40px">
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
                        <input type="date" class="form-control" name="date_filter" id="date_filter" placeholder="" required>

                        {{-- <select name="filter" class="form-control" id="filter" onchange="getFilterRecords(this)">
                            @foreach ($filters_data as $key=>$month)
                                <option value="{{$key}}">{{$month}}</option>
                            @endforeach
                            <option value="">Last Month</option>
                        </select> --}}
                    </div>
                    <div class="card-body pt-0">
                        <p class="desc pl-0">All Time Customers</p>
                        <h3>SAR. <span id="total_revenue"></span></h3>
                    </div>
                </div>
            </div>
            </div>
            <br><br>
                <table id="booking" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Ride Date</th>
                    <th>Pick Up</th>
                    <th>Drop Up</th>
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

                            <td>{{ $value->car_name }}</td>
                            <td>
                                <div class="booking_status">Completed</div>
                            </td>
                            <td>{{ $value->fare }} SAR</td>

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
                    <th>Vehicle</th>
                    <th>Status</th>
                    <th>Fare</th>
                    {{-- <th>Action</th> --}}
                </tr>
            </tfoot>
        </table>
        </div>
      
@endsection
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    
        
    
    $(document).ready(function() {
        // Bind change event to the date input
        $('#date_filter').change(function() {
            // Call the getFilterRecords function with the value of the date input
            getFilterRecords(this);
        });
    });

    function getFilterRecords(value) {
        let filter = $(value).val();
        $.ajax({
            type: "GET",
            url: "{{route('get.fare')}}",
            data: {
                filter: filter
            },
            success: function(response) {
                if (response.status) {
                    $('#total_revenue').html(response.fare);
                }
            }
        });
    }
</script>
