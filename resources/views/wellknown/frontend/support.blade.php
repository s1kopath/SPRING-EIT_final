@extends('wellknown.layouts.index')

@section("content")

<br><br><br><br><br><br>
<!-- Form Boxed -->
<div class="contact-page-section">
		<div class="auto-container">
			@if(session()->has('message'))
             <script type="text/javascript">
             	swal("Good job!", "{!! session()->get('message') !!}", "success");
             </script>
            @endif
			<div class="form-boxed">
				<div class="sec-title centered">
					<div class="title">contact usa</div>
					<h2>Ticket Information</span></h2>
				</div>

				<div class="boxed-inner">
					<!-- Contact Form -->
					<div class="contact-form">
						<!-- Contact Form -->
						<form method="post" action="{{route('post.ticket')}}" id="contact-form" enctype="multipart/form-data">
							<div class="row clearfix">
								 {{ csrf_field() }}
								<div class="col-lg-4 col-md-6 col-sm-12 form-group">
									<input type="text" name="name" placeholder="Name *" required>
								</div>

								<div class="col-lg-4 col-md-6 col-sm-12 form-group">
									<input type="email" name="email" placeholder="Emaill Address *" required>
								</div>

								<div class="col-lg-4 col-md-12 col-sm-12 form-group">
									<input type="text" name="subject" placeholder="Subject" >
								</div>

								<div class="col-lg-12 col-md-12 col-sm-12 form-group">
									<textarea name="message" id="summernote" placeholder="Message"></textarea>
								</div>
								 <div class="custom-file">
			<input type="file" class="custom-file-input form-control-lg" id="customFile" name="file">
			<label class="custom-file-label" for="customFile">file attachment</label>
		    </div>
		    <br><br>




								<div class="col-lg-12 col-md-12 col-sm-12 text-center form-group">
									<button class="theme-btn btn-style-one" type="submit" name="submit-form"><span class="txt">Send Message</span></button>
								</div>



							</div>
						</form>
						<p class="form-messege"></p>

					</div>
					<!--End Contact Form -->
				</div>

			</div>
		</div>
	</div>

	<script type="text/javascript">
 
$(document).ready(function() {
  $('#summernote').summernote();
});
</script>
	


@endsection