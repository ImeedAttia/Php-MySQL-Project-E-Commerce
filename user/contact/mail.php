<?php 
session_start();

include("../../programme/connection.php");
include("../../programme/functions.php");
if(check_login($con) === false ){
	$displaylog = 'none';
	$display ='none' ;
	$displaycli= "block";
}else{
$user_data = check_login($con);

$displaycli= "none";
  $display ='none' ;
   $displaylog = 'block';
if ($user_data['admin_user']=='admin'){
 $display ='block' ;
 $displayiteams ='none' ;
}}








if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //variable to enter to data
    $user_name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $Subject =$_POST['subject'];

    


    if(!empty($user_name) && !empty($message) )
    {
		echo '<script type="text/javascript">';
		echo ' alert("Your messsage was send successfully")';  
		echo '</script>';
        //save to database
        $user_id = random_num(20);
        $query = "insert into contact (Name,Email,Subject,Message) values ('$user_name','$email','$Subject','$message')";

        mysqli_query($con, $query);
        header("Refresh:0; url=../article/liste des produit/Product.php");
        
        die;
    }else
    {
        echo "Please enter some valid information!";
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Contact</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">

  <!-- Box icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="..\css\nav.css">
	
<body>
 <!-- Navigation -->
 <nav class="nav">
        <div class="navigation container">
            <div class="logo">
                <h1>smcsa</h1>
            </div>

            <div class="menu">
                <div class="top-nav">
                    <div class="logo">
                        <h1>smcsa</h1>
                    </div>
                    <div class="close">
                        <i class="bx bx-x"></i>
                    </div>
                </div>

                <ul class="nav-list">
				
                    <li class="nav-item">
                        <a href="../article\liste des produit\Product.php" class="nav-link">Products</a>
                    </li>
                   
                    <li class="nav-item">
                        <a href="#" class="nav-link active">Contact</a>
                    </li>
					
                    <li class="nav-item" style="display : <?php echo $displaylog ?>">
                        <a href="../profile/profile.php" class="nav-link dropbtn" onclick="myFunction()"><?php echo $user_data['user_lastname'] . " " . $user_data['user_name'] ; ?></a>
					
                    </li>
					<li class="nav-item">
                        <a href="../login/login.php" class="nav-link " style="display : <?php echo $displaycli ?>" >espace client</a>
                    </li>
                    </li>
				            <li class="nav-item" style="display : <?php echo $displaylog ?>">
				                <a href="../login/logout.php" class="nav-link">logout</a>
                    </li>
                    <li class="nav-item">
                        <a href="../article/shop/cart.php" class="nav-link icon"><i class="bx bx-shopping-bag"></i></a>
                    </li>
                </ul>
            </div>

            <a href="cart.html" class="cart-icon">
                <i class="bx bx-shopping-bag"></i>
            </a>

            <div class="hamburger">
                <i class="bx bx-menu"></i>
            </div>
        </div>
    </nav>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Contact Form</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-10 col-md-12">
					<div class="wrapper">
						<div class="row no-gutters">
							<div class="col-md-7 d-flex align-items-stretch">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4">Get in touch</h3>
									<div id="form-message-warning" class="mb-4"></div> 
									<form method="POST" id="contactForm" name="contactForm">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" class="form-control" name="name" id="name" placeholder="Name">
												</div>
											</div>
											<div class="col-md-6"> 
												<div class="form-group">
													<input type="email" class="form-control" name="email" id="email" placeholder="Email">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<textarea name="message" class="form-control" id="message" cols="30" rows="7" placeholder="Message"></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" value="Send Message"  class="btn btn-primary">
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-md-5 d-flex align-items-stretch">
								<div class="info-wrap bg-primary w-100 p-lg-5 p-4">
									<h3 class="mb-4 mt-md-4">Contact us</h3>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-map-marker"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span>Address:</span>  49 ,AV FArhat Hached-Tunis</p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-center">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-phone"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span>Phone:</span> <a href="tel://1234567920">+216 71 345 844</a></p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-center">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-paper-plane"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span>Email:</span> <a href="mailto:imedattia1032@gmail.com">imedattia1032@gmail.com</a></p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-center">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-globe"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span>Website</span> <a href="#">smcsa.com</a></p>
					          </div>
				          </div>
			          </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br><br><br><br><br><br><br>
	</section>
	<script src="../article/js/index.js"></script>
	</body>
</html>

