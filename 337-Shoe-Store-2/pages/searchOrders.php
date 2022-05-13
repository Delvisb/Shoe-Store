<?php 
include('../database/dbConnection.php');
if(isset($_POST['searchNum'])){
    $orderNumber = $_POST['orderNumber'];
}
?>
<html>
	<head> 
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Search Orders</title>
		<style>
			img{
				height: 214px;
				width: 176px;
			}
			.header{
				margin-left: 5px
			}
		</style>
	</head>
	
	<body>
		<div class="row header">
    	<h1>Matteo's Shoe Emporium</h1>
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
        <form class="col-lg-6 offset-lg-3" method =  "post">
                <div class="row justify-content-center">
                    <div class="mb-2 mt-2">
                        <label  class="form-label">Order Number:</label>
                        <input class="form-control" type="number" name = "orderNumber" placeholder="Enter your order number." required>
                    </div>
                    <input type = "submit" class = "btn btn-primary" name = "searchNum" value = "Search" />
                </div>
        </form>
		<div class='table-responsive col-md-12'>	
	    	<table class = '.table-borderless col-sm-12'>
	    	    <?php
	    	    if(isset($_POST['searchNum'])){ 
    	    	    $orderViewQuery = "SELECT * FROM orders WHERE orderId = '" . $orderNumber. "'";
        	    	if($db->query($orderViewQuery)){
                    echo "<tr><th>orderId</th> <th>Email</th> <th>Name</th> <th>Address</th> <th>State</th> <th>Zip Code</th> <th>Order Amount</th></tr>";
                    	foreach ($db->query($orderViewQuery) as $row) {
                            echo "<tr>
                                    <td> ".$row['orderId'] ."</td><td>" .$row['email'] . "</td><td> " . $row['name']  . "</td><td>" . $row['address'] . "</td><td> " . $row['state'] . "</td><td> " . $row['zipCode'] . "</td><td> $" . $row['totalAmount'] . "</td>
                                </tr>";
                        }
    	    	    }else{
    	    	        echo"<tr>
                                    <td>Order Number: " . $_POST['$orderNumber'] . " was not found </td>
                                </tr>";
    	    	    }
	    	    }
                $db->close();
                ?>
	    	</table>
        </div>
	
	
	</body>
</html>