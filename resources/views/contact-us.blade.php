@extends('website.layout')
@section('content')

    <style>
        .form-control {
            display: block;
            width: 100%;
            padding: .375rem .75rem;
            font-size: .9375rem;
            line-height: 1.6;
            color: #343a40;
            height: 39px;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #17acda;
            /* border-radius: 3px; */
            outline: none;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }
        .form-control:focus {
            color: #6f6e6e;
            background-color: #fff;
            border-color: #17acda;
            outline: 0;
            box-shadow: none;
        }

        .contact-info-list li {
            position: relative;
            margin-bottom: 30px;
            font-size: 16px;
            min-height: 50px;
            line-height: 1.8em;
            padding-left: 50px;
            color: rgb(0 0 0 / 80%);
        }
        ul, li {
            list-style: none;
            padding: 0px;
            margin: 0px;
        }
        .contact-info-list li .icon {
            position: absolute;
            left: 0px;
            top: 8px;
            font-size: 26px;
            line-height: 1em;
        }
        .contact-info-list li strong {
            font-weight: 700;
            font-size: 18px;
            display: block;
        }
        .contact-info-list {
            position: relative;
        }
        .breadcrumb-item a {
            color: rgb(255 255 255);
        }

    </style>
    <section>
        <div class="bannerimg cover-image bg-background3 sptb-2" data-image-src="../assets/images/banners/banner2.jpg">
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white ">
                        <h1 class="">Contact Us</h1>
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item" style="color: white;"><a href="{{url('index')}}">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Contact Us</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--How to work-->
    <section class="sptb bg-white">
        <div class="container">
            <div class="section-title center-block text-center">
                <h4>Get In Touch With Us</h4>
                <h2 style="font-weight: 800">Request a Quote</h2>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="">
                        <div class="inner-column wow fadeInLeft animated" data-wow-delay="0ms" style="visibility: visible; animation-delay: 0ms; animation-name: fadeInLeft;padding: 9px;">
                            <!-- Title Box -->
                            <ul class="contact-info-list">
                                <li>
                                    <span class="icon icon-home"></span>
                                    <strong>Office</strong>
                                        No.1, Hundred Feet Road, 5th Block,<br> Koramangala, Bangalore -560 095, India
                                </li>
                                <li>
                                    <span class="icon icon-envelope-open"></span>
                                    <strong>Email us</strong>  info@globalcalcium.com
                                </li>
                                <li><span class="icon icon-call-in"></span>
                                    <strong>Call Support</strong>91-80-40554500
                                </li>
                                <li><span class="icon fa fa-fax"></span>
                                    <strong> Fax </strong>91-80-25530807
                                </li>

                            </ul>
                            </div>
                    </div>
                </div>
                <div class="col-xl-6  col-lg-6 col-md-12 mx-auto d-block">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 d-block mx-auto">
                            <div class="bg-transparent">
                                <div class="form">
                                    <div class="form-group bg-white">
                                        <label class="form-label text-dark">Full Name</label>
                                        <input type="text" class="form-control" id="text4" placeholder="Full Name">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label text-dark">Email</label>
                                        <input type="text" class="form-control" id="text5" placeholder="Email">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label text-dark">Mobile No</label>
                                        <input class="form-control" type="number" placeholder="Mobile Number">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label text-dark">Message</label>
                                        <textarea class="form-control" name="" id="" cols="30" rows="4" placeholder="Message	"></textarea>
                                    </div>
                                    <div class="mt-5">
                                        <a type="submit" class="btn btn-lg btn-block btn-primary" href="javascript:void(0);"
                                            style="background: linear-gradient(to right, rgba(22, 80, 226, 0.95) 0%, rgba(126, 81, 236, 0.95) 100%);">
                                            Submit
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.581859540168!2d77.62133021467469!3d12.934574719189689!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae145b11749989%3A0x3c062f4ff117d0f0!2sGlobal%20Calcium%20Pvt.%20Ltd.!5e0!3m2!1sen!2sin!4v1616130174518!5m2!1sen!2sin"
                width="100%" height="350" style="border:0;" allowfullscreen="">
            </iframe>
    </div>

@endsection
