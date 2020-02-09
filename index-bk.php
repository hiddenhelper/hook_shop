<?php 
require_once 'inc/header.php';
require_once 'admin/inc/ActiveRecords/ActiveRecords.php'; 
$db       =  new MySQL\ActiveRecords(); 
$products = $db->query('SELECT * FROM products LIMIT 0,3');
$products2 = $db->query('SELECT * FROM products LIMIT 3,3');
$products3 = $db->query('SELECT * FROM products LIMIT 0,3');
$products->execute();
$products2->execute();
$products3->execute();

$array = $products->fetchAll();
$array2 = $products2->fetchAll();
$array3 = $products3->fetchAll();
?>
<!--
<div class="timeline">
	<div class="text_style hidden-xs">
		<h3>Wire and Cable Management</h3>
		<div class="text_right">
			<h1>The Winnie Way</h1>
		</div>
		<div class="menu_link">
			<p><span>Home</span></p>
		</div>
	</div>
	<div class="clearfix"></div>

	<div class="text_style_mobile visible-xs">
		<h3>Wire and Cable Management</h3>
		<div class="text_right_mobile">
			<h1>The Winnie Way</h1>
		</div>
		<div class="menu_link_mobile">
			<p><span>Home</span></p>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
-->




<div class="container">
	<div class="row">
		<!-- Carousel -->
    	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
			  	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			</ol>
			<!-- Wrapper for slides -->
			<div class="carousel-inner">
			    <div class="item active">
			    	<img src="assets/images/banner.jpg" alt="First slide">
                    <!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <h2>
                            	<span>Welcome to <strong>WINNIE</strong></span>
                            </h2>
                            <br>
                            <h4>
                            	<span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. <br>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</span>
                            </h4>
                            <br>
                            <div class=""><a class="btn btn-theme btn-sm btn-min-block" href="#">Read More</a></div>
                        </div>
                    </div><!-- /header-text -->
			    </div>
			    <div class="item">
			    	<img src="assets/images/banner-2.png" alt="Second slide">
			    	<!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <h2>
                                <span>LOREM IPSUM TEXT</span>
                            </h2>
                            <br>
                            <h4>
                            	<span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. when an unknown printer took a galley of type and scrambled</span>
                            </h4>
                            <br>
                            <div class="">
                               <a class="btn btn-theme btn-sm btn-min-block" href="#">Read More</a></div>
                        </div>
                    </div><!-- /header-text -->
			    </div>
			    <div class="item">
			    	<img src="assets/images/banner-3.jpg" alt="Third slide">
			    	<!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <h2>
                                <span>Welcome to LOREM IPSUM</span>
                            </h2>
                            <br>
                            <h4>
                            	<span>Lorem ipsum dolor sit amet, consectetur adipiscing elit took a galley of type.</span>
                            </h4>
                            <br>
                            <div class="">
                                <a class="btn btn-theme btn-sm btn-min-block" href="#">Read More</a></div>
                        </div>
                    </div><!-- /header-text -->
			    </div>
			</div>
			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		    	<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		    	<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
		</div><!-- /carousel -->
	</div>
</div>



