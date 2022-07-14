<?php
class Common 
{
       public function deleteRecordById($con,$recordId) {
        $query = "DELETE FROM article WHERE id='$recordId'";
        $result = $con->query($query) or die("Error in query2".$con->error);
        return $result;
    }
}