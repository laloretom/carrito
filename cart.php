<?php include 'inc/header.php';?>

<?php 
if (isset($_GET['delpro'])) {
	$delId = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delpro']);
	$delProduct = $ct->delProductByCart($delId);
}

 ?>

<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cartId = $_POST['cartId'];
    $quantity = $_POST['quantity'];
    $updateCart = $ct->updateCartQuantity($cartId,$quantity);

    if ($quantity <=0) {
    	$delProduct = $ct->delProductByCart($cartId);
    }
}
 ?>
 <?php  
if (!isset($_GET['id'])) {
	echo "<meta http-equiv = 'refresh' content ='0;URL=?id=nayem' />";
}
 ?>


 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Carrito</h2>
			    	<?php 
			    	if (isset($updateCart)) {
			    		echo $updateCart;
			    	}

			    	if (isset($delProduct)) {
			    		echo $delProduct;
			    	}
			    	 ?>

						<table class="tblone">


							<tr>
								<th width="5%">No</th>
								<th width="30%">Producto</th>
								<th width="10%">Imagen</th>
								<th width="15%">Precio</th>
								<th width="15%">Cantida</th>
								<th width="15%">Precio Total</th>
								<th width="10%">Estado</th>
							</tr>
							<tr>

							<?php 

							$getPro = $ct->getCartProduct();
							if ($getPro) {
								$i = 0;
								$sum = 0;
								$qty = 0;
								while ($result = $getPro->fetch_assoc()) {
								
								$i++;

							 ?>
								<td><?php echo $i;?></td>
								<td><?php echo $result['productName']; ?></td>
								<td><img src="admin/<?php echo $result['image']; ?>" alt=""/></td>
								<td>$ <?php echo $result['price']; ?></td>
					<td>
						<form action="" method="post">

							<input type="hidden" name="cartId" value="<?php echo $result['cartId']; ?>"/>
							<input type="number" name="quantity" value="<?php echo $result['quantity']; ?>"/>
							<input type="submit" name="submit" value="Actualizar"/>
						</form>
					</td>
								<td>
							$ <?php
						$total = $result['price'] * $result['quantity'];
						echo $total;
						 ?>
							

									</td>
								<td><a onclick="return confirm('Estas segura de eliminarlo')" href="?delpro=<?php echo $result['cartId']; ?>">X</a></td>
							</tr>
							
							<?php 
							$qty = $qty + $result['quantity'];
							$sum = $sum + $total;
							Session::set("qty",$qty);
							Session::set("sum",$sum);
							 ?>


						<?php } } ?>	
						</table>

						<?php
						$getData = $ct->checkCartTable();
							if ($getData){

								?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td>$ <?php echo $sum; ?></td>
							</tr>
							<tr>
								<th>IVA : </th>
								<td>16%</td>
							</tr>
							<tr>
								<th>Total :</th>
								<td>$ 
									<?php 
									$vat = $sum * 0.16;
									$gtotal = $sum + $vat;
									echo $gtotal;
									 ?>
								</td>
							</tr>

					   </table>
					<?php }else{
						header("Location:index.php");
					} ?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"><input type="submit" class="buysubmit" name="submit" value=" CONTINUAR COMPRANDO"/></a>

						</div>
						<div class="shopright">
							<a href="payment.php"> <input type="submit" class="buysubmit" name="submit" value="REALIZAR PEDIDO"/></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include 'inc/footer.php';?>