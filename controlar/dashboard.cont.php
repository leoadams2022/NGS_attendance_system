<?php
session_start();
include '../clasess/Attendance_Class.php';
include '../clasess/Users_Class.php';
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
    $needTo = $_POST['needTo'];
    if($needTo === 'get_month_attendance' && isset( $_POST['Thismonth'])){
        $Attendance_Class = new Attendance_Class();
        $get_by_month =  $Attendance_Class->get_attendance_month_user($_POST['Thismonth'],$user_name,$id);
        $results = ['state'=> 'good','msg'=>'','url'=> '','respond'=>$get_by_month];
        echo json_encode($results);
    }elseif($needTo === 'get_cards_data'){
          $Users_Class = new Users_Class();
          $data = $Users_Class->get_cards_data($id);
          $results = ['state'=> 'good','msg'=>'','url'=> '','respond'=>$data];
          echo json_encode($results);
    }
}
