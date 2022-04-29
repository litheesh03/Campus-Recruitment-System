<?php
error_reporting(0);
?> 
<div class="navbar navbar-expand d-flex navbar-dark justify-content-between bd-navbar blue accent-3 shadow">
        <div class="relative">
            <div class="d-flex">
                <div>
                    <a href="#" data-toggle="offcanvas" class="paper-nav-toggle pp-nav-toggle">
                        <i></i>
                    </a>
                </div>
                <div class="d-none d-md-block">
                    <h1 class="nav-title text-white">Dashboard</h1>
                </div>
            </div>
        </div>
        <!--Top Menu Start -->
<div class="navbar-custom-menu p-t-10">
    <ul class="nav navbar-nav">
       <?php
        $cid=$_SESSION['crmscid'];       
$ret1=mysqli_query($con,"select tblapplyjob.ID,tbluser.FullName from tblapplyjob join tbluser on tbluser.ID=tblapplyjob.UserId join tblvacancy on tblvacancy.ID=tblapplyjob.JobId where tblapplyjob.Status is null and tblvacancy.CompanyID='$cid' ");
$num=mysqli_num_rows($ret1);

?>
        <!-- Notifications -->
        <li class="dropdown custom-dropdown notifications-menu">
            <a href="#" class=" nav-link" data-toggle="dropdown" aria-expanded="false">
                <i class="icon-notifications "></i>
                <span class="badge badge-danger badge-mini rounded-circle"><?php echo $num;?></span>
            </a>
            <ul class="dropdown-menu">
                <li class="header">You have <?php echo $num;?> notifications</li>
                <li>
                    
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                        <li>
                            <?php if($num>0){
while($result=mysqli_fetch_array($ret1))
{
?>
                           
<a class="dropdown-item" href="new-applications.php?viewid=<?php echo $result['ID'];?>"><i class="icon icon-data_usage text-success"></i>New Application Received from <?php echo $result['FullName'];?></a>
<
                </li>
<?php } }  else {?>
  <li>  No New Application Received</li>
        <?php } ?>
                        </li>
                       
                       
                    </ul>
                </li>
                <li class="footer p-2 text-center"><a href="all-applications.php">View all</a></li>
            </ul>
        </li>
       
     
        <!-- User Account-->
        <li class="dropdown custom-dropdown user user-menu">
            <a href="#" class="nav-link" data-toggle="dropdown">
                <img src="assets/img/dummy/image.png" class="user-image" alt="User Image">
            </a>
            <div class="dropdown-menu p-4">
                <div class="row box justify-content-between my-4">
                    <div class="col">
                        <a href="company-profile.php">
                            <i class="icon-apps purple lighten-2 avatar  r-5"></i>
                            <div class="pt-1">Profile</div>
                        </a>
                    </div>
                    <div class="col"><a href="change-password.php">
                        <i class="icon-beach_access pink lighten-1 avatar  r-5"></i>
                        <div class="pt-1">Settings</div>
                    </a></div>
                    <div class="col">
                        <a href="logout.php">
                            <i class="icon-perm_data_setting indigo lighten-2 avatar  r-5"></i>
                            <div class="pt-1">Logout</div>
                        </a>
                    </div>
                </div>
               
               
            </div>
        </li>
    </ul>
</div>
    </div>