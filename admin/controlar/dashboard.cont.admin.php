<?php
session_start();
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
        $agints= $users_class->get_all_agints();
        $results = ['state'=> 'good','msg'=> 'here is all the agints','url'=> '','respond'=>$agints];
        echo json_encode($results);
    }elseif($_POST['needTo'] === 'upadate_agints_data'){
        $users_class = new Users_Class();
        //CTSD stands for => campaign	target	salary	dedication
        if(isset($_POST['campaign'])&&isset($_POST['target'])&&isset($_POST['salary'])&&isset($_POST['dedication'])&&isset($_POST['agint_id'])&&isset($_POST['in_time'])&&isset($_POST['out_time'])){
            $values = ['campaign'=> $_POST['campaign'],'target'=> $_POST['target'],'salary'=> $_POST['salary'],'dedication'=> $_POST['dedication'],'in_time'=>$_POST['in_time'],'out_time'=>$_POST['out_time']];
            $update= $users_class->update_agint_CTSD($_POST['agint_id'],$values);
            $results = ['state'=> 'good','msg'=> $update,'url'=> '','respond'=>''];
            echo json_encode($results);
        }
    }
}