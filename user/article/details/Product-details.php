<?php
session_start();
include("../../../programme/connection.php");
include("../../../programme/functions.php");
$user_data = check_login($con);
$idproduct =$_GET['recordId'];
$sqls= "SELECT * FROM article WHERE id <> '$idproduct' order by rand() limit 1";
$sql = "SELECT * FROM article WHERE id='$idproduct'"; 
$result = $con->query($sql);
$results = $con->query($sqls);


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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Box icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />

  <!-- Glidejs -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css" />
  <!-- Custom StyleSheet -->
  <link rel="stylesheet" href="../css/styles.css" />

  <title>Details</title>
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
                        <a href="../liste des produit/Product.php" class="nav-link">Products</a>
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
  <!-- Product Details -->
  <?php
        while($row = $result->fetch_assoc()) {
         $record = $row["id"];
          echo '
  <section class="section product-detail">
  <div class="details container-md">
      <div class="left">
        <div class="main">
          <img src="../img/img'. $idproduct .'.png" alt="">
        </div>
       
      </div>
      
        <div class="container">
        <div class="row">
            <div class="span7">
        <div class="right">
     
        <h1>' . $row["name"] . '</h1>
        <hr>
        <div class="price">Prix de vente -' . $row["prix_achat"] . ' DT</div> <br>
        <div class="price">Prix d&#39achat -' . $row["prix_vente"] . ' DT</div>
      

        <form class="form"  style=" display:' . $displaylog . '">
          <input type="text" placeholder="1">
          <a href="../shop/cart.php?record=' . $record . '" class="addCart"  display="none">Add To Cart</a>
        </form>
        <h3>Product Detail</h3>';
               ?>
                <br>
            </div>
            <table class="table">
                <tbody>
                  <tr>
                    <th scope="col">code article</th>
                    <td><?php echo $row["code_article"];  ?></td>
                
                  </tr>
              
              
                  <tr>
                    <th scope="row">libelle article</th>
                    <td><?php echo $row["libelle_article"]; ?></td>
                  
                  </tr>
                  <tr>
                    <th scope="row">stock</th>
                    <td><?php echo $row["stock"];  ?></td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Date de creation</th>
                    <td><?php echo $row["date"]; }?></td>
                  
                  </tr>
                </tbody>
            </table>      
                    </div>
                </div>
            </div>
        </div>

  </section>
  <!-- Related  iteam -->
  <section class="section featured">
    <div class="top container">
      <h1>Related Products</h1>
    </div>
    <?php
        while($row = $results->fetch_assoc()) {
          echo '
    <div class="product-center container">
      <div class="product">
        <div class="product-header">
          <img src="../img/img' . $row["id"] . '.png" alt="image article">
        </div>
        <div class="product-footer">
          <a href="#"><h3>' . $row["name"] . '</h3></a>
          <div class="rating">
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bx-star"></i>
          </div>
          <h4 class="price">' . $row["prix_achat"] . '</h4>
        </div>
      </div>
      ';}?>
  </section>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
  <!-- Custom Script -->
  <script src="../js/index.js"></script>
</body>

</html>