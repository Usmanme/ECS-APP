@extends('layouts.app-master')

@section('content')
    <!-- Left Sidebar -->
    @include('layouts.partials.left-sidebar')
    <!-- ./Left Sidebar -->

    <!-- Booking -->
    <div class="col-lg-9 p-0 booking_container" id="booking_right_part">
        <div class="booking_header_part">
            <div class="booking_header_title" id="Title">
                <h2>BOOKING</h2>
                <div class="center-heading">
                    <h6 class="color01">Home >></h6>
                    <h6 class="color02">Dashboard</h6>
                </div>
            </div>
            <div class="profile">
                <img src="./assets/images/notification.png" class="notification-icon">
                <img src="./assets/images/admin.png" class="admin-pic">
                <p class="admin-name">king Albert</p>
            </div>
        </div>
        <table id="bookingtable_in_booking" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Booking Date</th>
                    <th>Driver</th>
                    <th>Vehicle</th>
                    <th>Status</th>
                    <th>Fare</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="nameentry">
                            <img src="./assets/images/bookingcustomer1.png" class="customerpic">
                            <p>Jack</p>
                        </div>
                    </td>
                    <td>
                        <div class="dameentry">
                            <p class="datepart">14 Sep 2023</p>
                            <p class="datepart">at 08:00</p>
                        </div>
                    </td>
                    <td>Grady</td>
                    <td>Eleanor</td>
                    <td>
                        <div class="booking_status">Booked</div>
                    </td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>
                        <div class="nameentry">
                            <img src="./assets/images/bookingcustomer2.png" class="customerpic">
                            <p>Dan</p>
                        </div>
                    </td>
                    <td>
                        <div class="dateentry">
                            <p class="datepart">14 Sep 2023</p>
                            <p class="datepart">at 08:30</p>
                        </div>
                    </td>
                    <td>Alan</td>
                    <td>Eleanor</td>
                    <td>
                        <div class="booking_status">Completed</div>
                    </td>
                    <td>550</td>
                </tr>
                <tr>
                    <td>
                        <div class="nameentry">
                            <img src="./assets/images/bookingcustomer3.png" class="customerpic">
                            <p>Jorden</p>
                        </div>
                    </td>
                    <td>
                        <div class="dateentry">
                            <p class="datepart">14 Sep 2023</p>
                            <p class="datepart">at 10:00</p>
                        </div>
                    </td>
                    <td>Alan</td>
                    <td>Indestructible</td>
                    <td>
                        <div class="booking_status">Completed</div>
                    </td>
                    <td>450</td>
                </tr>
                <tr>
                    <td>
                        <div class="nameentry">
                            <img src="./assets/images/bookingcustomer4.png" class="customerpic">
                            <p>Karen</p>
                        </div>
                    </td>
                    <td>
                        <div class="dateentry">
                            <p class="datepart">15 Sep 2023</p>
                            <p class="datepart">at 08:00</p>
                        </div>
                    </td>
                    <td>Ishaan</td>
                    <td>Brum</td>
                    <td>
                        <div class="booking_status">Booked</div>
                    </td>
                    <td>600</td>
                </tr>
                <tr>
                    <td>
                        <div class="nameentry">
                            <img src="./assets/images/bookingcustomer5.png" class="customerpic">
                            <p>Jimmy</p>
                        </div>
                    </td>
                    <td>
                        <div class="dateentry">
                            <p class="datepart">15 Sep 2023</p>
                            <p class="datepart">at 09:00</p>
                        </div>
                    </td>
                    <td>Charil</td>
                    <td>Bumblebee</td>
                    <td>
                        <div class="booking_status">Completed</div>
                    </td>
                    <td>440</td>
                </tr>

                <?php for ($i=0; $i < 20; $i++) { ?>
                <tr>
                    <td>
                        <div class="nameentry">
                            <img src="./assets/images/bookingcustomer5.png" class="customerpic">
                            <p>Jimmy</p>
                        </div>
                    </td>
                    <td>
                        <div class="dateentry">
                            <p class="datepart">15 Sep 2023</p>
                            <p class="datepart">at 09:00</p>
                        </div>
                    </td>
                    <td>Charil</td>
                    <td>Bumblebee</td>
                    <td>
                        <div class="booking_status">Completed</div>
                    </td>
                    <td>440</td>
                </tr>
                <?php } ?>

            </tbody>
            <tfoot>
                <tr>
                    <th>Customer</th>
                    <th>Booking Date</th>
                    <th>Driver</th>
                    <th>Vehicle</th>
                    <th>Status</th>
                    <th>Fare</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- ./Booking -->
@endsection
