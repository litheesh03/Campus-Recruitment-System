<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['crmscid']==0)) {
  header('location:logout.php');
  } else{ ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>JNN Campus Recruitment Management System-Company Dashboard</title>
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

<div class="page has-sidebar-left">
   
    <?php include_once('includes/header.php');?>

    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
            <div class="card">
                <div class="card-header white">
                    <h6> Company Dashboard </h6>
                </div>
                <div class="card-body p-0">
                    <div class="lightSlider" data-item="5" data-item-xl="4" data-item-md="2" data-item-sm="1" data-pause="7000" data-pager="false" data-auto="true"
                         data-loop="true">
                        <div class="p-5 bg-primary text-white">
                            <?php 
$cid=$_SESSION['crmscid'];
                    $query=mysqli_query($con,"Select * from  tblvacancy where CompanyID='$cid'");
$vaccounts=mysqli_num_rows($query);
?>
                            <h5 class="font-weight-normal s-14">Total Vacancy Posted</h5>
                            <span class="s-48 font-weight-lighter text-primary"><?php echo $vaccounts;?></span>
                          
                        </div>
                        <div class="p-5">
                            <?php 

                    $query1=mysqli_query($con,"Select * from  tblapplyjob join tblvacancy on  tblvacancy.ID=tblapplyjob.JobId where tblvacancy.CompanyID='$cid'");
$totalapplications=mysqli_num_rows($query1);
?>
                            <h5 class="font-weight-normal s-14">Total No. of Applications</h5>
                            <span class="s-48 font-weight-lighter light-green-text"><?php echo $totalapplications;?></span>
                            
                        </div>
                        <div class="p-5 light">
                             <?php 

                    $query2=mysqli_query($con,"Select * from  tblapplyjob join tblvacancy on  tblvacancy.ID=tblapplyjob.JobId where tblvacancy.CompanyID='$cid' and tblapplyjob.Status is null");
$totalnewapp=mysqli_num_rows($query2);
?>
                            <h5 class="font-weight-normal s-14">Total No.of New Application</h5>
                            <span class="s-48 font-weight-lighter text-primary"><?php echo $totalnewapp;?></span>
                            
                        </div>
                        <div class="p-5">
                            <?php 

                    $query3=mysqli_query($con,"Select * from  tblapplyjob join tblvacancy on  tblvacancy.ID=tblapplyjob.JobId where tblvacancy.CompanyID='$cid' and tblapplyjob.Status='Selected'");
$totalselapp=mysqli_num_rows($query3);
?>
                            <h5 class="font-weight-normal s-14">Total No.of Selected Application</h5>
                            <span class="s-48 font-weight-lighter amber-text"><?php echo $totalselapp;?></span>
                           
                        </div>
                        <div class="p-5 light">
                            <?php 

                    $query4=mysqli_query($con,"Select * from  tblapplyjob join tblvacancy on  tblvacancy.ID=tblapplyjob.JobId where tblvacancy.CompanyID='$cid' and tblapplyjob.Status='Rejected'");
$totalrejapp=mysqli_num_rows($query4);
?>
                            <h5 class="font-weight-normal s-14">Total No.of Rejected Application</h5>
                            <span class="s-48 font-weight-lighter text-indigo"><?php echo $totalrejapp;?></span>
                            
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