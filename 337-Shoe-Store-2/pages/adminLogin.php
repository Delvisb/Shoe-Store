<?php
include('../database/dbConnection.php');
if(isset($_POST['signInBtn'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT userId, email, username, password FROM Customer WHERE username = ?";
    if($stmt = mysqli_prepare($dbConnect, $query)){
		mysqli_stmt_bind_param($stmt, "s", $param_username);
		$param_username = $username;
		if(mysqli_stmt_execute($stmt)){
			mysqli_stmt_store_result($stmt);
			if(mysqli_stmt_num_rows($stmt) == 1){  
				mysqli_stmt_bind_result($stmt, $username, $hashed_password);
					if(mysqli_stmt_fetch($stmt)){
						if(password_verify($password, $hashed_password)){
							 session_start();
							 echo '<META HTTP-EQUIV="refresh" content="0; URL=adminPage.php">';
						}else{
						    $errorMessage = "Password is incorrect";
						}
			   		}   
			}else{
			    $errorMessage = "Username is incorrect";
		    }
	    }   
    }
}

?>
<html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Admin login</title>
    <head>
        
    </head>
    <body>
        <form>
          <div class="form-outline mb-4">
            <input type="text" id="username" name = "username" class="form-control" />
            <label class="form-label" for="username">Username</label>
          </div>
        
          <div class="form-outline mb-4">
            <input type="password" id="Password" name = "password" class="form-control" />
            <label class="form-label" for="Password">Password</label>
          </div>
          <?php echo $errorMessage; ?>
          
          <button onclick ="window.location='adminPage.php'; name ="signInBtn" class="btn btn-primary btn-block mb-4">Sign in</button>
        </form>
    </body>
</html>