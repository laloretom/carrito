<?php include 'inc/header.php';?>

<?php 
$login = Session::get("cuslogin");
if ($login == false) {
    header("Location:login.php");
}
 ?>

<?php
$cmrId = Session::get("cmrId");
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $updateCmr = $cmr->customerUpdate($_POST,$cmrId);
}

?> 

<style>
	
.tblone{width: 550px;margin: 0 auto;border: 2px solid #ddd;margin-bottom: 10px;}
.tblone tr td{text-align: justify;}	
.tblone input[type="text"]{width: 400px;padding: 5px;font-size: 15px;}
</style>

 <div class="main">
    <div class="content">
    	<div class="section group">
    		<?php 
    		$id = Session::get("cmrId");
    		$getdata = $cmr->getCustomerData($id);
    		if ($getdata) {
    			while ($result = $getdata->fetch_assoc()) {
    		

    		 ?>
    		 <form action="" method="post">
				<table class="tblone">
					<?php 
					if (isset($updateCmr)) {
					
					echo "<tr><td colspan='2'>".$updateCmr."</td></tr>";
					}
					 ?>
					<tr>
						<td colspan="2"><h2>Actualizar Perfil</h2></td>
					</tr>
					<tr>
						<td width="20%">Nombre</td>
						<td><input type="text" name="name" value="<?php echo $result['name'];?>"></td>
						
					</tr>
					<tr>
						<td>Telefono</td>
						<td><input type="text" name="phone" value="<?php echo $result['phone'];?>"></td>
						
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="text" name="email" value="<?php echo $result['email'];?>"></td>
					</tr>
					<tr>
						<td>Direccion</td>
						<td><input type="text" name="address" value="<?php echo $result['address'];?>"></td>
					</tr>
					<tr>
						<td>Ciudad</td>
						<td><input type="text" name="city" value="<?php echo $result['city'];?>"></td>
					</tr>
					<tr>
						<td>Codigo postal</td>
						<td><input type="text" name="zip" value="<?php echo $result['zip'];?>"></td>
					</tr>
					<tr>
						<td>Pais</td>
						<td><input type="text" name="country" value="<?php echo $result['country'];?>"></td>
					</tr>

					<tr>
						<td></td>
						<td><input type="submit" name="submit" value="Guardar"></td>
					</tr>

				</table>
				</form>
			<?php }} ?>
 		</div>
 	</div>
	</div>
  <?php include 'inc/footer.php';?>