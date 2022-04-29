<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['crmsuid']==0)) {
  header('location:logout.php');
  } else{

 //update for mesaage
$vid=$_GET['viewid'];
 $ret=mysqli_query($con,"update tblmessage set IsRead='1' where AppID='$vid'");   

?>
<!DOCTYPE html>
<html lang="zxx">
<head>
   
    <title>JNN Campus Recruitment Management System-History of applied Jobs</title>
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
                        History of applied Jobs
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
                            <p>History of applied Jobs</p>
                        </div>
                        <div class="card-body b-b">
                           
 <?php
$vid=$_GET['viewid'];
$ret=mysqli_query($con,"select 
  tblvacancy.ID,
  tblvacancy.JobTitle,
  tblvacancy.MonthlySalary,
  tblvacancy.JobDescriptions,
  tblvacancy.NoofOpenings,
  tblvacancy.JobLocation,
  tblvacancy.ApplyDate,tblvacancy.LastDate,tblapplyjob.ID,tblapplyjob.Resume,tblapplyjob.Message,tblapplyjob.Remark,tblapplyjob.Status,tbluser.ID as uid ,tbluser.FullName,tbluser.Email,tbluser.MobileNumber,tbluser.StudentID,tbluser.Gender,tbluser.Address,tbluser.Age,tbluser.DOB,tbluser.Image,tblapplyjob.Status,tblapplyjob.Resume,tblapplyjob.Message,tblapplyjob.Remark,tblcompany.CompanyName from  tblapplyjob join tbluser on tblapplyjob.UserId=tbluser.ID join tblvacancy on tblapplyjob.JobId=tblvacancy.ID join tblcompany on tblcompany.ID=tblvacancy.CompanyID where  tblapplyjob.ID='$vid'");
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
  <th>Monthly In-hand Salary</th>
  <td colspan="3"><?php  echo $row['MonthlySalary'];?></td>
  </tr>
   <tr>
  <th>Job Descriptions</th>
  <td colspan="3"><?php  echo $row['JobDescriptions'];?></td>
  </tr>
  <tr>
  <th>Job Location</th>
  <td><?php  echo $row['JobLocation'];?></td>

  <th>No of Opening</th>
  <td><?php  echo $row['NoofOpenings'];?></td>
  </tr>
  <tr>
  <th>Apply Date</th>
  <td><?php  echo $row['ApplyDate'];?></td>
  <th>Last Date</th>
  <td><?php  echo $row['LastDate'];?></td>
  </tr>
  <p>Information of Candidate</p>
  <tr>
  <th>Full Name</th>
  <td><?php  echo $row['FullName'];?></td>
  <th>Email</th>
  <td><?php  echo $row['Email'];?></td>
  </tr>
  <tr>
  <th>Mobile Number</th>
  <td><?php  echo $row['MobileNumber'];?></td>
  <th>Student ID </th>
  <td><?php  echo $row['StudentID'];?></td>
  </tr>
  <tr>
  <th>Gender </th>
  <td><?php  echo $row['Gender'];?></td>
  <th>Address </th>
  <td><?php  echo $row['Address'];?></td>
</tr>
<tr>
  <th>Age </th>
  <td><?php  echo $row['Age'];?></td>

  <th>DOB </th>
  <td><?php  echo $row['DOB'];?></td>
</tr>
<tr>
  <th>Image </th>
  <td><img src="images/<?php echo $row['Image'];?>" width="200" height="150" value="<?php  echo $row['Image'];?>"></td>
  
  <th>Education Detail </th>
  <td><a href="view-education-detail.php?eduid=<?php echo $row['uid'];?>" target="_blank">My Education Details</a></td>
</tr>
<tr>
  <th>Resume </th>
  <td> <a href ="images/<?php echo $row['Resume'];?>" width="200" height="150" value="<?php  echo $row['Resume'];?>" target="_blank">Download</a></td>

    <th>Status</th>
    <td> <?php  
if($row['Status']=="")
{
  echo "Not Responded Yet";
}
else
{
  echo $pstatus=$row['Status'];
}

     ;?></td>
  </tr>
</table>
<?php  if($row['Status']!='0'){
$ret=mysqli_query($con,"select  tblmessage.Message,tblmessage.Status as comstatus,tblmessage.ResponseDate from tblapplyjob  left join tblmessage on tblmessage.AppID=tblapplyjob.ID where tblapplyjob.ID='$vid'");
$cnt=1;


 ?>
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <tr align="center">
   <th colspan="4" >Message History</th> 
  </tr>
  <tr>
    <th>#</th>
<th>Message</th>
<th>Status</th>
<th>Time</th>
</tr>
<?php  
while ($row=mysqli_fetch_array($ret)) { 
  ?>
<tr>
  <td><?php echo $cnt;?></td>
 <td><?php  echo $row['Message'];?></td> 
  <td><?php  echo $row['comstatus'];?></td> 
   <td><?php  echo $row['ResponseDate'];?></td> 
</tr>
<?php $cnt=$cnt+1;} ?>
</table>
<?php  }?>

 


                                 
                            
                          </div>
                       
                  </div>
                </div>
                            
                                </div>
                                
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
<?php } } ?>