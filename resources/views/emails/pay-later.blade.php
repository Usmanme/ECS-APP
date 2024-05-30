<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chauffeur Details</title>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
    background-color: #f9f9f9;
}

.container {
    max-width: 600px;
    margin: 0 auto;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

p {
    font-size: 16px;
    line-height: 1.5;
    margin-bottom: 20px;
}

.chauffeur-details {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.chauffeur-details th {
    background-color: red;
    color: white;
    padding: 10px;
    text-align: center;
    font-size: 18px;
}

.chauffeur-details td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
    font-size: 16px;
}

a {
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

</style>
</head>
<body>
    <div class="container">
        <p>Congratulations Your Ride has Been Booked.</p>
        <table class="chauffeur-details">
            <thead>
                <tr>
                    <th colspan="2">Booking Details</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Customer Name</td>
                    <td>{{ $name }}</td>
                </tr>
                <tr>
                    <td>Pickup Location</td>
                    <td>{{ $pickup }}</td>
                </tr>
                <tr>
                    <td>Drop Off Location</td>
                    <td>{{ $drop }}</td>
                </tr>
                <tr>
                    <td>Pickup Date</td>
                    <td>{{ $date }}</td>
                </tr>
                <tr>
                    <td>Pickup Time</td>
                    <td>{{ $time }}</td>
                </tr>
                <tr>
                    <td>Fare</td>
                    <td>{{ $fare }}</td>
                </tr>
            </tbody>
        </table>
        <p>If you find any issue with connecting with the chauffeur, kindly feel free to contact our <a href="tel:+971505470868">24/7 operations number +971 50 547 0868</a>.</p>
    </div>
</body>
</html>
