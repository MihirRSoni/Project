<?php

  session_start(); 
  if(empty($_SESSION)){
     header("Location: index.php");
  }
  require'common/header.php';
require 'dbcon/db_conn.php'; 
if(!empty($_GET))
{
	$cat_id = $_GET['id'];
	$sql = "SELECT * FROM categories WHERE id = '$cat_id'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		$row = $result->fetch_assoc();
		$cat_name = $row['name'];
		$description = $row['description'];
	}
}
else
{
	header("Location: index.php");
}
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
								<h1>Donation</h1>
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
			<!-- /Page Header -->
		<!-- </header> -->
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
								<a href="#" data-toggle="modal" data-target="#myDonate" class="primary-button causes-donate">Donate Now</a>
							</div>
							<!-- /causes progress -->

							<!-- article content -->
							<div class="article-content">
								<!-- article title -->
								<h2 class="article-title"><?php echo $cat_name; ?></h2>
								<!-- /article title -->

								<!-- article meta -->
								<!-- <ul class="article-meta">
									<li>12 November 2018</li>
									<li>By John doe</li>
									<li>0 Comments</li>
								</ul> -->
								<!-- /article meta -->

								<p><?php echo $description; ?></p>
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
								<?php
								$sql = "SELECT * FROM categories";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) 
								{
									while($row = $result->fetch_assoc())
									{
									?>								
									<li><a href="#"><?php echo $row['name'];?><span>(57)</span></a></li>
									<!-- <li><a href="#">Food<span>(86)</span></a></li>
									<li><a href="#">Education<span>(241)</span></a></li>
									<li><a href="#">Donation<span>(65)</span></a></li>
									<li><a href="#">Events<span>(14)</span></a></li> -->
									<?php
									}
								}
								?>
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
		<?php require'common/footer.php'; 

?>
<div class="modal fade" id="myDonate" role="dialog">
		    <div class="modal-dialog">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Donate from here</h4>
		        </div>
		        <div class="modal-body">
		          <form method="POST" action="../frontend/donate_now.php">
		          	<div class="form-group">
					    <label for="email">Choose Organization:</label>
					    <select required="required" class="form-control" name="reciever_id">
					    	<?php
								$sql = "SELECT * FROM organization_detail_master";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) 
								{
									while($row = $result->fetch_assoc()) 
									{?>
										<option value="<?php echo $row['id']?>">
											<?php echo $row['name']?>
										</option>
									<?php
									}
								}
								?>
					    </select>
					 </div>
					 <div class="form-group">
					    <label for="email">Amount:</label>
					    <input type="number" class="form-control" name="amount" required="required">
					 </div>
					 <div class="form-group">
					    <label for="email">Description:</label>
					    <textarea name="description"class="form-control" required="required"></textarea>
					 </div>
					 <input type="hidden" name="c_id" value="<?php echo $cat_id; ?>">
					 <div class="form-group">
					    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
					 </div>
		          </form>
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        </div>
		      </div>
		      
		    </div>
		  </div>