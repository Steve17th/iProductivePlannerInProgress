<?php

function emptyInputSignUp($name, $email, $password, $repeatpassword){
    $result;
    if(empty($name) || empty($email) || empty($password) || empty($repeatpassword)){
        $result =true;
    }else{
        $result=false;
    }
    return $result;
}

function invalidUserId($email){
    $result;
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result =false;
    }else{
        $result=true;
    }
    return $result;
}

function pwdMatch($password, $repeatpassword){
    $result;
    if($password !== $repeatpassword){
        $result =true;
    }else{
        $result=false;
    }
    return $result;
}

function emailExists($conn, $name, $email){
    $sql = "SELECT * FROM users WHERE usersEmail = ? OR usersName = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php/error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $email, $name);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
       $result = false;
       return $result; 
    }

    mysqli_stmt_close($stmt);
}



function createUser($conn, $name, $email, $password){
    $sql = "INSERT INTO users (usersName, usersEmail, usersPwd) VALUES (?, ?, ? );";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php/error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);

    header("location: ../signup.php/error=none");
    exit();

    mysqli_stmt_close($stmt);
}

function emptyInputLogin($name, $email, $password){
    $result;
    if(empty($name) || empty($email) || empty($password)){
        $result =true;
    }else{
        $result=false;
    }
    return $result;
}

function loginUser($conn, $name, $email, $password){
    $emailExists = emailExists($conn, $name, $email);

    if($emailExists === false){
        header("location: ../index.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $emailExists["usersPwd"];
    $checkPwd = password_verify($password, $pwdHashed);

    if($checkPwd === false){
        header("location: ..index.php?error=wronglogin");
    }else if ($checkPwd == true){
        session_start();
        $_SESSION["userId"] = $emailExists["usersId"];
        $_SESSION["userEmail"] = $emailExists["usersEmail"];
        $_SESSION["userName"] = $emailExists["usersName"];
        header("location: ../userHome.php");
        exit();
    }
}

function emptyTaskFields($title, $startTime, $endTime){
    $result;
    if(empty($title) || empty($startTime) || empty($endTime)){
        $result =true;
    }else{
        $result=false;
    }
    return $result;
}

function timeError($startTime, $endTime){
    $result;

    $timeDiff = date_diff(date_create($startTime),date_create($endTime));
    $diff = $timeDiff ->format('%h');
    if($diff >0){
        $result = true;
    }else{
        $result = false;
    }
    return $result;

}

//       // Calculates the difference between DateTime objects
//   $interval = date_diff($datetime1, $datetime2);
 
//   // Printing result in years & months format
//   echo $interval->format('%R%y years %m months');
// 


function createTask($conn, $title, $startTime, $endTime, $taskDescription){
    $sql = "INSERT INTO tasks (taskTitle, startTime, endTime, taskDescription) VALUES (?, ?, ?, ?);";   
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../newTask.php?error=stmtfailed". mysqli_error($conn));
        exit();
    }


    mysqli_stmt_bind_param($stmt, "ssss", $title, $startTime, $endTime, $taskDescription);
    mysqli_stmt_execute($stmt);
    
    $error=mysqli_error($conn);

    header("location: ../profile.php?task_created". $error);
    exit();

    mysqli_stmt_close($stmt);
    
}

function viewTasks($conn, $startTime, $endTime){
    $duration = timeError($startTime, $endTime);


}
