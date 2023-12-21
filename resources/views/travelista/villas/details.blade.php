@extends('travelista-layout.master')
@section('content')
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
                                    <a href="#" class="price-btn">{{ $villa->price }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 p-40 insurence-right">
                    <div class="container p-lg-3">
                        <h2 class="mb-4">Book a Villa</h2>

                        <form>
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
                                    <label for="checkinDate" class="form-label">Check-in Date</label>
                                    <input type="text" class="form-control date-picker" name="start"
                                        placeholder="Start " onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Start '">
                                </div>
                                <div class="col-md-6">
                                    <label for="checkoutDate" class="form-label">Check-out Date</label>
                                    <input type="text" class="form-control date-picker" name="start"
                                        placeholder="Start " onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Start '">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="numOfGuests" class="form-label">Number of Guests</label>
                                    <input type="number" class="form-control" id="numOfGuests" name="numOfGuests" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit Booking</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End insurence-one Area -->
@endsection
