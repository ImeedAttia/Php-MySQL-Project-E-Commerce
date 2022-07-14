<?php 
session_start();

	include("../../programme/connection.php");
	include("../../programme/functions.php");

	$user_data = check_login($con);
    $display ='none' ;
      
    if ($user_data['admin_user']=='admin'){
     $display ='block' ;
     $displayiteams ='none' ;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">


    <!-- Box icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
    <title>profile</title>
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="photo.css">
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
                        <a href="../article\liste des produit\Product.php" class="nav-link">Products</a>
                    </li>
                    <li class="nav-item" style="display : <?php echo $display ?>">
                        <a href="../../admin\article\article_dashboard.php" class="nav-link" >articles</a>
                    </li>
                    <li class="nav-item" style="display : <?php echo $displayiteams ?>">
                        <a href="../contact/mail.php" class="nav-link" >Contact</a>
                    </li>
                    <li class="nav-item" style="display : <?php echo $display ?>">
                        <a href="../../admin\message\message.php" class="nav-link" >Message</a>
                    </li>
                    <li class="nav-item" style="display : <?php echo $display ?>">
                        <a href="../../admin\dashboard\dashboard.php" class="nav-link" >Dashboard</a>
                    </li>
					
                    <li class="nav-item">
                        <a href="#" class="nav-link dropbtn  active"><?php echo $user_data['user_lastname'] . " " . $user_data['user_name'] ; ?></a>
					
                    </li>
					<li class="nav-item">
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
<!--end nav-->
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <form action="upload.php" method="post" enctype="multipart/form-data">
                                <div class="m-b-25 profile-pic-div">
                                    <img   src="image.jpg" class="img-radius" alt="User-Profile-Image" id="photo"> 
                                    <input onclick="myfunction();"  type="file" name="file" id="file"> 
                                    <label for="file" id="uploadBtn">Choose Photo</label>
                                </div>
                                <input  id="button" style="display:none" type="submit" value="submit" class="button button2">
                                </form><br><br>
                                <h6 class="f-w-600" style="color:white"><?php echo $user_data['user_lastname'] . " " . $user_data['user_name'] ; ?></h6>
                                <p style="color:white"><?php echo $user_data['region'] ?></p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400"><?php echo $user_data['email'] ?></h6>
                                        <br>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Phone</p>
                                        <h6 class="text-muted f-w-400"><?php echo $user_data['phone'] ?></h6>
                                        <br>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">adresse</p>
                                        <h6 class="text-muted f-w-400"><?php echo $user_data['adresse'] ?></h6>
                                        
                                    </div>
                                   
                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Commandes</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <?php
                                        	$sql = "SELECT * FROM Commande WHERE idUser= '" . $user_data['id'] . "' "; 
                                            $result = $con->query($sql);

                                            if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {


                                                    if($row['Validate']== '0'){
                                                        $valid = 'Refuser';
                                                    }else if($row['Validate']== '1'){
                                                        $valid = 'Confirmer';
                                                    }else if($row['Validate']== '2'){
                                                        $valid = 'en attente';
                                                    }

                                                    $sqls = "SELECT name,prix_achat FROM article WHERE id= '" .  $row['idArticle'] . "' "; 
                                                    $results = $con->query($sqls);
                                                    while($rows = $results->fetch_assoc()) {
                                                        $prix = $rows["prix_achat"];
                                                        $name = $rows["name"];
                                                    }
                                                       



                                                    echo ' 
                                                    <p class="m-b-10 f-w-600"> Nom article : ' . $name . '</p>
                                                    <h6 class="text-muted f-w-400"> Prix :' . $prix . '</h6>
                                                    <h6 class="text-muted f-w-400"> Numero de facture :' . $row["id"] . '</h6>
                                                    <h6 class="text-muted f-w-400"> Date :' . $row["date"] . '</h6>
                                                    <h6 class="text-muted f-w-400"> Validation :' . $valid . '</h6> 
                                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600"></h6>
                                                    ';
                                                   
                                                }
                                            }			 
                                            else 
                                            {
                                            echo ' <p class="m-b-10 f-w-600">0 Commande</p>
                                            ';
                                            }
                                            $con->close();

                                        ?>
                                       
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br><br><br><br>
<script src="../article/js/index.js"></script>
<br><br><br><br><br><br><br>
<script src="app.js"></script>
<script>
    function myfunction(){
        document.getElementById("button").style.display = "block";
    }
</script>
</body>
</html>