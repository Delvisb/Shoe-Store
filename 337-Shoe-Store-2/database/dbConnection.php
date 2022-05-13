<?php 
    // connects to database 
    $dsn = 'mysql:host=localhost;dbname=burgosd2_337-Shoe-Store';
    $username = 'burgosd2_admin';
    $password = '[_3j(yS~PG*.';
    
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
    }
    
?>
