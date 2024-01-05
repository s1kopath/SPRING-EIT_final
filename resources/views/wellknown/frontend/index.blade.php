@extends('wellknown.layouts.index')

@section("content")

<style>


    .product-grid4,.product-grid4 .product-image4{position: relative;}
    .product-grid4{font-family:Poppins,sans-serif;text-align:center;border-radius:5px;overflow:hidden;z-index:1;transition:all .3s ease 0s}
    .product-grid4:hover{box-shadow:0 0 10px rgba(0,0,0,.2)}
    .product-grid4 .product-image4 a{display:block}
    .product-grid4 .product-image4 img{width:100%;height:auto}
    .product-grid4 .pic-1{opacity:1;transition:all .5s ease-out 0s}
    .product-grid4:hover .pic-1{opacity:0}
    .product-grid4 .pic-2{position:absolute;top:0;left:0;opacity:0;transition:all .5s ease-out 0s}
    .product-grid4:hover .pic-2{opacity:1}
    .product-grid4 .social{width:180px;padding:0;margin:0 auto;list-style:none;position:absolute;right:0;left:0;top:50%;transform:translateY(-50%);transition:all .3s ease 0s}
    .product-grid4 .social li{display:inline-block;opacity:0;transition:all .7s}
    .product-grid4 .social li:nth-child(1){transition-delay:.15s}
    .product-grid4 .social li:nth-child(2){transition-delay:.3s}
    .product-grid4 .social li:nth-child(3){transition-delay:.45s}
    .product-grid4:hover .social li{opacity:1}
    .product-grid4 .social li a{color:#222;background:#fff;font-size:17px;line-height:36px;width:40px;height:36px;border-radius:2px;margin:0 5px;display:block;transition:all .3s ease 0s}
    .product-grid4 .social li a:hover{color:#fff;background:#16a085}
    .product-grid4 .social li a:after,.product-grid4 .social li a:before{content:attr(data-tip);color:#fff;background-color:#000;font-size:12px;line-height:20px;border-radius:3px;padding:0 5px;white-space:nowrap;opacity:0;transform:translateX(-50%);position:absolute;left:50%;top:-30px}
    .product-grid4 .social li a:after{content:'';height:15px;width:15px;border-radius:0;transform:translateX(-50%) rotate(45deg);top:-22px;z-index:-1}
    .product-grid4 .social li a:hover:after,.product-grid4 .social li a:hover:before{opacity:1}
    .product-grid4 .product-discount-label,.product-grid4 .product-new-label{color:#fff;background-color:#16a085;font-size:13px;font-weight:800;text-transform:uppercase;line-height:45px;height:45px;width:45px;border-radius:50%;position:absolute;left:10px;top:15px;transition:all .3s}
    .product-grid4 .product-discount-label{left:auto;right:10px;background-color:#d7292a}
    .product-grid4:hover .product-new-label{opacity:0}
    .product-grid4 .product-content{padding:25px}
    .product-grid4 .title{font-size:15px;font-weight:400;text-transform:capitalize;margin:0 0 7px;transition:all .3s ease 0s}
    .product-grid4 .title a{color:#222}
    .product-grid4 .title a:hover{color:#16a085}
    .product-grid4 .price{color:#16a085;font-size:17px;font-weight:700;margin:0 2px 15px 0;display:block}
    .product-grid4 .price span{color:#909090;font-size:13px;font-weight:400;letter-spacing:0;text-decoration:line-through;text-align:left;vertical-align:middle;display:inline-block}
    .product-grid4 .add-to-cart{border:1px solid #e5e5e5;display:inline-block;padding:10px 20px;color:#888;font-weight:600;font-size:14px;border-radius:4px;transition:all .3s}
    .product-grid4:hover .add-to-cart{border:1px solid transparent;background:#16a085;color:#fff}
    .product-grid4 .add-to-cart:hover{background-color:#2C724F;box-shadow:0 0 10px rgba(0,0,0,.5)}
    @media only screen and (max-width:990px){.product-grid4{margin-bottom:30px}
    }

    .all-product{
        position: relative; float:right; color: #000000;font-size: 14px; margin-top: 60px; display: inline-block;text-transform: uppercase;
    }

    @media (max-width: 575.98px) {
        .all-product{
            float: left;
            margin-top: 30px;
        }
        .form-boxed{
            width: 350px !important;
        }

    }

    </style>


<!-- Banner Section -->
    <div class="banner-section" >
		<div class="main-slider-carousel owl-carousel owl-theme">
          @foreach($banner as $data)
			<div class="slide" @if($loop->first) active @endif data-bg-image="frontend/images/main-slider/{{$data->bg_image}}" style="background-image:url('frontend/images/main-slider/{{$data->bg_image}}}') ">
				<div class="auto-container w-100">
					<div class="row clearfix">

						<!-- Content Column -->
						<div class="content-column col-lg-7 col-md-12 col-sm-12">
							<div class="inner-column">
								<!-- <div class="title">Welcome To</div> -->
								<h1> {{$data->banner_name}} <span>{{$data->highlight_name}}</span> {{$data->next_name}}</h1>
								<div class="text">{{$data->banner_details}}</div>
								<div class="btn-box">
									<a href="" class="theme-btn btn-style-one"><span class="txt">Work With Us</span></a>
								</div>
							</div>
						</div>

					</div>

				</div>
			</div>


          @endforeach
			<!-- <div class="slide" data-bg-image="images/main-slider/intro-1.jpg">
				<div class="auto-container w-100">
					<div class="row clearfix"> -->

						<!-- Content Column -->
						<!-- <div class="content-column col-lg-7 col-md-12 col-sm-12">
							<div class="inner-column"> -->
								<!-- <div class="title"> </div> -->
					<!-- 			<h1>Enterprise <span>ERP</span> Software Development</h1>
								<div class="text">Run Your Organization within a centralized and integrated
system in one platform.

</div>
								<div class="btn-box">
									<a href="" class="theme-btn btn-style-one"><span class="txt">Work With Us</span></a>
								</div>
							</div>
						</div>

					</div>

				</div>
			</div>

			<div class="slide" data-bg-image="images/main-slider/intro-1.jpg">
				<div class="auto-container w-100">
					<div class="row clearfix"> -->

						<!-- Content Column -->
						<!-- <div class="content-column col-lg-7 col-md-12 col-sm-12">
							<div class="inner-column"> -->
								<!-- <div class="title">consulte company</div> -->
				<!-- 				<h1>Digital <span>Branding</span> with IT solutions</h1>
								<div class="text">Grow your business with our IT expertise.</div>
								<div class="btn-box">
									<a href="" class="theme-btn btn-style-one"><span class="txt">Work With Us</span></a>
								</div>
							</div>
						</div>

					</div>

				</div>
			</div> -->

		</div>


	</div>
	<!-- End Banner Section -->



	<!-- About Section -->
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
	<!-- End About Section -->
<!-- CTA Section Start -->
<div class="cta-section mydiv" data-bg-image="images/background/cta-bg.jp">
	<div class="auto-container">
		<div class="row align-items-center">
			<div class="col-lg-7">

				<div class="cta-content">
					<h3 class="title">{{$cta->title}}<span class="text-bold">{{$cta->bold_title}}</span></h3>
					<p>{{$cta->details}}</p>
				</div>

			</div>
			<div class="col-lg-5">

				<div class="cta-phone text-lg-end text-strat">
					<a href="tel:+88{{$cta->phone}}"><span class="icon icofont-phone"></span> <h2 class="title">+880{{$cta->phone}}</h2></a>

				</div>

			</div>
		</div>
	</div>
</div>
<!-- CTA Section End -->

<div class="container">
 <div class="row">
     <div class="col-md-12">
        <iframe width="100%" height="550px" style="padding: 100px 0 20px 0;" src="{{$video->v_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
     </div>

 </div>

</div>
	<!-- Services Section -->
	<div class="services-section">

		<div class="auto-container">
			<div class="sec-title">
				<div class="title">our services</div>
				<h2><span>Best Solutions</span> For Your Business</h2>
			</div>
			<div class="inner-container">
				<div class="row g-0">

					<!-- Service Block -->
					@foreach($service as $data)
					<div class="service-block col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="icon-box">
								<span class="icon ti-{{$data->service_class}}"></span>
							</div>
							<h5><a href="{{route('service_detail',['id'=>$data->id])}}">{{$data->service_name}}</a></h5>
							<div class="text">{{$data->service_topic}}</div>
							<a class="read-more" href="{{route('service_detail',['id'=>$data->id])}}">More <span class="ti-angle-right"></span></a>
						</div>
					</div>
					@endforeach
               </div>
           </div>
       </div>
</div>


	<!-- End Services Section -->

	<!-- Project Section -->
		<div class="project-section">
		<div class="auto-container">

			<!-- Sec Title -->
			<div class="sec-title">
				<div class="clearfix">
					<div class="pull-left">
						<div class="title">latest projects</div>
						<h2>See Our <span>Successful Projects</span></h2>
					</div>
					<div class="pull-right">
						<a href="{{route('project')}}" class="cases">all Projects <span class="arrow ti-angle-right"></span></a>
					</div>
				</div>
			</div>

		</div>

		<div class="outer-container">
			<div class="row clearfix">

				<!-- Column -->
				<div class="column  col-md-12">
					<div class="row clearfix">

						<!-- Inner Column -->
						@foreach($project as $data)
						<div class="inner-column col-md-4">
							<div class="gallery-block">
								<div class="inner-box">
									<div class="image">
										<img src="{{ asset('frontend') }}/project/images/{{$data->project_image}}" alt="" />
										<div class="overlay-box">
											<div class="overlay-inner">

												<h3><a href="{{route('project_detail',['id'=>$data->id])}}" target="blank">{{$data->project_name}}</a></h3>
												<div class="designation">{{$data->project_type}}</div>
												<a href="//{{$data->demo_link}}" class="arrow ti-angle-right"></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endforeach

						<!-- Inner Column -->
						<!-- <div class="inner-column col-md-4">
							<div class="gallery-block">
								<div class="inner-box">
									<div class="image">
										<img src="{{ asset('frontend') }}/images/gallery/3.jpg" alt="" />
										<div class="overlay-box">
											<div class="overlay-inner">
                        <h3><a href="project-details.html">Client Relationship Management software</a></h3>
												<div class="designation">ERP Base</div>
												<a href="project-details.html" class="arrow ti-angle-right"></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
            <div class="column col-md-4">
              <div class="gallery-block">
                <div class="inner-box">
                  <div class="image">
                    <img src="{{ asset('frontend') }}/images/gallery/1.jpg" alt="" />
                    <div class="overlay-box">
                      <div class="overlay-inner">
                        <h3><a href="project-details.html">Human Resource Management software</a></h3>
                        <div class="designation">ERP Base</div>
                        <a href="project-details.html" class="arrow ti-angle-right"></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

						<!-- Inner Column -->
						<!-- <div class="inner-column col-lg-12 col-md-12 col-sm-12">
							<div class="gallery-block">
								<div class="inner-box">
									<div class="image">
										<img src="{{ asset('frontend') }}/images/gallery/4.jpg" alt="" />
										<div class="overlay-box">
											<div class="overlay-inner">
												<h3><a href="project-details.html">WOTa Money Save</a></h3>
												<div class="designation">Finance, Consulting</div>
												<a href="project-details.html" class="arrow ti-angle-right"></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> -->

					</div>
				</div>

				<!-- Column -->


			</div>
		</div>
	</div>
	<!-- End Project Section -->

    <!-- Product Section -->

    <div class="auto-container mt-5">

        <!-- Sec Title -->
        <div class="sec-title">
            <div class="clearfix">
                <div class="pull-left">
                    <div class="title">latest products</div>
                    <h2>See Our <span>Products</span></h2>
                </div>
                <div class="all-product">
                    <a href="#" style="color:black" class="cases">ALL PRODUCTS <span class="arrow ti-angle-right"></span></a>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <div style="box-shadow: 3px 3px 25px #888888; border-radius:8px" class="product-grid4 border   mb-5">
                <div class="product-image4">
                    <a href="#">
                        <img style="height:300px" class="pic-1"  src="https://www.springsoftit.com/frontend/images/gallery/2.jpg" alt="" >
                        <img style="height:300px" class="pic-2"  src="https://www.springsoftit.com/frontend/images/gallery/2.jpg" alt="">
                    </a>


                </div>
                <div class="product-content ">
                    <h3 class="title"><a  href="#">HRM</a></h3>
                    <div class="price">
                         300$
                        <span>500$</span>
                    </div>
                   <div class="row d-flex justify-content-around">
                       <a class="add-to-cart " href="#" >DETAILS</a>
                       <a class="add-to-cart"href="#" >ADD TO CART</a>
                        {{-- <a class="add-to-cart"  href="{{route('get.product-details',['id'=>$p_all->id,'name'=>$p_all->product_name,'price'=> $p_all->sale_price ])}}">BUY NOW</a> --}}
                   </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-12">
            <div style="box-shadow: 3px 3px 25px #888888; border-radius:8px" class="product-grid4 border  mb-5">
                <div class="product-image4">
                    <a href="#">
                        <img style="height:300px" class="pic-1"  src="https://www.springsoftit.com/frontend/images/gallery/2.jpg" alt="" >
                        <img style="height:300px" class="pic-2"  src="https://www.springsoftit.com/frontend/images/gallery/2.jpg" alt="">
                    </a>


                </div>
                <div class="product-content ">
                    <h3 class="title"><a  href="#">HRM</a></h3>
                    <div class="price">
                         300$
                        <span>500$</span>
                    </div>
                   <div class="row d-flex justify-content-around">
                       <a class="add-to-cart " href="#" >DETAILS</a>
                       <a class="add-to-cart"href="#" >ADD TO CART</a>
                        {{-- <a class="add-to-cart"  href="{{route('get.product-details',['id'=>$p_all->id,'name'=>$p_all->product_name,'price'=> $p_all->sale_price ])}}">BUY NOW</a> --}}
                   </div>
                </div>
            </div>
        </div>



        <div class="col-md-4 col-sm-12">
            <div style="box-shadow: 3px 3px 25px #888888; border-radius:8px" class="product-grid4 border  mb-5">
                <div class="product-image4">
                    <a href="#">
                        <img style="height:300px" class="pic-1"  src="https://www.springsoftit.com/frontend/images/gallery/2.jpg" alt="" >
                        <img style="height:300px" class="pic-2"  src="https://www.springsoftit.com/frontend/images/gallery/2.jpg" alt="">
                    </a>


                </div>
                <div class="product-content ">
                    <h3 class="title"><a  href="#">HRM</a></h3>
                    <div class="price">
                         300$
                        <span>500$</span>
                    </div>
                   <div class="row d-flex justify-content-around">
                       <a class="add-to-cart " href="#" >DETAILS</a>
                       <a class="add-to-cart"href="#" >ADD TO CART</a>
                        {{-- <a class="add-to-cart"  href="{{route('get.product-details',['id'=>$p_all->id,'name'=>$p_all->product_name,'price'=> $p_all->sale_price ])}}">BUY NOW</a> --}}
                   </div>
                </div>
            </div>
        </div>
    </div>

	<!-- Testimonial Section -->
	<div class="testimonial-section">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title">
				<div class="title">testimonials</div>
				<h2><span>+{{$clint}} Clients </span>Love Us</h2>
			</div>
			<div class="testimonial-carousel owl-carousel owl-theme">

				<!-- Testimonial Block -->
				@foreach($testimonial as $data)
				<div class="testimonial-block">
					<div class="inner-box">
						<div class="quote icofont-quote-right"></div>
						<div class="author">{{$data->author}}<span>/{{$data->designation}}</span></div>
						<div class="text">{{$data->details}}</div>
					</div>
				</div>
				@endforeach

				<!-- Testimonial Block -->
			<!-- 	<div class="testimonial-block">
					<div class="inner-box">
						<div class="quote icofont-quote-right"></div>
						<div class="author">Pitraiot <span>/ Director at Insteraktcje</span></div>
						<div class="text">Spring Soft IT is a great software company . They made a social media like sharing apps for me and their support is appriciate.</div>
					</div>
				</div> -->

				<!-- Testimonial Block -->
				<!-- <div class="testimonial-block">
					<div class="inner-box">
						<div class="quote icofont-quote-right"></div>
						<div class="author">Stephen Fielding  <span>YELL ( London )</span></div>
						<div class="text">Spring Soft It has own effective digital Branding startegy and they are focused on start up company to build their own identity.</div>
					</div>
				</div> -->

				<!-- Testimonial Block -->
				<!-- <div class="testimonial-block">
					<div class="inner-box">
						<div class="quote icofont-quote-right"></div>
						<div class="author">Dina Moses
 <span>Executive Consultant with rodan and fields</span></div>
						<div class="text">Sed elit quam, iaculis sed semper sit amet udin vitae nibh. Rubino at magna akal semperFusce commodo molestie luctus.Lorem ipsum Dolor tusima olatiup.</div>
					</div>
				</div>
 -->
			</div>
		</div>
	</div>
	<!-- End Testimonial Section -->

	<!-- Sponsors Section -->
	<div class="sponsors-section">
		<div class="auto-container">

			<div class="carousel-outer">
                <!--Sponsors Slider-->
                <ul class="sponsors-carousel owl-carousel owl-theme">

                	@foreach($sponsor as $data)
                    <li style="height:140px" class="p-5 border"><div class="image-box"><a href="#"><img src="{{ asset('frontend') }}/images/clients/{{$data->sponsor_image}}" alt=""></a></div></li>
                    @endforeach
                    <!-- <li><div class="image-box"><a href="#"><img src="{{ asset('frontend') }}/images/clients/1.png" alt=""></a></div></li>
                    <li><div class="image-box"><a href="#"><img src="{{ asset('frontend') }}/images/clients/2.png" alt=""></a></div></li>
                    <li><div class="image-box"><a href="#"><img src="{{ asset('frontend') }}/images/clients/3.png" alt=""></a></div></li>
                    <li><div class="image-box"><a href="#"><img src="{{ asset('frontend') }}/images/clients/4.png" alt=""></a></div></li>
					<li><div class="image-box"><a href="#"><img src="{{ asset('frontend') }}/images/clients/5.png" alt=""></a></div></li>
                    <li><div class="image-box"><a href="#"><img src="{{ asset('frontend') }}/images/clients/1.png" alt=""></a></div></li>
                    <li><div class="image-box"><a href="#"><img src="{{ asset('frontend') }}/images/clients/2.png" alt=""></a></div></li>
                    <li><div class="image-box"><a href="#"><img src="{{ asset('frontend') }}/images/clients/3.png" alt=""></a></div></li> -->
                </ul>
            </div>

		</div>
	</div>
	<!--End Sponsors Section-->

	<!-- Reputation Section Two -->
	<div class="reputation-section-two style-two">
		<div class="auto-container">
			<div class="row clearfix">

				<!-- Form Column -->
				<div class="form-column col-lg-5 col-md-12 col-sm-10">
					<div class="inner-column ">

                            @if(session()->has('message'))
                            <script type="text/javascript">
                                swal("Good job!", "{!! session()->get('message') !!}", "success");
                            </script>
                            @endif

						<div class="form-boxed">

							<h5>free consulation</h5>

							<div  class="consult-form">
								<form method="post" action="{{route('index.post') }}">
                                    @csrf

									<!--Form Group-->
									<div class="form-group">
										<label>full name</label>
										<input type="text" name="name" value="" placeholder="" required>
									</div>
									<!--Form Group-->
									<div class="form-group">
										<label>phone number</label>
										<input type="text" name="phone" value="" placeholder="" required>
									</div>
									@error('phone')
								<small class="form-text text-danger">{{ $message }}</small>
							        @enderror
									<!--Form Group-->
									<div class="form-group">
										<label>topics</label>
										<select class="custom-select-box" name="select">
											<option >Choose topic</option>
											<option value="Cloud software">Cloud software</option>
											<option value="Mobile Application">Mobile Application</option>
											<option value="Website Development">Website Development</option>
											<option value="Digital Branding">Digital Branding</option>
											<option value="Youth Career Development">Youth Career Development</option>
										</select>
									</div>
									<!--Form Group-->
									<div class="form-group">
										<label>message</label>
										<textarea name="message" placeholder="" required></textarea>
									</div>
									<div class="form-group">
										<button class="theme-btn btn-style-one" type="submit"><span class="txt">send your message</span></button>
									</div>
								</form>

							</div>
						</div>

					</div>
				</div>

				<!-- Content Column -->
				<div class="content-column col-lg-7 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="sec-title">
							<div class="title">why choose us</div>
					             <h2><span>Your Successful
                              </span>is<br> our reputation</h2>
						</div>
					<div class="blocks-outer">

							<!-- Reputation Block -->
							<div class="reputation-block">
								<div class="inner-box">
									<h5>{{$choose->b_point1}}</h5>
									<div class="text">{{$choose->details1}}</div>
								</div>
							</div>

							<!-- Reputation Block -->
							<div class="reputation-block">
								<div class="inner-box">
									<h5>{{$choose->b_point2}}</h5>
									<div class="text">{{$choose->details2}}</div>
								</div>
							</div>

							<!-- Reputation Block -->
							<div class="reputation-block">
								<div class="inner-box">
									<h5>{{$choose->b_point3}}</h5>
									<div class="text"> {{$choose->details2}}</div>
								</div>
							</div>

						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- End Reputation Section -->

	<!-- Experts Section -->

	<!-- End Experts Section -->

	<!-- Blog Section -->
<!-- Blog Section -->
<div class="blog-section">
	<div class="auto-container">
		<!-- Sec Title -->
		<div class="sec-title centered">
			<div class="title">our blog</div>
			<h2><span>Latest </span>From Our Press</h2>
		</div>
		<div class="inner-container">
			<div class="clearfix row g-0">
				<!-- Column -->
				<div class="column col-lg-8 col-md-12 col-sm-12">

					<!-- News Block -->
					<div class="news-block">
						<div class="inner-box">
							<div class="clearfix">
								<!-- Image Column -->
								<div class="image-column col-lg-6 col-md-6 col-sm-12">
									<div class="inner-column">
										<div class="image">
											<a href="{{route('blog_detail',['id'=>$business_blog->id])}}"><img src="{{ asset('frontend') }}/images/resource/{{$business_blog->blog_image}}" alt="" /></a>
										</div>
									</div>
								</div>
								<!-- Content Column -->
								<div class="content-column col-lg-6 col-md-6 col-sm-12">
									<div class="inner-column">
										<div class="arrow-one"></div>
										<div class="title">{{$business_blog->blog_title}}</div>
										<h4><a href="{{route('blog_detail',['id'=>$business_blog->id])}}">{{$business_blog->blog_discription}}</a></h4>
										<div class="post-date">{{date('jS M Y',strtotime($business_blog->updated_at))}} by <span>{{$business_blog->blog_author}}</span></div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- News Block -->
					<div class="news-block">
						<div class="inner-box">
							<div class="clearfix row g-0">
								<!-- Content Column -->
								<div class="content-column col-lg-6 col-md-6 col-sm-12 order-lg-1 order-2">
									<div class="inner-column">
										<div class="arrow-two"></div>
										<div class="title">{{$bank_blog->blog_title}}</div>
										<h4><a href="{{route('blog_detail',['id'=>$business_blog->id])}}">{{$bank_blog->blog_discription}}</a></h4>
										<div class="post-date">{{date('jS M Y',strtotime($business_blog->updated_at))}} by <span>{{$bank_blog->blog_author}}</span></div>
									</div>
								</div>
								<!-- Image Column -->
								<div class="image-column col-lg-6 col-md-6 col-sm-12 order-lg-2 order-1">
									<div class="inner-column">
										<div class="image">
											<a href="{{route('blog_detail',['id'=> $tips_blog->id])}}"><img src="{{ asset('frontend') }}/images/resource/{{$bank_blog->blog_image}}" alt="" /></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>

				<!-- Column -->
				<div class="column col-lg-4 col-md-12 col-sm-12">
					<!-- News Block Two -->
					<div class="news-block-two">
						<div class="inner-box">
							<div class="image">
								<a href="{{route('blog_detail',['id'=> $tips_blog->id])}}"><img src="{{ asset('frontend') }}/images/resource/{{$tips_blog->blog_image}}" alt="" /></a>
								<div class="arrow"></div>
							</div>
							<div class="lower-content">
								<div class="title">{{$tips_blog->blog_title}}</div>
								<h4><a href="{{route('blog_detail',['id'=>$business_blog->id])}}">{{$tips_blog->blog_discription}}</a></h4>
								<div class="post-date">{{date('jS M Y',strtotime($tips_blog->updated_at))}} by <span>{{$tips_blog->blog_author}}</span></div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<!-- End Blog Section -->
	<!-- End Blog Section -->

	<!-- Map Section -->
  <!-- Map Section -->
  	<div class="map-section">
  		<div class="contact-map-area">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3648.346164283071!2d90.39741431429954!3d23.877340689833552!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c5c2bd27484f%3A0x5630d98beae118ad!2sSpring%20Soft%20IT!5e0!3m2!1sen!2sbd!4v1614124988397!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  		</div>
  	</div>
  	<!-- End Map Section -->
	<!-- End Map Section -->
@endsection
