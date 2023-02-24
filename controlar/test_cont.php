<?php
session_start();
include '../clasess/Announcements_Class.php';
/************  Dont forget you have acsess to ****************
            $_SESSION["id"];
            $_SESSION["first_name"] ;
            $_SESSION["last_name"] ;
            $_SESSION["email"];
            $_SESSION["user_name"];
            $_SESSION["gender"];
            $_SESSION["phone"] ;
            $_SESSION["address"];
            $_SESSION["rank"]; 
*/
$id =  $_SESSION["id"];
$first_name = $_SESSION["first_name"] ;
$last_name = $_SESSION["last_name"] ;
$email = $_SESSION["email"];
$user_name = $_SESSION["user_name"];
$gender = $_SESSION["gender"];
$phone = $_SESSION["phone"] ;
$address = $_SESSION["address"];
$rank = $_SESSION["rank"];
$campaign = $_SESSION['campaign'];

$Announcements_Class = new Announcements_Class();
$recipients_array = array('leoUS');//'leoUS','leoUS','leoUS','leoUS','leoUS','leoUS','leoUS'

$msg = 'this is a test mesg for leoUS 12.23';
// $add_msg =  $Announcements_Class->add_msg_by_campaign($user_name,$msg,'camp1');
$add_msg =  $Announcements_Class->add_msg_by_recipients($user_name,$msg,$recipients_array);
// $get_msg =  $Announcements_Class->get_msgs_by_username($user_name);
// print_r($get_msg);
echo json_encode($add_msg);
