@extends('user_side_layouts.index')

@section('title', 'Achtamar Restaurant')

@section('content')
        
    @include('user_side_layouts.header')
	<!-- ****** Welcome Area Start ****** -->
    <section class="caviar-hero-area" id="home">
        <!-- Welcome Social Info -->
        <div class="welcome-social-info">
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        </div>
        <!-- Welcome Slides -->
        <div class="caviar-hero-slides owl-carousel">
            <!-- Single Slides -->
            @foreach($sliderImages as $key=>$sliderImage)
            <div class="single-hero-slides bg-img" style="background-image: url( {{ Storage::url($sliderImage->image) }} );">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-11 col-md-6 col-lg-4">
                            <div class="hero-content">
                                <h2>{{ $sliderImage->name }}</h2>
                                <p>{{ $sliderImage->descr }}</p>
                                <a href="/#reservation" class="btn caviar-btn nav-link"><span></span> Reservation</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slider Nav -->
                @if($loop->last)
                    <div class="hero-slides-nav bg-img" style="background-image: url({{ Storage::url($sliderImages[0]->image) }});"></div>
                @else
                    <div class="hero-slides-nav bg-img" style="background-image: url({{ Storage::url($sliderImages[$key+1]->image) }});"></div>
                @endif
            </div>
            @endforeach
        </div>
    </section>
    <!-- ****** Welcome Area End ****** -->

    <!-- ****** Dish Menu Area Start ****** -->
    <section class="caviar-dish-menu" id="menu">
        <div class="container">
            <div class="row">
                <div class="col-12 menu-heading">
                    <div class="section-heading text-center">
                        <h2>Special</h2>
                    </div>
                    <!-- btn -->
                    <a href="menu.html" class="btn caviar-btn"><span></span> View The Menu</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="caviar-single-dish wow fadeInUp" data-wow-delay="0.5s">
                        <img src="{{ URL::asset('user_side/img/menu-img/dish-1.png') }}" class="myImg" alt="">
                        <div class="dish-info">
                            <h6 class="dish-name">Lorem Ipsum Dolor Sit Amet</h6>
                            <p class="dish-price">$45</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="caviar-single-dish wow fadeInUp" data-wow-delay="1s">
                        <img src="{{ URL::asset('user_side/img/menu-img/dish-2.png') }}" class="myImg" alt="">
                        <div class="dish-info">
                            <h6 class="dish-name">Lorem Ipsum</h6>
                            <p class="dish-price">$45</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="caviar-single-dish wow fadeInUp" data-wow-delay="1.5s">
                        <img src="{{ URL::asset('user_side/img/menu-img/dish-3.png') }}" class="myImg" alt="">
                        <div class="dish-info">
                            <h6 class="dish-name">Lorem Ipsum Dolor Sit Amet</h6>
                            <p class="dish-price">$45</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ****** Dish Menu Area End ****** -->

    <!-- ****** Testimonials Area Start ****** -->
    <section class="caviar-testimonials-area" id="events">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="testimonials-content">
                        <div class="section-heading text-center">
                            <h2>Events</h2>
                        </div>
                        <div class="caviar-testimonials-slides owl-carousel">
                            <!-- Single Testimonial Area -->
                            @foreach ($events as $event)
                            @if($event->status)
                            <div class="single-testimonial">
                                <div class="testimonial-thumb-name d-flex align-items-center">
                                    <img src="{!! Storage::url($event->image) !!}" alt="">
                                    <div class="tes-name">
                                        <h5><a href="/event/{{ $event->id }}" >{{ $event->name }}</a></h5>
                                        <p>{{ $event->date }} | {{ $event->time }}</p>
                                    </div>
                                </div>
                                <p class="wrapped-text">{{ $event->descr }}</p>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ****** Testimonials Area End ****** -->

    <!-- ****** Reservation Area Start ****** -->
    <section class="caviar-reservation-area d-md-flex align-items-center" id="reservation">
        <div class="reservation-form-area d-flex justify-content-end">
            <div class="reservation-form">
                <div class="section-heading">
                    <h2>Reservation</h2>
                </div>
                <div class="row" id="reserve_form">
                    <input type="hidden" id="reserveHiddenToken" value="{{ csrf_token() }}" name="">
                    <div class="col-12 col-lg-6">
                        <input type="date" class="form-control" value="" id="reserve_date">
                    </div>
                    <div class="col-12 col-lg-6">
                        <input type="time" class="form-control" value="" id="reserve_time">
                    </div>
                    <div class="col-12 col-lg-6">
                        <input type="text" class="form-control" placeholder="Select Persons" id="reserve_persons">
                    </div>
                    <div class="col-12 col-lg-6">
                        <input type="text" class="form-control" placeholder="Last name" id="reserve_lastName">
                    </div>
                    <div class="col-12 col-lg-6" id="reserv_halls">
                        <label style="color: rgba(51, 51, 51, 0.60); font-size: 14px; padding-left: 15px">Select Hall</label>
                        <select class="form-control" name="" id="reserve_hall">
                            @foreach ($halls as $hall)
                            <option value="{{ $hall->name }}">{{ $hall->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-lg-6">
                        <input type="text" class="form-control" placeholder="Phone Number" id="reserve_phoneNumber">
                    </div>
                    <div class="col-12">
                        <textarea name="reservation-message" class="form-control" id="reserve_messagee" cols="30" rows="10" placeholder="Your Message"></textarea>
                    </div>
                    <div class="col-12">
                        <button type="button" id="reser_button" class="btn caviar-btn"><span></span> Reserve Your Desk</button>
                    </div>
                </div>
                <div id="reserve_alert" class="alert alert-success">
                    <strong>Tank you!</strong> Our Manager will connect with you as soon
                </div>
            </div>
        </div>
        <div class="reservation-side-thumb wow fadeInRightBig" data-wow-delay="0.5s">
            <img src="{{ URL::asset('user_side/img/bg-img/hero-3.jpg') }}" alt="">
        </div>
    </section>
    <!-- ****** Reservation Area End ****** -->

    <!-- ****** About Us Area Start ****** -->
    <section class="caviar-about-us-area section-padding-150" id="about">
        <div class="container">
            <!-- About Us Single Area -->
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <div class="about-us-thumbnail wow fadeInUp" data-wow-delay="0.5s">
                        <img src="{{ URL::asset('user_side/img/bg-img/about-1.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-5 ml-md-auto">
                    <div class="section-heading">
                        <h2>Our Daily Info</h2>
                    </div>
                    <div class="about-us-content">
                        <ul class="list-group">
							<li class="list-group-item" style="padding: 5px">
								<h6 class="list-group-item-heading">Second List Group Item Heading</h6>
      							<p class="list-group-item-text">List Group Item Text</p>
							</li>
							<li class="list-group-item" style="padding: 5px">
								<h6 class="list-group-item-heading">Second List Group Item Heading</h6>
      							<p class="list-group-item-text">List Group Item Text</p>
							</li>
							<li class="list-group-item" style="padding: 5px">
								<h6 class="list-group-item-heading">Second List Group Item Heading</h6>
      							<p class="list-group-item-text">List Group Item Text</p>	
							</li>
							<li class="list-group-item" style="padding: 5px">
								<h6 class="list-group-item-heading">Second List Group Item Heading</h6>
      							<p class="list-group-item-text">List Group Item Text</p>
							</li>
							<li class="list-group-item" style="padding: 5px">
								<h6 class="list-group-item-heading">Second List Group Item Heading</h6>
      							<p class="list-group-item-text">List Group Item Text</p>
							</li>
							<li class="list-group-item" style="padding: 5px">
								<h6 class="list-group-item-heading">Second List Group Item Heading</h6>
      							<p class="list-group-item-text">List Group Item Text</p>
							</li>
							<li class="list-group-item" style="padding: 5px">
								<h6 class="list-group-item-heading">Second List Group Item Heading</h6>
      							<p class="list-group-item-text">List Group Item Text</p>
							</li>
						</ul>
                    </div>
                </div>
            </div>
            <!-- About Us Single Area -->
            <div class="about-us-second-part">
                <div class="row align-items-center pt-200">
                    <div class="col-12 col-md-6 col-lg-5">
                    	<div class="section-heading">
	                        <h2>About Us</h2>
	                    </div>
                        <div class="about-us-content">
                            <span>our chef</span>
                            <p>Sed commodo augue eu diam tincidunt, sit amet auctor lectus semper. Mauris porttitor diam at fringilla tempor. Integer molestie rhoncus nisi a euismod. Etiam scelerisque eu enim et vestibulum. Mauris finibus, eros a faucibus varius, dui risus mattis massa, sed lobortis ante ante eget justo.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 ml-md-auto">
                        <div class="about-us-thumbnail wow fadeInUp" data-wow-delay="0.5s">
                        	<img src="{{ URL::asset('user_side/img/bg-img/about-1.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ****** About Us Area End ****** -->

    @include('user_side_layouts.footer')

@stop