<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['crmsuid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{



$jobid=$_GET['viewid'];
$userid= $_SESSION['crmsuid'];
$resume=$_FILES["resume"]["name"];
$ret=mysqli_query($con, "select UserId from tblapplyjob where UserId='$userid' && JobId='$jobid'");
    $result=mysqli_fetch_array($ret);
    if($result>0){
echo "<script>alert('Already Applied for this job');</script>"; 
    }
    else{

$extension = substr($resume,strlen($resume)-4,strlen($resume));
// allowed extensions
$allowed_extensions = array(".docs",".pdf",".doc");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Resume has Invalid format. docs and pdf format allowed');</script>";
}
else
{
//rename property images
$candresume=md5($pic).time().$extension;
move_uploaded_file($_FILES["resume"]["tmp_name"],"images/".$candresume);


$query=mysqli_query($con,"insert into tblapplyjob(UserId,JobId,Resume) values('$userid','$jobid','$candresume') ");
if($query)
{
 echo "<script>alert('You are succesfully apply for this job');</script>";   
} else {
 echo "<script>alert('Something went wrong.');</script>";      
}
}
}
}

  ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
   
    <title>JNN Campus Recruitment Management System-Vacancy Detail</title>
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
                        View Vacancy Detail
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
                            <p>View Vacancy Detail</p>
                        </div>
                        <div class="card-body b-b">
                           
  <?php
 $edid=$_GET['viewid'];
$ret=mysqli_query($con,"select tblcompany.ID as cid,tblcompany.CompanyName,tblvacancy.ID,tblvacancy.JobTitle,tblvacancy.JobpostingDate,tblvacancy.MonthlySalary,tblvacancy.JobDescriptions,tblvacancy.JobLocation,tblvacancy.NoofOpenings,tblvacancy.ApplyDate,tblvacancy.LastDate from tblcompany join  tblvacancy on tblcompany.ID=tblvacancy.CompanyID where tblvacancy.ID='$edid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

<table class="table table-bordered table-hover data-tables">
    <tr>
  <th width="200">Job Title</th>
  <td><?php  echo $row['JobTitle'];?></td>
  <th>Company Name</th>
  <td><?php  echo $row['CompanyName'];?></td>
  </tr>
   <tr>
  <th>Job Descriptions</th>
  <td colspan="3"><?php  echo $row['JobDescriptions'];?></td>
  </tr>

  <tr>
  <th>Monthly In-hand Salary</th>
  <td><?php  echo $row['MonthlySalary'];?></td>
  <th>Job Location</th>
  <td><?php  echo $row['JobLocation'];?></td>
  </tr>
  <tr>
  <th>No of Opening</th>
  <td colspan="3"><?php  echo $row['NoofOpenings'];?></td>
</tr>
  <th>Apply Date</th>
  <td><?php  echo $adate=$row['ApplyDate'];?></td>

  <th>Last Date</th>
  <td><?php  echo $ldate=$row['LastDate'];?></td>
  </tr>
</table>
<?php } ?>
<table class="table table-bordered table-hover data-tables">
<form method="post" name="submit" enctype="multipart/form-data">
  
                                
                               
                                
<tr>
    <th>Upload Resume :</th>
    <td>
    <input type='file' name="resume" placeholder="resume" rows="12" cols="14" class="form-control wd-450" required="true"></td>
  </tr>
  
<?php
$cdate=date('Y-m-d');
$aadate = date("Y-m-d", strtotime($adate));
$lldate = date("Y-m-d", strtotime($ldate));
if(($cdate > $aadate) and ($cdate < $lldate ))
{
?>
  <tr align="center">
    <td colspan="2"><button type="submit" name="submit" class="btn btn-primary">Apply Now</button></td>
  </tr>
<?php } else {?>
  <tr>
<th colspan="2" style="text-align:center; font-weight:bold; color:red; font-size:22px;">Job Expired</tthd>
  </tr>
<?php } ?>
  </form>
  </table>
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