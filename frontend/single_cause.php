<?php
session_start(); 
  if(empty($_SESSION)){
     header("Location: index.php");
  }
require'common/header.php';
if(empty($_GET['id']))
{
	header("Location: index.php");
}
$NGO_Id=$_GET['id'];
?>
			<!-- Page Header -->
			<div id="page-header">
				<!-- section background -->
				<div class="section-bg" style="background-image: url(./img/background-2.jpg); "></div>
				<!-- /section background -->

				<!-- page header content -->
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="header-content">
								<h1>Single Cause Page</h1>
								<ul class="breadcrumb">
									<li><a href="index.php">Home</a></li>
									<li><a href="#">Causes</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- /page header content -->
			</div>
		<!-- /HEADER -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- MAIN -->
					<main id="main" class="col-md-9">
						<!-- article -->
						<div class="article causes-details">
							<!-- article img -->
							<div class="article-img">
								<img src="./img/post-img.jpg" alt="">
							</div>
							<!-- article img -->

							<!-- causes progress -->
							<div class="clearfix">
								<div class="causes-progress">
									<div class="causes-progress-bar">
										<div style="width: 53%;">
											<span>53%</span>
										</div>
									</div>
									<div>
										<span class="causes-raised">Raised: <strong>52.000$</strong></span>
										<span class="causes-goal">Goal: <strong>90.000$</strong></span>
									</div>
								</div>
								<a href="#" class="primary-button causes-donate">Donate Now</a>
							</div>
							<!-- /causes progress -->

							<!-- article content -->
							<div class="article-content">
								<!-- article title -->
								<h2 class="article-title">Possit nostro aeterno eu vis, ut cum quem reque</h2>
								<!-- /article title -->

								<!-- article meta -->
								<ul class="article-meta">
									<li>12 November 2018</li>
									<li>By John doe</li>
									<li>0 Comments</li>
								</ul>
								<!-- /article meta -->

								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							</div>
							<!-- /article content -->

							<!-- article tags share -->
							<div class="article-tags-share">
								<!-- article tags -->
								<ul class="tags">
									<li>TAGS:</li>
									<li><a href="#">Charity</a></li>
									<li><a href="#">Health</a></li>
									<li><a href="#">Donation</a></li>
								</ul>
								<!-- /article tags -->

								<!-- article share -->
								<ul class="share">
									<li>SHARE:</li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
									<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								</ul>
								<!-- /article share -->
							</div>
							<!-- /article tags share -->

							<!-- article reply form -->
							<div class="article-reply">
								<h3>Leave a reply</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
								<form>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<input class="input" placeholder="Name" type="text">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<input class="input" placeholder="Email" type="email">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<input class="input" placeholder="Website" type="text">
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<textarea class="input" placeholder="Message"></textarea>
											</div>
											<button class="primary-button">Submit</button>
										</div>
									</div>
								</form>
							</div>
							<!-- /article reply form -->
						</div>
						<!-- /article -->
					</main>
					<!-- /MAIN -->

					<!-- ASIDE -->
					<aside id="aside" class="col-md-3">
						<!-- category widget -->
						<div class="widget">
							<h3 class="widget-title">Category</h3>
							<div class="widget-category">
								<ul>
									<li><a href="#">Health<span>(57)</span></a></li>
									<li><a href="#">Food<span>(86)</span></a></li>
									<li><a href="#">Education<span>(241)</span></a></li>
									<li><a href="#">Donation<span>(65)</span></a></li>
									<li><a href="#">Events<span>(14)</span></a></li>
								</ul>
							</div>
						</div>
						<!-- /category widget -->

						<!-- posts widget -->
						<div class="widget">
							<h3 class="widget-title">Latest Posts</h3>
							<!-- single post -->
							<div class="widget-post">
								<a href="#">
									<div class="widget-img">
										<img src="./img/widget-1.jpg" alt="">
									</div>
									<div class="widget-content">
										Possit nostro aeterno eu vis, ut cum quem reque
									</div>
								</a>
								<ul class="article-meta">
									<li>By John doe</li>
									<li>12 November 2018</li>
								</ul>
							</div>
							<!-- /single post -->

							<!-- single post -->
							<div class="widget-post">
								<a href="#">
									<div class="widget-img">
										<img src="./img/widget-2.jpg" alt="">
									</div>
									<div class="widget-content">
										Vix fuisset tibique facilisis cu. Justo accusata ius at
									</div>
								</a>
								<ul class="article-meta">
									<li>By John doe</li>
									<li>12 November 2018</li>
								</ul>
							</div>
							<!-- /single post -->

							<!-- single post -->
							<div class="widget-post">
								<a href="#">
									<div class="widget-img">
										<img src="./img/widget-3.jpg" alt="">
									</div>
									<div class="widget-content">
										Possit nostro aeterno eu vis, ut cum quem reque
									</div>
								</a>
								<ul class="article-meta">
									<li>By John doe</li>
									<li>12 November 2018</li>
								</ul>
							</div>
							<!-- /single post -->
						</div>
						<!-- /posts widget -->

						<!-- causes widget -->
						<div class="widget">
							<h3 class="widget-title">Latest Causes</h3>

							<!-- single causes -->
							<div class="widget-causes">
								<a href="#">
									<div class="widget-img">
										<img src="./img/widget-1.jpg" alt="">
									</div>
									<div class="widget-content">
										Possit nostro aeterno eu vis, ut cum quem reque
										<div class="causes-progress">
											<div class="causes-progress-bar">
												<div style="width: 64%;"></div>
											</div>
										</div>
									</div>
								</a>
								<div>
									<span class="causes-raised">Raised: <strong>52.000$</strong></span> -
									<span class="causes-goal">Goal: <strong>90.000$</strong></span>
								</div>
							</div>
							<!-- /single causes -->

							<!-- single causes -->
							<div class="widget-causes">
								<a href="#">
									<div class="widget-img">
										<img src="./img/widget-2.jpg" alt="">
									</div>
									<div class="widget-content">
										Vix fuisset tibique facilisis cu. Justo accusata ius at
										<div class="causes-progress">
											<div class="causes-progress-bar">
												<div style="width: 75%;"></div>
											</div>
										</div>
									</div>
								</a>
								<div>
									<span class="causes-raised">Raised: <strong>52.000$</strong></span> -
									<span class="causes-goal">Goal: <strong>90.000$</strong></span>
								</div>
							</div>
							<!-- /single causes -->

							<!-- single causes -->
							<div class="widget-causes">
								<a href="#">
									<div class="widget-img">
										<img src="./img/widget-3.jpg" alt="">
									</div>
									<div class="widget-content">
										Possit nostro aeterno eu vis, ut cum quem reque
										<div class="causes-progress">
											<div class="causes-progress-bar">
												<div style="width: 53%;"></div>
											</div>
										</div>
									</div>
								</a>
								<div>
									<span class="causes-raised">Raised: <strong>52.000$</strong></span> -
									<span class="causes-goal">Goal: <strong>90.000$</strong></span>
								</div>
							</div>
							<!-- /single causes -->
						</div>
						<!-- causes widget -->
					</aside>
					<!-- /ASIDE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- FOOTER -->
		<footer id="footer" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- footer contact -->
					<div class="col-md-4">
						<div class="footer">
							<div class="footer-logo">
								<a class="logo" href="#"><img src="./img/logo.png" alt=""></a>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							<ul class="footer-contact">
								<li><i class="fa fa-map-marker"></i> 2736 Hinkle Deegan Lake Road</li>
								<li><i class="fa fa-phone"></i> 607-279-9246</li>
								<li><i class="fa fa-envelope"></i> <a href="#">Charity@email.com</a></li>
							</ul>
						</div>
					</div>
					<!-- /footer contact -->

					<!-- footer galery -->
					<div class="col-md-4">
						<div class="footer">
							<h3 class="footer-title">Galery</h3>
							<ul class="footer-galery">
								<li><a href="#"><img src="./img/galery-1.jpg" alt=""></a></li>
								<li><a href="#"><img src="./img/galery-2.jpg" alt=""></a></li>
								<li><a href="#"><img src="./img/galery-3.jpg" alt=""></a></li>
								<li><a href="#"><img src="./img/galery-4.jpg" alt=""></a></li>
								<li><a href="#"><img src="./img/galery-5.jpg" alt=""></a></li>
								<li><a href="#"><img src="./img/galery-6.jpg" alt=""></a></li>
							</ul>
						</div>
					</div>
					<!-- /footer galery -->

					<!-- footer newsletter -->
					<div class="col-md-4">
						<div class="footer">
							<h3 class="footer-title">Newsletter</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
							<form class="footer-newsletter">
								<input class="input" type="email" placeholder="Enter your email">
								<button class="primary-button">Subscribe</button>
							</form>
							<ul class="footer-social">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
							</ul>
						</div>
					</div>
					<!-- /footer newsletter -->
				</div>
				<!-- /row -->

				<!-- footer copyright & nav -->
				<div id="footer-bottom" class="row">
					<div class="col-md-6 col-md-push-6">
						<ul class="footer-nav">
							<li><a href="#">Home</a></li>
							<li><a href="#">About</a></li>
							<li><a href="#">Causes</a></li>
							<li><a href="#">Events</a></li>
							<li><a href="#">Blog</a></li>
							<li><a href="#">Contact</a></li>
						</ul>
					</div>

					<div class="col-md-6 col-md-pull-6">
						<div class="footer-copyright">
							<span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
						</div>
					</div>
				</div>
				<!-- /footer copyright & nav -->
			</div>
			<!-- /container -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/jquery.stellar.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>