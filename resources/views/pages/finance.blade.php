@extends('layouts.app-master')

@section('content')
    <!-- Left Sidebar -->
    <div id="sidebarleft" class="d-flex flex-column widthsideberopen">
        @include('layouts.partials.left-sidebar')
    </div>
    <!-- ./Left Sidebar -->

    <!-- Ride -->
    <div class="widthmainopen" id="booking_right_part">


        <div id="onmain" class="hidebars"> <button class="togle" onclick="toggleSidebar()">
            <span class="material-symbols-outlined">
                menu
            </span>
        </button></div>
        
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