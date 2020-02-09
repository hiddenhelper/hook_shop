<?php
require_once 'inc/header.php';
require_once 'admin/inc/ActiveRecords/ActiveRecords.php';
$db       =  new MySQL\ActiveRecords();
if(!isset($_GET['product'])) {
?>
<div class="inner_banner">
	<div class="clearfix"></div>
		<h1 class="heading text-center">PRODUCTS</h1>
	<div class="clearfix"></div>
</div>
<br>
<?php
}
	if(isset($_GET['product'])) :
		$product =  $db->select('products',array('id'=>$_GET['product']));
		if(!(count($product) > 0)) {
			header('Location: products.php');
		}
?>

<div class="container margin-top-sm" <?php if(isset($_GET['product'])) {echo 'style="margin-top:111px;"';} ?> >

	<div class="row">
		<div class="col-md-4"  style="margin-right:30px;">
			<div class="custom-thumbnail" style="margin-top:0px;width:100%;">
				<div class="image">
					<img src="admin/dashboard/<?=$product[0]['product_image'];?>" >
				</div>
				<!--<div class="text">
					<?php
						if (strlen($product[0]['product_name']) > 22) {
							echo substr(strtoupper($product[0]['product_name']), 0,20).'...';
						} else {
							echo strtoupper($product[0]['product_name']);
						}
					?>
				</div>-->
			</div>
		</div>
		<div class="col-md-7">
			<h2 class="color-black"><?=strtoupper($product[0]['product_name']);?></h2>
			<br>
			<h4>Product Description :</h4>
			<p class="text-justify"><?=$product[0]['product_description'];?></p>
			<br>
			<a href="admin/dashboard/<?=$product[0]['product_attachment'];?>" target="_blank"><button class="btn-black">Download Cut Sheet</button></a>
			<a href="admin/dashboard/<?=$product[0]['product_image'];?>" target="_blank" download><button class="btn-black" style="width:300px;">Download High Resolution Image</button></a>
			<br><br>
		</div>
	</div>
	<a href="products.php#products" class="pull-right"><i class="fas fa-undo-alt"></i> Return to Products Page</a>
	<div class="clearfix"></div>
	<br>
</div>
<?php
	elseif(isset($_GET['cat']) && isset($_GET['sub_cat'])) :
		$products =  $db->select('products',array('product_category'=>$_GET['sub_cat']));
		$categories =  $db->select('categories');
		$categoriesName =  $db->select('categories',array('id'=>$_GET['cat']));
		$subCategories =  $db->select('sub_categories',array('parent_cat_id'=>$_GET['cat'],'id'=>$_GET['sub_cat']));
?>
<div class="container margin-top-sm" >

	<div class="row">
		<div class="col-md-3">
			<br><br>
			<ul class="product-cat" style="margin-top:-23px;">
				<li><a style="font-size:14px;border-bottom:1px solid #ccc;">Select a Category</a></li>
				<li><a href="products.php#products" style="font-size:14px;border-bottom:1px solid #ccc;">POPULAR PRODUCTS</a></li></li>
				<li><a href="products.php?new#products" style="font-size:14px;border-bottom:1px solid #ccc;">NEW PRODUCTS</a></li></li>
				<?php
					foreach($categories as $item) {
						$sub_cat_menu = $db->select('sub_categories', ['parent_cat_id'=>$item['id']]);
						if ($item['id'] == $_GET['cat']) {
							$class = 'class="active"';
						} else {
							$class = '';
						}
						if (count($sub_cat_menu) > 0) {
							echo '<li><a style="font-size:14px;border-bottom:1px solid #ccc;" href="products.php?cat='.$item['id'].'#products" '.$class.'>'.strtoupper($item['category_name']).'</a></li>';
						}
					}
				?>
			</ul>
		</div>
		<div class="col-md-9">

		<?php
			echo '<div style="padding:15px 0; ">';
			foreach($subCategories as $sub_cat) {
				if ($sub_cat['id'] == $_GET['sub_cat']) {
					$class = 'active-sub';
						echo '<a class="hvr-rectangle-out '.$class.' " href="products.php?cat='.$categoriesName[0]['id'].'&sub_cat='.$sub_cat['id'].'#products">'.strtoupper($sub_cat['sub_cat']).'</a> ';
						echo '<a href="#" onclick="window.history.back();"; class="pull-right"><i class="fas fa-undo-alt"></i> Return to Previous Page</a>';
				} else {
					$class = '';
				}

				//echo $sub_cat['sub_cat'].'('.$sub_cat['id'].')'.' : '.$categoriesName[0]['category_name'];
			}
			echo '</div>';
			$n = count($products);
			for ($j=0;$j<$n;$j++) {

				?>
					<a href="products.php?product=<?=$products[$j]['id'];?>">
						<div class="pull-left" style="margin-top:-35px;margin-right:25px;">
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
										echo strtoupper($products[$j]['product_name'].$popular );
									}
								?>
								</div>
							</div>
						</div>
						<div class="clear-flix"></div>
					</a>
				<?php

			}
		?>
			<div class="clear-flix"></div>
		</div>
	</div>
</div>
<?php
	elseif(isset($_GET['cat'])):
		$categories =  $db->select('categories');
		$categoriesName =  $db->select('categories',array('id'=>$_GET['cat']));
		$subCategories =  $db->select('sub_categories',array('parent_cat_id'=>$_GET['cat']));
