<aside class="main-sidebar fixed offcanvas shadow">
    <section class="sidebar">
        <div class="w-80px mt-3 mb-3 ml-3">
<h2 align="center">CRMS</h2>
        </div>
        <div class="relative">
            <a data-toggle="collapse" href="#userSettingsCollapse" role="button" aria-expanded="false"
               aria-controls="userSettingsCollapse" class="btn-fab btn-fab-sm fab-right fab-top btn-primary shadow1 ">
                <i class="icon icon-cogs"></i>
            </a>
            <div class="user-panel p-3 light mb-2">
                <div>
<?php
$uid=$_SESSION['crmsuid'];
$ret=mysqli_query($con,"select FullName,Image from tbluser where ID='$uid'");
$row=mysqli_fetch_array($ret);
$name=$row['FullName'];
$pimage=$row['Image'];
?>

                    <div class="float-left image">
<img class="user_avatar" src="images/<?php echo $pimage;?>" alt="<?php echo $name;?>">
                    </div>
                    <div class="float-left info">
   
                        <h6 class="font-weight-light mt-2 mb-1"></h6>
                        <a href="user-profile.php"><i class="icon-circle text-primary blink"></i> Online</a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="collapse multi-collapse" id="userSettingsCollapse">
                    <div class="list-group mt-3 shadow">
                        <a href="user-profile.php" class="list-group-item list-group-item-action ">
                            <i class="mr-2 icon-umbrella text-blue"></i>Profile
                        </a>
                        <a href="change-password.php" class="list-group-item list-group-item-action"><i
                                class="mr-2 icon-cogs text-yellow"></i>Settings</a>
                        <a href="logout.php" class="list-group-item list-group-item-action"><i
                                class="mr-2 icon-security text-purple"></i>Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <ul class="sidebar-menu">
            
            <li class="treeview"><a href="dashboard.php">
                <i class="icon icon-sailing-boat-water purple-text s-18"></i> <span>Dashboard</span> 
            </a>
                
            </li>
            <li class="treeview"><a href="#">
                <i class="icon icon icon-package blue-text s-18"></i>
                <span>Fill Education Form</span>
                
            </a>
                <ul class="treeview-menu">
                    <li><a href="add-education-detail.php"><i class="icon icon-circle-o"></i>Add Detail</a>
                    </li>
                    <li><a href="manage-education-detail.php"><i class="icon icon-add"></i>Manage Manage Detail </a>
                    </li>
                </ul>
            </li>
            <li class="treeview"><a href="view-vacancy.php">
                <i class="icon icon-documents3 text-red s-18"></i>
                <span>View Vacancy</span>
                
            </a>
                
            </li>
            <li class="treeview"><a href="histroy-applied-job.php">
                <i class="icon icon-bar-chart2 pink-text s-18"></i>
                <span>History of Applied Job</span>
                
            </a>
                
            </li>
            
            <li class="treeview no-b"><a href="#">
                <i class="icon icon-package light-green-text s-18"></i>
                <span>Reports</span>
               
            </a>
                <ul class="treeview-menu">
                    <li><a href="between-dates-reports.php"><i class="icon icon-circle-o"></i>B/w Dates Reports</a>
                    </li>
                                   </ul>
            </li>

            <li class="treeview"><a href="search-job.php">
                <i class="icon-search3 light-green-text s-18"></i>
                <span>Search Job</span>
                
            </a> 
            </li>
<li class="treeview"><a href="../index.php">
                <i class="icon-long-arrow-left"></i>
                <span>Back to home page</span>
                
            </a> 
            </li>


        </ul>
    </section>
</aside>