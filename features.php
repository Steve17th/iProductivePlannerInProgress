<?php
    include_once 'header.php';
?>
    <!-- Features -->
    <?php
    if(isset($_SESSION["userId"])){
        echo "<a href=\"userHome.php\"><div style=\"margin-bottom:0px;\" class=\"menuNav\">
        <p><strong>Back</strong><i class=\"fa-solid fa-arrow-left\"></i></p>
        </div></a>";
    }else{
        echo"";
    }
    ?>
    <section class="features">
        <div class="container grid">
            <div class="login-text features flex-features">
                <h1>Features</h1>
                <p>iProductive Planner is a tool to help you manage your time more effectively, monitor your daily habits and work on those that need your attention, work with and manage team tasks more efficiently and up your productivity as a whole.</p>
                <div class="featureCards es1">
                    <div class="minicards">
                        <p><i class="fa-solid fa-people-group fa-2xl"></i>Work with teams</p>
                    </div>
                    <div class="minicards">
                       <p><i class="fa-regular fa-calendar fa-2xl"></i>Stay on top of your daily routines</p>
                    </div>
                    <div class="minicards">
                        <p><i class="fa-regular fa-clock fa-2xl"></i>Meet those deadlines</p>
                    </div>
                    <div class="minicards">
                        <p><i class="fa-regular fa-heart fa-2xl"></i>Monitor your well being</p>
                    </div>
                </div>
            </div>
            <div class="clock"></div>
        </div>
    </section>