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
            <p class="message">Congratulations! The Following Driver is Assigned.</p>
            <div class="innerBox">
                <h2 class="heading">Your Driver Details:</h2>
                <p>Driver Name: {{ $name }}</p>
                <p>Driver Phone: {{ $number }}</p>
                <p>Vehicle: {{ $vehicle_name }}</p>
                <p>Vehicle Reg: {{ $reg }}</p>
                <p>Vehicle Category: {{ $category }}</p>


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
