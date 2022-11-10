<?php

if(isset($_POST['setTask'])){
    $title = $_POST['taskTitle'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $taskDesription= $_POST['taskDescription'];
    

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyTaskFields($title, $startTime, $endTime)!== false){
        header("location: ../newTasks.php?error=notaskinformation");
        exit();
    }
    if(timeError($startTime, $endTime) !== false){

        header("location: ../newTasks.php?error=task_durationError");
        exit();
    }
    
    // $userId = $_SESSION['userId'];
    createTask($conn, $title, $startTime, $endTime,$taskDesription);

}else{
    header("location: ../index.php");
    exit();
} 