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
  <link rel="stylesheet" href="../css/styles.css" />
  <title>Your Product</title>
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
                        <a href="../liste des produit\Product.php" class="nav-link ">Products</a>
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
                   
				            <li class="nav-item" style="display : <?php echo $displaylog ?>">
				                <a href="../../login/logout.php" class="nav-link">logout</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link icon"><i class="bx bx-shopping-bag"></i></a>
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
  <!-- Cart Items -->
  <div class="container-md cart" >
  <div id="print">
    <table>
      <tr>
        <th>Product</th>
        <th>Quantity</th>
        <th>Subtotal</th>
      </tr>
      <tr>
        <td>
          <?php
           $htpp= "http://localhost/smcsa/user/article/details/Product-details.php?recordId=";
           if(strpos($_SERVER['HTTP_REFERER'],$htpp) === false){
            $noprod = false;
            echo' 
 
     <div class="total-price">
       <table>
         <tr>
           <td>Subtotal</td>
           <td>0 DT </td>
         </tr>
         <tr>
           <td>Tax</td>
           <td>0 DT</td>
         </tr>
         <tr>
           <td>Total</td>
           <td>0 DT </td>
         </tr>';    
           }else{
            $noprod = true;
             $record = $_GET['record'];
             $sql = "SELECT * FROM article WHERE id='" . $record . "'"; 
             $result = $con->query($sql) or die($con->error);
             $row = $result->fetch_assoc();
             echo' <div class="cart-info">
             <img src="../img/img' . $row["id"] . '.png" alt="">
             <div>
               <p>' . $row["name"] . '</p>
               <span>Price:' . $row["prix_achat"] . ' DT </span>
               <br />
              
             </div>
           </div>
         </td>
         <td><input type="number" value="1" min="1"></td>
         <td>' . $row["prix_achat"] . ' DT </td>
       </tr>
      
     </table>
 
     <div class="total-price">
       <table>
         <tr>
           <td>Subtotal</td>
           <td>' . $row["prix_achat"] . ' DT </td>
         </tr>
         <tr>
           <td>Tax</td>
           <td>5 DT</td>
         </tr>
         <tr>
           <td>Total</td>
           <td>' . (intval($row["prix_achat"]) + 5 ) . ' DT </td>
         </tr>
             
         

      </table>
</div>
    </div>
      <a href="commande.php?record=' . $record . '" class="checkout btn">Proceed To Checkout</a>

  </div>
  ';
}
  ?>
  <!-- GSAP -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
  <!-- Custom Script -->
  <script src="../js/index.js"></script>
</body>

</html>