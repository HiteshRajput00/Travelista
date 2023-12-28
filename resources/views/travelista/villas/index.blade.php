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
                {{-- <div class="col-lg-4 col-md-6 banner-right">
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
                                <input type="text" class="form-control" name="travel_to" id="ssearch-input"
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
                </div> --}}
            </div>
        </div>
    </section>

    <section class="destinations-area section-gap d-flex">
        <div class="container d-flex ">
            <aside class="col-md-3">
                <div class="card">
                    <article class="filter-group">
                        <div class="card-body">
                            <label class="form-group">Search Location</label>
                            <input type="text" class="form-control" name="travel_to" id="search-input"
                                placeholder="where to.. " onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'From '" value="">
                            <div id="results-container" style="display: none; background-color:white"></div>
                        </div>
                        <div style="display: none;" class="filter-content collapse show" id="collapse_2" style="">
                            <div class="card-body">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" checked="" class="custom-control-input">
                                    <div class="custom-control-label" id="searchdiv">
                                    </div>
                                </label>
                            </div>
                        </div>
                    </article>
                    <article class="filter-group">
                        <header class="card-header">
                            <a href="#" data-toggle="collapse" data-target="#collapse_3" aria-expanded="true"
                                class="">
                                <i class="icon-control fa fa-chevron-down"></i>
                                <h6 class="title">Price range </h6>
                            </a>
                        </header>
                        <form>
                            <div class="filter-content collapse show" id="collapse_3" style="">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="minPricePerNight">Min Price </label>
                                            <input type="number" id="minPricePerNight" class="form-control"
                                                placeholder="Enter min price per night">
                                        </div>
                                        <div class="form-group text-right col-md-6">
                                            <label for="maxPricePerNight">Max Price </label>
                                            <input type="number" id="maxPricePerNight" class="form-control"
                                                placeholder="Enter max price per night">
                                        </div>
                                    </div>
                                    <button type="button" id="filterButton"
                                        class="btn btn-block btn-primary">Apply</button>
                                </div>
                            </div>
                        </form>
                    </article>
                    <article class="filter-group">
                        <header class="card-header">
                            <a href="#" data-toggle="collapse" data-target="#collapse_4" aria-expanded="true"
                                class="">
                                <i class="icon-control fa fa-chevron-down"></i>
                                <h6 class="title">Services </h6>
                            </a>
                        </header>
                        <div class="filter-content collapse show" id="collapse_4" style="">
                            <div class="card-body">
                                <label class="checkbox-btn">
                                    <input type="checkbox" class="serviceCheckbox" value="swimming_pool">
                                    <span class="btn btn-light"> swimming_pool </span>
                                </label>

                                <label class="checkbox-btn">
                                    <input type="checkbox" class="serviceCheckbox" value="wifi">
                                    <span class="btn btn-light"> wifi </span>
                                </label>

                                <label class="checkbox-btn">
                                    <input type="checkbox" class="serviceCheckbox" value="Park">
                                    <span class="btn btn-light"> Park </span>
                                </label>
                            </div>
                        </div>
                    </article>
                    <article class="filter-group">
                        <header class="card-header">
                            <a href="#" data-toggle="collapse" data-target="#collapse_5" aria-expanded="true"
                                class="">
                                <i class="icon-control fa fa-chevron-down"></i>
                                <h6 class="title">More filter </h6>
                            </a>
                        </header>
                        <div class="filter-content collapse show" id="collapse_5" style="">
                            <div class="card-body">
                                <label for="guestCapacity">Number Of Guest:</label>
                                <select id="guestCapacity" class="form-control">
                                    <option value="2">2</option>
                                    <option value="4">4</option>
                                    <option value="6">6</option>
                                    <option value="8">8+</option>
                                </select>
                            </div>
                        </div>
                    </article>
                    <article class="filter-group">
                        <style>
                            #map {
                                height: 350px;
                                width: 100%;
                            }
                        </style>
                        <div id="map"></div>
                    </article>
                </div>
            </aside>

            <div class="row" id="loadedViewContainer">
                @if ($villa_list)
                    @foreach ($villa_list as $villa)
                        <div class="col-lg-4 villa-item" data-lat ="{{ $villa->location->lat }}"
                            data-lang="{{ $villa->location->lang }}" data-guest-capacity="{{ $villa->guest_capacity }}"
                            data-price-per-night="{{ $villa->price }}"
                            data-location="{{ $villa->location->city }}, {{ $villa->location->state }}, {{ $villa->location->country }}"
                            data-services="{{ implode(' ', json_decode($villa->amenities, true)) }}">
                            <div class="single-destinations">
                                <div class="thumb">
                                    <img src="{{ url('/images/' . $villa->image) }}" alt="">
                                </div>
                                <div class="details">
                                    <h6 class="d-flex justify-content-between">
                                        <span>{{ $villa->villa_name }}</span>
                                        <div class="star">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                        </div>
                                    </h6>
                                    <p>
                                        {{ $villa->location->city }} , {{ $villa->location->state }},
                                        {{ $villa->location->country }}
                                    </p>
                                    <p>Guest Capacity:<strong>&nbsp;{{ $villa->guest_capacity }}</strong></p>
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
                                            <a href="{{ url('/villa-details?villa_id=' . $villa->id) }}"
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
    {{-- <script>
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
                        if (data.length > 0) {
                            displayResults(data);
                        } else {
                            displayNoResultsMessage();
                        }
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            });

            function displayNoResultsMessage() {
                $('#results-container').empty();
                const noResultsMessage = $('<div class="result-item">Not available</div>');
                $('#results-container').append(noResultsMessage);
                $('#results-container').show();
            }

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
                        $('#searchdiv').text(selectedValue);
                        $('#results-container')
                            .hide();
                        $('#collapse_2').show();
                        $('.villa-item').each(function() {
                            var villaLocation = $(this).data('location');

                            var showVilla = (!selectedValue || villaLocation.includes(
                                selectedValue));

                            $(this).toggle(showVilla);
                        });
                    });

                    $('#results-container').append(resultElement);
                });

                $('#results-container').show();
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.serviceCheckbox').change(function() {
                var selectedServices = $('.serviceCheckbox:checked').map(function() {
                    return $(this).val();
                }).get();

                $('.villa-item').each(function() {
                    var villaServices = $(this).data('services').split(' ');
                    var showVilla = selectedServices.every(function(service) {
                        return villaServices.includes(service);
                    });

                    $(this).toggle(showVilla);
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#guestCapacity').change(function() {
                var selectedCapacity = $(this).val();

                $('.villa-item').each(function() {
                    var villaCapacity = $(this).data('guest-capacity');
                    var showVilla = selectedCapacity === '' || villaCapacity >= parseInt(
                        selectedCapacity);
                    $(this).toggle(showVilla);
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#filterButton').click(function() {
                var minPricePerNight = $('#minPricePerNight').val();
                var maxPricePerNight = $('#maxPricePerNight').val();

                $('.villa-item').each(function() {
                    var villaPrice = $(this).data('price-per-night');

                    var showVilla =
                        (!minPricePerNight || villaPrice >= parseInt(minPricePerNight)) &&
                        (!maxPricePerNight || villaPrice <= parseInt(maxPricePerNight));
                    $(this).toggle(showVilla);
                });
            });
        });
    </script> --}}

    <script>
        $(document).ready(function() {

            $('#search-input').on('input', function() {
                // applyFilters();

                const query = $(this).val();

                $.ajax({
                    url: '/autocomplete',
                    method: 'GET',
                    data: {
                        query: query
                    },
                    success: function(data) {
                        if (data.length > 0) {
                            displayResults(data);
                        } else {
                            displayNoResultsMessage();
                        }
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            });

            function displayNoResultsMessage() {
                $('#results-container').empty();
                const noResultsMessage = $('<div class="result-item">Not available</div>');
                $('#results-container').append(noResultsMessage);
                $('#results-container').show();
            }

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
                        $('#searchdiv').text(selectedValue);
                        $('#results-container')
                            .hide();
                        $('#collapse_2').show();
                        applyFilters();
                    });

                    $('#results-container').append(resultElement);
                });

                $('#results-container').show();
                if ($('#search-input').val().trim() === '') {
                    $('#results-container').hide();
                }
            }
          

            $('.serviceCheckbox').change(function() {
                applyFilters();
            });

            $('#guestCapacity').change(function() {
                applyFilters();
            });

            $('#filterButton').click(function() {
                applyFilters();
            });

            function applyFilters() {
                var selectedValue = $('#search-input').val();
                var minPricePerNight = $('#minPricePerNight').val();
                var maxPricePerNight = $('#maxPricePerNight').val();
                var selectedServices = $('.serviceCheckbox:checked').map(function() {
                    return $(this).val();
                }).get();
                var selectedCapacity = $('#guestCapacity').val();

                $('.villa-item').each(function() {
                    var villaLocation = $(this).data('location');
                    var villaServices = $(this).data('services').split(' ');
                    var villaCapacity = $(this).data('guest-capacity');
                    var villaPrice = $(this).data('price-per-night');

                    var showVilla =
                        (!selectedValue || villaLocation.includes(selectedValue)) &&
                        (!minPricePerNight || villaPrice >= parseInt(minPricePerNight)) &&
                        (!maxPricePerNight || villaPrice <= parseInt(maxPricePerNight)) &&
                        (selectedServices.length === 0 || selectedServices.every(service => villaServices
                            .includes(service))) &&
                        (selectedCapacity === '' || villaCapacity >= parseInt(selectedCapacity));

                    $(this).toggle(showVilla);
                });
            }
        });
    </script>

    <script>
        function initMap() {
            // Create a map centered at a specific location
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: -34.397,
                    lng: 150.644
                },
                zoom: 8
            });

            // Add a marker to the map
            var marker = new google.maps.Marker({
                position: {
                    lat: -34.397,
                    lng: 150.644
                },
                map: map,
            });

            var villas = document.querySelectorAll('.villa-item');

            villas.forEach(function(villa) {
                villa.addEventListener('mouseover', function() {
                    // Fetch the coordinates of the hovered villa
                    var newLocation = {
                        lat: parseFloat(villa.getAttribute('data-lat')),
                        lng: parseFloat(villa.getAttribute('data-lang'))
                    };
                    console.log(newLocation);
                    // Update the map's center and marker position
                    map.setCenter(newLocation);
                    marker.setPosition(newLocation);
                });
            });
        }
    </script>
@endsection
