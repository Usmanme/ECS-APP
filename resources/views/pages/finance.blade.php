@extends('layouts.app-master')

@section('content')
    <!-- Left Sidebar -->
    @include('layouts.partials.left-sidebar')
    <!-- ./Left Sidebar -->

    <!-- Ride -->
    <div class="col-lg-9 p-0" id="booking_right_part">
        <div class="booking_header_part">
            <div class="booking_header_title" id="Title">
                <h2>Finance</h2>
                <div class="center-heading">
                    <h6 class="color01">Home >></h6>
                    <h6 class="color02">Finance</h6>
                </div>
            </div>
            <div class="profile">
                <img src="./assets/images/notification.png" class="notification-icon">
                <img src="./assets/images/admin.png" class="admin-pic">
                <p class="admin-name">king Albert</p>
            </div>
        </div>


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
                            <td>{{$value->car_name}}</td>
                            <td>
                                <div class="booking_status">Completed</div>
                            </td>
                            <td>{{ $value->fare }}SAR</td>

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
    <!-- ./Ride -->
@endsection
