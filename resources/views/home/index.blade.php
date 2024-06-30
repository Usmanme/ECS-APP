@extends('layouts.app-master')

@section('content')
    <header>
        <!-- Sidebar -->
        @include('layouts.partials.left-sidebar')
        <!-- Navbar -->
        @include('layouts.partials.nav')
    </header>
    <!--Main layout-->
    <main class="ecs-main-body">
        <div class="container-fluid pt-4">
            <!-- STATS STARTS -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header ecs-card-header-main">
                            <div class="ecs-card-header-left">
                                <span class="heading">Drivers</span>
                                <span class="stats"><span class="num">{{ count($drivers) }}</span> (Total Drivers)</span>
                            </div>
                            <div class="ecs-card-header-right">
                                <a class="ecs-stats-btn" href="{{ route('drivers') }}">View Drivers</a>
                            </div>
                        </div>
                        <div class="card-body ecs-body-main">
                            <p class="ecs-stats-num">{{ count($drivers) }}</p>
                            <p class="ecs-stats-num-txt">Active Drivers ></p>
                        </div>
                    </div>
                    <br />
                    <div class="card">
                        <div class="card-header ecs-card-header-main">
                            <div class="ecs-card-header-left">
                                <span class="heading">Overall Earnings</span>
                                <span class="stats"><span class="num">SAR {{ $fare }}</span> (Total
                                    Earnings)</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Tabs navs -->
                            <ul class="nav nav-tabs mb-3 ecs-tab-main" id="ex1" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="ex1-tab-1" data-mdb-toggle="tab" href="#ex1-tabs-1"
                                        role="tab" aria-controls="ex1-tabs-1" aria-selected="true">Today</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="ex1-tab-2" data-mdb-toggle="tab" href="#ex1-tabs-2"
                                        role="tab" aria-controls="ex1-tabs-2" aria-selected="false">This Month</a>
                                </li>
                                <li class="nav-item">
                                    <form>
                                        <div class="form-outline datepicker ecs-datepicker">
                                            <input type="date" class="form-control" placeholder="Choose dates" />
                                        </div>
                                    </form>
                                </li>
                            </ul>
                            <!-- Tabs content -->
                            <div class="tab-content" id="ex1-content">
                                <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel"
                                    aria-labelledby="ex1-tab-1">
                                    <p class="ecs-stats-num2">SAR {{ $fare }}</p>
                                    <p class="ecs-stats-num-txt2">Overall Earnings</p>
                                </div>
                                <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                                    <p class="ecs-stats-num2">SAR {{ $completed_earning_rides_this_month }}</p>
                                    <p class="ecs-stats-num-txt2">Overall Earnings</p>
                                </div>
                            </div>
                            <!-- Tabs content -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card ecs-mobile-stats">
                        <div class="card-header ecs-card-header-main">
                            <div class="ecs-card-header-left">
                                <span class="heading">Rides</span>
                                <span class="stats"><span class="num">{{ count($rides) }}</span> (Total Rides
                                    Completed)</span>
                            </div>
                            <div class="ecs-card-header-right">
                                <a class="ecs-stats-btn" href="{{ route('rides') }}">View Rides</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Tabs navs -->
                            <ul class="nav nav-tabs mb-3" id="ex3" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="ex3-tab-3" data-mdb-toggle="tab" href="#ex3-tabs-3"
                                        role="tab" aria-controls="ex3-tabs-3" aria-selected="true">Today</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="ex3-tab-2" data-mdb-toggle="tab" href="#ex3-tabs-2"
                                        role="tab" aria-controls="ex3-tabs-2" aria-selected="false">This Month</a>
                                </li>
                                <li class="nav-item">
                                    <form>
                                        <div class="form-outline datepicker ecs-datepicker">
                                            <input type="date" class="form-control" placeholder="Choose dates" />
                                        </div>
                                    </form>
                                </li>
                            </ul>
                            <!-- Tabs content -->
                            <div class="tab-content" id="ex3-content">
                                <div class="tab-pane fade show active" id="ex3-tabs-3" role="tabpanel"
                                    aria-labelledby="ex3-tab-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="ecs-stats-num2">{{ count($rides_created_today) }}</p>
                                            <p class="ecs-stats-num-txt2">Ride Created ></p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="ecs-stats-num2">{{ count($completed_rides_today) }}</p>
                                            <p class="ecs-stats-num-txt2">Completed ></p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="ecs-stats-num2">{{ count($driver_assigned_today) }}</p>
                                            <p class="ecs-stats-num-txt2">Driver Assigned ></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="ex3-tabs-2" role="tabpanel" aria-labelledby="ex3-tab-2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="ecs-stats-num2">{{ count($rides_created_this_month) }}</p>
                                            <p class="ecs-stats-num-txt2">Ride Created ></p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="ecs-stats-num2">{{ count($completed_rides_this_month) }}</p>
                                            <p class="ecs-stats-num-txt2">Completed ></p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="ecs-stats-num2">{{ count($driver_assigned_this_month) }}</p>
                                            <p class="ecs-stats-num-txt2">Driver Assigned ></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Tabs content -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- STATS ENDS -->

            <!-- TABLE STARTS -->
            <div class="ecs-table-card">
                <p class="ecs-table-heading-main">Completed Rides</p>
                <div class="ecs-table-container">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="ecs-custom-header">
                                <tr>
                                    <th class="th-sm">Trip Id</th>
                                    <th class="th-sm">Customer Name</th>
                                    <th class="th-sm">Date & Time</th>
                                    <th class="th-sm">Pick Up</th>
                                    <th class="th-sm">Drop Up</th>
                                    <th class="th-sm">Booking Type</th>
                                    <th class="th-sm">Driver Name</th>
                                    <th class="th-sm">Vehicle Assigned</th>
                                    <th class="th-sm">Status</th>
                                    <th class="th-sm">Fare</th>
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
                                            <td>{{ $value->category }}</td>
                                            {{-- <td>{{ $value->driver_name }}</td> --}}
                                            <td>Tauqeer Alam</td>
                                            <td>{{ $value->car_name }}</td>
                                            <td class="status-success">Completed</td>
                                            <td>{{ $value->fare }}</td>
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
                            <option>50</option>
                            <option>75</option>
                        </select>
                        <p class="rows-txt">1-75 of 8,933</p>
                        <div class="rows-clicks-main">
                            <img src="{{ asset('assets/icons/fast-left.png') }}" alt="arrow-fast-left" />
                            <img src="{{ asset('assets/icons/left.png') }}" alt="arrow-left" />
                            <img src="{{ asset('assets/icons/right.png') }}" alt="arrow-right" />
                            <img src="{{ asset('assets/icons/fast-right.png') }}" alt="arrow-fast-right" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- TABLE ENDS -->
        </div>
    </main>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
@endsection
