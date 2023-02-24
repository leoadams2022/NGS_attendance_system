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



if(isset( $_POST['timeZone'])&&isset($_POST['needTo'])){
    $needTo = $_POST['needTo'];
    if($needTo === 'in'){
        $timeZone = $_POST['timeZone'];
        $Attendance_Class = new Attendance_Class();
        //($timeZone='Etc/GMT-2',$user_name,$user_id)
        // $is_it_over =  $Attendance_Class->is_day_over('leoUS','9');
        $adding_time_in = $Attendance_Class->im_In($timeZone,$user_name,$id);
        if($adding_time_in['state'] === 'good'){
        $results = ['state'=> 'good','msg'=> $adding_time_in['msg'],'url'=> $adding_time_in['msg'],'respond'=>$adding_time_in['respond']];
        echo json_encode($results);
        }elseif($adding_time_in['state'] === 'bad'){
          $results = ['state'=> 'bad','msg'=> $adding_time_in['msg'],'url'=> '','respond'=>$adding_time_in['respond']];//$adding_time_in['respond']
          echo json_encode($results);
        }
    }elseif($needTo === 'out'){
        $timeZone = $_POST['timeZone'];
        $Attendance_Class = new Attendance_Class();
        $adding_time_out = $Attendance_Class->im_out($timeZone,$user_name,$id);
        // $is_it_over =  $Attendance_Class->is_day_over('leoUS','9');
        if($adding_time_out['state'] === 'good'){
          $results = ['state'=> 'good','msg'=> $adding_time_out['msg'],'url'=> $adding_time_out['msg'],'respond'=>$adding_time_out['respond']];
          echo json_encode($results);
        }elseif($adding_time_out['state'] === 'bad'){
          $results = ['state'=> 'bad','msg'=> $adding_time_out['msg'],'url'=> $adding_time_out['msg'],'respond'=>$adding_time_out['respond']];
          echo json_encode($results);
        }
      }
  }elseif(!isset( $_POST['timeZone'])&&isset($_POST['needTo'])){
    if($_POST['needTo'] === 'in' || $_POST['needTo'] === 'out'){
        $results = ['state'=> 'bad','msg'=> 'no timeZone in the POST','url'=> '','respond'=>''];
        echo json_encode($results);
    }
}


if(isset($_POST['attendance_csae'])&&isset($_POST['needTo'])){
  if($_POST['needTo'] === 'im_i_in_or_out'){
      $Attendance_Class = new Attendance_Class();
      $is_day_over = $Attendance_Class->is_day_over($user_name,$id);
      // if ther is no open day it will return 1 === true
      if($is_day_over === true){
          // you can hit im_in_btn
          $results = ['state'=> 'good','msg'=> 'no open day','url'=> '','respond'=>'show_#in_btn'];
          echo json_encode($results);
      }else{
          // you can hit im_out_btn
          $results = ['state'=> 'good','msg'=> 'there is an open day','url'=> '','respond'=>'show_#out_btn'];
          echo json_encode($results);
      }
  }

}

if(isset($_POST['get_attendance_log'])&&isset($_POST['needTo'])&&isset($_POST['Thismonth'])){
  if($_POST['needTo'] === 'get_attendance_log'){
    $users_class = new Users_Class();
    $in_out_timeing = $users_class->get_by_useranme($user_name,array('enter_time', 'leave_time'));
    $Attendance_Class = new Attendance_Class();
    $get_attendance_log_for_user = $Attendance_Class->get_attendance_month_user($_POST['Thismonth'],$user_name,$id);
    if($get_attendance_log_for_user === 'no data'){
      $results = ['state'=> 'bad','msg'=> 'there is no attendance log found','url'=> '','respond'=>''];
      echo json_encode($results);
    }else{
      $results = ['state'=> 'good','msg'=> $in_out_timeing ,'url'=> '','respond'=>$get_attendance_log_for_user];
      echo json_encode($results);
    }
  }
}

/*

  */