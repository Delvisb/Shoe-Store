<?php 
include('../database/dbConnection.php');
if(isset($_POST['postReview'])){
    $name = $_POST['name'];
    $review = $_POST['review'];
    $reviewInsert = "INSERT INTO reviews VALUES('". $name . "', '". $review . "')";
    $db->query($reviewInsert);
}

?>
<html>
	<head> 
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Reviews</title>
		<style>
			img{
				height: 214px;
				width: 176px;
			}
			.header{
				margin-left: 5px
			}
			.content{
			  height: 100%;
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

		<div class = "content container-fluid bg-light">
			<div class="row">
    		    <h2> REVIEWS </h2>
  		    </div>
			<form class="col-lg-6 offset-lg-3" method =  "post">
                <div class="row justify-content-center">
                    <div class="mb-2 mt-2">
                    <label for= "name" class="form-label">Name:</label>
                    <input class="form-control" type="text" name = "name" placeholder="Enter your name" required>
                    </div>
                    
                    <div class="mb-2 mt-2">
                        <label class="form-label">Review Us:</label>
                        <textarea class="form-control" name = "review" placeholder="Enter your review" rows="2" required></textarea>
                    </div>

                    <input type = "submit" class = "btn btn-primary" name = "postReview" value = "Submit Review" />
                </div>
             </form>
             <div class = "container-fluid bg-light">
                 <table class = ".table-borderless">
                     <tr>
             <?php
                $count = 0;
    			$reviewQuery = "SELECT * FROM reviews";
                foreach ($db->query($reviewQuery) as $row) {
                    $count++;
        		    echo"
        		    <td><b>Name:</b> " . $row['name'] . "<br> <b>Review:</b> " . $row['review'] . "</td>";
                    if($count % 4 == 0){
                        echo"</tr><tr>  ";
                    }
                }
    			?>
    		        </tr>
    		    </table>
		    </div>
	</body>
</html>