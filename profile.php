<?php include 'inc/header.php';?>

<?php 
$login = Session::get("cuslogin");
if ($login == false) {
    header("Location:login.php");
}
 ?>
<style>
	
.tblone{width: 550px;margin: 0 auto;border: 2px solid #ddd;margin-bottom: 10px;}
.tblone tr td{text-align: justify;}	
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
				<table class="tblone">
					<tr>
						<td colspan="3"><h2>Tu perfil</h2></td>
					</tr>
					<tr>
						<td width="20%">Nombre</td>
						<td width="5%">:</td>
						<td><?php echo $result['name'];?></td>
					</tr>
					<tr>
						<td>Telefono</td>
						<td>:</td>
						<td><?php echo $result['phone'];?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td>:</td>
						<td><?php echo $result['email'];?></td>
					</tr>
					<tr>
						<td>Direccion</td>
						<td>:</td>
						<td><?php echo $result['address'];?></td>
					</tr>
					<tr>
						<td>Ciudad</td>
						<td>:</td>
						<td><?php echo $result['city'];?></td>
					</tr>
					<tr>
						<td>Codigo postal</td>
						<td>:</td>
						<td><?php echo $result['zip'];?></td>
					</tr>
					<tr>
						<td>Pais</td>
						<td>:</td>
						<td><?php echo $result['country'];?></td>
					</tr>

					<tr>
						<td></td>
						<td></td>
						<td><a href="editprofile.php">Actualizar Perfil</a></td>
					</tr>

				</table>
			<?php }} ?>
 		</div>
 	</div>
	</div>
  <?php include 'inc/footer.php';?>