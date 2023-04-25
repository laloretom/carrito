<?php include 'inc/header.php';?>
<?php 
$login = Session::get("cuslogin");
if ($login == true) {
	header("Location:order.php");
}
 ?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $custLogin = $cmr->customerLogin($_POST);
}

?> 

 <div class="main">
    <div class="content">
    	 <div class="login_panel">

    	 	<?php 

    		if (isset($custLogin)) {
    			echo $custLogin;
    		}
    		 ?>
        	<h3>Iniciar sesion</h3>
        	<form action="" method="post">
                	<input name="email" placeholder="Email" type="text"/>
                    <input name="pass" placeholder="Password" type="password"/>
                    <div class="buttons"><div><button class="grey" name="login">Sign In</button></div></div>
                      </div>
                 </form>
                                  
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $customerReg = $cmr->customerRegistration($_POST);
}

?>          
    	<div class="register_account">
    		<?php 

    		if (isset($customerReg)) {
    			echo $customerReg;
    		}
    		 ?>
    		<h3>Registrarse</h3>
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Nombre"/>
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="Ciudad"/>
							</div>
							
							<div>
								<input type="text" name="zip" placeholder="Codigo postal"/>
							</div>
							<div>
								<input type="text" name="email" placeholder="Email"/>
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Direccion"/>
						</div>
		    		
						<div>
							<input type="text" name="country" placeholder="Pais"/>
						</div>
				 	        
	
		           <div>
		          <input type="text" name="phone" placeholder="Telefono"/>
		          </div>
				  
				  <div>
					<input type="text" name="pass" placeholder="Password"/>
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button class="grey" name="register">Crear cuenta</button></div></div>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include 'inc/footer.php';?>