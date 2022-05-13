<?php 
include('../database/databaseConnect.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name  = (trim($_POST["name"]));
    $userName  = (trim($_POST["userName"]));
    $userPassword = (trim($_POST["userPassword"]));
 
    if(($name) and  ($userName) and  ($userPassword)){
        $query = "INSERT INTO Customer VALUES(?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param('sss', $email, $username, $hashed_password);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $result = $stmt->execute();

  
        if($result ){
            echo("registered");
        }else{
            $failed = "An error has occured";
        }
        $db -> close();
    }
}
?>
    <form class = "registerForm" method = "POST"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label > Name: </label><br>
		<input type = "text" name = "name" autocomplete = "off" required/><br> 
	
		
		<label>User Name: </label><br>
		<input type = "text" name = "userName" autocomplete = "off" required/><br> 

		
		<label>Password: </label><br>
		<input type = "password" name = "userPassword" autocomplete = "off" required/><br> 
        
        <input type = "submit" value = "register">
	</form>
?>