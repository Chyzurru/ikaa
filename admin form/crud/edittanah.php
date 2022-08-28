<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>

<?php
// include database connection file
include_once("../config/config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['nom'];
    
    $noinduk=$_POST['noinduk'];
    $nama=$_POST['nama'];
    $alamat=$_POST['alamat'];
    $telepon=$_POST['telepon'];        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE data_tanah SET noinduk='$noinduk',nama='$nama',alamat='$alamat',telepon='$telepon' WHERE nom=$id");
    
    // Redirect to homepage to display updated user in list
    header("Location ../datatanah.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$angka = $_GET['nom'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM data_tanah WHERE nom=$angka");
 
while($user_data = mysqli_fetch_array($result))
{
    $noinduk = $user_data['noinduk'];
    $nama = $user_data['nama'];
    $alamat = $user_data['alamat'];
    $telepon = $user_data['telepon'];
}
?>
<h2>EDIT PASIEN</h2>
<div class="container">
<form name="update_user" method="post" action="edittanah.php">   
     <div class="row">
      <div class="col-25">
        <label for="fname">nomor induk</label>
      </div>
      <div class="col-75">
        <input type="text" name="noinduk" value=<?php echo $noinduk;?>>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Nama</label>
      </div>
      <div class="col-75">
        <input  type="text" name="nama" value=<?php echo $nama;?>>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Alamat</label>
      </div>
      <div class="col-75">
        <input type="text" name="alamat" value=<?php echo $alamat;?>>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Telepon</label>
      </div>
      <div class="col-75">
        <input type="text" name="telepon" value=<?php echo $telepon;?>>
      </div>
    </div>
    <div class="row">
    <input type="hidden" name="nom" value=<?php echo $_GET['nom'];?>>
    <input type="submit" name="update" value="Update">
    </div>
  </form>
</div>
</body>
</html>