@extends('admin_layout.master')
@section('content')
    <div class="dashboard-wrapper">
        <div class="container-fluid  dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Bookings </h2>
                        <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet
                            vestibulum mi. Morbi lobortis pulvinar quam.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">booked villas</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Bookings</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- ============================================================== -->
                <!-- validation form -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">bookings </h5>
                        <div class="card-body">
                            <div id="booking-details">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sr no.</th>
                                            <th>Booking ID</th>
                                            <th>Check-in Date</th>
                                            <th>Check-out Date</th>
                                        </tr>
                                    </thead>
                                    <tbody id="booking-details-tbody">
                                        @foreach ($bookings as $booking)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $booking->booking_number }}</td>
                                                <td>{{ $booking->checkin_date }}</td>
                                                <td>{{ $booking->checkout_date }}</td>
                                                <td><a class="btn btn-outline-light" href="{{ url('/admin-dashboard/booking-details?booking_number='.$booking->booking_number) }}">view booking</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
