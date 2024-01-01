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
                            <form class="form-wrap" action="{{ url('/find-booking') }}" method="POST">
                                @csrf
                                <input type="email" class="form-control" name="email" autocomplete="off" id="search-input"
                                    placeholder=" enter your email">
                                <button type="submit" class="primary-btn text-uppercase">Search </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection