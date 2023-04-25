<?php include 'inc/header.php';?>

<?php 
$login = Session::get("cuslogin");
if ($login == false) {
    header("Location:login.php");
}
 ?>

 <?php 
if (isset($_GET['orderid']) && $_GET['orderid'] == 'Order') {
 $cmrId = Session::get("cmrId");
 $insertOrder = $ct->orderProduct($cmrId);
 $delData = $ct->delCustomerCart();
 header("Location:success.php");
}
  ?>
<style>
.division{width: 50%;float: left;}
.tblone{width: 500px;margin: 0 auto;border: 2px solid #ddd;margin-bottom: 10px;}
.tblone tr td{text-align: justify;}
.tbltwo{float: right;text-align: left;width: 60%;border: 2px solid #ddd;margin-right: 14px;margin-top: 12px;}
.tbltwo tr td{text-align: justify;padding: 5px 10px;}
.ordernow{padding-bottom: 30px;}
.ordernow a{width: 200px;margin: 20px auto 0;text-align: center;padding: 5px;font-size: 30px;display: block;background: #ff0000;color: #fff;border-radius: 3px;}
</style>

 <div class="main">
    <div class="content">
    	<div class="section group">
    	<div class="division">
         
            <table class="tblone">


                            <tr>
                                <th>No</th>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Total</th>
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
                                <td>$ <?php echo $result['price']; ?></td>
                                 <td><?php echo $result['quantity']; ?></td>
                                <td>
                            $ <?php
                        $total = $result['price'] * $result['quantity'];
                        echo $total;
                         ?>
                            

                                    </td>
                            </tr>
                            
                            <?php 
                            $qty = $qty + $result['quantity'];
                            $sum = $sum + $total;
                             ?>


                        <?php } } ?>    
                        </table> 
                        <table class="tbltwo">
                            <tr>
                                <td>Sub Total</td>
                                <td>:</td>
                                <td>$ <?php echo $sum; ?></td>
                            </tr>
                            <tr>
                                <td>IVA</td>
                                <td>:</td>
                                <td>16%($<?php echo $vat = $sum * 0.16; ?>)</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>:</td>
                                <td>$  
                                    <?php 
                                    $vat = $sum * 0.16;
                                    $gtotal = $sum + $vat;
                                    echo $gtotal;
                                     ?>
                                </td>
                            </tr>

                             <tr>
                                <td>Cantidad</td>
                                <td>:</td>
                                <td><?php echo $qty; ?></td>
                            </tr>

                       </table>
                    
        </div>
        <div class="division">
            
            <?php 
            $id = Session::get("cmrId");
            $getdata = $cmr->getCustomerData($id);
            if ($getdata) {
                while ($result = $getdata->fetch_assoc()) {
            

             ?>
                <table class="tblone">
                    <tr>
                        <td colspan="3"><h2>Detalles del cliente</h2></td>
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
                        <td><a href="editprofile.php">Actualizar detalles</a></td>
                    </tr>

                </table>
            <?php }} ?>
        </div>
 		</div>
 	</div>

    <div class="ordernow"><a href="?orderid=Order">Ordenar</a></div>
	</div>
  <?php include 'inc/footer.php';?>