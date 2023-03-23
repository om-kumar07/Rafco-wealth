<?php
$reset=false;
$showerror=false;
if($_SERVER['REQUEST_METHOD']=='POST'){
    $newPassword=$_POST['pas'];
    $cpassword=$_POST['cpas'];
    $security_code=$_POST['sec'];

    $servername="localhost";
    $username="root";
    $password="";
    $database="admin_rafco";
    
 //creating connection
    $conn=mysqli_connect($servername,$username,$password,$database);
    if(!($conn)){
    
    die("connection unsuccessful dut to ".mysqli_connect_error());
    }
    if($newPassword==$cpassword){
    $sql="SELECT * FROM `authentication`";
    $result=mysqli_query($conn,$sql);
    if(!($result)){

    die("connection unsuccessful dut to ".mysqli_connect_error());
   }
   $row=mysqli_fetch_assoc($result);
   if($security_code==$row['sec_code']){
       $reset=true;
   
   }
  else{
    $showerror="Wrong security code entered";
 
  }
  }
  else{
    $showerror="Passwords do not match";
 }
 
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    /* for hiding no arrow */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* input[type=number] {
      -moz-appearance: textfield;
    } */
  </style>
  <title>Reset Credential </title>
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
       if($showerror){
        echo " <div class='container'></div><svg xmlns='http://www.w3.org/2000/svg' style='display: none;'>
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
        <div class='alert alert-danger d-flex align-items-center' role='alert'>
        <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
        <div>
           ".$showerror."
        </div>
      </div></div>";
       }
       
       if($reset){

        $sql_query="UPDATE `authentication` SET `password`='$newPassword' WHERE `sec_code`='12345677';";
        $result=mysqli_query($conn,$sql_query);
        echo "<svg xmlns='http://www.w3.org/2000/svg' style='display: none;'>
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
        <div class='alert alert-success d-flex align-items-center mt-2' role='alert'>
        <svg class='bi flex-shrink-0 me-2 mr-1' role='img' width='30' height='30' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
        <div style='font-size:1.5rem'>
          Password Reset Successfully <a href='Admin_login.php'> Log in </a>
        </div>
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

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Reset your password</h5>



                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example27">Password</label>
                      <input type="password" maxlength="30" name="pas" id="pas" class="form-control form-control-lg" required />
                    </div>
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example27">Confirm Password</label>
                      <input type="password" maxlength="30" name="cpas" id="cpas" class="form-control form-control-lg" required />
                      <small id="small" class="form-text text-muted" style="font-size:0.87rem ;">Make sure both
                        passwords are
                        same.</small>
                    </div>
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example17">Security Code</label>
                      <input type="number"  maxlength="20" name="sec" id="sec" class="form-control form-control-lg" required />
                    </div>

                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="submit">Reset</button>
                    </div>

                    <p class="mb-5 pb-lg-2" style="color: #393f81;"> <a href="Admin_login.php"
                        style="color: #393f81;">Return to Log in</a></p>
                    
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