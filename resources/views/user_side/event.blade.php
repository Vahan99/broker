@extends('user_side_layouts.index')

@section('title', 'Achtamar Restaurant')

@section('content')
        
    @include('user_side_layouts.header')
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url({{ URL::asset('user_side/img/bg-img/hero-4.jpg') }})">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h2>Contact</h2>
                        <p><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:+1234567890">+1 234 567 890</a> <a href="tel:+1234567890">+1 234 567 890</a></p>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i> 14 Soho Square, London, United Kingdom</p>
                        <p><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:someone@yoursite.com">lorem.ipsum@dolor.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
      
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="testimonials-content">
                        <div class="section-heading text-center">
                            <h2>Events</h2>
                        </div>
                        <div class="caviar-testimonials-slides owl-carousel">
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

    <section class=" section-padding-150">
        <div class="container">
            <div class="">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6">
                        <div class="wow fadeInUp" data-wow-delay="0.5s">
                               <iframe width='560' height='315' src="https://www.youtube.com/embed/{{ $singleEvent->link  }}" frameborder='0' allow='autoplay; encrypted-media' allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-5">
                        <div class="section-heading">
                            <h2>{{ $singleEvent->name }}</h2>
                        </div>
                        <div class="about-us-content">
                            <span>{{ $singleEvent->date }} | {{ $singleEvent->time }}</span>
                            <p>{{ $singleEvent->descr }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 

    <section class=" d-md-flex align-items-center m-b-20">
        <div class="reservation-form-area d-flex justify-content-end">
            <div class="reservation-form">
                <div class="section-heading">
                    <h2>Reser Event</h2>
                </div>
                <form id="event_reserve_form">
                    <div class="row">
                        <input type="hidden" id="evetnReserveHiddenToken" value="{{ csrf_token() }}" name="">
                        <input type="hidden" id="event_Name" value="{{ $singleEvent->name }}" name="eventName">
                        <div class="col-12 col-lg-12">
                            <input type="text" class="form-control" id="eventBookingPhone" placeholder="Phone">
                        </div>
                        <div class="col-12 col-lg-6">
                            <input type="text" class="form-control" id="eventBookingPersone" placeholder="Select Persons">
                        </div>
                        <div class="col-12 col-lg-6">
                            <input type="text" class="form-control" id="eventBookingLastName" placeholder="Last name">
                        </div>
                        <div class="col-12">
                            <textarea name="reservation-message" class="form-control" id="eventBookingMessage" cols="30" rows="10" placeholder="Your Message"></textarea>
                        </div>
                        <div class="col-12">
                            <button type="button" id="event_reser_button" class="btn caviar-btn"><span></span> Reserve</button>
                        </div>
                    </div>
                </form>
                <div id="event_reserve_alert" class="alert alert-success">
                    <strong>Tank you!</strong> Our Manager will connect with you as soon
                </div>
            </div>
        </div>
        <div class="reservation-side-thumb wow fadeInRightBig" data-wow-delay="0.5s">
            <img src="{!! Storage::url($singleEvent->image) !!}" alt="">
        </div>
    </section>

    @include('user_side_layouts.footer')

@stop
