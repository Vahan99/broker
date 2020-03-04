@extends('user_side_layouts.index')

@section('title', 'Achtamar Restaurant')

@section('content')
        
    @include('user_side_layouts.header')
    <!-- ***** Breadcumb Area Start ***** -->
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url({{ URL::asset('user_side/img/bg-img/hero-2.jpg') }})">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h2>Menu</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Breadcumb Area End ***** -->

    <!-- ***** Menu Area Start ***** -->
    <div class="caviar-food-menu section-padding-150 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <div class="food-menu-title">
                        <h2>Menu</h2>
                    </div>
                </div>

                <div class="col-10">
                    <div class="caviar-projects-menu">
                        <div class="text-center portfolio-menu">
                            <button class="active" data-filter="*">All</button>
                            <button data-filter=".breakfast">breakfast</button>
                            <button data-filter=".lunch">lunch</button>
                            <button data-filter=".dinner">dinner</button>
                        </div>
                    </div>

                    <div class="caviar-menu-slides owl-carousel clearfix">

                        <div class="caviar-portfolio clearfix">
                            <!-- Single Gallery Item -->
                            <div class="single_menu_item breakfast wow fadeInUp">
                                <div class="d-sm-flex align-items-center">
                                    <div class="dish-thumb">
                                        <img src="{{ URL::asset('user_side/img/menu-img/dish-1.png') }}" alt="">
                                    </div>
                                    <div class="dish-description">
                                        <h3>Lorem Ipsum Dolor Sit Amet</h3>
                                        <p>Sed commodo augue eu diam tincidunt, sit amet auctor lectus semper. Mauris porttitor diam at fringilla tempor.</p>
                                    </div>
                                    <div class="dish-value">
                                        <h3>$45</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Gallery Item -->
                            <div class="single_menu_item breakfast dinner wow fadeInUp">
                                <div class="d-sm-flex align-items-center">
                                    <div class="dish-thumb">
                                        <img src="{{ URL::asset('user_side/img/menu-img/dish-2.png') }}" alt="">
                                    </div>
                                    <div class="dish-description">
                                        <h3>Lorem Ipsum Dolor Sit Amet</h3>
                                        <p>Sed commodo augue eu diam tincidunt, sit amet auctor lectus semper. Mauris porttitor diam at fringilla tempor.</p>
                                    </div>
                                    <div class="dish-value">
                                        <h3>$45</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Gallery Item -->
                            <div class="single_menu_item lunch wow fadeInUp">
                                <div class="d-sm-flex align-items-center">
                                    <div class="dish-thumb">
                                        <img src="{{ URL::asset('user_side/img/menu-img/dish-3.png') }}" alt="">
                                    </div>
                                    <div class="dish-description">
                                        <h3>Lorem Ipsum Dolor Sit Amet</h3>
                                        <p>Sed commodo augue eu diam tincidunt, sit amet auctor lectus semper. Mauris porttitor diam at fringilla tempor.</p>
                                    </div>
                                    <div class="dish-value">
                                        <h3>$45</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Gallery Item -->
                            <div class="single_menu_item lunch wow fadeInUp">
                                <div class="d-sm-flex align-items-center">
                                    <div class="dish-thumb">
                                        <img src="{{ URL::asset('user_side/img/menu-img/dish-1.png') }}" alt="">
                                    </div>
                                    <div class="dish-description">
                                        <h3>Lorem Ipsum Dolor Sit Amet</h3>
                                        <p>Sed commodo augue eu diam tincidunt, sit amet auctor lectus semper. Mauris porttitor diam at fringilla tempor.</p>
                                    </div>
                                    <div class="dish-value">
                                        <h3>$45</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Gallery Item -->
                            <div class="single_menu_item dinner wow fadeInUp">
                                <div class="d-sm-flex align-items-center">
                                    <div class="dish-thumb">
                                        <img src="{{ URL::asset('user_side/img/menu-img/dish-2.png') }}" alt="">
                                    </div>
                                    <div class="dish-description">
                                        <h3>Lorem Ipsum Dolor Sit Amet</h3>
                                        <p>Sed commodo augue eu diam tincidunt, sit amet auctor lectus semper. Mauris porttitor diam at fringilla tempor.</p>
                                    </div>
                                    <div class="dish-value">
                                        <h3>$45</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="caviar-portfolio clearfix">
                            <!-- Single Gallery Item -->
                            <div class="single_menu_item breakfast wow fadeInUp">
                                <div class="d-sm-flex align-items-center">
                                    <div class="dish-thumb">
                                        <img src="{{ URL::asset('user_side/img/menu-img/dish-1.png') }}" alt="">
                                    </div>
                                    <div class="dish-description">
                                        <h3>Lorem Ipsum Dolor Sit Amet</h3>
                                        <p>Sed commodo augue eu diam tincidunt, sit amet auctor lectus semper. Mauris porttitor diam at fringilla tempor.</p>
                                    </div>
                                    <div class="dish-value">
                                        <h3>$45</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Gallery Item -->
                            <div class="single_menu_item breakfast dinner wow fadeInUp">
                                <div class="d-sm-flex align-items-center">
                                    <div class="dish-thumb">
                                        <img src="{{ URL::asset('user_side/img/menu-img/dish-2.png') }}" alt="">
                                    </div>
                                    <div class="dish-description">
                                        <h3>Lorem Ipsum Dolor Sit Amet</h3>
                                        <p>Sed commodo augue eu diam tincidunt, sit amet auctor lectus semper. Mauris porttitor diam at fringilla tempor.</p>
                                    </div>
                                    <div class="dish-value">
                                        <h3>$45</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Gallery Item -->
                            <div class="single_menu_item lunch wow fadeInUp">
                                <div class="d-sm-flex align-items-center">
                                    <div class="dish-thumb">
                                        <img src="{{ URL::asset('user_side/img/menu-img/dish-3.png') }}" alt="">
                                    </div>
                                    <div class="dish-description">
                                        <h3>Lorem Ipsum Dolor Sit Amet</h3>
                                        <p>Sed commodo augue eu diam tincidunt, sit amet auctor lectus semper. Mauris porttitor diam at fringilla tempor.</p>
                                    </div>
                                    <div class="dish-value">
                                        <h3>$45</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Gallery Item -->
                            <div class="single_menu_item lunch wow fadeInUp">
                                <div class="d-sm-flex align-items-center">
                                    <div class="dish-thumb">
                                        <img src="{{ URL::asset('user_side/img/menu-img/dish-1.png') }}" alt="">
                                    </div>
                                    <div class="dish-description">
                                        <h3>Lorem Ipsum Dolor Sit Amet</h3>
                                        <p>Sed commodo augue eu diam tincidunt, sit amet auctor lectus semper. Mauris porttitor diam at fringilla tempor.</p>
                                    </div>
                                    <div class="dish-value">
                                        <h3>$45</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Gallery Item -->
                            <div class="single_menu_item dinner wow fadeInUp">
                                <div class="d-sm-flex align-items-center">
                                    <div class="dish-thumb">
                                        <img src="{{ URL::asset('user_side/img/menu-img/dish-2.png') }}" alt="">
                                    </div>
                                    <div class="dish-description">
                                        <h3>Lorem Ipsum Dolor Sit Amet</h3>
                                        <p>Sed commodo augue eu diam tincidunt, sit amet auctor lectus semper. Mauris porttitor diam at fringilla tempor.</p>
                                    </div>
                                    <div class="dish-value">
                                        <h3>$45</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="caviar-portfolio clearfix">
                            <!-- Single Gallery Item -->
                            <div class="single_menu_item breakfast wow fadeInUp">
                                <div class="d-sm-flex align-items-center">
                                    <div class="dish-thumb">
                                        <img src="{{ URL::asset('user_side/img/menu-img/dish-1.png') }}" alt="">
                                    </div>
                                    <div class="dish-description">
                                        <h3>Lorem Ipsum Dolor Sit Amet</h3>
                                        <p>Sed commodo augue eu diam tincidunt, sit amet auctor lectus semper. Mauris porttitor diam at fringilla tempor.</p>
                                    </div>
                                    <div class="dish-value">
                                        <h3>$45</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Gallery Item -->
                            <div class="single_menu_item breakfast dinner wow fadeInUp">
                                <div class="d-sm-flex align-items-center">
                                    <div class="dish-thumb">
                                        <img src="{{ URL::asset('user_side/img/menu-img/dish-2.png') }}" alt="">
                                    </div>
                                    <div class="dish-description">
                                        <h3>Lorem Ipsum Dolor Sit Amet</h3>
                                        <p>Sed commodo augue eu diam tincidunt, sit amet auctor lectus semper. Mauris porttitor diam at fringilla tempor.</p>
                                    </div>
                                    <div class="dish-value">
                                        <h3>$45</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Gallery Item -->
                            <div class="single_menu_item lunch wow fadeInUp">
                                <div class="d-sm-flex align-items-center">
                                    <div class="dish-thumb">
                                        <img src="{{ URL::asset('user_side/img/menu-img/dish-3.png') }}" alt="">
                                    </div>
                                    <div class="dish-description">
                                        <h3>Lorem Ipsum Dolor Sit Amet</h3>
                                        <p>Sed commodo augue eu diam tincidunt, sit amet auctor lectus semper. Mauris porttitor diam at fringilla tempor.</p>
                                    </div>
                                    <div class="dish-value">
                                        <h3>$45</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Gallery Item -->
                            <div class="single_menu_item lunch wow fadeInUp">
                                <div class="d-sm-flex align-items-center">
                                    <div class="dish-thumb">
                                        <img src="{{ URL::asset('user_side/img/menu-img/dish-1.png') }}" alt="">
                                    </div>
                                    <div class="dish-description">
                                        <h3>Lorem Ipsum Dolor Sit Amet</h3>
                                        <p>Sed commodo augue eu diam tincidunt, sit amet auctor lectus semper. Mauris porttitor diam at fringilla tempor.</p>
                                    </div>
                                    <div class="dish-value">
                                        <h3>$45</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Gallery Item -->
                            <div class="single_menu_item dinner wow fadeInUp">
                                <div class="d-sm-flex align-items-center">
                                    <div class="dish-thumb">
                                        <img src="{{ URL::asset('user_side/img/menu-img/dish-2.png') }}" alt="">
                                    </div>
                                    <div class="dish-description">
                                        <h3>Lorem Ipsum Dolor Sit Amet</h3>
                                        <p>Sed commodo augue eu diam tincidunt, sit amet auctor lectus semper. Mauris porttitor diam at fringilla tempor.</p>
                                    </div>
                                    <div class="dish-value">
                                        <h3>$45</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- ***** Menu Area End ***** -->

    @include('user_side_layouts.footer')

@stop
