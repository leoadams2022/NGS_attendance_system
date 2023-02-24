<?php
include '../clasess/Users_Class.php';
if(isset($_POST['firstName'])&&isset($_POST['lastName'])&&isset($_POST['email'])&&isset($_POST['userName'])&&isset($_POST['gender'])&&isset($_POST['phone'])&&isset($_POST['address'])&&isset($_POST['password'])){
    $usercalss = new Users_Class;
    $Validate = $usercalss->Validate_sgin_up($_POST['firstName'],$_POST['lastName'],$_POST['email'],$_POST['userName'],$_POST['gender'],$_POST['phone'],$_POST['address'],$_POST['password']);
    if($Validate == 'allGood'){
         $adding = $usercalss->adding_user($_POST['firstName'],$_POST['lastName'],$_POST['email'],$_POST['userName'],$_POST['gender'],$_POST['phone'],$_POST['address'],$_POST['password']);
        if($adding['state'] === 'good'){
            $results = ['state'=> 'good','msg'=> $adding['msg'],'url'=> 'sgin_in.php','respond'=>''];
            echo json_encode($results);
        }else{
            $results = ['state'=> 'bad','msg'=> $adding['msg'],'url'=> '','respond'=>''];
            echo json_encode($results);
        }
    }else{
        $results = ['state'=> 'bad','msg'=> $Validate,'url'=> '','respond'=>''];
        echo json_encode($results);
    } 
}else{
   $results = ['state'=> 'bad','msg'=> 'a POST Var is not set','url'=> '','respond'=>''];
   echo json_encode($results);
}