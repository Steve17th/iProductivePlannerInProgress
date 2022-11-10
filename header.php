<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://fontawesome.com/releases/v5.15/css/all.css"/> -->
    <link rel="shortcut icon" type="image/png" href="/imgs/icon.PNG">
    <script src="https://kit.fontawesome.com/bca93550b9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/utilities.css">
    <link rel="stylesheet" href="/css/styles.css">
    <script defer src="/js/activePage.js"></script>
    <title>iProductive | Seamless Productivity</title>
</head>
<body>
    <!-- Navbar -->
    <section class="navbar-main">
        <div class="container flex">
        <?php
            if (isset($_SESSION["userId"])){
                echo "<a href=\"userHome.php\"><h1 class=\"logo prim-txt\">iProductive Planner</h1></a>";
                echo "<a href=\"userHome.php\"><p style=\"color:white;\">Welcome, <strong> ". $_SESSION["userName"] . "</strong></p></a>";
            }else{
                echo "<a href=\"index.php\"><h1 class=\"logo prim-txt\">iProductive Planner</h1></a>";
            }
        ?>
            <nav>
                <ul class="navbar">
                    <?php
                        if (isset($_SESSION["userId"])){
                            echo "<li> <a>Put completion percentage here...</a></li>";
                            echo "<li> <a href=\"features.php\">Features</a></li>";
                            // echo "<li> <a href=\"/includes/logout.inc.php\">Log Out</a></li>";
                        }else{
                            echo "<li> <a href=\"index.php\">Home</a></li>";
                            echo "<li> <a href=\"features.php\">Features</a></li>";
                            echo "<li> <a href=\"help.php\">Help</a></li>";
                        }
                    ?>
                </ul>
            </nav>
        </div>
    </section>
</body>
</html>