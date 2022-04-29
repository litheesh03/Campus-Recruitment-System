<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['crmsuid']==0)) {
  header('location:logout.php');
  } else{ ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>JNN Campus Recruitment Management System-User Dashboard</title>
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
                    <h6>Dashboard </h6>
                </div>
                <div class="card-body p-0">
                    <div class="lightSlider" data-item="5" data-item-xl="4" data-item-md="2" data-item-sm="1" data-pause="7000" data-pager="false" data-auto="true"
                         data-loop="true">
                        <div class="p-5 bg-primary text-white">
                            <?php
                           $uid=$_SESSION['crmsuid'];
//todays applied Jobs
 $query=mysqli_query($con,"select ID from tblapplyjob where UserId='$uid' && date(ApplyDate)=CURDATE();");
$count_today_appjob=mysqli_num_rows($query);
 ?> 
                            <h5 class="font-weight-normal s-14">Today's Applied Jobs</h5>
                            <span class="s-48 font-weight-lighter text-primary"><?php echo $count_today_appjob;?></span>
                            
                        </div>
                        <div class="p-5">
                            <?php
                           $uid=$_SESSION['crmsuid'];
//Yesterday applied Jobs
 $query1=mysqli_query($con,"select ID from tblapplyjob where UserId='$uid' && date(ApplyDate)=DATE(NOW()) - INTERVAL 1 DAY");
$count_yday_appjob=mysqli_num_rows($query1);
 ?> 
                            <h5 class="font-weight-normal s-14">Yesterday Applied Jobs</h5>
                            <span class="s-48 font-weight-lighter light-green-text"><?php echo $count_yday_appjob;?></span>
                            
                        </div>
                        <div class="p-5 light">
                            <?php
                           $uid=$_SESSION['crmsuid'];
//Last Sevendays applied Jobs
 $query2=mysqli_query($con,"select ID from tblapplyjob where UserId='$uid' && date(ApplyDate)=DATE(NOW()) - INTERVAL 7 DAY");
$count_sevenday_appjob=mysqli_num_rows($query2);
 ?> 
                            <h5 class="font-weight-normal s-14">Last 7 Days Applied Jobs</h5>
                            <span class="s-48 font-weight-lighter text-primary"><?php echo $count_sevenday_appjob;?></span>
                           
                        </div>
                        <div class="p-5">
                            <?php
                           $uid=$_SESSION['crmsuid'];
//Total applied Jobs
 $query3=mysqli_query($con,"select ID from tblapplyjob where UserId='$uid'");
$count_total_appjob=mysqli_num_rows($query3);
 ?>
                            <h5 class="font-weight-normal s-14">Total Applied Jobs</h5>
                            <span class="s-48 font-weight-lighter amber-text"><?php echo $count_total_appjob;?></span>
                            
                        </div>
                        <div class="p-5 light">
                            <?php
                           $uid=$_SESSION['crmsuid'];
//Total Vacancy
 $query4=mysqli_query($con,"select ID from tblvacancy");
$count_total_vacancy=mysqli_num_rows($query4);
 ?>
                            <h5 class="font-weight-normal s-14">Total Vacancy</h5>
                            <span class="s-48 font-weight-lighter text-indigo"><?php echo $count_total_vacancy;?></span>
                            
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