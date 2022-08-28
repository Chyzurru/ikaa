<?php
// include database connection file
include_once("../config/config.php");
 
// Get id from URL to delete that user
$id = $_GET['nom'];
 
// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM data_tanah WHERE nom=$id");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:../datatanah.php");
?>