?>
<div class="container margin-top-sm" >

	<div class="row">
		<div class="col-md-3">
			<br><br>
			<ul class="product-cat" style="margin-top:-23px;">
				<li><a style="font-size:14px;border-bottom:1px solid #ccc;">Select a Category</a></li>
				<li><a href="products.php#products" style="font-size:14px;border-bottom:1px solid #ccc;">POPULAR PRODUCTS</a></li></li>
				<li><a href="products.php?new#products" style="font-size:14px;border-bottom:1px solid #ccc;">NEW PRODUCTS</a></li></li>
				<?php
					foreach($categories as $item) {
						$sub_cat_menu = $db->select('sub_categories', ['parent_cat_id'=>$item['id']]);
						if ($item['id'] == $_GET['cat']) {
							$class = 'class="active"';
						} else {
							$class = '';
						}
						if (count($sub_cat_menu) > 0) {
							echo '<li><a style="font-size:14px;border-bottom:1px solid #ccc;" href="products.php?cat='.$item['id'].'#products" '.$class.'>'.strtoupper($item['category_name']).'</a></li>';
						}
					}
				?>
			</ul>
		</div>
		<div class="col-md-9">

		<?php
			echo '<div class="row" style="padding:15px 0; ">';
			foreach($subCategories as $sub_cat) {
				?>
				<div class="col-md-3">
						<div class="thumbnail shadow">
							<figure class="imghvr-hinge-left"><img src="admin/dashboard/<?=$sub_cat['img_url'];?>" alt="NEW PRODUCTS">
								<figcaption>
									<h3 class="see_now" style="    margin-top: 2em;border: 1px solid #fff;padding: 10px 16px;line-height: 18px;border-radius: 10px;font-size: 22px;">See Now</h3>
								</figcaption><a href="products.php?cat=<?=$categoriesName[0]['id'];?>&sub_cat=<?=$sub_cat['id'];?>#products"></a></figure>
						 <h6 class='text-center'><?=strtoupper($sub_cat['sub_cat']);?></h6>
					 </div>
				 </div>
				<?php
				//echo '<a class="hvr-rectangle-out" href="products.php?cat='.$categoriesName[0]['id'].'&sub_cat='.$sub_cat['id'].'#products">'.strtoupper($sub_cat['sub_cat']).'</a> ';
				//echo $sub_cat['sub_cat'].'('.$sub_cat['id'].')'.' : '.$categoriesName[0]['category_name'];
			}
			echo '</div>';
			?>
			<div class="clear-flix"></div>
		</div>
	</div>
</div>
<?php
	elseif(isset($_GET['new'])):
		$categories =  $db->select('categories');
		//$products =  $db->select('products',array('product_category'=>$categories[0]['id']));
		$products =  $db->select('products',array('new_product'=>'yes'));
?>
<div class="container margin-top-sm" >

	<div class="row">
		<div class="col-md-3" >
		<br><br>
			<ul class="product-cat" style="margin-top:-23px;">
				<li><a href="" style="font-size:14px;border-bottom:1px solid #ccc;">Select a Category</a></li>
				<li><a href="products.php#products" style="font-size:14px;border-bottom:1px solid #ccc;">POPULAR PRODUCTS</a></li></li>
				<li><a href="products.php?new#products" style="font-size:14px;border-bottom:1px solid #ccc;" class="active">NEW PRODUCTS</a></li></li>
				<?php
					foreach($categories as $item) {

						$sub_cat_menu = $db->select('sub_categories', ['parent_cat_id'=>$item['id']]);
						if (count($sub_cat_menu) > 0) {
							echo '<li><a style="font-size:14px;border-bottom:1px solid #ccc;" href="products.php?cat='.$item['id'].'#products" >'.strtoupper($item['category_name']).'</a></li>';
						}

					}
				?>
			</ul>
		</div>
		<div class="col-md-9">
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
	else :
		$categories =  $db->select('categories');
		//$products =  $db->select('products',array('product_category'=>$categories[0]['id']));
		$products =  $db->select('products',array('popular'=>'yes'));
?>
<div class="container margin-top-sm" >

	<div class="row">
		<div class="col-md-3" >
		<br><br>
			<ul class="product-cat" style="margin-top:-23px;">
				<li><a href="" style="font-size:14px;border-bottom:1px solid #ccc;">Select a Category</a></li>
				<li><a href="products.php#products" style="font-size:14px;border-bottom:1px solid #ccc;" class="active">POPULAR PRODUCTS</a></li></li>
				<li><a href="products.php?new#products" style="font-size:14px;border-bottom:1px solid #ccc;">NEW PRODUCTS</a></li></li>
				<?php
					foreach($categories as $item) {

						$sub_cat_menu = $db->select('sub_categories', ['parent_cat_id'=>$item['id']]);
						if (count($sub_cat_menu) > 0) {
							echo '<li><a style="font-size:14px;border-bottom:1px solid #ccc;" href="products.php?cat='.$item['id'].'#products" >'.strtoupper($item['category_name']).'</a></li>';
						}

					}
				?>
			</ul>
		</div>
		<div class="col-md-9">
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
<?php endif;?>

<br><br><br>

<?php require_once 'inc/footer.php';?>
