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
   
    <title>JNN Campus Recruitment Management System-Education Detail</title>
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
                        View Education Detail
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
                            <p>View Education Detail</p>
                        </div>
                        <div class="card-body b-b">
                           
  <?php
 $edid=$_GET['eduid'];
$ret=mysqli_query($con,"select tbluser.ID, tbleducation.UserID,tbleducation.SecondaryBoard,tbleducation.SecondaryBoardyop,tbleducation.SecondaryBoardper,tbleducation.SecondaryBoardcgpa,tbleducation.SSecondaryBoard,tbleducation.SSecondaryBoardyop,tbleducation.SSecondaryBoardper,tbleducation.SSecondaryBoardcgpa,tbleducation.GraUni,tbleducation.GraUniyop,tbleducation.GraUnidper,tbleducation.GraUnicgpa,tbleducation.PGUni,tbleducation.PGUniyop,tbleducation.PGUniper,tbleducation.PGUnicgpa,tbleducation.ExtraCurriculars,tbleducation.OtherAchivement  from   tbleducation join tbluser on tbleducation.UserID=tbluser.ID where tbleducation.UserID='$edid'");
$cnt=1;
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
<td><?php  echo $row['SecondaryBoard'];?></td>
<td><?php  echo $row['SecondaryBoardyop'];?></td>
<td><?php  echo $row['SecondaryBoardper'];?></td>
<td><?php  echo $row['SecondaryBoardcgpa'];?></td>
</tr>
<tr>
<th>12th(Senior Secondary)</th>
<td><?php  echo $row['SSecondaryBoard'];?></td>
<td><?php  echo $row['SSecondaryBoardyop'];?></td>
<td><?php  echo $row['SSecondaryBoardper'];?></td>
<td><?php  echo $row['SSecondaryBoardcgpa'];?></td>
</tr>
<tr>
<th>Graduation</th>
<td><?php  echo $row['GraUni'];?></td>
<td><?php  echo $row['GraUniyop'];?></td>
<td><?php  echo $row['GraUnidper'];?></td>
<td><?php  echo $row['GraUnicgpa'];?></td>

</tr>
<tr>
<th>Post Graduation</th>
<td><?php  echo $row['PGUni'];?></td>
<td><?php  echo $row['PGUniyop'];?></td>
<td><?php  echo $row['PGUniper'];?></td>
<td><?php  echo $row['PGUnicgpa'];?></td>
</tr>

</table>
<table class="table table-bordered table-hover data-tables">
    <tr>
<th>Extra Curriculars</th>
<td> <?php  echo $row['ExtraCurriculars'];?></td>
</tr>
<tr>
<th>Other Achivement/Certificate/Qualification</th>
<td><?php  echo $row['OtherAchivement'];?></td>
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
<?php }  ?>