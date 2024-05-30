<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--<title>ECS Email Template</title>-->
    <link href="{{asset('assets/email_images/style.css')}}" rel="stylesheet" />
</head>

<body>
    <div class="mainBox">
        <div class="header">
            <!--<div class="top">-->
            <!--    <img src="{{asset('assets/email_images/Logo.png')}}" alt="logo" />-->
            <!--</div>-->
            <!--<div class="middle">-->
            <!--    <img src="{{asset('assets/email_images/banner.jpg')}}" alt="banner" />-->
            <!--</div>-->
        </div>
        <div class="body">
            <p class="message">Congratulations! Your ride has been Confirmed.</p>
            <div class="innerBox">
                <h2 class="heading">Your Trip Details:</h2>
                <p>Paid Amount : {{ $totalAmount }}</p>
                <p>Fare: {{$amount}}</p>
                <p>VAT % : {{$vat}}%</p>
                <p>Pickup Location : {{ $location_from }}</p>
                <p>Drop Off Location : {{ $location_to }}</p>
                <p>Vehicle Category : {{ $trip_cat }}</p>
                <p>Vehicle Type :{{ $trip_type }}</p>
                <p>Trip Date : {{ $trip_date }}</p>
                <p>Trip Time : {{ $trip_time }}</p>
            </div>
            <p class="message2">
                Executive Chauffeur Service KSA has been providing premium journeys to
                its clients for over a decade. Through strategic partnerships, we
                offer luxury transportation services in all major cities around the
                KSA. From a Mercedes Benz sedan to a luxury SUV, we have the right
                vehicle to make your journey exceptional.
            </p>
        </div>
        <div class="footer">
            <p class="text">© 2024 ECS Provider. All Rights Reserved.</p>
        </div>
    </div>
</body>

</html>
