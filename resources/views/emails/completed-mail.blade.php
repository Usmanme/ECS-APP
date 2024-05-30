<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Completed</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .container {
            width: 800px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header img {
            max-width: 200px;
        }

        .confirmation {
            text-align: center;
            margin: 20px 0;
        }

        .details,
        .charges,
        .terms {
            margin: 20px 0;
        }

        .details table,
        .charges table,
        .terms table {
            width: 100%;
            border-collapse: collapse;
        }

        .details td,
        .charges td,
        .terms td {
            padding: 8px;
            border: 1px solid #ccc;
        }

        .details th,
        .charges th {
            background-color: #f4f4f4;
            padding: 10px;
            border: 1px solid #ccc;
        }

        .right-align {
            text-align: right;
        }

        .total {
            font-weight: bold;
        }

        .green {
            color: green;
        }

        .red {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('assets/logo/ECS_Logo.png') }}" alt="ECS">
            <div class="confirmation">
                <h1>Completed</h1>
            </div>
        </div>
        <div class="details">
            <h2>Reservation Completed</h2>
            <table>
                <tr>
                    <th>Pick-up Date:</th>
                    <td>{{ date('m/d/Y - l', strtotime($date)) }}</td>
                </tr>
                <tr>
                    <th>Pick-up Time:</th>
                    <td>{{ $time }}</td>
                </tr>

                <tr>
                    <th>Passenger:</th>
                    <td>{{ $name }}</td>
                </tr>
                <tr>
                    <th>Phone Number:</th>
                    <td>+966 {{ $number }}</td>
                </tr>
                <tr>
                    <th>No. of Pass:</th>
                    <td>{{ $passenger }}</td>
                </tr>
                <tr>
                    <th>Vehicle:</th>
                    <td>{{ $car_name }}</td>
                </tr>
                {{-- <tr>
                    <th>Primary/Billing Contact:</th>
                    <td>Payable Accounts</td>
                </tr>
                <tr>
                    <th>Booking Contact:</th>
                    <td>Anamul Laskar</td>
                </tr> --}}
                <tr>
                    <th>Payment Method:</th>
                    <td>{{ $payment_type }}</td>
                </tr>
            </table>
        </div>
        <div class="details">
            <h2>Trip Routing Information</h2>
            <table>
                <tr>
                    <th>Pick-up Location:</th>
                    <td>{{ $pickup }}</td>
                </tr>
                <tr>
                    <th>Drop-off Location:</th>
                    <td>{{ $drop }}</td>
                </tr>
            </table>
        </div>
        <div class="charges">
            <h2>Charges & Fees</h2>
            <table>
                <tr>
                    <th>Flat Rate</th>
                    <td class="right-align">{{ $fare }}</td>
                </tr>
                @if ($payment_type == 'Card')
                    <tr>
                        <th>VAT 15.000%</th>
                        <td class="right-align">{{ number_format($fare * 0.15, 2) }}</td>
                    </tr>
                @endif
                <tr>
                    <th>Reservation Total:</th>
                    @if ($payment_type == 'Card')
                        <td class="right-align total">{{ $fare * 1.15 }}</td>
                    @else
                        <td class="right-align total">{{ $fare }}</td>
                    @endif
                </tr>

            </table>
        </div>
        <div class="terms">
            <h2>Terms & Conditions</h2>
            <table>
                <tr>
                    <td>● 30 minutes grace waiting period from the scheduled pick up time.</td>
                </tr>
                <tr>
                    <td>● Excess waiting will be charged according to the mutually
                        agreed terms if the waiting time exceeds
                </tr>
                <tr>
                    <td>● Additional stops will be charged extra</td>
                </tr>
                <tr>
                    <td>● Alcohol consumption is strictly not allowed in all our vehicles by
                        law and any fines will be paid for by the customer.</td>
                </tr>
                <tr>
                    <td>● Smoking is not permitted in all our vehicles</td>
                </tr>

            </table>
        </div>
    </div>
</body>

</html>
