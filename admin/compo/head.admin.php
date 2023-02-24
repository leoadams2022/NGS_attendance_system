<?php
session_start();
include('config.admin.php');
if(isset($_SESSION["user_name"])){
  /*                    $_SESSION["id"] = $user['id'];
                        $_SESSION["first_name"] = $user['first_name'];
                        $_SESSION["last_name"] = $user['last_name'];
                        $_SESSION["email"] = $user['email'];
                        $_SESSION["user_name"] = $user['user_name'];
                        $_SESSION["gender"] = $user['gender'];
                        $_SESSION["phone"] = $user['phone'];
                        $_SESSION["address"] = $user['address'];
                        $_SESSION["password"] = $user['password'];
                        $_SESSION["campaign"] = $user['campaign'];
                        $_SESSION["rank"] = $user['rank'];
                        $_SESSION["education"] = $user['education'];
                        $_SESSION["experience"] = $user['experience'];
                        $_SESSION["created_at"] = $user['created_at'];*/
    $id =  $_SESSION["id"];
    $first_name = $_SESSION["first_name"] ;
    $last_name = $_SESSION["last_name"] ;
    $email = $_SESSION["email"];
    $user_name = $_SESSION["user_name"];
    $gender = $_SESSION["gender"];
    $phone = $_SESSION["phone"] ;
    $address = $_SESSION["address"];
    $password =  $_SESSION["password"];
    $rank = $_SESSION["rank"];
    $campaign = $_SESSION['campaign'];
    $education = $_SESSION["education"];
    $experience = $_SESSION["experience"];
    $created_at = $_SESSION["created_at"];
}else{
    $link = $_SERVER['REQUEST_URI'];// '/MyProject/LoginAgain/pageName.php'
    if($link === '/MyProject/LoginAgain/sgin_in.php' || $link === '/MyProject/LoginAgain/sgin_up.php'){
             // do nothing
    }else{
      header('location: sgin_in.php');
    }
}
?>
<!-- <!doctype html> -->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <!-- page icon  -->
    <link rel="icon" type="image/x-png" href="https://i.postimg.cc/FHhcxPQW/NGSLogo-removebg-White.png">
    <!--bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- jquery js  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- jquery.dataTables js -->
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <!-- jquery.dataTables css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <!-- for the nav bar -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
    <!-- for the nav bar -->
    <!-- popup lib  css -->
    <link href="//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css" type="text/css" rel="stylesheet" />
    <!-- popup lib  js -->
    <script src="//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
    <style>
          ::-webkit-scrollbar {
            width: 8px;
          }

          /* Track */
          ::-webkit-scrollbar-track {
            background: #f1f1f1;
          }

          /* Handle */
          ::-webkit-scrollbar-thumb {
            background: #888;
          }

          /* Handle on hover */
          ::-webkit-scrollbar-thumb:hover {
            background: #555;
          }

          @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

          :root {
            --header-height: 3rem;
            --nav-width: 68px;
            --first-color: #4723D9;
            --first-color-light: #AFA5D9;
            --white-color: #F7F6FB;
            --body-font: 'Nunito', sans-serif;
            --normal-font-size: 1rem;
            --z-fixed: 100
          }

          *,
          ::before,
          ::after {
            box-sizing: border-box
          }

          body {
            position: relative;
            margin: var(--header-height) 0 0 0;
            padding: 0 1rem;
            font-family: var(--body-font);
            font-size: var(--normal-font-size);
            transition: .5s
          }

          a {
            text-decoration: none
          }

          .header {
            width: 100%;
            height: var(--header-height);
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1rem;
            background-color: var(--white-color);
            z-index: var(--z-fixed);
            transition: .5s
          }

          .header_toggle {
            color: var(--first-color);
            font-size: 1.5rem;
            cursor: pointer
          }

          .header_img {
            width: 35px;
            height: 35px;
            display: flex;
            justify-content: center;
            border-radius: 50%;
            overflow: hidden
          }

          .header_img img {
            width: 40px
          }

          .l-navbar {
            position: fixed;
            top: 0;
            left: -30%;
            width: var(--nav-width);
            height: 100vh;
            background-color: var(--first-color);
            padding: .5rem 1rem 0 0;
            transition: .5s;
            z-index: var(--z-fixed)
          }

          .nav.nav_bar{
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden
          }

          .nav_logo,
          .nav_link {
            display: grid;
            grid-template-columns: max-content max-content;
            align-items: center;
            column-gap: 1rem;
            padding: .5rem 0 .5rem 1.5rem
          }

          .nav_logo {
            margin-bottom: 2rem
          }

          .nav_logo-icon {
            font-size: 1.25rem;
            color: var(--white-color)
          }

          .nav_logo-name {
            color: var(--white-color);
            font-weight: 700
          }

          .nav_link {
            position: relative;
            color: var(--first-color-light);
            margin-bottom: 1.5rem;
            transition: .3s
          }

          .nav_link:hover {
            color: var(--white-color)
          }

          .nav_icon {
            font-size: 1.25rem
          }

          .show {
            left: 0
          }

          .body-pd {
            padding-left: calc(var(--nav-width) + 1rem)
          }

          .active {
            color: var(--white-color)
          }

          .active::before {
            content: '';
            position: absolute;
            left: 0;
            width: 2px;
            height: 32px;
            background-color: var(--white-color)
          }

          .height-100 {
            height: 100vh
          }

          @media screen and (min-width: 768px) {
            body {
              margin: calc(var(--header-height) + 1rem) 0 0 0;
              padding-left: calc(var(--nav-width) + 2rem)
            }

            .header {
              height: calc(var(--header-height) + 1rem);
              padding: 0 2rem 0 calc(var(--nav-width) + 2rem)
            }

            .header_img {
              width: 40px;
              height: 40px
            }

            .header_img img {
              width: 45px
            }

            .l-navbar {
              left: 0;
              padding: 1rem 1rem 0 0
            }

            .show {
              width: calc(var(--nav-width) + 156px)
            }

            .body-pd {
              padding-left: calc(var(--nav-width) + 188px)
            }
          }
          img.nav_logo-icon {
              max-width: 25px;
              max-height: 35px;
          }
          span.nav_name {
              text-transform: capitalize;
          }
          body > div.container{
              padding-top: 1rem;
          }
          body > div.dashboard_page{
              padding-top: 5rem !important;
          }
         /* Start by setting display:none to make this hidden.
        Then we position it in relation to the viewport window
        with position:fixed. Width, height, top and left speak
        speak for themselves. Background we set to 80% white with
        our animation centered, and no-repeating */
      .modal {
          display:    none;
          position:   fixed;
          z-index:    1000;
          top:        0;
          left:       0;
          height:     100%;
          width:      100%;
          background: rgba( 255, 255, 255, .8 ) 
                      url('https://media.tenor.com/joLYNfFQGDgAAAAi/loading.gif') 
                      50% 50% 
                      no-repeat;
      }

      /* When the body has the loading class, we turn
        the scrollbar off with overflow:hidden */
      body.loading {
          overflow: hidden;   
      }

      /* Anytime the body has the loading class, our
        modal element will be visible */
      body.loading .modal {
          display: block;
      }
	  </style>