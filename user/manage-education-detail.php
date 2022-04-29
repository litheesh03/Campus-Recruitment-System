<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['crmsuid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
   $uid= $_SESSION['crmsuid'];
    $secboard=$_POST['10thboard'];
    $secyop=$_POST['10thpyear'];
    $secper=$_POST['10thpercentage'];
    $seccgpa=$_POST['10thcgpa'];
    $ssecboard=$_POST['12thboard'];
    $ssecyop=$_POST['12thpyear'];
    $ssecper=$_POST['12thpercentage'];
    $sseccgpa=$_POST['12thcgpa'];
    $grauni=$_POST['graduation'];
    $grayop=$_POST['graduationpyeaer'];
    $graper=$_POST['graduationpercentage'];
    $gracgpa=$_POST['graduationcgpa'];
    $pguni=$_POST['postgraduation'];
    $pgyop=$_POST['pgpyear'];
    $pgper=$_POST['pgpercentage'];
    $pgcgpa=$_POST['pgcgpa'];
    $extracurr=$_POST['extracurr'];
    $otherach=$_POST['otherach'];
     
    $query=mysqli_query($con, "update tbleducation set SecondaryBoard='$secboard',SecondaryBoardyop='$secyop',SecondaryBoardper='$secper',SecondaryBoardcgpa='$seccgpa',SSecondaryBoard='$ssecboard',SSecondaryBoardyop='$ssecyop',SSecondaryBoardper='$ssecper',SSecondaryBoardcgpa='$sseccgpa',GraUni='$grauni',GraUniyop='$grayop',GraUnidper='$graper',GraUnicgpa='$gracgpa',PGUni='$pguni',PGUniyop='$pgyop',PGUniper='$pgper',PGUnicgpa='$pgcgpa',ExtraCurriculars='$extracurr',OtherAchivement='$otherach'");
    if ($query) {
    echo '<script>alert("Education Detail has been updated.")</script>';
    echo "<script>window.location.href ='add-education-detail.php'</script>";
  }
  else
    {
        echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
  ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
   
    <title>JNN Campus Recruitment Management System-Add Education Detail</title>
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
                        Update Education Detail
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
                            <p>Education Detail</p>
                        </div>
                        <div class="card-body b-b">

                            <form method="post">
                               <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
  <?php
  $uid=$_SESSION['crmsuid'];
$ret=mysqli_query($con,"select * from tbleducation where UserID='$uid'");
$num=mysqli_num_rows($ret);
$cnt=1;
if($num>0){
while ($row=mysqli_fetch_array($ret)) {

?> 
                                <table class="table table-bordered table-hover data-tables">
  
<tr>
  <th>#</th>
   <th>Board / University</th>
    <th>Year</th>
     <th>Percentage</th>
       <th>CGPA</th>

</tr>
<tr>
<th>10th(Secondary)</th>
<td>   <input class="form-control white_bg" id="10thboard" name="10thboard" value="<?php  echo $row['SecondaryBoard'];?>"  type="text" required='true'></td>
<td>   <input class="form-control white_bg" id="10thpyeaer" name="10thpyear" value="<?php  echo $row['SecondaryBoardyop'];?>"  type="text" required='true'></td>
<td>   <input class="form-control white_bg" id="10thpercentage" name="10thpercentage" value="<?php  echo $row['SecondaryBoardper'];?>"  type="text" required='true'></td>
<td>   <input class="form-control white_bg" id="10thcgpa" name="10thcgpa" value="<?php  echo $row['SecondaryBoardcgpa'];?>"  type="text" required='true'></td>
</tr>
<tr>
<th>12th(Senior Secondary)</th>
<td>   <input class="form-control white_bg" id="12thboard" name="12thboard" value="<?php  echo $row['SSecondaryBoard'];?>"  type="text" required='true'></td>
<td>   <input class="form-control white_bg" id="12thboard" name="12thpyear" value="<?php  echo $row['SSecondaryBoardyop'];?>"  type="text" required='true'></td>
<td>   <input class="form-control white_bg" id="12thpercentage" name="12thpercentage" value="<?php  echo $row['SSecondaryBoardper'];?>"  type="text" required='true'></td>
<td>   <input class="form-control white_bg" id="12thcgpa" name="12thcgpa" value="<?php  echo $row['SSecondaryBoardcgpa'];?>"  type="text" required='true'></td>
</tr>
<tr>
<th>Graduation</th>
<td>   <input class="form-control white_bg" id="graduation" name="graduation" value="<?php  echo $row['GraUni'];?>"  type="text" required='true'></td>
<td>   <input class="form-control white_bg" id="graduationpyeaer" name="graduationpyeaer" value="<?php  echo $row['GraUniyop'];?>"  type="text" required='true'></td>
<td>   <input class="form-control white_bg" id="graduationpercentage" name="graduationpercentage" value="<?php  echo $row['GraUnidper'];?>"  type="text" required='true'></td>
<td>   <input class="form-control white_bg" id="graduationcgpa" name="graduationcgpa" value="<?php  echo $row['GraUnicgpa'];?>"  type="text" required='true'></td>

</tr>
<tr>
<th>Post Graduation</th>
<td>   <input class="form-control white_bg" id="postgraduation" name="postgraduation" value="<?php  echo $row['PGUni'];?>"  type="text" ></td>
<td>   <input class="form-control white_bg" id="pgpyeaer" name="pgpyear" value="<?php  echo $row['PGUniyop'];?>"  type="text"></td>
<td>   <input class="form-control white_bg" id="pgpercentage" name="pgpercentage" value="<?php  echo $row['PGUniper'];?>"  type="text" ></td>
<td>   <input class="form-control white_bg" id="pgcgpa" name="pgcgpa" value="<?php  echo $row['PGUnicgpa'];?>"  type="text" ></td>
</tr>

</table>
<table class="table table-bordered table-hover data-tables">
    <tr>
<th>Extra Curriculars</th>
<td>   <input class="form-control white_bg" id="extracurr" name="extracurr" value="<?php  echo $row['ExtraCurriculars'];?>"  type="text" ></td>
</tr>
<tr>
<th>Other Achivement/Certificate/Qualification</th>
<td>   <input class="form-control white_bg" id="otherach" name="otherach" value="<?php  echo $row['OtherAchivement'];?>"  type="text" ></td>
</tr>
</table>

       <?php } ?>                        <hr />
 <button type="submit" class="btn btn-primary" name="submit">Update</button>
</form>
<?php } else {?>
<h3 align="center" style="color:red">No Record found</h3>
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