<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['crmscid']==0)) {
  header('location:logout.php');
  } else{

    if(isset($_POST['submit']))
  {
    
    $vid=$_GET['viewid'];
    $ressta=$_POST['status'];
   
    $msg=$_POST['message'];
 
    $query=mysqli_query($con,"insert into tblmessage(AppID,Message,Status) value('$vid',' $msg','$ressta')");
      
   $query.=mysqli_query($con, "update   tblapplyjob set Status='$ressta' ,Message='$msg' where ID='$vid'");
    if ($query) {
    $msg="Message has been sent.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
}

?>
<!DOCTYPE html>
<html lang="zxx">
<head>
   
    <title>JNN Campus Recruitment Management System-Apply Vacancy</title>
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
                        Applications Info.
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
                            <p>Applications Info.</p>
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
  tblvacancy.ApplyDate,tblvacancy.LastDate,tblapplyjob.ID,tblapplyjob.Resume,tblapplyjob.Message,tblapplyjob.Remark,tblapplyjob.Status,tbluser.ID as uid ,tbluser.FullName,tbluser.Email,tbluser.MobileNumber,tbluser.StudentID,tbluser.Gender,tbluser.Address,tbluser.Age,tbluser.DOB,tbluser.Image,tblapplyjob.Status,tblapplyjob.Resume,tblapplyjob.Message,tblapplyjob.Remark from  tblapplyjob join tbluser on tblapplyjob.UserId=tbluser.ID join tblvacancy on tblapplyjob.JobId=tblvacancy.ID  where  tblapplyjob.ID='$vid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
<table class="table table-bordered table-hover data-tables">
    <tr>
  <th>Job Title</th>
  <td><?php  echo $row['JobTitle'];?></td>
  <th>Monthly In-hand Salary</th>
  <td><?php  echo $row['MonthlySalary'];?></td>
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
  <td><img src="../user/images/<?php echo $row['Image'];?>" width="200" height="150" value="<?php  echo $row['Image'];?>"></td>
  <th>Education Detail </th>
  <td><a href="view-education-detail.php?eduid=<?php echo $row['uid'];?>" target="_blanks">Candidate Education Details</a></td>
  </tr>
   <tr>
  <th>Resume </th>
  <td> <a href ="../user/images/<?php echo $row['Resume'];?>" width="200" height="150" value="<?php  echo $row['Resume'];?>" target="_blank">Download</a></td>
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
<?php  if($row['Status']!=''){
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
while ($row1=mysqli_fetch_array($ret)) { 
  ?>
<tr>
  <td><?php echo $cnt;?></td>
 <td><?php  echo $row1['Message'];?></td> 
  <td><?php  echo $row1['comstatus'];?></td> 
   <td><?php  echo $row1['ResponseDate'];?></td> 
</tr>
<?php $cnt=$cnt+1;} ?>
</table>
<?php  }  
if ($row['Status']==""){
?> 
<p align="center">                            
 <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Take Action</button></p>  

<?php } ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
 </button>
</div>
<div class="modal-body">
<table class="table table-bordered table-hover data-tables">

 <form method="post" name="submit">
                              
<tr>
<th>Message :</th>
<td>
<textarea name="message" placeholder="Message" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
  </tr>                           

  <tr>
    <th>Status :</th>
    <td>

   <select name="status" class="form-control wd-450" required="true" >
     <option value="Rejected" selected="true">Rejected</option>
     <option value="Sorted">Sort Listed</option>
   </select></td>
  </tr>
</table>
</div>
 <div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" name="submit" class="btn btn-primary">Update</button>
  
  </form>

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