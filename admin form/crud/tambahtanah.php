<?php
 
 // Check If form submitted, insert form data into users table.
 if(isset($_POST['Submit'])) {
     $noinduk = $_POST['noinduk'];
     $nama = $_POST['nama'];
     $alamat = $_POST['alamat'];
     $telepon = $_POST['telepon'];
     
     // include database connection file
     include_once("../config/config.php");
             
     // Insert user data into table
     $result = mysqli_query($mysqli, "INSERT INTO data_tanah(noinduk,nama,alamat,telepon) VALUES('$noinduk','$nama','$alamat','$telepon')");
     
     // Show message when user added
     echo "User added successfully. <a href='../datatanah.php'>View Users</a>";
 }
 ?>