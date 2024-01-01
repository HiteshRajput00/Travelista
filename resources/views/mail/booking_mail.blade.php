<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h3>Guest details</h3>
    <p>
        <h4> guest name:&nbsp;{{ $maildata['guest_name'] }}</h4>
        <h4> guest email:&nbsp;{{ $maildata['guest_email'] }}</h4>
        <h4> guest number:&nbsp;{{ $maildata['guest_number'] }}</h4>
    </p>
    <h3>Booking details</h3>
    <p>
        <h4>booking number: {{ $maildata['booking_number'] }}</h4>
        <h4>booking number: {{ $maildata['villa_name'] }}</h4>
        <h4>From {{ $maildata['checkin_date'] }} to  {{ $maildata['checkout_date'] }}</h4>
        <h4>Total price: {{ $maildata['total_amount'] }} </h4>
    </p>
</body>

</html>
