<?php
    include_once 'header.php';

?>

<html>
    <div id="mySidenav" class="sidenav">
        <div class="topclosebtn"></div>
        <a href="profile.php"><i style="padding-left: 5px;" class="fa-solid fa-user"></i></i>Profile</a>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i style="padding-left: 5px;"class="fa-solid fa-arrow-left"></i>My Dashboard</a>
        <a href="newTasks.php">New Task<i style="padding-left: 5px;" class="fa-solid fa-forward"></i></a>
        <a href="#">Work with Teams<i style="padding-left: 5px;" class="fa-solid fa-people-group"></i></a>
        <a href="#">Daily Routine<i style="padding-left: 5px;" class="fa-regular fa-calendar"></i></a>
        <a href="#">Healthy Habits<i style="padding-left: 5px;" class="fa-regular fa-heart"></i></a>
        <a href="/includes/logout.inc.php" onclick="verifyLogout()">Log Out <i style="padding-left: 5px;" class="fa-regular fa-circle-xmark"></i></a> 
    </div>
    <!-- Use any element to open the sidenav -->
    <div class="menuNav" onclick="openNav()">
        <p><strong>Menu</strong><i class="fa-solid fa-arrow-right"></i></p>
    </div>
    <script src="/js/sidenav.js"></script>

</html>