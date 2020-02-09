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
<div class="hidden-xs">
	<!-- Carousel -->
    	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
		    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
		</ol>
		<!-- Wrapper for slides -->
		<div class="carousel-inner">
		    <div class="item active">
		    	<img src="assets/images/banner-2.png" alt="First slide">
           	    </div>
		    <div class="item">
		    	<img src="assets/images/banner-1.png" alt="Second slide">
		    </div>
		    <div class="item">
		    	<img src="assets/images/banner-3.png" alt="Third slide">
		    </div>
		    <div class="item">
		    	<img src="assets/images/banner-4.png" alt="fourth slide">
		    </div>
		    <div class="item">
		    	<img src="assets/images/banner-5.png" alt="fifth slide">
		    </div>
		</div>
		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
	    	<span class="glyphicon glyphicon-chevron-left"></span></a>
		<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
	    	<span class="glyphicon glyphicon-chevron-right"></span></a>
	</div><!-- /carousel -->
</div>


<div class="visible-xs">
	<!-- Carousel -->
    	<div id="carousel-example-generic1" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
		    <li data-target="#carousel-example-generic1" data-slide-to="0" class="active"></li>
		    <li data-target="#carousel-example-generic1" data-slide-to="1"></li>
		    <li data-target="#carousel-example-generic1" data-slide-to="2"></li>
		    <li data-target="#carousel-example-generic1" data-slide-to="3"></li>
		    <li data-target="#carousel-example-generic1" data-slide-to="4"></li>
		</ol>
		<!-- Wrapper for slides -->
		<div class="carousel-inner">
		    <div class="item active">
		    	<img src="assets/images/mob-banner-1.png" alt="First slide">
           	    </div>
		    <div class="item">
		    	<img src="assets/images/mob-banner-2.png" alt="Second slide">
		    </div>
		    <div class="item">
		    	<img src="assets/images/mob-banner-3.png" alt="Third slide">
		    </div>
		     <div class="item">
		    	<img src="assets/images/mob-banner-4.png" alt="fourth slide">
		    </div>
		     <div class="item">
		    	<img src="assets/images/mob-banner-5.png" alt="fifth slide">
		    </div>
		</div>
		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-example-generic1" data-slide="prev">
	    	<span class="glyphicon glyphicon-chevron-left"></span></a>
		<a class="right carousel-control" href="#carousel-example-generic1" data-slide="next">
	    	<span class="glyphicon glyphicon-chevron-right"></span></a>
	</div><!-- /carousel -->
</div><!-- mobile_slider -->


<section>
	<div class="container">
	<h1 class="text-center color-black heading"><b>PRODUCTS</b></h1><br><br>
	   <div class="text-center">
	    <div class="col-md-3">
            <div class="thumbnail shadow">	        
           <figure class="imghvr-zoom-in" style = "height: 250px">
            <img src="assets/images/NewProducts1.png" alt="NEW PRODUCTS">
	         <a href="products.php?new#products"></a>
	         </figure>
	         <h4>NEW PRODUCTS</h4>
                 </div>	       
                 </div>
                <div class="col-md-3">
		 <div class="thumbnail shadow">
	          <figure class="imghvr-zoom-in" style = "height: 250px">
		          <img src="assets/images/JHooks1.png" alt="J Hooks">
		          <a href="products.php?cat=2#product"></a>     
	          </figure>
		  <h4>J HOOKS</h4>
	         </div>
	        </div>
	        
	        <div class="col-md-3">
		<div class="thumbnail shadow">
	          <figure class="imghvr-zoom-in" style = "height: 250px">
	          <img src="assets/images/MagneticProducts1.png" alt="MAGNETIC PRODUCTS">
	          <a href="products.php?cat=6#products"></a>
	            </figure>
	         <h4>MAGNETIC PRODUCTS</h4>
	         </div>
	        </div>
	        
	        <div class="col-md-3">
		<div class="thumbnail shadow">
	          <figure class="imghvr-zoom-in" style = "height: 250px">
	              <img src="assets/images/BridleRings1.png" alt="BRIDAL RINGS">
	            <a href="products.php?cat=3#products"></a></figure>
	         <h4>BRIDLE RINGS</h4>
	         </div>
	        </div>
                <div class="col-md-3">
			<div class="thumbnail shadow">
	         		<figure class="imghvr-zoom-in" style = "height: 250px">
	         		    <img src="assets/images/StainlessSteel.png" alt="STAINLESS STEEL">
					<a href="https://www.winnieindustries.com/products.php?cat=7#products"></a>
				</figure>
	                <h4>STAINLESS STEEL</h4>
	            </div>
	       </div>
	       
	         <div class="col-md-3">
		<div class="thumbnail shadow">
	          <figure class="imghvr-zoom-in" style = "height: 250px">
	              <img src="assets/images/JHookTrees.png" alt="J HOOK TREES">

	            <a href="products.php?cat=24#products"></a></figure>
	         <h4>J HOOK TREES</h4>
	         
	              </div>
	       </div>
      	                
	         <div class="col-md-3">
		<div class="thumbnail shadow">
	          <figure class="imghvr-zoom-in" style = "height: 250px">
	              <img src="assets/images/CeilingBrackets.png" alt="CEILING BRACKETS">

	            <a href="products.php?cat=5#products"></a></figure>
	         <h4>CEILING BRACKETS</h4>
	                	         </div>
	        </div>
	        
	         <div class="col-md-3">
		  <div class="thumbnail shadow">
	            <figure class="imghvr-zoom-in" style = "height: 250px">
	             <img src="assets/images/BeamClamps1.png" alt="BEAM CLAMPS">

	   	     <a href="products.php?cat=8#products"></a>
	            </figure>
	            <h4>BEAM CLAMPS</h4>
	       		</div>
	        </div>
	        
	         <div class="col-md-3">
		<div class="thumbnail shadow">
	          <figure class="imghvr-zoom-in" style = "height: 250px">
	              <img src="assets/images/Grommets1.png" alt="GROMMETS">

	            <a href="products.php?cat=5#products"></a></figure>
	            <h4>GROMMETS</h4>
	       		</div>
	        </div>
	        
	         <div class="col-md-3">
		<div class="thumbnail shadow">
	          <figure class="imghvr-zoom-in" style = "height: 250px">
	              <img src="assets/images/GripTape1.png" alt="GRIP TAPE">

	            <a href="products.php?cat=5#products"></a></figure>
	            <h4>GRIP TAPE</h4>
	       		</div>
	        </div>
	        
	         <div class="col-md-3">
		<div class="thumbnail shadow">
	          <figure class="imghvr-zoom-in" style = "height: 250px">
	              <img src="assets/images/MiscClips1.png" alt="MISC CLIPS">

	            <a href="products.php?cat=5#products"></a></figure>
	            <h4>MISC CLIPS</h4>
	       		</div>
	        </div>
	        
	         <div class="col-md-3">
		<div class="thumbnail shadow">
	          <figure class="imghvr-zoom-in" style = "height: 250px">
	              <img src="assets/images/see-all1.png" alt="SEE ALL PRODUCTS">

	            <a href="products.php?#products"></a></figure>
	            <h4>SEE ALL PRODUCTS</h4>
	          </div>
	        </div>
       
	   </div><!-- text-center-->
	</div>
	<br>
</section>

<?php require_once 'inc/footer.php';?>
