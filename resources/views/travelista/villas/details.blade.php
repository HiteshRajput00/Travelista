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
                        {{ $villa->villa_name }}
                    </h1>
                    <p class="text-white link-nav"><a href="index.html">Home </a> <span class="lnr lnr-arrow-right"></span> <a
                            href="{{ url('/villa-details?villa_id=' . $villa->id) }}"> villa Details</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->
    <!-- Start insurence-one Area -->
    <section class="insurence-one-area section-gap">
        <div class="container " id="villa-item" data-villa-name="{{ $villa->villa_name }}"
            data-lat="{{ $villa->location->lat }}" data-long="{{ $villa->location->lang }}">
            <div class="row align-items">
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
                <div class="col-lg-8  insurence-right">
                    <div class="container p-lg-3">
                        <style>
                            #map {
                                height: 350px;
                                width: 100%;
                            }
                        </style>
                        <div id="map"></div>
                        <h2 class="mb-4">Book a Villa</h2>

                        <form action="{{ url('/book-villa') }}" id="payment-form" method="post">
                            @csrf
                            @auth
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="guestName" class="form-label">Guest Name</label>
                                        <input type="text" class="form-control" id="guestName"
                                            value="{{ Auth::user()->name }}" name="guestName">
                                    </div>
                                    @error('guestName')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="col-md-6">
                                        <label for="contactInfo" class="form-label">email</label>
                                        <input type="email" class="form-control" id="email"
                                            value="{{ Auth::user()->email }}" name="email">
                                    </div>
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="col-md-6">
                                        <label for="contactInfo" class="form-label">Contact Information</label>
                                        <input type="text" class="form-control" id="contactInfo"
                                            value="{{ Auth::user()->mobile_number }}" name="contact_number">
                                    </div>
                                    @error('contact_number')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                @if (Auth::user()->details)
                                    <h4>Address</h4>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="guestName" class="form-label">house_number</label>
                                            <input type="text" class="form-control" id="house_number"
                                                value="{{ Auth::user()->details->house_number }}" name="house_number">
                                        </div>
                                        @error('house_number')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="col-md-6">
                                            <label for="contactInfo" class="form-label">City</label>
                                            <input type="text" class="form-control" id="City"
                                                value="{{ Auth::user()->details->city }}" name="City">
                                        </div>
                                        @error('City')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="col-md-6">
                                            <label for="contactInfo" class="form-label">State</label>
                                            <input type="text" class="form-control" id="State"
                                                value="{{ Auth::user()->details->state }}" name="State">
                                        </div>
                                        @error('State')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="col-md-6">
                                            <label for="contactInfo" class="form-label">Country</label>
                                            <input type="text" class="form-control" id="Country"
                                                value="{{ Auth::user()->details->country }}" value="US" name="Country">
                                        </div>
                                        @error('Country')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @else
                                    <h4>Address</h4>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="guestName" class="form-label">house_number</label>
                                            <input type="text" class="form-control" id="house_number"
                                                name="house_number">
                                        </div>
                                        @error('house_number')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="col-md-6">
                                            <label for="contactInfo" class="form-label">City</label>
                                            <input type="text" class="form-control" id="City" name="City">
                                        </div>
                                        @error('City')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="col-md-6">
                                            <label for="contactInfo" class="form-label">State</label>
                                            <input type="text" class="form-control" id="State" name="State">
                                        </div>
                                        @error('State')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="col-md-6">
                                            <label for="contactInfo" class="form-label">Country</label>
                                            <input type="text" class="form-control" id="Country" value="US"
                                                name="Country">
                                        </div>
                                        @error('Country')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif
                            @else
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="guestName" class="form-label">Guest Name</label>
                                        <input type="text" class="form-control" id="guestName" name="guestName">
                                    </div>
                                    @error('guestName')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="col-md-6">
                                        <label for="contactInfo" class="form-label">email</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="col-md-6">
                                        <label for="contactInfo" class="form-label">Contact Information</label>
                                        <input type="text" class="form-control" id="contactInfo" name="contact_number">
                                    </div>
                                    @error('contact_number')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <h4>Address</h4>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="guestName" class="form-label">house_number</label>
                                        <input type="text" class="form-control" id="house_number" name="house_number">
                                    </div>
                                    @error('house_number')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="col-md-6">
                                        <label for="contactInfo" class="form-label">City</label>
                                        <input type="text" class="form-control" id="City" name="City">
                                    </div>
                                    @error('City')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="col-md-6">
                                        <label for="contactInfo" class="form-label">State</label>
                                        <input type="text" class="form-control" id="State" name="State">
                                    </div>
                                    @error('State')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="col-md-6">
                                        <label for="contactInfo" class="form-label">Country</label>
                                        <input type="text" class="form-control" id="Country" value="US"
                                            name="Country">
                                    </div>
                                    @error('Country')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endauth
                            <hr>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="checkin" class="form-label">Check-in Date</label>
                                    <input type="text" id="dateRange" class="form-control date-picker"
                                        name="checkin_date" placeholder="Start " onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Start '">
                                    @error('checkin_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="checkout" class="form-label">Check-out Date</label>
                                    <input type="text" class="form-control date-picker" name="checkout_date"
                                        placeholder="end" id="checkout" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'end '">
                                    @error('checkout_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="villa_id" value="{{ $villa->id }}">
                            <div class="row mb-3">
                                <div class="col-md-6 ">
                                    <p>Total Nights: <span id="numberOfNights">0</span></p>
                                    <input type="hidden" class="form-control" id="totalNights" name="totaldays"
                                        readonly>
                                </div>
                                <div class="col-md-6 ">
                                    <p>Total Price: $<span id="totalPrice">0</span></p>
                                    <input type="hidden" class="form-control" id="total_price" name="total_price"
                                        readonly>
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
                                    @error('numOfGuests')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <label class="form-label">Enter Card Details</label>
                            <div class="row mb-3">
                                <div class="col-md-8 form-group">
                                    <div class="form-control" id="card-element"></div>
                                    <div id="card-errors"></div>
                                </div>
                                @error('payment_method')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Booking</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        var stripe = Stripe(
            'pk_test_51OQ5lXSHuCTN4d6J0eysWWMeFXsyJBKreckgJD5oP9bYVvTrxZFU3FmlByyKSamJVb2BF8n6KrE4HQJmP7MZDRvQ00tpNTRse7'
        );
        var elements = stripe.elements();
        var cardElement = elements.create('card');

        cardElement.mount('#card-element');

        // create card element //
        var form = document.getElementById('payment-form');
        var errorElement = document.getElementById('card-errors');

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createPaymentMethod({
                type: 'card',
                card: cardElement,
            }).then(function(result) {
                if (result.error) {
                    errorElement.textContent = result.error.message;
                } else {
                    stripeTokenHandler(result.paymentMethod);
                }
            });
        });

        function stripeTokenHandler(paymentMethod) {
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'payment_method');
            hiddenInput.setAttribute('value', paymentMethod.id);
            form.appendChild(hiddenInput);
            form.submit();
        }
    </script>

    {{-- flatpicker script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var bookedDates = JSON.parse('{!! json_encode($bookings) !!}');
            console.log(bookedDates);
            flatpickr('#dateRange', {
                mode: 'range',
                altInput: true,
                minDate: 'today',
                disable: [function(date) {
                    var isBooked = bookedDates.some(function(booking) {
                        var checkinDate = new Date(booking.checkin_date);
                        var checkoutDate = new Date(booking.checkout_date);
                        checkinDate.setHours(0, 0, 0, 0);
                        checkoutDate.setHours(23, 59, 59, 999);
                        return date >= checkinDate && date <= checkoutDate;
                    });
                    return isBooked;
                }],
                plugins: [new rangePlugin({
                    input: '#dateRange'
                })],

                onChange: function(selectedDates, dateStr, instance) {
                    if (selectedDates.length === 2) {
                        document.getElementById('dateRange').value = flatpickr.formatDate(selectedDates[
                            0], "F j, Y");
                        document.getElementById('checkout').value = flatpickr.formatDate(selectedDates[
                            1], "F j, Y");

                        var checkinDate = selectedDates[0];
                        var checkoutDate = selectedDates[1];

                        var numberOfNights = Math.ceil((checkoutDate - checkinDate) / (1000 * 60 * 60 *
                            24));

                        var totalPrice = numberOfNights * {{ $villa->price }};

                        document.getElementById('totalNights').value = numberOfNights;
                        document.getElementById('total_price').value = totalPrice;
                        document.getElementById('numberOfNights').textContent = numberOfNights;
                        document.getElementById('totalPrice').textContent = totalPrice;

                    }
                }
            });
        });
    </script>

    {{-- mapbox script --}}
    <script>
        mapboxgl.accessToken =
            'pk.eyJ1IjoidHJhZGVkbWVkaWEiLCJhIjoiY2tvYjNoaTV6MDR4eDJvbzI5NDBzNTltdiJ9.0SL_APVAwIlAIJO17FaZXA';

        var villa = document.getElementById('villa-item');
        var firstVillaname = villa.getAttribute('data-villa-name');

        var firstVillaLocation = [
            parseFloat(villa.getAttribute('data-long')),
            parseFloat(villa.getAttribute('data-lat'))
        ];
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: firstVillaLocation,
            zoom: 12
        });


        var marker = new mapboxgl.Marker()
            .setLngLat(firstVillaLocation)
            .addTo(map);

        var popup = new mapboxgl.Popup({
            closeButton: false,
            closeOnClick: false
        });

        popup.setLngLat(firstVillaLocation)
            .setHTML('<h5>' + firstVillaname + '</h5>')
            .addTo(map);

        map.on('click', function(e) {

            map.flyTo({
                center: firstVillaLocation,
                zoom: 20,
                essential: true
            });
        });
    </script>
@endsection
