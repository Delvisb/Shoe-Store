<?php
include('../database/dbConnection.php');
?>
<html>
	<head> 
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Home Page</title>
		<style>
			img{
				height: 214px;
				width: 176px;
			}
			.header{
				margin-left: 5px
			}
			p, h3{
			    text-align: center;
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

		<div class = "container-fluid bg-light">
			<div class="row">
    		<h2>HOME</h2><br><p>HOT NEW RELEASES</p>
  		</div>
			
		<div class = "row">
			<?php 
			$productHomeQuery = "SELECT * FROM shoes LIMIT 4";
            foreach ($db->query($productHomeQuery) as $row) {
		    echo"
		    <div class= 'col-sm-3'><a href = 'products.php'><img src= '../images/" .$row['shoeImg'] ."'></a> </div>";
            }
			?>

			<div class="row">
    		    <h2>Sneaker News</h2>
  		    </div>
	
			<div class = "row">
				<div class="col-sm-4"> <a href = "https://sneakernews.com" ><img src = "../images/image8.png"></a></div>
				<div class="col-sm-8"><p>Interested in finding out the lastest sneaker news? <br> <h3>Click on the image to the left to find out more!</h3></p></div>
			</div> 
			
		</div>
	
	</body>
</html>