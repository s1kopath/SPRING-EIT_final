@extends('wellknown.layouts.index')

@section("content")




<style>

    .about-border{
        border-right: 1px solid green;
    }
    @media (max-width: 575.98px) {
        .about-border{
            border: 1px solid white;
        }
        .feature-content {

        padding-left: 5px;

    }
     }
    .aboutus-section {
        padding: 90px 0;
    }
    .aboutus-title {
        font-size: 30px;
        letter-spacing: 0;
        line-height: 32px;
        margin: 0 0 39px;
        padding: 0 0 11px;
        position: relative;
        text-transform: uppercase;
        color: #000;
    }
    .aboutus-title::after {
        background: #39B54A none repeat scroll 0 0;
        bottom: 0;
        content: "";
        height: 2px;
        left: 0;
        position: absolute;
        width: 54px;
    }
    .aboutus-text {
        color: gray;
        font-size: 15px;
        line-height: 22px;
        margin: 0 0 35px;
    }

    a:hover, a:active {
        color: #39B54A;
        text-decoration: none;
        outline: 0;
    }
    .aboutus-more {
        border: 1px solid #39B54A;
        border-radius: 25px;
        color: black;
        display: inline-block;
        font-size: 14px;
        font-weight: 700;
        letter-spacing: 0;
        padding: 7px 20px;
        text-transform: uppercase;
        margin-bottom: 40px;
    }
    .feature .feature-box .iconset {
        background: #fff none repeat scroll 0 0;
        float: left;
        position: relative;
        width: 18%;
    }
    .feature .feature-box .iconset::after {
        background: #39B54A none repeat scroll 0 0;
        content: "";
        height: 80%;
        left: 43%;
        position: absolute;
        top: 100%;
        width: 1px;
    }

    .feature .feature-box .feature-content h4 {
        color: #0f0f0f;
        font-size: 18px;
        letter-spacing: 0;
        line-height: 22px;
        margin: 0 0 5px;
    }


    .feature .feature-box .feature-content {
        float: left;
        padding-left: 30px;
        width: 78%;
    }


    .feature .feature-box .feature-content h4 {
        color: #0f0f0f;
        font-size: 18px;
        letter-spacing: 0;
        line-height: 22px;
        margin: 0 0 5px;
    }
    .feature .feature-box .feature-content p {
        color: #606060;
        font-size: 13px;
        line-height: 22px;
    }

    }


    </style>





		<!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon lnr lnr-cross"></span></div>

            <nav class="menu-box">
                <div class="nav-logo"><a href="{{route('home')}}"><img src="{{ asset('frontend') }}/images/logo.png" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            </nav>
        </div><!-- End Mobile Menu -->

    </header>
    <!--End Main Header -->





	<!-- Page Banner Image Section -->
    <div class="page-banner-image-section">

 <br><br><br><br><br><br>


		<div class="image">
			<img src="{{ asset('frontend') }}/images/background/{{$about->bg_image}}" alt="" />
		</div>
	</div>
	<!-- End Page Banner Image Section -->


	<!-- About Section Two -->
	<div class="about-section">

		<div class="auto-container">
			<div class="inner-container">
				<div class="row align-items-center clearfix">
					<!-- Image Column -->
					<div class="image-column col-lg-6">
						<div class="about-image">
							<div class="about-inner-image">
								<img src="{{ asset('frontend') }}/images/about/{{$about->ceo_image}}" alt="about">
							</div>
						</div>
					</div>

					<!-- Content Column -->
					<div class="content-column col-lg-6 col-md-12 col-sm-12 mb-0">
						<div class="about-column">
							<div class="sec-title">
								<div class="title">about us</div>
								<h2>{{$about->title_name}}  <span>{{$about->highlite_name}}</span><br>{{$about->next_title}}</h2>
							</div>
							<div class="text">
								<p>{{$about->about_details}}</p>
							</div>
							<div class="signature">shaun <span>CEO</span> <span>Shahoriar Shaun</span></div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

    <div class="breadcrumb-area bg-gray">
        <div class="container">
            <div class="breadcrumb-content text-center">

            </div>
        </div>
    </div>

    {{-- <div class="service-area pb-3">
        <div class="container">
            @if (!empty($about))
                {!! $about->content !!}
            @endif
        </div>
    </div> --}}

    <div class="aboutus-section">
        <div class="container">
            <div class="row">
                <div  class="about-border col-md-6 col-sm-6 col-xs-12 ">
                    <div class="aboutus">
                        <h2 class="aboutus-title">About Us</h2>
                        @if($aboutDescription != null)
                        <p class="aboutus-text">{{ $aboutDescription->about_description }}</p>
                        <!-- <p class="aboutus-text" > We have been running this business with reputation for 17 long years and we have reached today's condition. We are always engaged in any of your needs. We provide agricultural equipment to any government, non-government, autonomous organization.</p>
                        <p class="aboutus-text"> We have been working as a reputed advertising agency in print and electronic media for over 25 years. In addition, one of our security guard providers has been operating with a reputation for 25 years</p> -->
                        <a class="aboutus-more" href="#">read more</a>
                    </div>
                </div>
                {{-- <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="aboutus-banner">
                        <img src="http://themeinnovation.com/demo2/html/build-up/img/home1/about1.jpg" alt="">
                    </div>
                </div> --}}
                <div class="col-md-5 col-sm-6 col-xs-12">
                    <div class="feature">
                        <div class="feature-box">
                            <div class="clearfix">

                                <div class="feature-content">
                                    <h4>{{ $aboutDescription->sub_title_one }}</h4>
                                    <p class="aboutus-text">{{ $aboutDescription->sub_one }}</p>
                                </div>
                            </div>
                        </div><br>
                        <div class="feature-box">
                            <div class="clearfix">

                                <div class="feature-content">
                                    <h4>{{ $aboutDescription->sub_title_two }}</h4>
                                    <p class="aboutus-text">{{ $aboutDescription->sub_two }}</p>
                                </div>
                            </div>
                        </div><br><br>
                        <div class="feature-box">
                            <div class="clearfix">

                                <div class="feature-content">
                                    <h4>{{ $aboutDescription->sub_title_three }}</h4>
                                    <p class="aboutus-text">{{ $aboutDescription->sub_three }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>





	<!-- End About Section Two -->




	<!-- Main Footer -->



@endsection
