<?php
session_start();

if($_GET['action'] == "add"){
    if(isset($_SESSION["shopping_cart"])){  
       $cartId = array_column($_SESSION["shopping_cart"], "shoeId");  
       if(!in_array($_GET["id"], $cartId)) {  
            $count = count($_SESSION["shopping_cart"]);  
            $productArray = array(  
                'shoeId' => $_GET["id"],  
                'shoeImg' => $_POST["hiddenImg"],
                'shoeName' => $_POST["hiddenName"],
                'shoeDescription' => $_POST["hiddenDescription"], 
                'shoePrice' => $_POST["hiddenPrice"],  
                'shoeSize' => $_POST["shoeSize"]  
            );  
            $_SESSION["shopping_cart"][$count] = $productArray;
        }else{  
            $cartMessage = "Item Already Added";
         }
    }
    else{  
       $productArray = array(  
            'shoeId' => $_GET["id"],  
            'shoeImg' => $_POST["hiddenImg"],
            'shoeName' => $_POST["hiddenName"],
            'shoeDescription' => $_POST["hiddenDescription"], 
            'shoePrice' => $_POST["hiddenPrice"],  
            'shoeSize' => $_POST["shoeSize"]  
       );  
       $_SESSION["shopping_cart"][0] = $productArray;
    } 
    header('Location: products.php');
}

if($_GET['action'] == "remove"){
    unset($_SESSION['shopping_cart']);
    header('Location: checkout.php');
}

?>