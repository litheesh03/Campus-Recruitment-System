<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['crmscid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    
    <title>JNN Campus Recruitment Management System-Application Counts Reports</title>
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
<div class="page has-sidebar-left bg-light height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row">
                <div class="col">
                    <h3 class="my-3">
                        Application Counts Reports
                    </h3>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-md-12">
              
                <div class="card my-3 no-b">
                    <div class="card-body">
                        
                        <?php
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];

?>
<h5 align="center" style="color:blue">Applications Counts Reports from <?php echo $fdate?> to <?php echo $tdate?></h5>
                        <table class="table table-bordered table-hover data-tables" border="1">
                            <thead>
          <tr>
            <td>S.NO</td>
            <td>Job Title</td>
            <td>number of applications</td>
                       </tr>
        </thead>
                            <tbody>
                                <?php
                               $cid=$_SESSION['crmscid'];
$ret=mysqli_query($con,"select  tblvacancy.JobTitle, count(tblapplyjob.UserId) as totalcount from tblapplyjob join tblvacancy on tblapplyjob.JobId=tblvacancy.ID where tblvacancy.CompanyID='$cid' && date(tblapplyjob.ApplyDate) between '$fdate' and '$tdate' group by tblvacancy.JobTitle");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                           <tr>
                            <td><?php echo $cnt; ?></td>
                   <td><?php  echo $row['JobTitle'];?></td>
              <td><?php  echo $total=$row['totalcount'];?></td>
                </tr>
                <?php 
$ftotal+=$total;
$cnt=$cnt+1;
}?>
<tr>
                  <td colspan="2" style="text-align:center">Total </td>
              <td><?php  echo $ftotal;?></td>
          </tr>
                          
                            </tbody>
                           
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<!--/#app -->
<script src="assets/js/app.js"></script>
</body>
</html>
<?php }  ?>