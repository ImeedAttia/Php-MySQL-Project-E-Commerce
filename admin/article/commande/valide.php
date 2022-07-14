<?php
include ("../delete_article/connection.php");
if (isset($_GET['recordId'])){
    $recordId = $_GET['recordId'];
    $query = "UPDATE commande SET validate='1' WHERE id='$recordId'";
        $result = $con->query($query) or die("Error in query2".$con->error);
  
    if ($result){
        echo '<script>alert("votre validation est verifier")</script>';
        header("Refresh:0; url=valide_commande.php");
    }
}