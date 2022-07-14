<?php 
session_start();

	include("../../../programme/connection.php");
	include("../../../programme/functions.php");
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
    }
    }
    $sql = "SELECT * FROM article";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="../../img/logo.png" type="image/x-icon">

    <!-- Box icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />

    <!-- Custom StyleSheet -->
    <link rel="stylesheet" href="../css/Styles.css" />
    <title>Produits</title>
</head>

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
                        <a href="#" class="nav-link active">Products</a>
                    </li>
                    <li class="nav-item" style="display : <?php echo $display ?>">
                        <a href="../../../admin\article\article_dashboard.php" class="nav-link" >articles</a>
                    </li>
                    <li class="nav-item" style="display : <?php echo $displayiteams ?>">
                        <a href="../../contact/mail.php" class="nav-link" >Contact</a>
                    </li>
                    <li class="nav-item" style="display : <?php echo $display ?>">
                        <a href="../../../admin\message\message.php" class="nav-link" >Message</a>
                    </li>
                    <li class="nav-item" style="display : <?php echo $display ?>">
                        <a href="../../../admin\dashboard\dashboard.php" class="nav-link" >Dashboard</a>
                    </li>
					
                    <li class="nav-item" style="display : <?php echo $displaylog ?>">
                        <a href="../../profile/profile.php" class="nav-link" onclick="myFunction()"><?php echo $user_data['user_lastname'] . " " . $user_data['user_name'] ; ?></a>
					
                    </li>
                    <li class="nav-item">
                        <a href="../../login/login.php" class="nav-link " style="display : <?php echo $displaycli ?>" >espace client</a>
                    </li>
                    </li>
				            <li class="nav-item" style="display : <?php echo $displaylog ?>">
				                <a href="../../login/logout.php" class="nav-link">logout</a>
                    </li>   
                    <li class="nav-item">
                        <a href="../shop/cart.php" class="nav-link icon"><i class="bx bx-shopping-bag"></i></a>
                    </li>
                </ul>
            </div>

            <a href="../shop/cart.php" class="cart-icon">
                <i class="bx bx-shopping-bag"></i>
            </a>

            <div class="hamburger">
                <i class="bx bx-menu"></i>
            </div>
        </div>
    </nav>

    <!-- All Products -->
    <section class="section all-products" id="products">
        <div class="top container">
            <h1>All Products</h1>
            
        </div>

        <?php 
								$result = $con->query($sql);

								if ($result->num_rows > 0) {
									// output data of each row
                                    $i = 1;
									while($row = $result->fetch_assoc()) {
										$recordId = $row["id"];
										//print the users data
                                       
                                        echo' <div class="product-center container">
                                        <div class="product">
                                            <div class="product-header">
                                                <img src="../img/img' . $i . '.png" alt="">
                                               
                                            </div>
                                            <div class="product-footer">
                                                <a href="../details/Product-details.php?recordId=' . $recordId . '">
                                                    <h3> ' . $row["name"] . '</h3>
                                                </a>
                                            
                                                <h4 class="price"> ' . $row["prix_achat"] . '</h4>
                                            </div>
                                        </div>
                                    
                                    </div><br><br><br>';
                                    $i += 1 ;
									}
                                    
								}			 
								else 
								{
								echo "0 results";
								}
								$con->close();
							?>
                


    </section>
    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
    <!-- Custom Script -->
    <script src="../js/index.js"></script>
</body>

</html>