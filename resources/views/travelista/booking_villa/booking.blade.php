@extends('travelista-layout.master')
@section('content')
    <!-- start banner Area -->
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
                            <a class="nav-link active" id="hotel-tab" data-toggle="tab" href="#hotel" role="tab"
                                aria-controls="hotel" aria-selected="false">Find your booking</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="hotel" role="tabpanel" aria-labelledby="hotel-tab">
                            <form class="form-wrap" action="{{ url('/booking-details') }}" method="GET">
                                @csrf
                                <input type="email" class="form-control" name="email" autocomplete="off"
                                    id="search-input" placeholder=" enter your email">
                                <button type="submit" class="primary-btn text-uppercase">Search </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Start insurence-one Area -->
    <section class="insurence-one-area section-gap">
        @if ($booked_villa === '')
        @else
            @foreach ($booked_villa as $villa)
                <?php $villa = \App\Models\Villas::class::find($villa->villa_id); ?>
                <br><br>
                <div class="container " id="villa-item" data-villa-name="{{ $villa->villa_name }}"
                    data-lat="{{ $villa->location->lat }}" data-long="{{ $villa->location->lang }}">
                    <div class="row align-items">
                        <div class="col-lg-4">
                            <div class="single-destinations">
                                <div class="thumb">
                                    {{-- <img src="{{ url('/images/' . $villa->image) }}" width="350px" height="400px"
                                    alt="" height="50px" width="50px"> --}}
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
                                    <ul class="package-list">
                                        <li class="d-flex justify-content-between align-items-center">
                                            <span>Price per night</span>
                                            <p>{{ $villa->price }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </section>

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
