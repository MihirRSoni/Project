<?php
require 'dbcon/db_conn.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<?php 
	session_start();
	// if(!empty($_GET['logtype']))
	
	/*echo " ".$_SESSION['name']." ".$_SESSION['id']." ".$_SESSION['role']." ".$_SESSION['status']." ";
	die;*/

	require'common/header.php'; 
?>
		<div id="home-owl" class="owl-carousel owl-theme">
			<!-- home item -->
			<div class="home-item">
				<!-- section background -->
				<div class="section-bg" style="background-image: url(./img/background-1.jpg);"></div>
				<!-- /section background -->

				<!-- home content -->
				<div class="home">
					<div class="container">
						<div class="row">
							<div class="col-md-8">
								<div class="home-content">
									<h1>Save The Children</h1>
									<a href="#" class="primary-button">View Causes</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /home content -->
			</div>
			<!-- /home item -->

			<!-- home item -->
			<div class="home-item">
				<!-- Background Image -->
				<div class="section-bg" style="background-image: url(./img/background-2.jpg);"></div>
				<!-- /Background Image -->

				<!-- home content -->
				<div class="home">
					<div class="container">
						<div class="row">
							<div class="col-md-8">
								<div class="home-content">
									<h1>Become A Volunteer</h1>
									
									<a href="#" class="primary-button">Join Us Now!</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /home content -->
			</div>
			<!-- /home item -->
		</div>
		<!-- /HOME OWL -->
	</header>
	<!-- /HEADER -->

	<!-- ABOUT -->
	<div id="about" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- about content -->
				<div class="col-md-5">
					<div class="section-title">
						<h2 class="title">Welcome to Charity</h2>
						<p>-------------------------------------</p>
						</div>
					<div class="about-content">
						
						<a href="#" class="primary-button">Read More</a>
					</div>
				</div>
				<!-- /about content -->

				<!-- about video -->
				<div class="col-md-offset-1 col-md-6">
					<a href="#" class="about-video">
							<i class="play-icon fa fa-play"></i>
							<img src="./img/about.jpg" alt="">
						</a>
				</div>
				<!-- /about video -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /ABOUT -->

	<!-- NUMBERS -->
	<div id="numbers" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- number -->
				<div class="col-md-3 col-sm-6">
					<div class="number">
						<i class="fa fa-smile-o"></i>
						<h3>47k</h3>
						<span>Donors</span>
					</div>
				</div>
				<!-- /number -->

				<!-- number -->
				<div class="col-md-3 col-sm-6">
					<div class="number">
						<i class="fa fa-heartbeat"></i>
						<h3>154K</h3>
						<span>Children Saved</span>
					</div>
				</div>
				<!-- /number -->

				<!-- number -->
				<div class="col-md-3 col-sm-6">
					<div class="number">
						<i class="fa fa-money"></i>
						<h3>785K</h3>
						<span>Donated</span>
					</div>
				</div>
				<!-- /number -->

				<!-- number -->
				<div class="col-md-3 col-sm-6">
					<div class="number">
						<i class="fa fa-handshake-o"></i>
						<h3>357</h3>
						<span>Volunteers</span>
					</div>
				</div>
				<!-- /number -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /NUMBERS -->

	<!-- CAUSESS -->
	<div id="causes" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- section title -->
				<div class="col-md-8 col-md-offset-2">
					<div class="section-title text-center">
						<h2 class="title">Our Donation Categories</h2>
						
					</div>
				</div>
				<!-- section title -->
				<?php
				$sql = "SELECT * FROM categories LIMIT 6";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) 
				{
					while($row = $result->fetch_assoc()) 
					{?>
						<!-- causes -->
						<div class="col-md-4">
							<div class="causes">
								<div class="causes-img">
									<a href="single-cause.html">
											<img src="./img/post-1.jpg" alt="">
										</a>
								</div>
								<div class="causes-progress">
									<div class="causes-progress-bar">
										<div style="width: 87%;">
											<span>87%</span>
										</div>
									</div>
									<!-- <div>
										<span class="causes-raised">Raised: <strong>52.000$</strong></span>
										<span class="causes-goal">Goal: <strong>90.000$</strong></span>
									</div> -->
								</div>
								<div class="causes-content">
									<h3><a href="<?php echo 'donate_now_category.php?id='.$row['id'];?> "><?php echo $row['name'];?></a></h3>
									
									<a href="<?php echo 'donate_now_category.php?id='.$row['id'];?> " class="primary-button causes-donate">Donate Now</a>
								</div>
							</div>
						</div>        
				    <?php
				    }
				}
				?>
				
				<!-- /causes -->

				<!-- causes -->
				
				<!-- /causes -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /CAUSESS -->

	<!-- CTA -->
	<div id="cta" class="section">
		<!-- background section -->
		<div class="section-bg" style="background-image: url(./img/background-1.jpg);" data-stellar-background-ratio="0.5"></div>
		<!-- /background section -->

		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- cta content -->
				<div class="col-md-offset-2 col-md-8">
					<div class="cta-content text-center">
						<h1>Become A Volunteer</h1>
						<a href="#" class="primary-button">Join Us Now!</a>
					</div>
				</div>
				<!-- /cta content -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /CTA -->

	<!-- EVENTS -->
	<div id="events" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-8 col-md-offset-2">
					<div class="section-title text-center">
						<h2 class="title">Upcoming Events</h2>
						
					</div>
				</div>
				<!-- /section title -->

				<!-- event -->
				<div class="col-md-6">
					<div class="event">
						<div class="event-img">
							<a href="single-event.html">
								<img src="./img/event-1.jpg" alt="">
							</a>
						</div>
						<div class="event-content">
							<h3><a href="single-event.html">For Education</a></h3>
							<ul class="event-meta">
								<li><i class="fa fa-clock-o"></i> 24 October, 2018 | 8:00AM - 11:00PM</li>
								<li><i class="fa fa-map-marker"></i> Gujarat</li>
							</ul>
							
						</div>
					</div>
				</div>
				<!-- /event -->

				<!-- event -->
				<div class="col-md-6">
					<div class="event">
						<div class="event-img">
							<a href="single-event.html">
								<img src="./img/event-2.jpg" alt="">
							</a>
						</div>
						<div class="event-content">
							<h3><a href="single-event.html">For Education</a></h3>
							<ul class="event-meta">
								<li><i class="fa fa-clock-o"></i> 24 October, 2018 | 8:00AM - 11:00PM</li>
								<li><i class="fa fa-map-marker"></i> Gujarat</li>
							</ul>
							
						</div>
					</div>
				</div>
				<!-- /event -->

				<div class="clearfix visible-md visible-lg"></div>

				<!-- event -->
				<div class="col-md-6">
					<div class="event">
						<div class="event-img">
							<a href="single-event.html">
								<img src="./img/event-3.jpg" alt="">
							</a>
						</div>
						<div class="event-content">
							<h3><a href="single-event.html">For Education</a></h3>
							<ul class="event-meta">
								<li><i class="fa fa-clock-o"></i> 24 October, 2018 | 8:00AM - 11:00PM</li>
								<li><i class="fa fa-map-marker"></i> Gujarat</li>
							</ul>
							
						</div>
					</div>
				</div>
				<!-- /event -->

				<!-- event -->
				<div class="col-md-6">
					<div class="event">
						<div class="event-img">
							<a href="single-event.html">
								<img src="./img/event-4.jpg" alt="">
							</a>
						</div>
						<div class="event-content">
							<h3><a href="single-event.html">For Education</a></h3>
							<ul class="event-meta">
								<li><i class="fa fa-clock-o"></i> 24 October, 2018 | 8:00AM - 11:00PM</li>
								<li><i class="fa fa-map-marker"></i> Gujarat</li>
							</ul>
							
						</div>
					</div>
				</div>
				<!-- /event -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /EVENTS -->

	<!-- TESTIMONIAL -->
	<div id="testimonial" class="section">
		<!-- background section -->
		<div class="section-bg" style="background-image: url(./img/background-2.jpg);" data-stellar-background-ratio="0.5"></div>
		<!-- /background section -->

		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- Testimonial owl -->
				<div class="col-md-12">
					<div id="testimonial-owl" class="owl-carousel owl-theme">
						<!-- testimonial -->
						<div class="testimonial">
							<div class="testimonial-meta">
								<div class="testimonial-img">
									<img src="./img/avatar-1.jpg" alt="">
								</div>
								<h3>John Doe</h3>

								<span>Volunteer</span>

							</div>
							<div class="testimonial-quote">
								<blockquote>
								<p class="lead">  “Not all of us can do great things. But we can do small things with great love.” </p>	
								</blockquote>
							</div>
						</div>
						<!-- /testimonial -->

						<!-- testimonial -->
						<div class="testimonial">
							<div class="testimonial-meta">
								<div class="testimonial-img">
									<img src="./img/avatar-2.jpg" alt="">
								</div>
								<h3>John Doe</h3>
								<span>Volunteer</span>
							</div>
							<div class="testimonial-quote">
								<blockquote>
								<p class="lead">  “Not all of us can do great things. But we can do small things with great love.” </p>		
								</blockquote>
							</div>
						</div>
						<!-- /testimonial -->

						<!-- testimonial -->
						<div class="testimonial">
							<div class="testimonial-meta">
								<div class="testimonial-img">
									<img src="./img/avatar-1.jpg" alt="">
								</div>
								<h3>John Doe</h3>
								<span>Volunteer</span>
							</div>
							<div class="testimonial-quote">
								<blockquote>
								<p class="lead">  “Not all of us can do great things. But we can do small things with great love.” </p>		
								</blockquote>
							</div>
						</div>
						<!-- /testimonial -->

						<!-- testimonial -->
						<div class="testimonial">
							<div class="testimonial-meta">
								<div class="testimonial-img">
									<img src="./img/avatar-2.jpg" alt="">
								</div>
								<h3>John Doe</h3>
								<span>Volunteer</span>
							</div>
							<div class="testimonial-quote">
								<blockquote>
								<p class="lead">  “Not all of us can do great things. But we can do small things with great love.” </p>		
								</blockquote>
							</div>
						</div>
						<!-- /testimonial -->
					</div>
				</div>
				<!-- /Testimonial owl -->
			</div>
			<!-- /Row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /TESTIMONIAL -->

	<!-- BLOG -->
	<div id="blog" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-8 col-md-offset-2">
					<div class="section-title text-center">
						<h2 class="title">Our Blog</h2>
					</div>
				</div>
				<!-- /section title -->

				<!-- blog -->
				<div class="col-md-4">
					<div class="article">
						<div class="article-img">
							<a href="single-blog.html">
								<img src="./img/post-1.jpg" alt="">
							</a>
						</div>
						<div class="article-content">
							<h3 class="article-title"><a href="single-blog.html">For Education</a></h3>
							<ul class="article-meta">
								<li>12 November 2018</li>
								<li>By John doe</li>
								<li>0 Comments</li>
							</ul>
							
						</div>
					</div>
				</div>
				<!-- /blog -->

				<!-- blog -->
				<div class="col-md-4">
					<div class="article">
						<div class="article-img">
							<a href="single-blog.html">
								<img src="./img/post-2.jpg" alt="">
							</a>
						</div>
						<div class="article-content">
							<h3 class="article-title"><a href="single-blog.html">For Education</a></h3>
							<ul class="article-meta">
								<li>12 November 2018</li>
								<li>By John doe</li>
								<li>0 Comments</li>
							</ul>
							
						</div>
					</div>
				</div>
				<!-- /blog -->

				<!-- blog -->
				<div class="col-md-4">
					<div class="article">
						<div class="article-img">
							<a href="single-blog.html">
								<img src="./img/post-3.jpg" alt="">
							</a>
						</div>
						<div class="article-content">
							<h3 class="article-title"><a href="single-blog.html">For Education</a></h3>
							<ul class="article-meta">
								<li>12 November 2018</li>
								<li>By John doe</li>
								<li>0 Comments</li>
							</ul>
							
						</div>
					</div>
				</div>
				<!-- /blog -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /BLOG -->

	<!-- FOOTER -->
<?php require'common/footer.php'; 

?>