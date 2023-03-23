<?php
$loggedin=false;
$showerror=false;
if($_SERVER['REQUEST_METHOD']=='POST'){
  $Username=$_POST['username'];
  $Password=$_POST['pass'];
   
  $servername="localhost";
  $username="root";
  $password="";
  $database="admin_rafco";
  
  $conn=mysqli_connect($servername,$username,$password,$database);
   if(!($conn)){
    
   die("connection unsuccessful dut to ".mysqli_connect_error());
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

        $showerror=true;
}
}

?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Rafco Wealth - Admin Panel</title>
  <!-- web fonts -->
  <link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
  <!-- //web fonts -->
  <!-- Template CSS -->
  <link rel="stylesheet" href="style-starter.css">
</head>

<body>

  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <img src="images/admin_logo.png" width="55" height="55" class="d-inline-block align-top" alt="">
      <strong class="navbar-brand mt-2 ml-2" style="font-size: 1.5rem;">Rafco Admin Panel</strong>
    </a>
  </nav>
  <?php
      if($loggedin){
         session_start();
         $_SESSION['loggedin']=true;
         header("location:view.php");
}
     if($showerror){
      echo "<div class='alert alert-warning  mt-1' role='alert'>
    Incorrect Username or Password!!.
  </div>";
     }
?>

  <section class="vh-100" style="background-color: #f7f3f4;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">

              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">

                  <form action="#" method="post">

                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                      <span class="h1 fw-bold mb-0">Admin-Rafco</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Login to system</h5>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example17">Username</label>
                      <input type="text" maxlength="30" name="username" id="username" class="form-control form-control-lg" required />
                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example27">Password</label>
                      <input type="password" maxlength="30" name="pass" id="pass" class="form-control form-control-lg" required />
                    </div>



                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                    </div>

                    <p class="mb-5 pb-lg-2" style="color: #393f81;"><a href="reset_password.php"
                        style="color: #393f81;">Forget password</a></p>

                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>




</body>

</html>