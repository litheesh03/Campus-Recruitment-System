<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['crmsaid']==0)) {
  header('location:logout.php');
  } else{
    
  ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>JNN Campus Recruitment Management System-Company Details</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/app.css">
    <style>
        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #F5F8FA;
            z-index: 9998;
            text-align: center;
        }

        .plane-container {
            position: absolute;
            top: 50%;
            left: 50%;
        }
    </style>
</head>
<body class="light">
<!-- Pre loader -->
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="preloader-wrapper small active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>
        </div>
    </div>
</div>
<div id="app">
<?php include_once('includes/sidebar.php');?>
<!--Sidebar End-->
<?php include_once('includes/header.php');?>
    <div class="page has-sidebar-left">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-package"></i>
                        Company Profile
                    </h4>
                </div>
            </div>
        </div>
    </header>

    <div class="animatedParent animateOnce">
        <div class="container-fluid my-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                   
                        <div class="card-body b-b">
                            <form method="post">
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
  <?php
$vid=$_GET['viewid'];
$ret=mysqli_query($con,"select * from tblcompany where ID='$vid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                <table class="table table-bordered table-hover data-tables">
                                    <tr>
  <th>Company Name</th>
  <td><?php  echo $row['CompanyName'];?></td>
  </tr>
  <tr>
  <th>Contact Person</th>
  <td><?php  echo $row['ContactPerson'];?></td>
  </tr>
   <tr>
  <th>Company URL</th>
  <td><?php  echo $row['CompanyUrl'];?></td>
  </tr>
  <tr>
  <th>Company Address</th>
  <td><?php  echo $row['CompanyAddress'];?></td>
  </tr>
 
  <tr>
  <th>Mobile Number</th>
  <td><?php  echo $row['MobileNumber'];?></td>
  </tr>
  <tr>
  <th>Email address</th>
  <td><?php  echo $row['CompanyEmail'];?></td>
  </tr>
  <tr>
  <th>Company Logo</th>
  <td><img src="../company/images/<?php echo $row['CompanyLogo'];?>" width="200" height="150" value="<?php  echo $row['CompanyLogo'];?>"></td>
  </tr>
  <tr>
  <th>Company Registration Date</th>
  <td><?php  echo $row['CompanyRegdate'];?></td>
  </tr>

</table>
                               
                               <?php } ?>
                               
                              
                        </div>
                
                    </div>
                </div>
         
            </div>
        </div>
    </div>
</div>
<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<!--/#app -->
<script src="assets/js/app.js"></script>
</body>
</html>
<?php } ?>