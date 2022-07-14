<?php
include ("connection.php");
include_once "Common.php";
if (isset($_GET['recordId'])){
    $recordId = $_GET['recordId'];
    $common = new Common();
    $delete = $common->deleteRecordById($con,$recordId);
    if ($delete){
        echo '<script>alert("votre supprision est verifier")</script>';
        header("Refresh:0; url=../dashboard.php");
    }
}