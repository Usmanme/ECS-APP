@extends('layouts.app-master')

<style>
    .dataTables_length label{
    color: white;
    padding:10px;
    }
    .dataTables_info {
    color: white;
    padding:10px;
       }
</style>
@section('content')

    <div id="sidebarleft" class="d-flex flex-column widthsideberopen">
        @include('layouts.partials.left-sidebar')
    </div>


    <?php
    $filters_data = [
        'today' => 'Today',
        'yesterday' => 'Yesterday',
        '1' => 'January',
        '2' => 'February',
        '3' => 'March',
        '4' => 'April',
        '5' => 'May',
        '6' => 'June',
        '7' => 'July',
        '8' => 'August',
        '9' => 'September',
        '10' => 'October',
        '11' => 'November',
        '12' => 'December',
    ];
    ?>
    <!-- Center -->


    <div id="center" class="widthmainopen" >
        <div id="onmain" class="hidebars"> <button class="togle" onclick="toggleSidebar()">
                <span class="material-symbols-outlined">
                    menu
                </span>
            </button></div>


        {{-- <div class="row">
            <div class="col-md-7">
                <div class="row" id="left-row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="heading">Total Drivers</div>
                                <img src="{{ asset('assets/images/drivers_img.png') }}" alt="">
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
                                <div class="heading">Total Rides</div>
                                <img src="{{ asset('assets/images/rides_img.png') }}" alt="">
                            </div>
                            <div class="card-body">
                                <p class="count pl-0 mb-2">{{ count($rides) }}</p>
                                <p class="desc pl-0">All the Rides</p>
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
                        </div>
                        <input type="date" class="form-control" name="date_filter" id="date_filter" placeholder=""
                            required>

                     
                    </div>
                    <div class="card-body pt-0">
                        <p class="desc pl-0">All Time Customers</p>
                        <h3>SAR. <span id="total_revenue"></span></h3>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="outerbox">
            <div class="innerbox">
                <div class="drivers" style="background: white">
                    <div style="display: flex;flex-direction:row; padding:15px">
                        <div
                            style="padding: 5px;font-family: Inter;font-size: 22px;font-weight: 700;line-height: 26.63px;text-align: left;">
                            Drivers</div>
                        <div
                            style="padding: 5px;font-family: Inter;font-size: 18px;font-weight: 400;line-height: 21.78px;text-align: left;padding-top:8px">
                            5000</div>
                        <div
                            style="padding: 5px;font-family: Inter;font-size: 14px;font-weight: 400;line-height: 16.94px;text-align: left;color:#9F9F9F;padding-top:9px">
                            (Total Drivers)</div>
                        <div style="padding: 5px;width:90px;"></div>
                        <div
                            style="padding: 5px;font-family: Inter;font-size: 14px;font-weight: 400;line-height: 16.94px;text-align: left;color:var(--Red-color, #E12E2A);">
                            View Drivers</div>
                    </div>
                    <div style="padding: 23px 10px 10px 20px;">
                        <div
                            style="font-family: Inter;font-size: 32px;font-weight: 400;line-height: 38.73px;text-align: left;padding-bottom:3px;">
                            500</div>
                        <div
                            style="font-family: Inter;font-size: 14px;font-weight: 400;line-height: 16.94px;text-align: left;">
                            Active Drivers ></div>
                    </div>

                </div>
                <div class="Earnings">
                    <div style="display: flex;flex-direction:row; padding:15px">
                        <div
                            style="padding: 5px;font-family: Inter;font-size: 22px;font-weight: 700;line-height: 26.63px;text-align: left;">
                            Overall Earnings</div>
                        <div
                            style="padding: 5px;font-family: Inter;font-size: 18px;font-weight: 400;line-height: 21.78px;text-align: left;padding-top:8px">
                            SAR 500,380</div>
                        <div
                            style="padding: 5px;font-family: Inter;font-size: 14px;font-weight: 400;line-height: 16.94px;text-align: left;color:#9F9F9F;padding-top:9px">
                            (Total Earnings)</div>
                    </div>
                    <div
                        style="display: flex;flex-direction:row;justify-content:space-between;padding:11px 23px 10px 22px ;font-family: Inter;font-size: 12px;font-weight: 400;">
                        <div style=" 400;line-height: 14.52px;text-align: left;color:#9F9F9F;">TODAY</div>
                        <div style=" 400;line-height: 14.52px;text-align: left;color:#9F9F9F">THIS MONTH</div>
                        <div class="containered">
                            <span class="material-symbols-outlined">
                                calendar_month
                            </span>
                            Choose Dates
                        </div>
                    </div>

                    <div class="buttons" style="border-bottom: 2px solid #D3D3D3;"></div>

                    <div style="padding: 23px 10px 10px 20px;">
                        <div
                            style="font-family: Inter;font-size: 32px;font-weight: 400;line-height: 38.73px;text-align: left;padding-bottom:3px;">
                            SAR 500</div>
                        <div
                            style="font-family: Inter;font-size: 14px;font-weight: 400;line-height: 16.94px;text-align: left;">
                            Overall Earnings </div>
                    </div>

                </div>
            </div>
            <div class="rides">
                <div style="display: flex;flex-direction:row; padding:15px">
                    <div
                        style="padding: 5px;font-family: Inter;font-size: 22px;font-weight: 700;line-height: 26.63px;text-align: left;">
                        Rides</div>
                    <div
                        style="padding: 5px;font-family: Inter;font-size: 18px;font-weight: 400;line-height: 21.78px;text-align: left;padding-top:8px">
                        100,560</div>
                    <div
                        style="padding: 5px;font-family: Inter;font-size: 14px;font-weight: 400;line-height: 16.94px;text-align: left;color:#9F9F9F;padding-top:9px">
                        (Total Rides Completed)</div>
                    <div style="padding: 5px;width:70px;"></div>
                    <div
                        style="padding: 5px;font-family: Inter;font-size: 14px;font-weight: 400;line-height: 16.94px;text-align: left;color:var(--Red-color, #E12E2A);">
                        View Rides</div>
                </div>
                <div
                    style="display: flex;flex-direction:row;justify-content:space-between;padding:11px 23px 10px 22px ;font-family: Inter;font-size: 12px;font-weight: 400; margin-top:33px">
                    <div style=" 400;line-height: 14.52px;text-align: left;color:#9F9F9F;">TODAY</div>
                    <div style=" 400;line-height: 14.52px;text-align: left;color:#9F9F9F">THIS MONTH</div>
                    <div class="containered">
                        <span class="material-symbols-outlined">
                            calendar_month
                        </span>
                        Choose Dates
                    </div>
                </div>
                <div class="buttons" style="border-bottom: 2px solid #D3D3D3;"></div>
                <div style="display: flex;flex-direction:row;margin-top:30px">
                    <div style="display: flex;flex-direction:column;width:50%">
                        <div style="padding: 23px 10px 10px 20px;">
                            <div
                                style="font-family: Inter;font-size: 32px;font-weight: 400;line-height: 38.73px;text-align: left;padding-bottom:3px;">
                                500</div>
                            <div
                                style="font-family: Inter;font-size: 14px;font-weight: 400;line-height: 16.94px;text-align: left;">
                                Rides Created ></div>
                        </div>
                        <div style="padding: 23px 10px 10px 20px;">
                            <div
                                style="font-family: Inter;font-size: 32px;font-weight: 400;line-height: 38.73px;text-align: left;padding-bottom:3px;">
                                500</div>
                            <div
                                style="font-family: Inter;font-size: 14px;font-weight: 400;line-height: 16.94px;text-align: left;">
                                Driver Assigned ></div>
                        </div>
                    </div>
                    <div style="padding: 23px 10px 10px 20px; width:50%">
                        <div
                            style="font-family: Inter;font-size: 32px;font-weight: 400;line-height: 38.73px;text-align: left;padding-bottom:3px;">
                            500</div>
                        <div
                            style="font-family: Inter;font-size: 14px;font-weight: 400;line-height: 16.94px;text-align: left;">
                            Completed ></div>
                    </div>

                </div>
            </div>
        </div>


        <table id="booking" class="display" style="width:100% ;">
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    //  .widthsideberopen{
    //     width: 23%;
    // }
    // .widthsideberclose{
    //     width: 0%;
    //     visibility: hidden
    // }
    // .widthmainopen{
    //     width: 77%;
    //     padding-left: 30px;
    // }
    // .widthmainclose{
    //     width: 100%;
    //     padding-left: 30px;
    // }

    function toggleSidebar() {
        const sidebar = document.getElementById("sidebarleft");
        const mainContent = document.getElementById("center");
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
            url: "{{ route('get.fare') }}",
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
