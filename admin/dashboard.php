<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['crmsaid']==0)) {
  header('location:logout.php');
  } else{ ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>JNN Campus Recruitment Management System-Admin Dashboard</title>
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
                    <h6> Admin Dashboard </h6>
                </div>
                <div class="card-body p-0">
                    <div class="lightSlider" data-item="3" data-item-xl="4" data-item-md="2" data-item-sm="1" data-pause="7000" data-pager="false" data-auto="true"
                         data-loop="true">
                        <div class="p-5 bg-primary text-white">
                        	<?php 

                    $query=mysqli_query($con,"Select * from  tblcompany");
$comcounts=mysqli_num_rows($query);
?>
                            <h5 class="font-weight-normal s-14">Total Company Registered</h5>
                            <span class="s-48 font-weight-lighter text-primary"><?php echo $comcounts;?></span>
                           
                        </div>
                        <div class="p-5">
                        	<?php 

                    $query1=mysqli_query($con,"Select * from  tbluser");
$userscounts=mysqli_num_rows($query1);
?>
                            <h5 class="font-weight-normal s-14">Total Users Registered</h5>
                            <span class="s-48 font-weight-lighter light-green-text"><?php echo $userscounts;?></span>
                            
                        </div>
                        <div class="p-5 light">
                        	<?php 

                    $query2=mysqli_query($con,"Select * from  tblvacancy");
$vaccounts=mysqli_num_rows($query2);
?>
                            <h5 class="font-weight-normal s-14">Total Vacancy Listed</h5>
                            <span class="s-48 font-weight-lighter text-primary"><?php echo $vaccounts;?></span>
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
