<!-- /************  Dont forget you have acsess to ****************
            $id =  $_SESSION["id"];
            $first_name = $_SESSION["first_name"] ;
            $last_name = $_SESSION["last_name"] ;
            $email = $_SESSION["email"];
            $user_name = $_SESSION["user_name"];
            $gender = $_SESSION["gender"];
            $phone = $_SESSION["phone"] ;
            $address = $_SESSION["address"];
            $rank = $_SESSION["rank"]; 
*/ -->
<body className='snippet-body'>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>
        <div class="header_img" id="header_img_div">
            <!-- profile image https://i.imgur.com/hczKIze.jpg -->
            <a href="<?=ROOT?>profile.php">
                <img src="<?php
                if(file_exists('images/'. $user_name .'_profile_image.jpg')){
                    echo ROOT . 'images/'. $user_name .'_profile_image.jpg?t='.time();
                }else{
                    if($gender === 'male'){
                        echo ROOT . 'images/male.png?t='.time();
                    }else{
                        echo ROOT . 'images/female.png?t='.time();
                    }
                }
                ?>" alt="">
            </a>
        </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav nav_bar">
            <div>
                <a title="NGS" href="<?=ROOT?>Dashboard.php" class="nav_logo">
                    <!-- <i class='bx bx-layer nav_logo-icon'></i> -->
                    <img class='nav_logo-icon' src="https://i.postimg.cc/FHhcxPQW/NGSLogo-removebg-White.png" alt="NGS_icon">
                    <span class="nav_logo-name">NGS</span>
                </a>
                <div class="nav_list "> 
                    <a title="Dashboard" href="<?=ROOT?>Dashboard.php" class="nav_link ">
                        <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Dashboard</span>
                    </a> 
                    <a title="<?=$first_name.' '.$last_name?>" href="<?=ROOT?>profile.php" class="nav_link">
                        <i  class='bx bx-user nav_icon'></i>
                        <span class="nav_name"><?=$first_name.' '.$last_name?></span>
                    </a>
                    <a title="Announcements" href="<?=ROOT?>announcements.php" class="nav_link">
                        <i class='bx bx-message-square-detail nav_icon'><span id="msgs_count"></span></i>
                        <span class="nav_name">Announcements</span>
                    </a>
                    <a title="attendance" href="<?=ROOT?>attendance.php" class="nav_link">
                        <i class='bx bx-time-five nav_icon'></i>
                        <span class="nav_name">attendance</span>
                    </a>
                    <a title="Tools" href="<?=ROOT?>tools.php" class="nav_link">
                        <i class='bx bxs-component nav_icon'></i>
                        <span class="nav_name">Tools</span>
                    </a>
                    <!-- <a title="Sales" href="<?=ROOT?>sales.php" class="nav_link">
                        <i class='bx bx-list-check nav_icon'></i>
                        <span class="nav_name">Sales</span>
                    </a> -->
                </div>
            </div> 
            <a title="SignOut" href="<?=ROOT?>sgin_out.php" class="nav_link">
                <i class='bx bx-log-out nav_icon'></i>
                <span class="nav_name">SignOut</a></span>
            </a>
        </nav>
    </div>