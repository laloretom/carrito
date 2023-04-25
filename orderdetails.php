<?php include 'inc/header.php';?>

<?php 
$login = Session::get("cuslogin");
if ($login == false) {
    header("Location:login.php");
} ?>


<?php 
if (isset($_GET['customerId'])) {
    $id = $_GET['customerId'];
    $confirm = $ct->productShiftConfirm($id);
} ?>

<style>
    .tblone tr td{text-align: justify;}
</style>

<div class="main">
    <div class="content">
        <div class="section group">
            <div class="order">
                <h2>Historial de Pedidos</h2>
                <table class="tblone">
                    <tr>
                        <th>No</th>
                        <th>Producto</th>
                        <th>Imagen</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Accion</th>
                    </tr>
                    <tr>
                        <?php
                        $cmrId = Session::get("cmrId");
                        $getOrder = $ct->getOrderedProduct($cmrId);
                        if ($getOrder) {
                            $i = 0;
                            while ($result = $getOrder->fetch_assoc()) {
                                $i++; ?>
                                <td><?php echo $i;?></td>
                                <td><?php echo $result['productName']; ?></td>
                                <td><img src="admin/<?php echo $result['image']; ?>" alt=""/></td>
                                <td><?php echo $result['quantity']; ?></td>
                                <td>$ <?php echo $result['price'];?></td>
                                <td><?php echo $fm->formatDate($result['date']); ?></td>
                                <td><?php
                                if ($result['status'] == '0') {
                                    echo "Pendiente";
                                }elseif($result['status'] == '1'){
                                    echo "En camino";
                                }elseif($result['status'] == '3'){
                                    echo "Completado";    
                                } else{ 
                                    echo "Cancelado";
                                } ?>
                                    
                                </td>
                            </td>
                            <?php 
                            if ($result['status'] == '0') { ?>
                                <td> <a href="?customerId=<?php echo $result['id']; ?>">Cancelar pedido</a><td>
                                <?php } elseif ($result['status'] == '3') {?>
                                    <td>N/A</td>
                                <?php } elseif ($result['status'] == '2') {?>
                                    <td>N/A</td>
                                <?php } elseif ($result['status'] == '1') {?>
                                    <td>N/A</td>
                                <?php } ?>
                            </tr>
                        <?php } } ?>    
                        
                        </table>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>

<?php include 'inc/footer.php';?>