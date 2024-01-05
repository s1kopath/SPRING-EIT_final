@extends('wellknown.layouts.index')

@section("content")

<br><br><br><br>

<div class="page-wrapper">






    <!--End Main Header -->

	<!-- Page Title Section -->
    <div class="page-title-section">
    	<div class="auto-container">

			<h2><span>Latest</span> From Our Project</h2>
		</div>
	</div>
	<!-- End Page Title Section -->

	<!-- Start Project Details -->
	<div class="project-section section-padding">
		<div class="auto-container">
			<div class="row">


				<!-- Portfolio Left -->
				<div class="col-lg-4 col-md-6 col-12">
					<div class="work-left work-details">
						<div class="portfolio-main-info row">
							<h2 class="title">About the <br> project</h2>
                            <div class="ml-auto">
                                <button style="cursor:pointer"type="submit" class="theme-btn btn-style-one"><span class="txt"><i class="fas fa-eye"></i> &nbsp Live Demo</span></button>
                            </div>
							<!-- Start Details List -->
							<div class="work-details-list mt-60">

								<div class="details-list">
									<label>Date</label>
									<span>{{date('jS M Y',strtotime($project_detail->updated_at))}}</span>
								</div>

								<div class="details-list">
									<label>Client</label>
									<span>{{$project_detail->client_name}}</span>
								</div>

								<div class="details-list">
									<label>Categories</label>
									<span><a href="#">{{$project_detail->project_type}}</a></span>
								</div>

								<div class="details-list">
									<label>Awards</label>
									<span>{{$project_detail->project_awards}}</span>
								</div>

							</div>
							<!-- End Details List -->
							<!-- Start Work Share -->
							<div class="work-share section-padding-top-70">
								<h6 class="heading heading-h6">SHARE</h6>
							</div>
						</div>
					</div>
				</div>

				<!-- Work Right -->
				<div class="col-lg-7 col-md-6 offset-lg-1 col-12">
					<div class="work-left work-details mt-lg-30">
						<div class="work-main-info">
							<div class="work-content">
								<h6 class="title">ABOUT THE PROJECT</h6>

								<div class="desc mt-40">
									<div class="content mb-25">
									{!! $project_detail->project_details !!}

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Start Thumbnail -->
			<div class="row">
				<div class="col-lg-12">
					<div class="custom-column-thumbnail mt-lg-70">
						<img class="w-100" src="images/project/project-1.jpg" alt="finance">
					</div>
				</div>
			</div>

			<!-- Start Digital Marketion Area -->
			<div class="row mt-lg-100">
				<div class="col-lg-4 col-md-12 col-12">
					<div class="digital-marketing">
						<h3 class="heading heading-h3">Digital Marketing.</h3>
					</div>
				</div>
				<div class="col-lg-7 col-md-12 col-12 offset-lg-1">
					<div class="digital-marketing mt-30">
						<div class="inner">
							<p>Marketing has always been about connecting with your audience in
								the right place and at the right time. Today, that means you need to meet them
								where they are already spending time: on the internet. A seasoned inbound
								marketer might say inbound marketing and digital marketing are virtually the
								same thing, but there are some minor differences. And conversations with
								marketers and business owners in the U.S., U.K., Asia, Australia, and New
								Zealand, I've learned a lot about how those small differences are being
								observed across the world.</p>
						</div>
					</div>
				</div>
			</div>
			<!-- End Digital Marketion Area -->

			<!-- Start Gallery Area -->
			<div class="custom-layout-gallery mt-lg-100">
				<div class="row mb-n30">
					<div class="col-lg-6 col-md-6 col-12">
						<div class="thumbnail">
							<img class="w-100" src="images/project/project-3.jpg" alt="finance">
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-12 mt-50">
						<div class="thumbnail">
							<img class="w-100" src="images/project/project-4.jpg" alt="finance">
						</div>
					</div>

					<div class="col-lg-12 mtb-30">
						<div class="thumbnail">
							<img class="w-100" src="images/project/project-2.jpg" alt="finance">
						</div>
					</div>
				</div>
			</div>
			<!-- End Gallery Area -->


		</div>
	</div>
	<!-- Start Project Details -->

	<!-- Main Footer -->
   @endsection
