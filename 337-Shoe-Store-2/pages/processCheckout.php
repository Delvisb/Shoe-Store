<?php
include('../database/dbConnection.php');
session_start();
if(isset($_POST['payNow'])){
    $orderId = rand(1, 500);
    $totalAmount = $_POST['totalAmount'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $cardNum = $_POST['cardNum'];
    $cardExp = $_POST['cardExp'];
    $cardCvv = $_POST['cardCvv'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    if(!empty($address2)){
        $address = $address1 . " " . $address2;
    }else{
        $address2 = null;
        $address = $address1;
    }
    $state = $_POST['state'];
    $zipCode = $_POST['zipCode'];
    
    $ordersInsert = "INSERT INTO orders VALUES('". $orderId . "', '". $email . "', '" . $name . "', '" . $address . "', '" . $state . "', '" . $zipCode . "', '" . $totalAmount . "')";
    if ($db->query($ordersInsert)) {
      $result1 = TRUE;
    } else {
      $result1 = FALSE;
    }

    $orderPayment = "INSERT INTO orderPayment VALUES('". $orderId . "', '". $name . "', '". $cardNum . "', '" . $cardExp . "', '" . $cardCvv . "')";
    if ($db->query($orderPayment)) {
      $result2 = TRUE;
    } else {
      $result2 = FALSE;
    }
    
    foreach($_SESSION['shopping_cart'] as $keys => $values){
        $db->query("INSERT INTO orderItems VALUES('". $orderId . "', '". $values['shoeId'] . "', '" . $values['shoeSize'] . "')");
    }
    
    if($result1 and $result2){
        $orderStatus = "Your order has been recieved!";
    }else{
        $orderStatus = "Sorry there was an error processing your order!";
    }
    unset($_SESSION['shopping_cart']);
}

?>
<html>
    <head>
    </head>
    <body>

        <h1 style ="text-align: center;"> <?php echo $orderStatus; ?></h1>
        <p align="center">
            Your order number is: <?php echo $orderId; ?>.
            <br> Please save this number.
            <a href = 'home.php'>Return to the store</a>
        </p>
    
    </body>
</html>