@include('layouts.header')
<body>
	
	<!-- ============== start wrapper  ============== -->
	<div id="wrapper">
		<!-- main-nav -->
		<div class="main-nav">
			<div class="logo-left">
				<a href="index.html" class="pull-left">
					<img src="{{ asset('assets/themes/jobsart/img/logo-header.png')}}" alt="logo">
				</a>

				<a href="javascript:void(0)" class="menu-trigger">
			       <i class="fa fa-bars"></i>
			    </a>
			</div>
			<div class="languages">
				<ul class="list-inline">
					<li class="active"><a href="#">EN</a></li>
					<li class="disabled"><a href="#">FR</a></li>
					<li class=""><a href="#" class="btn btn-2 btn-primary btn-main">Feedback</a></li>
				</ul>
			</div>
		</div> <!-- //end main-nav -->

		<!--=========================
			Start area for Menu 
		============================== -->
		@include('layouts.topbar')
				
		<!-- End of menu area -->

		
		<!-- Start dinamyc page -->
		   @include('layouts.home')
		<!-- End dinamyc page -->
		

		<!-- ============== Start about info ============== -->
		<section id="about-info" class="text-center ptt100 ptb80">
			<div class="container">
				<div class="row">
					<div class="col-sm-3 each-part wow zoomIn">
						<p class="icon">
							<img src="{{ asset('assets/themes/jobsart/img/icon/custom-care.png')}}" alt="img">
						</p>
						<p class="title">CUSTOMER CARE</p>
						<p class="info">
							8654-32-9600
						</p>
					</div>
					<div class="col-sm-3 each-part wow zoomIn">
						<p class="icon">
							<img src="{{ asset('assets/themes/jobsart/img/icon/mail-info.png')}}" alt="img">
						</p>
						<p class="title">MAIL INFO</p>
						<p class="info">
							info@Blinker.com
						</p>
					</div>
					<div class="col-sm-3 each-part wow zoomIn">
						<p class="icon">
							<img src="{{ asset('assets/themes/jobsart/img/icon/work-time.png')}}" alt="img">
						</p>
						<p class="title">Work Time</p>
						<p class="info">
							Mon. - Fri. (10:00 - 22:00)
						</p>
					</div>
					<div class="col-sm-3 each-part wow zoomIn">
						<p class="icon">
							<img src="{{ asset('assets/themes/jobsart/img/icon/work-place.png')}}" alt="img">
						</p>
						<p class="title">Work Place</p>
						<p class="info">
							19th Ave New York <br>
							<small>NY 95822, USA</small>
						</p>
					</div>
				</div>
			</div>
		</section>
		<!-- ========= //End about info ========= -->


		
		<!-- ============== Start twitter section ============== -->
		<section id="twitter">
			<div>
				<a class="twitter-left-control" href="#twitter-carousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
				<a class="twitter-right-control" href="#twitter-carousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
				<div class="container">
					<div class="row">
						<div class="col-xs-8 col-xs-offset-2">
							<div class="twitter-icon text-center hidden-sm hidden-xs">
								<p>
									<img src="{{ asset('assets/themes/jobsart/img/icon/twitter.png')}}" alt="twitter" class="img-100p">
								</p>
							</div>
							<div id="twitter-carousel" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner">
									<div class="item active wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
										<p class="info">Check out 'Kings multipurpose html template' on #Shapebootstrap</p>
										<p class="link"> by <span>@themeum</span><a href="#"> #Shapebootstrap http://tllg.net/8szMvf5t</a></p>
									</div>
									<div class="item">
										<p class="info">Check out 'Kings multipurpose html template' on #Shapebootstrap</p>
										<p class="link"> by <span>@themeum</span><a href="#"> #Shapebootstrap http://tllg.net/8szMvf5t</a></p>
									</div>
									<div class="item">                                
										<p class="info">Check out 'Kings multipurpose html template' on #Shapebootstrap</p>
										<p class="link"> by <span>@themeum</span><a href="#"> #Shapebootstrap http://tllg.net/8szMvf5t</a></p>
									</div>
								</div>                        
							</div> <!-- //twitter-carousel -->                 
						</div>
					</div> <!-- //row -->
				</div> <!-- //container -->
			</div>
		</section>
		<!-- ========= //End twitter section ========= -->


		<!-- ============== Start footer ============== -->
		<section id="footer">
			<div class="color-overlay ptt80">
			 	<div class="container mtb50">
			 		<div class="row">
			 			<div class="col-sm-6 col-sm-offset-3 text-center">
			 				<p class="footer-logo mtb30"><img src="{{ asset('assets/themes/jobsart/img/logo-footer.png')}}" alt="logo"></p>
			 				<ul class="nav-footer list-inline mtb30">
			 					<li class="active"><a href="index.html">Home</a></li>
			 					<li><a href="about.html">About</a></li>
			 					<li><a href="services.html">Services</a></li>
			 					<li><a href="portfolio.html">Portfolio</a></li>
			 					<li><a href="blog.html">Blog</a></li>
			 					<li><a href="contact.html">Contact</a></li>
			 				</ul>
			 				<ul class="social-icon-footer list-inline">
			 					<li><a href="#"><i class="fa fa-facebook"></i></a></li>
			 					<li><a href="#"><i class="fa fa-twitter"></i></a></li>
			 					<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
			 					<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
			 					<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
			 				</ul>
			 			</div>
			 		</div> <!-- //row -->
			 	</div>
			 </div> <!-- //container -->

			<!-- copyright -->
			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-sm-6 col-sm-offset-4">
							<p class="info">
								&copy; Copyright JobsArt 2015.  Todos os direitos reservados <a href="https://www.themeum.com" class="designed-by" target="_blank">Themeum</a>
							</p>
						</div>
					</div> <!-- //row -->
				</div> <!-- //container -->
			</div> <!-- //end copyright -->
		</section>
		<!-- ========= //End footer ========= -->

	</div> <!-- //end wrapper -->

  <script src="{{ asset('assets/themes/jobsart/js/jquery.min.js')}}"></script>
  <script src="{{ asset('assets/themes/jobsart/js/bootstrap.min.js')}}"></script>
  <!-- animation effects -->
  <script src="{{ asset('assets/themes/jobsart/js/wow.min.js')}}"></script>
  <!-- count-down -->
  <script src="{{ asset('assets/themes/jobsart/js/jquery.inview.min.js')}}"></script>
  <script src="{{ asset('assets/themes/jobsart/js/jquery.counterup.min.js')}}"></script>
  <!-- content slider -->
  <script src="{{ asset('assets/themes/jobsart/js/owl.carousel.min.js')}}"></script>
  <!-- lightbox -->
  <script src="{{ asset('assets/themes/jobsart/js/lightbox.min.js')}}"></script>
  <!-- smooth scrool -->
  <script src="{{ asset('assets/themes/jobsart/js/smoothscroll.js')}}"></script>
  <!-- custom js -->
  <script src="{{ asset('assets/themes/jobsart/js/app.js')}}"></script>
  
</body>
</html>