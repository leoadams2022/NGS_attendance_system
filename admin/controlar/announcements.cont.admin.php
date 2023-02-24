<?php
session_start();
include '../../clasess/Announcements_Class.php';
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
    if($_POST['needTo'] === 'get_msgs'){
        $Announcements_Class = new Announcements_Class();
        $get_msg =  $Announcements_Class->get_all_msgs_admin();
        if(!empty($get_msg)){
            $results = ['state'=> 'good','msg'=> '','url'=> '','respond'=>$get_msg];
            echo json_encode($results);
        }else{
            $results = ['state'=> 'good','msg'=> 'No Messages found','url'=> '','respond'=>''];
            echo json_encode($results);
        }
    }elseif($_POST['needTo'] ==='update_msg'){
        $Announcements_Class = new Announcements_Class();
        $update_msg=   $Announcements_Class->update_msg_admin($_POST['msg_id'],$_POST['new_msg']);
        $results = ['state'=> 'good','msg'=> '','url'=> '','respond'=>$update_msg];
        echo json_encode($results);
        // print_r($update_msg);
    }elseif($_POST['needTo'] ==='delete_msg'){
        $Announcements_Class = new Announcements_Class();
        $update_msg=   $Announcements_Class->delete_msg_admin($_POST['msg_id']);
        $results = ['state'=> 'good','msg'=> '','url'=> '','respond'=>$update_msg];
        echo json_encode($results);
        // print_r($update_msg);
    }elseif($_POST['needTo'] ==='get_all_agints'){
        // echo 'hi there';
        $users_class = new Users_Class();
        $fields= array('id', 'first_name', 'last_name', 'user_name', 'campaign');
        $all_agints = $users_class->get_all_agints($fields);
        $all_campaigns = $users_class->get_all_campagins();
        if(!empty($all_agints)){
            $results = ['state'=> 'good','msg'=> $all_campaigns,'url'=> '','respond'=>$all_agints];
            echo json_encode($results);
        }else{
            $results = ['state'=> 'good','msg'=> 'no agints were found','url'=> '','respond'=>''];
            echo json_encode($results);
        }
    }elseif($_POST['needTo'] ==='send_msg'){
        // echo 'hi there';
        $Announcements_Class = new Announcements_Class();
        if($_POST['sendTo']==='resipients'){
            if(!empty($_POST['msg']) && !empty($_POST['resipientsArray'])){
                $send_msg = $Announcements_Class->add_msg_by_recipients($user_name,$_POST['msg'],$_POST['resipientsArray']);
                $results = ['state'=> 'good','msg'=> 'message sent','url'=>'','respond'=>$send_msg];
                echo json_encode($results);
            }else{
                $results = ['state'=> 'bad','msg'=> 'Plase Enter a Message and select resipients','url'=>'','respond'=>''];
                echo json_encode($results);
            }
        }elseif($_POST['sendTo']==='campaign'){
            if(!empty($_POST['msg']) && !empty($_POST['resipientsArray'])){
                $send_msg = $Announcements_Class->add_msg_by_campaign($user_name,$_POST['msg'],$_POST['resipientsArray']);
                $results = ['state'=> 'good','msg'=> 'message sent','url'=>'','respond'=>$send_msg];
                echo json_encode($results);
            }else{
                $results = ['state'=> 'bad','msg'=> 'Plase Enter a Message and select campaign','url'=>'','respond'=>''];
                echo json_encode($results);
            }
        }
    }
    
}

