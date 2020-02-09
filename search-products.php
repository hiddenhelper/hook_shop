<?php 
require_once 'inc/header.php'; 
require_once 'admin/inc/ActiveRecords/ActiveRecords.php'; 
$db       =  new MySQL\ActiveRecords();
?>
<div class="inner_banner">
	<div class="clearfix"></div>
		<h1 class="heading text-center">SEARCH PRODUCTS</h1>
	<div class="clearfix"></div>
</div>
<br>
<?PHP
	if (isset($_GET['product'])) {
	        $q =  $db->query('SELECT * FROM products WHERE product_name LIKE :txt',[':txt'=>'%'.$_GET['product'].'%']); 
		$q->execute();
		$product = $q->fetchAll();
		$q->execute();
		$products = $q->fetchAll();
		if((count($products) > 0)) {
		   ?>
		   <div class="container margin-top-sm" >
		   <h1>Search Result for `<?=$_GET['product'];?>`</h1>
		   <br>
		    <div class="row">
		      <div class="col-md-12">
		      <?php 
		        $n = count($products);
		        for ($j=0;$j<$n;$j++) {
		          
		          ?>
		            <a href="products.php?product=<?=$products[$j]['id'];?>">
		              <div class="col-sm-4"  style="margin-top:-35px;">
		                <div class="custom-thumbnail">
		                  <div class="image">
		                    <img src="admin/dashboard/<?=$products[$j]['product_image'];?>">
		                  </div>
		                  <div class="text">
		                  <?php 
		                  if ($products[$j]['popular'] == 'yes') {
		                    $popular = ' * ';
		                  } else {
		                    $popular = '';
		                  }
		                    if (strlen($products[$j]['product_name']) > 22) {
		                      echo substr(strtoupper($products[$j]['product_name']), 0,20).'...'.$popular;
		                    } else {
		                      echo strtoupper($products[$j]['product_name']).$popular;
		                    }
		                  ?>
		                  </div>
		                </div>
		              </div>
		            </a>
		          <?php
		          
		        }
		      ?>	
		      </div>
		    </div>
		  </div>
		   <?php
		} else {
		   echo '<div class="container margin-top-sm" ><h1>No Result Found for 	`'.$_GET['product'].'`</h1></div>';
		}
	} else {
		header('Location: products.php');
	}
?>
<br><br><br>

<?php require_once 'inc/footer.php';?><div class="container margin-top-sm" >