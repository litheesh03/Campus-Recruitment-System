<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['crmscid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $compid=$_SESSION['crmscid'];
    $comname=$_POST['comname'];
    $conperson=$_POST['conperson'];
    $comurl=$_POST['comurl'];
    $compadd=$_POST['compadd'];
    $mobno=$_POST['mobilenumber'];
    $compemail=$_POST['compemail'];
  
     $query=mysqli_query($con, "update tblcompany set CompanyName ='$comname', ContactPerson='$conperson',CompanyUrl='$comurl',CompanyAddress='$compadd' where ID='$compid'");
    if ($query) {
    $msg="Company profile has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again.";
    }
  }
  ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>JNN Campus Recruitment Management System-Company Profile</title>
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
$compid=$_SESSION['crmscid'];
$ret=mysqli_query($con,"select * from tblcompany where ID='$compid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4" class="col-form-label">Company Name</label>
                                        <input type="text" class="form-control" id="comname" name="comname" value="<?php  echo $row['CompanyName'];?>" required='true'>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputPassword4" class="col-form-label">Contact Person</label>
                                        <input type="text" id="conperson" name="conperson" class="form-control" value="<?php  echo $row['ContactPerson'];?>" required='true'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress" class="col-form-label">Company URL</label>
                                    <input type="text" id="comurl" name="comurl" class="form-control" value="<?php  echo $row['CompanyUrl'];?>" required='true'>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress" class="col-form-label">Company Address</label>
                                    <input type="text" id="compadd" name="compadd" class="form-control" value="<?php  echo $row['CompanyAddress'];?>" required='true'>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress" class="col-form-label">Mobile Number</label>
                                    <input type="text" id="$mobno" name="$mobno" class="form-control" value="<?php  echo $row['MobileNumber'];?>" readonly='true'>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress2" class="col-form-label">Email address</label>
                                    <input type="email" id="compemail" name="compemail" class="form-control" value="<?php  echo $row['CompanyEmail'];?>" readonly='true'>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress2" class="col-form-label">Company Logo</label>
                                    <img src="images/<?php echo $row['CompanyLogo'];?>" width="200" height="150" value="<?php  echo $row['CompanyLogo'];?>"><a href="changeimage.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit Image</a>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress2" class="col-form-label">Company Registration Date</label>
                                    <input type="text" id="" name="" class="form-control" value="<?php  echo $row['CompanyRegdate'];?>" readonly='true'>
                                </div>
                               <?php } ?>
                               
                                <button type="submit" name="submit" class="btn btn-primary">Update</button>
                            </form>
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