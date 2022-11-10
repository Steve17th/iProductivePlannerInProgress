<?php
    require_once 'header.php';
?>

<section>
<div class="menuNav" onclick="openDashboard()">
        <p><strong>Back</strong><i class="fa-solid fa-arrow-left"></i></p>
</div>
<div style="width:750px; height:700px; margin-bottom:15px;" class="newtask signup cardEnt">
     <h2>Create task </h2>
        <form action='/includes/setTask.inc.php' method="POST">
            <div class="login-form">
                <input type="text" name="taskTitle" placeholder="Title"required>
            </div>
            <div class="login-form">
                <label for="startTime">Start Time</label>
                <input style="background-color:#fff; font-family: Georgia, 'Times New Roman', Times, serif;" type="datetime-local" name="startTime" required>
                <label for="endTime">End Time</label>
                <input style="background-color:#fff; font-family: Georgia, 'Times New Roman', Times, serif;" type="datetime-local" name="endTime" required>
            </div>
            <div class="login-form">
                <textarea name="taskDescription" class="taskDescription help-input" placeholder="What is the task about?"></textarea>
            </div>
            <div class="login-form">
                <!-- <label class="switch">Do you want to add submittables for this task?</label>
                <input name="submittable" type="checkbox"> -->
                <!-- <span class="slider round"></span> -->
            </div>
            <input type="submit" name="setTask" value="Set Task" class="btn signupbtn">
        </form>
        <div class="errormsg">
    <?php
        if(isset($_GET["error"])){
            if($_GET['error']== "notaskinformation"){
                echo"<p style=\"color:red;\"><strong>Fill in all the fields...</strong></p>";
            }else if($_GET['error']=="task_durationError"){
                echo"<p style=\"color:red;\"><strong>The deadline cannot be before the starting date... </strong></p>";
            }
        }
    ?>
    </div>
    <script src="/js/sidenav.js"></script>
</div>
</section>