<?php 
session_start();
?>
<html>
	<head> 
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Checkout</title>
		<style>
			img{
				height: 214px;
				width: 176px;
			}
			.header{
				margin-left: 5px
			}
			.left{
			  float: left;
			  width: 45%;
			}
            .right{
			  float: right;
			  width: 45%;
			  margin-left: 2px;
			}
			.full{
			    width: 100%;
			}
			.center{
			    margin-left: auto;
			    margin-right: auto;
			}
			.empty{
			    height: 40px;
			    width: 150px;
			    margin: 0 auto;
			}
		</style>
	</head>
	
	<body>
		<div class="row header">
    	<h1>Delvis' Shoe Emporium</h1>
		</div>
		
		<nav class="navbar navbar-expand-sm bg-white">
			<div class="container-fluid">
		    <!-- Links -->
		    <ul class="navbar-nav">
		      <li class="nav-item">
		        <a class="nav-link text-body" href="home.php">HOME</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link text-body" href="searchOrders.php">SEARCH ORDERS</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link text-body" href="products.php">PRODUCTS</a>
		      </li>
					<li class="nav-item">
		        <a class="nav-link text-body" href="customerReviews.php">CUSTOMER REVIEWS</a>
		      </li>
					<li class="nav-item">
		        <a class="nav-link text-body" href="checkout.php">CHECK OUT</a>
		      </li>
		    </ul>
		  </div>
		</nav>

        <?php 
        if(empty($_SESSION['shopping_cart'])){
            echo "<h1 style = 'text-align: center'>Your cart is empty</h1>";
        }else{
        echo"
    		<div class = 'row bg-light m-2'>
    			<div class = 'row bg-light'>
    			<h2>CHECKOUT </h2>
    	        <a href= 'addToCart.php?action=remove' class='btn btn-danger empty' role='button'>Empty Cart</a>
    	        </div>
    	        <div class='table-responsive col-md-6'>	
        	    	<table class = '.table-borderless col-sm-12'>";
        			if(!empty($_SESSION['shopping_cart'])){
        				foreach($_SESSION['shopping_cart'] as $keys => $values){
                         echo "<tr>
        						<td><img src = '../images/". $values['shoeImg'] . "'> </td>
        						<td><b> DESCRIPTION:</b> <br>". $values['shoeDescription'] ."  <br>
        						<br><b> COST:</b> <br> $". $values['shoePrice'] ."  </td>
        						<td><b> SIZE:</b> <br> ". $values['shoeSize'] ."  </td>
        					</tr>";
        				$finalTotal +=  $values["shoePrice"];
                        }
        			}
    				echo "</table>
    		    </div>";
                    echo"
                    <div class='table-responsive col-md-6'>	
    					<table class = '.table-borderless col-sm-12'>
    					    <form method = 'post' action = 'processCheckout.php' class = 'col-sm-4'>
    					    <tr><h3 style = 'text-align: center;'> Final Price: $" . $finalTotal ." </h3> </tr>
    					    <tr><td> <input class = 'full' type = 'email' name = 'email' placeholder = 'email' required> </td></tr>
    						<tr><td> <input class = 'full' type = 'text' name = 'name' placeholder = 'NAME OF CARDHOLDER' required> </td></tr>
    						<tr><td> <input class = 'full' type = 'number' name = 'cardNum' placeholder = 'CREDIT CARD #' required> </td></tr>
    						<tr>
    							<td> <input class = 'left' type = 'number' name = 'cardExp' placeholder = 'EXP DATE' required> 
    							<input class = 'right' type = 'number' name = 'cardCvv' placeholder = 'CVV CODE' required> </td>
    						</tr>
    						<br>
    						<tr><td> <input class = 'full' type = 'text' name = 'address1' placeholder = 'STREET ADDRESS' required> </td></tr>
    						<tr><td> <input class = 'full' type = 'text'name = 'address2' placeholder = 'LINE 2' > </td></tr>
    						<tr>
    							<td> <input class = 'left' type = 'text' name = 'state' placeholder = 'STATE' required> 
    							<input class = 'right' type = 'number' name = 'zipCode' placeholder = 'ZIP CODE' required> </td>
    							<td> <input type = 'hidden' name = 'totalAmount' value =  '". $finalTotal . "' /> </td>
    						</tr> 
    						<tr>
        						<td class = 'center' ><input class = 'center' type = 'submit' name = 'payNow' value = 'PAY NOW'> </td>
    						</tr>
    						</form>
    					</table>
    				</div>
    		</div>";
        }
		?>
		
	</body>
</html>
