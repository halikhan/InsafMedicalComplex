@extends('user.master')
@section('title')
    About Us
@endsection

@section('content')
    <div class="page-banner overlay-dark bg-image" style="background-image: url({{asset('assets')}}/img/bg_image_1.jpg);">
        <div class="banner-section">
            <div class="container text-center wow fadeInUp">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About</li>
                    </ol>
                </nav>
                <h1 class="font-weight-normal">About Us</h1>
            </div> <!-- .container -->
        </div> <!-- .banner-section -->
    </div> <!-- .page-banner -->

    <div class="page-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-4 py-3 wow zoomIn">
                    <div class="card-service">
                        <div class="circle-shape bg-secondary text-white">
                            <span class="mai-chatbubbles-outline"></span>
                        </div>
                        <p><span>Chat</span> with a doctors</p>
                    </div>
                </div>
                <div class="col-md-4 py-3 wow zoomIn">
                    <div class="card-service">
                        <div class="circle-shape bg-primary text-white">
                            <span class="mai-shield-checkmark"></span>
                        </div>
                        <p><span>Insaf-Medical</span>-Health Protection</p>
                    </div>
                </div>
                <div class="col-md-4 py-3 wow zoomIn">
                    <div class="card-service">
                        <div class="circle-shape bg-accent text-white">
                            <span class="mai-basket"></span>
                        </div>
                        <p><span>Insaf-Medical</span>-Health Pharmacy</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 wow fadeInUp">
                    <h1 class="text-center mb-3">Welcome to Your Health Center</h1>
                    <div class="text-lg">
                        <p>At Insaf Medical, we are committed to providing top-quality healthcare with a team of experienced and compassionate doctors. Our mission is to ensure that every patient receives personalized treatment in a comfortable and professional environment. From general check-ups to specialized medical consultations, we offer a wide range of services to cater to your healthcare needs.</p>
                        <p>Our dedicated team of doctors and medical staff prioritize your well-being with state-of-the-art facilities and the latest medical advancements. Whether you need preventive care, diagnostic services, or treatment for chronic conditions, Insaf Medical is here to support you every step of the way. Your health is our priority, and we strive to deliver excellence in medical care with integrity and dedication.</p>
                    </div>
                </div>

                <div class="col-lg-10 mt-5">
                    <h1 class="text-center mb-5 wow fadeInUp" style="font-size: 30px;font-weight: 500;">Our Doctors</h1>
                    <div class="row justify-content-center">
                        <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
                            @foreach($doctor as $doctors)
                                <div class="item">
                                    <div class="card-doctor">
                                        <div class="header">
                                            <img  src="{{$doctors->image}}" alt="" style="height: 250px !important;">
                                            <div class="meta">
                                                <a href="#"><span class="mai-call"></span></a>
                                                <a href="#"><span class="mai-logo-whatsapp"></span></a>
                                            </div>
                                        </div>
                                        <div class="body">
                                            <p class="text-xl mb-0">{{$doctors->name}}</p>
                                            <span class="text-sm text-grey">{{$doctors->speciality}}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section banner-home bg-image" style="background-image: url({{asset('assets')}}/img/banner-pattern.svg);">
        <div class="container py-5 py-lg-0">
            <div class="row align-items-center">
                <div class="col-lg-4 wow zoomIn">
                    <div class="img-banner d-none d-lg-block">
                        <img src="{{asset('assets')}}/img/mobile_app.png" alt="">
                    </div>
                </div>
                <div class="col-lg-8 wow fadeInRight">
                    <h1 class="font-weight-normal mb-3">Get easy access of all features using One Health Application</h1>
                    <a href="#"><img src="{{asset('assets')}}/img/google_play.svg" alt=""></a>
                    <a href="#" class="ml-2"><img src="{{asset('assets')}}/img/app_store.svg" alt=""></a>
                </div>
            </div>
        </div>
    </div> <!-- .banner-home -->
@endsection
