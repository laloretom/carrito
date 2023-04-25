<?php include 'inc/header.php';?>
<?php include 'inc/slider.php';?>

	<div class="main">
		<div class="content">
			<div class="content_bottom">
				<div class="heading">
					<h3>Nuevos productos</h3>
				</div>
				<div class="clear"></div>
			</div>
			<div class="section group">
				<?php
				$getNpd = $pd->getNewProduct();
				if ($getNpd) {
					while ($result = $getNpd->fetch_assoc()) { ?>
						<div class="grid_1_of_4 images_1_of_4">
							<a href="details.php?proid=<?php echo $result['productId']; ?>"><img class="img1" src="admin/<?php echo $result['image']; ?>" /></a>
							<h2><?php echo $result['productName']; ?></h2>
							<p><span class="price">$ <?php echo $result['price']; ?></span></p>
							<div class="button"><span><a href="details.php?proid=<?php echo $result['productId']; ?>" class="details">Detalles</a></span></div>
						</div>
					<?php } } ?>
			</div>
		</div>
 	</div>
 	
<?php include 'inc/footer.php';?>
