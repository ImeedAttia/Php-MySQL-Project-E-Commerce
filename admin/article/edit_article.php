<?php 
session_start();

	include("delete_article/connection.php");
	$recordId = $_GET['recordId'];
	$sql = "SELECT * FROM article WHERE id='" . $recordId . "'"; 
	$result = $con->query($sql);
	$row = $result->fetch_assoc();
//send data
	if($_SERVER['REQUEST_METHOD'] == "POST")
{
	//get variables
	$name = $_POST['name'];
	$code_article = $_POST['code_article'];
	$libelle_article = $_POST['libelle_article'];
	$prix_achat = $_POST['prix_achat'];
	$prix_vente = $_POST['prix_vente'];
	$stock = $_POST['stock'];
	$date = $_POST['date'];	
		// SAVE DATA
		$sql = "UPDATE article SET 
	   name='{$name}',
	   code_article='{$code_article}',
	   libelle_article='{$libelle_article}',
	   prix_achat='{$prix_achat}',
	   prix_vente='{$prix_vente}',
	   stock='{$stock}',
	   date='{$date}'
	    WHERE id='{$recordId}'";
		mysqli_query($con, $query);
    if ($con->query($sql) === TRUE) {
		echo '<script type="text/javascript">';
		echo ' alert("Modification Avec succes")';  
		echo '</script>';
    } else {
        echo "Error updating record: " . $con->error;
		echo '<script type="text/javascript">';
		echo ' alert("error")';  
		echo '</script>';
    }
	header("Refresh:0; url=article_dashboard.php");
    $con->close();
}
?>

<!DOCTYPE html>
<html>
<title>Edit Page</title>
<link rel="icon" type="png" href="OIP.png"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	.box select {
    
		color: white;
		padding: 12px;
		width: 100%;
		border: 1px solid #ccc;
		font-size: 20px;
		
	   
		appearance: button;
		outline: none;
		
		padding: 15px;
		border: 1px solid #ccc;
		border-radius: 3px;
		margin-bottom: 10px;
		width: 100%;
		box-sizing: border-box;
		font-family: montserrat;
		color: #2C3E50;
		font-size: 13px;
		
	  }
	  input[type=button],
      input[type=submit] {
        background-color: #2565AE;
        border: none;
        color: #fff;
        padding: 15px 30px;
        text-decoration: none;
        margin: 4px 2px;
        cursor: pointer;
      }
	 
</style>
<body>

<form  class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" method="POST">
<h2 class="w3-center">Edit User Data</h2>
 
<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="name" type="text" placeholder="Name" value="<?php echo $row["name"]?>">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="code_article" type="text" placeholder="code_article" value="<?php echo $row["code_article"] ?>">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="libelle_article" type="text" placeholder="libelle_article" value="<?php echo $row["libelle_article"]?>">
    </div>
</div>

	
<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-phone"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="prix_achat" type="text" placeholder="prix_achat" value="<?php echo $row["prix_achat"]?>">
    </div>
</div>

<div class="w3-row w3-section">
	<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-location-arrow"></i></div>

    <div class="w3-rest">
		

      <input class="w3-input w3-border" name="prix_vente" type="text" placeholder="prix_vente" value="<?php echo $row["prix_vente"]?>">
    </div>
</div>
<div class="w3-row w3-section">
	<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-unlock-alt"></i></div>

    <div class="w3-rest">
		
      <input class="w3-input w3-border" name="stock" type="text" placeholder="stock" value="<?php echo $row["stock"]?>">
    </div>
</div>
<div class="w3-row w3-section">
	<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-unlock-alt"></i></div>

    <div class="w3-rest">
		
      <input class="w3-input w3-border" name="date" type="text" placeholder="date" value="<?php echo $row["date"]?>">
    </div>
</div>

	<a href="article_dashboard.php"><input type="button" value="cancel"></a>
    <input type="submit" value="Submit">


</form>

</body>
</html> 
