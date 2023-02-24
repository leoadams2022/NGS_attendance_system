<?php
session_start();
include '../clasess/Announcements_Class.php';
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
    if($_POST['needTo'] === 'get_msgs'){
        $Announcements_Class = new Announcements_Class();
        $get_msg =  $Announcements_Class->get_msgs_by_username($user_name);
        $users_class = new Users_Class();
        $user_data = $users_class->get_by_id($id);
        $user_campaign =  $user_data[0]['campaign'];
        $get_msg_campaign =  $Announcements_Class->get_msgs_by_campaign($user_campaign);
        if(!empty($get_msg)){
            $msgs_ids = [];
            foreach ($get_msg as $msg){
               $msg['id'];
               array_push($msgs_ids,$msg['id']);
            }
            $makeit_read =  $Announcements_Class->set_status_to_yes($msgs_ids);
            
            // $unread_cont=   $Announcements_Class->get_unread_msgs_count($user_name);
            // $results = ['state'=> 'good','msg'=> $msgs_ids,'url'=> '','respond'=>$get_msg];
            // echo json_encode($results);
        }
        if(!empty($get_msg_campaign)){
            $msgs_ids_campaign = [];
            foreach ($get_msg_campaign as $msg){
               $msg['id'];
               array_push($msgs_ids_campaign,$msg['id']);
            }
            $makeit_read_campaige =  $Announcements_Class->set_status_to_yes($msgs_ids_campaign);
            if(!empty($get_msg)){
                $all_data = array_merge($get_msg, $get_msg_campaign);
            }else{
                $all_data = $get_msg_campaign;
            }
            $results = ['state'=> 'good','msg'=>'','url'=> '','respond'=>$all_data];
            echo json_encode($results);
        }else{
            if(!empty($get_msg)){
                $results = ['state'=> 'good','msg'=> '','url'=> '','respond'=>$get_msg];
                echo json_encode($results);
            }else{
                $results = ['state'=> 'good','msg'=> 'No Messages found','url'=> '','respond'=>$get_msg];
                echo json_encode($results);
            }

            // $results = ['state'=> 'good','msg'=> 'No Messages found','url'=> '','respond'=>''];
        }
    }elseif($_POST['needTo'] ==='get_unread_count'){
        $Announcements_Class = new Announcements_Class();
        $users_class = new Users_Class();
        $user_data = $users_class->get_by_id($id);
        $user_campaign =  $user_data[0]['campaign'];
        $unread_cont=   $Announcements_Class->get_unread_msgs_count($user_name,$user_campaign);
        // $_SESSION['msgs_count'] = $unread_cont;
        print_r($unread_cont);
    }
}

