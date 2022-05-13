<?php 
include('../database/dbConnection.php');
session_start();

?>
<html>
	<head> 
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Products</title>
		<style>
			img{
				height: 214px;
				width: 176px;
			}
			.header{
				margin-left: 5px
			}
			.table{
			    height: 100%;
			}
			form{
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


         <div class="table-responsive-sm">          
            <table class=".table-borderless table">
            <tr><h3 style = 'text-align: center;'><?php echo $cartMessage; ?> </h3> </tr>
            <tr>
            <?php 
            //counter for table set up
            $count = 0;
            $productQuery = "SELECT * FROM shoes";
            foreach ($db->query($productQuery) as $row) {
            $count++;
            echo"
                <td><form method = 'post' action = 'addToCart.php?action=add&id=". $row['shoeId']."'>
                        <img src= '../images/" .$row['shoeImg'] ."' /><br>
                        " .$row['shoeName'] ."<br>
                        " .$row['shoeDescription'] ."<br>
                        $" .$row['shoePrice'] ."<br> Size:
                        <input id = 'addQty' type = 'number' name = 'shoeSize' min ='1' max = '12' required/><br><br>
                        <input type = 'hidden' name = 'hiddenName' value = '". $row['shoeName']."' />
                        <input type = 'hidden' name = 'hiddenDescription' value = ". $row['shoeDescription']." />
    			        <input type = 'hidden' name = 'hiddenImg' value = '". $row['shoeImg']."' />
    			        <input type = 'hidden' name = 'hiddenPrice' value = '". $row['shoePrice']."' />
                        <input class = 'btn btn-dark' type= 'submit' value = 'Add to Cart'>
                    </form>
                </td>";
                if($count % 3 == 0){
                    echo" </tr><tr>";
                }
    		  }
    		$productQuery->close();
            $db->close();
            ?>
            </tr>
            </table>
	</body>
</html>