<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phno=$_POST['phno'];
    $desc=$_POST['desc'];
    
}

// connecting to server
$servername="localhost";
$username="root";
$password="";
$database="form_test";

//creating connection
$conn=mysqli_connect($servername,$username,$password,$database);
if($conn){
    echo "
    <svg xmlns='http://www.w3.org/2000/svg' style='display: none;'>
  <symbol id='check-circle-fill' viewBox='0 0 16 16'>
    <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/>
  </symbol>
  <symbol id='info-fill' viewBox='0 0 16 16'>
    <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z'/>
  </symbol>
  <symbol id='exclamation-triangle-fill' viewBox='0 0 16 16'>
    <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
  </symbol>
</svg>
    <div class='alert alert-success d-flex align-items-center' role='alert'>
    <svg class='bi flex-shrink-0 me-2' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
    <div style='font-size:2rem'>
      Feedback Submitted Successfully
    </div>
  </div>
  ";
}
else{
    die("connection unsuccessful dut to ".mysqli_connect_error());
}

//sql query
$sql_query="INSERT INTO `details` ( `Name`, `Email`, `Phone No`, `Query`, `Date`, `Status`) VALUES ( '$name', '$email', '$phno', ' $desc', current_timestamp(), 'Unread')";

$result=mysqli_query($conn,$sql_query);
if($result){
  echo "<div class='alert alert-success' role='alert'>
    <h4 class='alert-heading'>Thank you for your feedback ! ".$name."</h4>
    <p>Your every feedback is important to us , we will reach  to you so soon .</p>
  </div>";
}
else{
    echo "<div class='alert alert-danger' role='alert'>
    <h4 class='alert-heading'>Sorry , Technical Problem</h4>
    <p>Seems like there is some technical error please retry after some time .</p>
  </div>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback Confirmation</title>
  <link rel="stylesheet" href="assets/css/style-starter.css">
</head>
<body style="color:#F5F5F5;">
<div class="alert alert-light" role="alert">
  Return to Contact page <a href="contact.html" class="alert-link">Click here</a>.
</div>
</body>
</html>

