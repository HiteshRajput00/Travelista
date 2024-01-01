<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h3>your details</h3>
    <p>
        <h4> guest name:&nbsp;{{ $userdata['guest_name'] }}</h4>
        <h4> guest email:&nbsp;{{ $userdata['guest_email'] }}</h4>
        <h4> guest number:&nbsp;{{ $userdata['guest_number'] }}</h4>
    </p>
    <h3>Booking details</h3>
    <p>
        <h4>booking number: {{ $userdata['booking_number'] }}</h4>
        <h4>booking number: {{ $userdata['villa_name'] }}</h4>
        <h4>From {{ $userdata['checkin_date'] }} to  {{ $userdata['checkout_date'] }}</h4>
        <h4>Total price: {{ $userdata['total_amount'] }} </h4>
    </p>
    <h3>{{ $userdata['description'] }}</h3>
</body>

</html>