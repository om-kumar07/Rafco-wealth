<?php
//    $Username="";
//    $Password="";


$servername="localhost";
$username="root";
$password="";
$database="admin_rafco";
$loggedin=false;
$Username="";
$Password="";



//creating connection
$conn=mysqli_connect($servername,$username,$password,$database);
if(!($conn)){
    
die("connection unsuccessful dut to ".mysqli_connect_error());
}


if($_SERVER['REQUEST_METHOD']=='POST'){
    $Username=$_POST['username'];
    $Password=$_POST['pass'];
  
}
$sql="SELECT * FROM `authentication`";
$result=mysqli_query($conn,$sql);
if(!($result)){

die("connection unsuccessful dut to ".mysqli_connect_error());
}
$row=mysqli_fetch_assoc($result);
if($Username==$row['username'] and $Password==$row['password']){
    $loggedin=true;

}
else{

$loggedin=false;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <link rel="stylesheet" href="assets/css/style-starter.css">
</head>
<body >
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <img src="assets/images/admin_logo.png" width="55" height="55" class="d-inline-block align-top" alt="">
     <strong class="navbar-brand mt-2 ml-2" style="font-size: 1.5rem;">Rafco Admin Panel</strong> 
    </a>
  </nav> 
<?php
if($loggedin){
    echo "<div class='alert alert-success  mt-1' role='alert'>
  Login Successfully Do you want to go to  <a href='view.php' class='alert-link'>Feedback panel</a>.
</div>";
}
?>
<?php
 if(!($loggedin)){
    echo "<div class='alert alert-warning  mt-1' role='alert'>
    Incorrect Username or Password!!  Do you want to  <a href='Admin_login.html' class='alert-link'>Retry</a>.
  </div>";
 }
  ?>
</body>
</html>