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
                        {{-- <li class="nav-item">
                            <a class="nav-link active" id="flight-tab" data-toggle="tab" href="#flight" role="tab"
                                aria-controls="flight" aria-selected="true">Flights</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link active" id="hotel-tab" data-toggle="tab" href="#hotel" role="tab"
                                aria-controls="hotel" aria-selected="false">villas</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" id="holiday-tab" data-toggle="tab" href="#holiday" role="tab"
                                aria-controls="holiday" aria-selected="false">Holidays</a>
                        </li> --}}
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        {{-- <div class="tab-pane fade show active" id="flight" role="tabpanel" aria-labelledby="flight-tab">
                            <form class="form-wrap">
                                <input type="text" class="form-control" id="search-input" name="travel_to"
                                    placeholder="To " onfocus="this.placeholder = ''" onblur="this.placeholder = 'To '">
                                <input type="text" class="form-control date-picker" id="checkin_date" name="start" placeholder="Start "
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Start '">
                                <input type="text" class="form-control date-picker" name="return" placeholder="Return "
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Return '">
                                <input type="number" min="1" max="20" class="form-control" name="adults"
                                    placeholder="Adults " onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Adults '">
                                <input type="number" min="1" max="20" class="form-control" name="child"
                                    placeholder="Child " onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Child '">
                                <a href="#" class="primary-btn text-uppercase">Search villa</a>
                            </form>
                        </div> --}}
                        <div class="tab-pane fade show active" id="hotel" role="tabpanel" aria-labelledby="hotel-tab">
                            <form class="form-wrap" action="{{ url('/search') }}" method="POST">
                                @csrf
                                <input type="text" class="form-control" name="travel_to" id="search-input" placeholder="where to.. "
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'From '">
                                <div id="results-container" style="display: none; background-color:white"></div>
                            <input type="text" class="form-control date-picker" name="start_date" placeholder="Start "
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Start '">
                            <input type="text" class="form-control date-picker" name="end_date" placeholder="Return "
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Return '">
                            <input type="number" min="1" max="20" class="form-control" name="guest"
                                placeholder="Guests " onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Adults '">
                         
                            <button type="submit" class="primary-btn text-uppercase">Search </button>
                        </form>
                        </div>
                        {{-- <div class="tab-pane fade" id="holiday" role="tabpanel" aria-labelledby="holiday-tab">
                            <form class="form-wrap">
                                <input type="text" class="form-control" name="name" placeholder="From "
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'From '">
                                <input type="text" class="form-control" name="to" placeholder="To "
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'To '">
                                <input type="text" class="form-control date-picker" name="start"
                                    placeholder="Start " onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Start '">
                                <input type="text" class="form-control date-picker" name="return"
                                    placeholder="Return " onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Return '">
                                <input type="number" min="1" max="20" class="form-control" name="adults"
                                    placeholder="Adults " onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Adults '">
                                <input type="number" min="1" max="20" class="form-control" name="child"
                                    placeholder="Child " onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Child '">
                                <a href="#" class="primary-btn text-uppercase">Search Holidays</a>
                            </form>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start popular-destination Area -->
    <section class="popular-destination-area section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">Popular Destinations</h1>
                        <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast,
                            day.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-destination relative">
                        <div class="thumb relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="{{ url('/travelista/img/d1.jpg') }}" alt="">
                        </div>
                        <div class="desc">
                            <a href="#" class="price-btn">$150</a>
                            <h4>Mountain River</h4>
                            <p>Paraguay</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-destination relative">
                        <div class="thumb relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="{{ url('/travelista/img/d2.jpg') }}" alt="">
                        </div>
                        <div class="desc">
                            <a href="#" class="price-btn">$250</a>
                            <h4>Dream City</h4>
                            <p>Paris</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-destination relative">
                        <div class="thumb relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="{{ url('/travelista/img/d3.jpg') }}" alt="">
                        </div>
                        <div class="desc">
                            <a href="#" class="price-btn">$350</a>
                            <h4>Cloud Mountain</h4>
                            <p>Sri Lanka</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End popular-destination Area -->


    <!-- Start price Area -->
    <section class="price-area section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">We Provide Affordable Prices</h1>
                        <p>Well educated, intellectual people, especially scientists at all times demonstrate considerably.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-price">
                        <h4>Cheap Packages</h4>
                        <ul class="price-list">
                            <li class="d-flex justify-content-between align-items-center">
                                <span>New York</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Maldives</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Sri Lanka</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Nepal</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Thiland</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Singapore</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-price">
                        <h4>Luxury Packages</h4>
                        <ul class="price-list">
                            <li class="d-flex justify-content-between align-items-center">
                                <span>New York</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Maldives</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Sri Lanka</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Nepal</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Thiland</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Singapore</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-price">
                        <h4>Camping Packages</h4>
                        <ul class="price-list">
                            <li class="d-flex justify-content-between align-items-center">
                                <span>New York</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Maldives</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Sri Lanka</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Nepal</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Thiland</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Singapore</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End price Area -->


    <!-- Start other-issue Area -->
    <section class="other-issue-area section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-9">
                    <div class="title text-center">
                        <h1 class="mb-10">Other issues we can help you with</h1>
                        <p>We all live in an age that belongs to the young at heart. Life that is.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single-other-issue">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ url('/travelista/img/o1.jpg') }}" alt="">
                        </div>
                        <a href="#">
                            <h4>Rent a Car</h4>
                        </a>
                        <p>
                            The preservation of human life is the ultimate value, a pillar of ethics and the foundation.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-other-issue">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ url('/travelista/img/o2.jpg') }}" alt="">
                        </div>
                        <a href="#">
                            <h4>Cruise Booking</h4>
                        </a>
                        <p>
                            I was always somebody who felt quite sorry for myself, what I had not got compared.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-other-issue">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ url('/travelista/img/o3.jpg') }}" alt="">
                        </div>
                        <a href="#">
                            <h4>To Do List</h4>
                        </a>
                        <p>
                            The following article covers a topic that has recently moved to center stage–at least it seems.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-other-issue">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ url('/travelista/img/o4.jpg') }}" alt="">
                        </div>
                        <a href="#">
                            <h4>Food Features</h4>
                        </a>
                        <p>
                            There are many kinds of narratives and organizing principles. Science is driven by evidence.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End other-issue Area -->


    <!-- Start testimonial Area -->
    <section class="testimonial-area section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">Testimonial from our Clients</h1>
                        <p>The French Revolution constituted for the conscience of the dominant aristocratic class a fall
                            from </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="active-testimonial">
                    <div class="single-testimonial item d-flex flex-row">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ url('/travelista/img/elements/user1.png') }}" alt="">
                        </div>
                        <div class="desc">
                            <p>
                                Do you want to be even more successful? Learn to love learning and growth. The more effort
                                you put into improving your skills, the bigger the payoff you.
                            </p>
                            <h4>Harriet Maxwell</h4>
                            <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial item d-flex flex-row">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ url('/travelista/img/elements/user2.png') }}" alt="">
                        </div>
                        <div class="desc">
                            <p>
                                A purpose is the eternal condition for success. Every former smoker can tell you just how
                                hard it is to stop smoking cigarettes. However.
                            </p>
                            <h4>Carolyn Craig</h4>
                            <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial item d-flex flex-row">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ url('/travelista/img/elements/user1.png') }}" alt="">
                        </div>
                        <div class="desc">
                            <p>
                                Do you want to be even more successful? Learn to love learning and growth. The more effort
                                you put into improving your skills, the bigger the payoff you.
                            </p>
                            <h4>Harriet Maxwell</h4>
                            <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial item d-flex flex-row">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ url('/travelista/img/elements/user2.png') }}" alt="">
                        </div>
                        <div class="desc">
                            <p>
                                A purpose is the eternal condition for success. Every former smoker can tell you just how
                                hard it is to stop smoking cigarettes. However.
                            </p>
                            <h4>Carolyn Craig</h4>
                            <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial item d-flex flex-row">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ url('/travelista/img/elements/user1.png') }}" alt="">
                        </div>
                        <div class="desc">
                            <p>
                                Do you want to be even more successful? Learn to love learning and growth. The more effort
                                you put into improving your skills, the bigger the payoff you.
                            </p>
                            <h4>Harriet Maxwell</h4>
                            <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial item d-flex flex-row">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ url('/travelista/img/elements/user2.png') }}" alt="">
                        </div>
                        <div class="desc">
                            <p>
                                A purpose is the eternal condition for success. Every former smoker can tell you just how
                                hard it is to stop smoking cigarettes. However.
                            </p>
                            <h4>Carolyn Craig</h4>
                            <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End testimonial Area -->


    <!-- Start home-about Area -->
    <section class="home-about-area">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-end">
                <div class="col-lg-6 col-md-12 home-about-left">
                    <h1>
                        Did not find your Package? <br>
                        Feel free to ask us. <br>
                        We‘ll make it for you
                    </h1>
                    <p>
                        inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct
                        standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the
                        job is beyond reproach. inappropriate behavior is often laughed.
                    </p>
                    <a href="#" class="primary-btn text-uppercase">request custom price</a>
                </div>
                <div class="col-lg-6 col-md-12 home-about-right no-padding">
                    <img class="img-fluid" src="{{ url('/travelista/img/about-img.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- End home-about Area -->


    <!-- Start blog Area -->
    <section class="recent-blog-area section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-60 col-lg-9">
                    <div class="title text-center">
                        <h1 class="mb-10">Latest from Our Blog</h1>
                        <p>With the exception of Nietzsche, no other madman has contributed so much to human sanity as has.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="active-recent-blog-carusel">
                    <div class="single-recent-blog-post item">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ url('/travelista/img/b1.jpg') }}" alt="">
                        </div>
                        <div class="details">
                            <div class="tags">
                                <ul>
                                    <li>
                                        <a href="#">Travel</a>
                                    </li>
                                    <li>
                                        <a href="#">Life Style</a>
                                    </li>
                                </ul>
                            </div>
                            <a href="#">
                                <h4 class="title">Low Cost Advertising</h4>
                            </a>
                            <p>
                                Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A
                                farmer.
                            </p>
                            <h6 class="date">31st January,2018</h6>
                        </div>
                    </div>
                    <div class="single-recent-blog-post item">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ url('/travelista/img/b2.jpg') }}" alt="">
                        </div>
                        <div class="details">
                            <div class="tags">
                                <ul>
                                    <li>
                                        <a href="#">Travel</a>
                                    </li>
                                    <li>
                                        <a href="#">Life Style</a>
                                    </li>
                                </ul>
                            </div>
                            <a href="#">
                                <h4 class="title">Creative Outdoor Ads</h4>
                            </a>
                            <p>
                                Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A
                                farmer.
                            </p>
                            <h6 class="date">31st January,2018</h6>
                        </div>
                    </div>
                    <div class="single-recent-blog-post item">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ url('/travelista/img/b3.jpg') }}" alt="">
                        </div>
                        <div class="details">
                            <div class="tags">
                                <ul>
                                    <li>
                                        <a href="#">Travel</a>
                                    </li>
                                    <li>
                                        <a href="#">Life Style</a>
                                    </li>
                                </ul>
                            </div>
                            <a href="#">
                                <h4 class="title">It's Classified How To Utilize Free</h4>
                            </a>
                            <p>
                                Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A
                                farmer.
                            </p>
                            <h6 class="date">31st January,2018</h6>
                        </div>
                    </div>
                    <div class="single-recent-blog-post item">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ url('/travelista/img/b1.jpg') }}" alt="">
                        </div>
                        <div class="details">
                            <div class="tags">
                                <ul>
                                    <li>
                                        <a href="#">Travel</a>
                                    </li>
                                    <li>
                                        <a href="#">Life Style</a>
                                    </li>
                                </ul>
                            </div>
                            <a href="#">
                                <h4 class="title">Low Cost Advertising</h4>
                            </a>
                            <p>
                                Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A
                                farmer.
                            </p>
                            <h6 class="date">31st January,2018</h6>
                        </div>
                    </div>
                    <div class="single-recent-blog-post item">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ url('/travelista/img/b2.jpg') }}" alt="">
                        </div>
                        <div class="details">
                            <div class="tags">
                                <ul>
                                    <li>
                                        <a href="#">Travel</a>
                                    </li>
                                    <li>
                                        <a href="#">Life Style</a>
                                    </li>
                                </ul>
                            </div>
                            <a href="#">
                                <h4 class="title">Creative Outdoor Ads</h4>
                            </a>
                            <p>
                                Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A
                                farmer.
                            </p>
                            <h6 class="date">31st January,2018</h6>
                        </div>
                    </div>
                    <div class="single-recent-blog-post item">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ url('/travelista/img/b3.jpg') }}" alt="">
                        </div>
                        <div class="details">
                            <div class="tags">
                                <ul>
                                    <li>
                                        <a href="#">Travel</a>
                                    </li>
                                    <li>
                                        <a href="#">Life Style</a>
                                    </li>
                                </ul>
                            </div>
                            <a href="#">
                                <h4 class="title">It's Classified How To Utilize Free</h4>
                            </a>
                            <p>
                                Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A
                                farmer.
                            </p>
                            <h6 class="date">31st January,2018</h6>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End recent-blog Area -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}

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


    <script>
        $( function() {
        $( ".date-picker" ).datepicker({minDate: 0 ,});
        
      } );

    </script>
@endsection
