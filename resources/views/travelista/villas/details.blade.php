@extends('travelista-layout.master')
@section('content')
    <style>
        #map {
            height: 300px;
            width: 50%;
        }
    </style>
    <!-- start banner Area -->
    <section class="about-banner relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        About Us
                    </h1>
                    <p class="text-white link-nav"><a href="index.html">Home </a> <span class="lnr lnr-arrow-right"></span> <a
                            href="about.html"> villa Details</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->
    <!-- Start insurence-one Area -->
    <section class="insurence-one-area section-gap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="single-destinations">
                        <div class="thumb">
                            <img src="{{ url('/images/' . $villa->image) }}" width="350px" height="400px" alt="">
                        </div>
                        <br>
                        <div class="details">
                            <h4 class="d-flex justify-content-between">
                                <span>{{ $villa->villa_name }}</span>
                                <div class="star">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                            </h4>
                            <p>
                                Location: {{ $villa->location->city }} , {{ $villa->location->state }},
                                {{ $villa->location->country }}
                            </p>
                            <strong style="color: black">
                                <p>Bedrooms:&nbsp;{{ $villa->bedrooms }} </p>
                            </strong>
                            <strong style="color: black">
                                <p>bathrooms: &nbsp;{{ $villa->bathrooms }} </p>
                            </strong>
                            <strong style="color: black">
                                <p>guest_capacity: &nbsp;{{ $villa->guest_capacity }} </p>
                            </strong>

                            <ul class="package-list">
                                <?php $amenities = json_decode($villa->amenities, true); ?>
                                @foreach ($amenities as $list)
                                    <li class="d-flex justify-content-between align-items-center">
                                        <span>{{ $list }}</span>
                                        <span>Yes</span>
                                    </li>
                                @endforeach

                                <li class="d-flex justify-content-between align-items-center">
                                    <span>Price per night</span>
                                    <p>{{ $villa->price }}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 p-40 insurence-right">
                    <div class="container p-lg-3">
                        <h2 class="mb-4">Book a Villa</h2>

                        <form action="{{ url('/book-villa') }}" method="post">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="guestName" class="form-label">Guest Name</label>
                                    <input type="text" class="form-control" id="guestName" name="guestName" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="contactInfo" class="form-label">Contact Information</label>
                                    <input type="text" class="form-control" id="contactInfo" name="contactInfo" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="checkin" class="form-label">Check-in Date</label>
                                    <input type="text" id="dateRange" class="form-control date-picker" name="start"
                                        placeholder="Start " onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Start '">
                                </div>
                                <div class="col-md-6">
                                    <label for="checkout" class="form-label">Check-out Date</label>
                                    <input type="text" class="form-control date-picker" name="end" placeholder="end"
                                        id="checkout" onfocus="this.placeholder = ''" onblur="this.placeholder = 'end '">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div id="result"></div>
                                    <label for="totaldays" class="form-label">Number of days</label>
                                    <input type="text" class="form-control" id="total_days" name="totaldays" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="price" class="form-label">total price</label>
                                    <input type="text" class="form-control" id="total_price" name="price" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="numOfGuests" class="form-label">Number of Guest</label>
                                    <select class="form-control" name="numOfGuests" id="numOfGuests">
                                        @for ($i = 2; $i <= $villa->guest_capacity; $i += 2)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit Booking</button>
                        </form>
                    </div>
                </div>
                <div id="map"></div>

            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var bookedDates = JSON.parse('{!! json_encode($bookings) !!}'); // Parse the JSON string into an array
            console.log("Booked Dates:", bookedDates);
            flatpickr('#dateRange', {
                mode: 'range',
                altInput: true,
                minDate: 'today',
                disable: [function(date) {
                    var isBooked = bookedDates.some(function(booking) {
                        var checkinDate = new Date(booking.checkin_date);
                        var checkoutDate = new Date(booking.checkout_date);
                        return date >= checkinDate && date <= checkoutDate;
                    });

                    // Format the currentDate as yyyy-mm-dd
                    var currentDate = date.toISOString().split('T')[0];

                    var isCheckinCheckoutDate = bookedDates.some(function(booking) {
                        return currentDate === booking.checkin_date || currentDate ===
                            booking
                            .checkout_date;
                    });

                    return isBooked || isCheckinCheckoutDate;
                }],
                plugins: [new rangePlugin({
                    input: '#dateRange'
                })],

                onChange: function(selectedDates, dateStr, instance) {
                    if (selectedDates.length === 2) {
                        document.getElementById('checkout').value = dateStr.split(" to ")[0];
                    }
                }
            });
        });
    </script>
   
@endsection