<section class="turnaround_banner">	
<div class="container">
	<h1 class="text-center color-black"><b><i>PRODUCTS</i></b></h1><br><br>
	
	<div class="col-md-3 text-center">
	<div class="thumbnail shadow">
          <figure class="imghvr-hinge-left"><img src="admin/dashboard/uploads/5b056878488be.jpg" alt="NEW PRODUCTS">
            <figcaption>
              <h3 class="see_now">See Now</h3>
            </figcaption><a href="#"></a></figure>
         <h4>NEW PRODUCTS</h4>
         </div>
        </div>
        
        <div class="col-md-3 text-center">
	<div class="thumbnail shadow">
          <figure class="imghvr-hinge-left"><img src="admin/dashboard/uploads/5b05682ba2d98.jpg" alt="POPULAR PRODUCTS">
            <figcaption>
              <h3 class="see_now">See Now</h3>
            </figcaption><a href="#"></a></figure>
         <h4>POPULAR PRODUCTS</h4>
         </div>
        </div>
        <div class="col-md-3 text-center">
	<div class="thumbnail shadow">
          <figure class="imghvr-hinge-left"><img src="admin/dashboard/uploads/5b056878488be.jpg" alt="MAGNETIC PRODUCTS">
            <figcaption>
              <h3 class="see_now">See Now</h3>
            </figcaption><a href="#"></a></figure>
         <h4>MAGNETIC PRODUCTS</h4>
         </div>
        </div>
        <div class="col-md-3 text-center">
	<div class="thumbnail shadow">
          <figure class="imghvr-hinge-left"><img src="admin/dashboard/uploads/5b05682ba2d98.jpg" alt="J HOOKS">
            <figcaption>
              <h3 class="see_now">See Now</h3>
            </figcaption><a href="#"></a></figure>
         <h4>J HOOKS</h4>
         </div>
        </div>
         <div class="col-md-3 text-center">
	<div class="thumbnail shadow">
          <figure class="imghvr-hinge-left"><img src="admin/dashboard/uploads/5b05682ba2d98.jpg" alt="J HOOKS">
            <figcaption>
              <h3 class="see_now">See Now</h3>
            </figcaption><a href="#"></a></figure>
         <h4>BRIDAL RINGS</h4>
         </div>
        </div>
         <div class="col-md-3 text-center">
	<div class="thumbnail shadow">
          <figure class="imghvr-hinge-left"><img src="admin/dashboard/uploads/5b056878488be.jpg" alt="J HOOKS">
            <figcaption>
              <h3 class="see_now">See Now</h3>
            </figcaption><a href="#"></a></figure>
         <h4>D RINGS</h4>
         </div>
        </div>
         <div class="col-md-3 text-center">
	<div class="thumbnail shadow">
          <figure class="imghvr-hinge-left"><img src="admin/dashboard/uploads/5b05682ba2d98.jpg" alt="J HOOKS">
            <figcaption>
              <h3 class="see_now">See Now</h3>
            </figcaption><a href="#"></a></figure>
         <h4>CLAMPS AND CLIPS</h4>
         </div>
        </div>
         <div class="col-md-3 text-center">
	<div class="thumbnail shadow">
          <figure class="imghvr-hinge-left"><img src="admin/dashboard/uploads/5b056878488be.jpg" alt="J HOOKS">
            <figcaption>
              <h3 class="see_now">See Now</h3>
            </figcaption><a href="#"></a></figure>
         <h4>SEE ALL PRODUCTS</h4>
         </div>
        </div>
	
</div>
<br>
</section>

















<section>	
<div class="container margin-top-sm ">
	<h1 class="text-center color-black">Inventory on Hand for <b><i>Quick Turnaround</i></b></h1>
	<h4 class="text-center color-black">Specializing in <b><i>Magnetic</i></b> Wire and Cable Management Products</h4>
	<div class="carousel slide hidden-xs" data-ride="carousel" id="quote-carousel">
		<!-- Carousel Slides / Quotes -->
		<div class="carousel-inner">
			<!-- Quote 1 -->
			<div class="item active">
			<?php 
			foreach($array as $item) {
			?>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="text_white event_thumb">	
						<a href="products.php?product=<?=$item['id'];?>">
							<div class="custom-thumbnail">
								<div class="image">
									<img src="admin/dashboard/<?=$item['product_image'];?>">
								</div>
								<div class="text">
								<?php 
									if (strlen($item['product_name']) > 22) {
										echo substr(strtoupper($item['product_name']), 0,20).'...';
									} else {
										echo strtoupper($item['product_name']);
									}
								?>
								</div>
							</div>
						</a>
					</div>
				</div>
				<?php
			}
			?>
			</div>

			<!-- Quote 2 -->
			<div class="item">
				<?php 
				foreach($array2 as $item) {
				?>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="text_white event_thumb">	
							<a href="products.php?product=<?=$item['id'];?>">
								<div class="custom-thumbnail">
									<div class="image">
										<img src="admin/dashboard/<?=$item['product_image'];?>">
									</div>
									<div class="text">
									<?php 
										if (strlen($item['product_name']) > 22) {
											echo substr(strtoupper($item['product_name']), 0,20).'...';
										} else {
											echo strtoupper($item['product_name']);
										}
									?>
									</div>
								</div>
							</a>
						</div>
					</div>
				<?php
				}
				?>
				<br>
			</div>
			<a data-slide="prev" href="#quote-carousel" class="left carousel-control "><span class="glyphicon glyphicon-chevron-left black-bg-color"></span></a>
			<a data-slide="next" href="#quote-carousel" class="right carousel-control "><span class="glyphicon glyphicon-chevron-right black-bg-color"></span></a>
    	</div>
    </div>
	
	<div class="carousel slide visible-xs" data-ride="carousel1" id="quote-carousel1">
		<!-- Carousel Slides / Quotes -->
		<div class="carousel-inner">
			
			<?php 
			$i=1;
			foreach($array3 as $item) {
				if ($i==1){
					$active= "active";
				} else {
					$active = "";
				}
			?>
			<!-- Quote 1 -->
			<div class="item <?=$active;?>">	
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="text_white event_thumb">	
							<a href="products.php?product=<?=$item['id'];?>">
								<div class="custom-thumbnail">
									<div class="image">
										<img src="admin/dashboard/<?=$item['product_image'];?>">
									</div>
									<div class="text">
									<?php 
										if (strlen($item['product_name']) > 22) {
											echo substr(strtoupper($item['product_name']), 0,20).'...';
										} else {
											echo strtoupper($item['product_name']);
										}
									?>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
				<?php
				$i++;
			}
			?>
			

			<a data-slide="prev" href="#quote-carousel1" class="left carousel-control "><span class="glyphicon glyphicon-chevron-left black-bg-color"></span></a>
			<a data-slide="next" href="#quote-carousel1" class="right carousel-control "><span class="glyphicon glyphicon-chevron-right black-bg-color"></span></a>
    	</div>
    </div>
	<a href="products.php" style="text-decoration:none;s"><div class="btn-black">See All Products</div></a>
