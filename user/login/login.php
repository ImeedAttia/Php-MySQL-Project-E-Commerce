<?php 

session_start();
unset($_SESSION['user_id']);
	include("../../programme/connection.php");
	include("../../programme/functions.php");
$display ='none' ;

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: ../article/liste des produit/Product.php");
						die;
					}
				}
				
			}
			
			$display ='inline' ;
		}else
		{
			$display ='inline' ;
		}
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="R.png"/>

    <title>Login Page</title>
  
    <link rel="stylesheet" type="text/css" href="css_login.css">
    <script type="text/javascript" src="../javas/navigate.js"></script>
<style>
	.verify{
		margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
  color: red;
  text-decoration: none;
  display : <?php echo $display; ?>;
	}
</style>
</head>
<body>    
      <body>
        <form method="post">
		<div class="login-page">
          <div class="form">
            <div class="login">
              <div class="login-header">
                <h3>LOGIN</h3>
                <p>Enter vos information.</p>
              </div>
			  <p class="verify">Verifier vos donner</p>
            </div>
            <form class="login-form">
              <input type="text" name="user_name" placeholder="username" required />
              <input type="password" name="password" placeholder="password" required/>
              <input type="submit" value="Login" class="action-button">
              <p class="message">Not registered? <a href="../signup/signup.php">Create an account</a></p>
            </form>
          </div>
        </div>
		</form>
    </body>




   
</body>
</html>