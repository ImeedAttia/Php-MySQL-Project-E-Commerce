<?php
session_start();

	include("../../../programme/connection.php");
	include("../../../programme/functions.php");
    $user_data = check_login($con);
    $idUser= $user_data['id'];
    $record = $_GET['record'];
    $valid ='2';
    
    $query = "INSERT into commande (idUser,idArticle,Validate)values ('$idUser',' $record','$valid')";
    mysqli_query($con, $query);
        echo '<script type="text/javascript">';
		echo 'var mywindow = window.open("facture.php", "Print", "left=200, top=200, width=950, height=500, toolbar=0, resizable=0");';  
        echo 'mywindow.print();';  
		echo '</script>';
    header( "Refresh:0; url=../liste des produit/Product.php");




    