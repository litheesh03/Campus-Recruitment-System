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
   
    <title>JNN Campus Recruitment Management System-View Vacancy</title>
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
                        View Vacancy
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
                            <p>Job Information</p>
                        </div>
                        <div class="card-body b-b">
                            <form method="post">
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
  <?php
 $jid=$_GET['viewid'];
$ret=mysqli_query($con,"select tblcompany.ID as cid,tblcompany.CompanyName,tblvacancy.ID,tblvacancy.JobTitle,tblvacancy.JobpostingDate,tblvacancy.MonthlySalary,tblvacancy.JobDescriptions,tblvacancy.JobLocation,tblvacancy.NoofOpenings,tblvacancy.ApplyDate,tblvacancy.LastDate from tblcompany join  tblvacancy on tblcompany.ID=tblvacancy.CompanyID where tblvacancy.ID='$jid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
<table class="table table-bordered table-hover data-tables">
                                    <tr>
  <th>Job Title</th>
  <td><?php  echo $row['JobTitle'];?></td>
  </tr>
  <tr>
  <th>Company Name</th>
  <td><?php  echo $row['CompanyName'];?></td>
  </tr>
  <tr>
  <th>Monthly In-hand Salary</th>
  <td><?php  echo $row['MonthlySalary'];?></td>
  </tr>
   <tr>
  <th>Job Descriptions</th>
  <td><?php  echo $row['JobDescriptions'];?></td>
  </tr>
  <tr>
  <th>Job Location</th>
  <td><?php  echo $row['JobLocation'];?></td>
  </tr>
 
  <tr>
  <th>No of Opening</th>
  <td><?php  echo $row['NoofOpenings'];?></td>
  </tr>
  <tr>
  <th>Apply Date</th>
  <td><?php  echo $row['ApplyDate'];?></td>
  </tr>
  
  <tr>
  <th>Last Date</th>
  <td><?php  echo $row['LastDate'];?></td>
  </tr>

</table>
                                
                                <
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
<?php }  ?>