@extends('travelista-layout.master')
@section('content')
    <section class="banner-area relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row fullscreen align-items-center justify-content-between">
                <div class="col-lg-6 col-md-6 banner-left">
                    <h6 class="text-white">Away from monotonous life</h6>
                    <h1 class="text-white">Magical Travel</h1>
                    <p class="text-white">
                        If you are looking at blank cassettes on the web, you may be very confused at the difference in
                        price. You may see some for as low as $.17 each.
                    </p>
                    <a href="#" class="primary-btn text-uppercase">Get Started</a>
                </div>
                <div class="col-lg-4 col-md-6 banner-right">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="flight-tab" data-toggle="tab" href="#flight" role="tab"
                                aria-controls="flight" aria-selected="true">villa</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="flight" role="tabpanel" aria-labelledby="flight-tab">
                            <form class="form-wrap" action="{{ url('/search') }}" method="POST">
                                @csrf
                                <input type="text" class="form-control" name="travel_to" id="search-input"
                                    placeholder="where to.. " onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'From '">
                                <div id="results-container" style="display: none; background-color:white"></div>
                                <input type="text" class="form-control date-picker" name="start_date"
                                    placeholder="Start " onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Start '">
                                <input type="text" class="form-control date-picker" name="end_date" placeholder="Return "
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Return '">
                                <input type="number" min="1" max="20" class="form-control" name="guest"
                                    placeholder="Guests " onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Adults '">

                                <button type="submit" class="primary-btn text-uppercase">Search </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .fixed-nav-bar {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1;
            width: 100%;
            height: 50px;
            background-color: #FFFFFF;
        }
    </style>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Punchlist</a>
            <a class="navbar-brand" href="#"><span class="fa fa-filter" aria-hidden="true"></span></a>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="bs-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="#"></a></li>
                    <li><a href="../Lists/FSEs">FSEs</a></li>
                    <li><a href="../Lists/Persons">Personnel</a></li>
                    <li><a href="../Lists/Punchlist Items">Punchlist</a></li>
                    <li class="bg-info"><a href="../Pages/AddNew.aspx">Add New</a></li>
                </ul>
            </div>

        </div>
    </nav>
    <!-- End banner Area -->
    {{-- <section class="about-banner relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <div class="container">

                        <div class="row check-availabilty" id="next">
                            <div class="block-32" data-aos="fade-up" data-aos-offset="-200">

                                <form id="form" action="#" method="post">
                                    <div class="row">
                                        <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                                            <label for="travel_to" class="font-weight-bold text-white">Travelling to</label>
                                            <div class="field-icon-wrap">
                                                <div class="icon"><i class="ri-map-pin-line"></i></div>
                                                <input type="text" id="search-input" name="travel_to" class="form-control "
                                                    placeholder="Where are you going ?">
                                                    <div id="results-container" style="display: none; background-color:white"></div>
                                            </div>

                                        </div>


                                        <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                                            <label for="checkindate" class="font-weight-bold text-white">Check In</label>
                                            <div class="field-icon-wrap">
                                                <div class="icon"></div>
                                                <input type="date" id="checkindate" class="form-control"
                                                    placeholder="DD/MM/YYYY">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                                            <label for="checkoutdate" class="font-weight-bold text-white">Check Out</label>
                                            <div class="field-icon-wrap">
                                                <div class="icon"></div>
                                                <input type="date" id="checkoutdate" class="form-control"
                                                    placeholder="DD/MM/YYYY">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3 mb-md-0 col-lg-3">
                                            <div class="row">
                                                <div class="col-md-4 mb-3 mb-md-0">
                                                    <label for="adults" class="font-weight-bold text-white">Guests</label>
                                                    <div class="field-icon-wrap">
                                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                        <select name="" id="adults" class="form-control">
                                                            <option value="">1</option>
                                                            <option value="">2</option>
                                                            <option value="">3</option>
                                                            <option value="">4+</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-7 col-lg-8 align-self-end">
                                                    <button type="submit"
                                                        class="btn btn-dark btn-block text-white">Check
                                                        Availabilty</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <section class="destinations-area section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-40 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">Popular Destinations</h1>
                        <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast,
                            day to.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @if ($villa_list)
                    @foreach ($villa_list as $villa)
                        <div class="col-lg-4">
                            <div class="single-destinations">
                                <div class="thumb">
                                    <img src="{{ url('/images/' . $villa->image) }}" alt="">
                                </div>
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
                                        {{ $villa->location->city }} , {{ $villa->location->state }},
                                        {{ $villa->location->country }}
                                    </p>
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
                                            <a href="{{ route('villa.details', ['id' => $villa->id]) }}"
                                                class="price-btn">{{ $villa->price }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#search-input').on('input', function() {
                const query = $(this).val();

                $.ajax({
                    url: '/autocomplete',
                    method: 'GET',
                    data: {
                        query: query
                    },
                    success: function(data) {
                        // Handle the data and update the UI
                        displayResults(data);
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            });

            function displayResults(results) {
                // Clear previous results
                $('#results-container').empty();

                // Display new results
                results.forEach(result => {
                    const resultElement = $('<div class="result-item">' + result.city + ',' + result.state +
                        '</div>');
                    resultElement.css('cursor', 'pointer');
                    resultElement.click(function() {
                        // Combine city, state, and country when setting the input value
                        const selectedValue = result.city + ', ' + result.state + ', ' + result
                            .country;
                        $('#search-input').val(selectedValue);
                        $('#results-container')
                            .hide(); // Hide the results container after selection
                    });

                    $('#results-container').append(resultElement);
                });

                $('#results-container').show();
            }
        });
    </script>
@endsection
