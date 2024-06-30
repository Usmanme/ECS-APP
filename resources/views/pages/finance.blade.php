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
        
        <div class="ecs-table-card">
            <p class="ecs-table-heading-main">Finance</p>
            <div class="ecs-table-container">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="ecs-custom-header">
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
            <tbody class="ecs-custom-body">
                @if (!empty($completed_rides))
                    @foreach ($completed_rides as $value)
                        <tr>
                            <td>
                                <div class="nameentry">
                                    <img width="100px" src="{{ asset('/assets/images/avarat.png') }}" class="customerpic">
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
    <!-- ./Ride -->
@endsection

