<?php
session_start();
include '../../clasess/Attendance_Class.php';
include '../../clasess/Users_Class.php';
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


if(isset($_POST['needTo'])){
    if($_POST['needTo'] === 'get_all_agints'){
        $users_class = new Users_Class();
        $fields= array('id', 'first_name', 'last_name', 'user_name', 'campaign');
        $agints= $users_class->get_all_agints($fields);
        $results = ['state'=> 'good','msg'=> 'here is all the agints','url'=> '','respond'=>$agints];
        echo json_encode($results);
    }elseif($_POST['needTo'] === 'update_entry'){
        $attendance_class = new Attendance_Class();
        $update_entry = $attendance_class->update_entry($_POST['entry_id'],$_POST['new_inTime'],$_POST['new_outTime']);
        $results = ['state'=> 'good','msg'=> $update_entry,'url'=> '','respond'=> ''];
        echo json_encode($results);
    }
}