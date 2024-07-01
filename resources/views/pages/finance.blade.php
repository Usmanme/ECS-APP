@extends('layouts.app-master')

@section('content')
    <!-- Sidebar -->
    @include('layouts.partials.left-sidebar')
    <!-- Sidebar -->
    <!-- Navbar -->
    @include('layouts.partials.nav')
    <!-- Ride -->
    <main class="ecs-main-body" style="height: 100vh;">
        <div class="container-fluid pt-4">


            <div class="d-flex flex-row justify-content-between text-light">
                <div class="ecs-card-header-left">
                    <span class="heading pageheading">Finance</span>
                    <span class="stats totalnumber"><span class="num">500</span></span>
                </div>
                <div class="d-flex flex-row">
                    <span class="material-symbols-outlined p-2">
                        refresh
                    </span>
                    <span class="material-symbols-outlined p-2">
                        download
                    </span>
                    <button class="bigbutton">Add Driver</button>
                </div>
            </div>
            <div class="miniheading">(Revenue)</div>
            <div class="text-end "> <span class="material-symbols-outlined searchicon"> search
            </span><input class="searchbars" placeholder="Search" type="text"></div>


            <div class="ecs-table-card">
                <p class="ecs-table-heading-main">Finance</p>
                <div class="ecs-table-container">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="ecs-custom-header">
                                <thead>
                                    <tr>
                                        <th>Trip ID</th>
                                        <th>Customer Name</th>
                                        <th>Date & Time</th>
                                        <th>Pick Up</th>
                                        <th>Drop Up</th>
                                        <th>Vehicle Assigned</th>
                                        <th>Booking Type</th>
                                        <th>Status</th>
                                        <th>Fare</th>
                                    </tr>
                                </thead>
                            <tbody class="ecs-custom-body">
                                @if (!empty($completed_rides))
                                    @foreach ($completed_rides as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->customer_name }}</td>
                                            <td>
                                                <div class="dameentry">
                                                    <p class="datepart">{{ $value->booking_pickup }}</p>
                                                    <p class="datepart">{{ $value->booking_drop }}</p>
                                                </div>
                                            </td>
                                            <td>{{ $value->hotel_pickup }}</td>
                                            <td>{{ $value->hotel_drop }}</td>
                                            <td>{{ $value->car_name }}</td>
                                            <td>{{ $value->category }}</td>
                                            <td>
                                                <div class="booking_status">Completed</div>
                                            </td>
                                            <td>{{ $value->fare }}SAR</td>

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
                        <p class="rows-txt">1-75 of 89</p>
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
    <!-- ./Ride -->
@endsection
