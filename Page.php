<?php
include 'compo/head.php';
/************  Dont forget you have acsess to ****************
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
*/
?>
<title>Page Tamplate</title>
</head>
<?php
include 'compo/navbar.php';
?>
<!-- <div class="height-100 bg-light"> -->
<div class="container">
    <H1><?php echo $first_name?></H1>
    <H1><?php echo $last_name?></H1>
    <H1><?php echo $email?></H1>
    <H1><?php echo $gender?></H1>
    <H1><?php echo $phone?></H1>
    <H1><?php echo $user_name?></H1>
    <H1><?php echo $id?></H1>
    <H1><?php echo $password?></H1>
    <H1><?php echo $address?></H1>
    <H1><?php echo $rank?></H1>
    <H1><?php echo $campaign?></H1>

    <H1><?php echo $education?></H1>
    <H1><?php echo $experience?></H1>
    <H1><?php echo $created_at?></H1>
    
    
<?php
include 'compo/foot.php';
?>