</div><br><br><br>
</section>



<section class="specializing">

	<div class="container">
		<h1 class="text-center color-white">Specializing in Magnetic Wire and <br><b><i>Cable Management Products</i></b></h1>
		<div class="row">
			<div class="col-md-3">
				<div class="custom-thumbnail border_blk" style="background:#fff">
					<div class="image">
						<img src="assets/images/collection/1.png">
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="custom-thumbnail border_blk" style="background:#fff">
					<div class="image">
						<img src="assets/images/collection/2.png">
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="custom-thumbnail border_blk" style="background:#fff">
					<div class="image">
						<img src="assets/images/collection/3.png">
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="custom-thumbnail border_blk" style="background:#fff">
					<div class="image">
						<img src="assets/images/collection/4.png">
					</div>
				</div>
			</div>
		</div>
	</div>

</section>


<div class="light-bg">
	<div class="container">
		<h1 class="text-center color-black"><b><i>Custom Colors </i></b>& Configurations Available</h1>
		<div class="row">
			<div class="col-md-3">
				<div class="custom-thumbnail border_blk">
					<div class="image">
						<img src="assets/images/collection/1.png">
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="custom-thumbnail border_blk">
					<div class="image">
						<img src="assets/images/collection/2.png">
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="custom-thumbnail border_blk">
					<div class="image">
						<img src="assets/images/collection/3.png">
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="custom-thumbnail border_blk">
					<div class="image">
						<img src="assets/images/collection/4.png">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="container margin-top-lg">
	<h1 class="text-center color-black">Innovative Products <b><i>Exclusive</i></b> to Winnie Industries</h1>
	<div class="row">
		<div class="col-md-4">
			<div class="custom-thumbnail">
				<div class="image">
					<img src="assets/images/collection/11.jpeg">
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="custom-thumbnail">
				<div class="image">
					<img src="assets/images/collection/22.png">
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="custom-thumbnail">
				<div class="image">
					<img src="assets/images/collection/22.png">
				</div>
			</div>
		</div>
	</div><br><br>
</div>

<!--<div class="light-bg margin-top-md">
	<div class="container">
		<h3 class="text-center">Supplying to Distributors Direct</h3>
		<div class="map"><img src="assets/images/map.png" class="img-responsive"></div>
		<h4 class="text-center">Get Our Product Brochure >></h4>
		<br>
		<div class="btn-black">Contact us</div>
	</div>
</div>-->

<?php require_once 'inc/footer.php';?>