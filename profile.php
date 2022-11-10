<?php
    include_once 'header.php';
    include_once './includes/dbh.inc.php';
    include_once './includes/functions.inc.php';
?>
<html>
    <div id="mySidenav" class="sidenav">
        <div class="topclosebtn"></div>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i style="padding-left: 5px;" class="fa-solid fa-user"></i></i>Profile</a>
        <a href="userHome.php"><i style="padding-left: 5px;"class="fa-solid fa-arrow-left"></i>My Dashboard</a>
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
    <div class="profileTasks cardEnt">
        <h2>Your Tasks</h2>
        <div class= "taskHeaders">
            <h4 style="display: flex;">
                <div style="margin-right: 170px;">Title</div> <div style="margin-right: 140px;">Deadline</div> <div style="margin-right: 100px;">Time Left</div>
            </h4>
        </div>
        <div style="color:#fff;" class="tasks">
        <?php
                
                

                $sql = "SELECT * FROM tasks;";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if($resultCheck > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $startTime = date("Y-m-d H:i:s");
                        $endTime =$row['endTime'];
                        $time = date_diff(date_create($startTime),date_create($endTime));
                        $dur = $time ->format('%a Days and %h hours');
                        $titles = $row['taskTitle'];
                        $deadline = $row['endTime'];
                        $description = $row['taskDescription'];
                        echo "<div><p class=\"taskDisplay\" style=\"padding:10px;\"> <span style=\"width:20px; margin-right: 20px;\">".  $titles .":
                         </span><span style=\"width:20px; margin-right: 20px; \">" .$deadline ." </span><span style=\"width:20px; margin-right: 20px; \">". $dur ."</span> <span class=\"hide\" style=\"display: none;\">" .$description."</span>
                         
                            <input style=\"background-color: green; margin-right:20px;\" type=\"submit\" name=\"editTask\" value=\"Edit\" class=\"btn signupbtn\"> 
                            <input style=\"background-color: red;\" type=\"submit\" formaction=\"./includes/delete.inc.php\" name=\"deleteTask\" value=\"Delete\" class=\"btn signupbtn\">
                         
                         <br/></p></div>"; 
                         
                        // echo 
                    }
                }else{
                    echo "<h2 style=\"margin-right: 50px;\">Nothing to see here... You seem to be free for the day!</h2>";
                }
        ?></div>
    </div>
    <script src="/js/sidenav.js"></script>
</html>
