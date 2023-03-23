<?php
session_start();
if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!=true){
  header("location:Admin_login.php");
}
$servername="localhost";
$username="root";
$password="";
$database="form_test";
$delete=false;
$update=false;

//creating connection
$conn=mysqli_connect($servername,$username,$password,$database);
if(!($conn)){
    
die("connection unsuccessful dut to ".mysqli_connect_error());
}
  //delete a record
  if(isset($_GET['delete'])){
    $delete=true;
    $Id=$_GET['delete'];
    $sql_query="DELETE FROM `details` WHERE `details`.`Sno` = '$Id' ";
     $result=mysqli_query($conn,$sql_query);
  }
//Updating status column in database
  if(isset($_POST['submit'])) {
    $update=true;
    $id=$_POST['Sno'];
    foreach ($_POST['Choice'] as $select)
    {
      
      $sql_query="UPDATE `details` SET `Status` = '$select' WHERE `details`.`Sno` = $id;";
      $result=mysqli_query($conn,$sql_query);
    }
  }



?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>RAFCO - FEEDBACK CONTROL</title>
  <!-- web fonts -->
  <link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
  <!-- //web fonts -->
  <!-- Template CSS -->
  <link rel="stylesheet" href="style-starter.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
  
</head>

<body>


<nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">
          <img src="images/admin_logo.png" width="55" height="55" class="d-inline-block align-top" alt="">
          <strong class="navbar-brand mt-2 ml-2" style="font-size: 1.5rem;">Rafco Admin Panel</strong>
        </a>
        <ul class="nav navbar-nav navbar-right">
          
          <li> <a href="logout.php"> <button type="button" class="btn btn-primary mr-1">Logout</button></a></li>
        </ul>
      </nav>

  <!-- Dissmissible alerts for deletion and updation -->
  <?php
    if($delete){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Record has been deleted succesfully
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
    </div>";
    }
  ?>
  <?php
    if($update){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Status has been Updated succesfully
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
    </div>";
    }
  ?>

  <div class="container mt-4 mb-5">

   <table class="table table-responsive" id="myTable">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">Query</th>
          <th scope="col">Date</th>
          <th scope="col">Status</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>


      <!-- selecting Data from database -->
        <?php
            $sql="SELECT * FROM `details`";
            $result=mysqli_query($conn,$sql);
            if(!($result)){
              
              die("connection unsuccessful dut to ".mysqli_connect_error());
           }
 
 
      $row_count=mysqli_num_rows($result);
      if($row_count>0){
       // $val=1;
        while($row=mysqli_fetch_assoc($result)){
            if($row['Phone No']!=0){
                echo "<tr>
             <th scope='row'>".$row['Sno']."</th>
             <td>".$row['Name']."</td>
             <td>".$row['Email']."</td>
             <td>".$row['Phone No']."</td>
             <td>".$row['Query']."</td>
             <td>".$row['Date']."</td>
             <td>".$row['Status']."</td>
             <td>
             
             </button>
             <button class='btn btn-sm btn-primary'>
             <form action='#' method='post'>
             <select name='Choice[]'>
             <option value='Unread'>Unread</option>
             <option value='Read'>Read</option>
             <option value='Important'>Important</option>
             <option value='Contacted'>Contacted</option>
             <option value='Not important'>Not Important</option>
             <input type='hidden' id='Sno' name='Sno' value=".$row['Sno'].">
             </select> 
                <input type='submit'  name='submit'  value='Update' />
             </form> 
             </button>

           <button class='delete btn btn-sm btn-primary' id=d".$row['Sno']." >Delete</button>
             </td>
             </tr>";
        
              }
    
            }

           }


         ?>

    </tbody>
 </table>

  </div>

 
  
 
  

  
  
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

  <!-- Template JavaScript -->
  <script src="assets/js/all.js"></script>
  <!-- Smooth scrolling -->
  <!-- <script src="assets/js/smoothscroll.js"></script> -->
  <script src="assets/js/owl.carousel.js"></script>

  <!-- script for -->
  <script>
    $(document).ready(function () {
      $('.owl-one').owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        responsiveClass: true,
        autoplay: false,
        autoplayTimeout: 5000,
        autoplaySpeed: 1000,
        autoplayHoverPause: false,
        responsive: {
          0: {
            items: 1,
            nav: false
          },
          480: {
            items: 1,
            nav: false
          },
          667: {
            items: 1,
            nav: true
          },
          1000: {
            items: 1,
            nav: true
          }
        }
      })
    })
  </script>
  <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
                </script>
              <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script> -->

  <?php
         $status="";
         
       ?>
  <script>
    let temp = document.getElementById("read").innerText;
    console.log(temp);
    $status = temp;


  </script>
  <?php
       echo"$status";
       ?>
  <script>
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        sno = e.target.id.substr(1,);

        if (confirm("Do you want to delete ")) {
         
          window.location = `/SSS/Rafco wealth/Contant/AdminBackend/view.php?delete=${sno}`;
        }
        
      })
    })
  </script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
  </script>
</body>

</html>