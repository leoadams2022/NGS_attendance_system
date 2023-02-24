<?php
include '../clasess/Users_Class.php';
if(isset( $_POST['username'])){
    $usercalss = new Users_Class;
    $Validate = $usercalss->Validate_sgin_in($_POST['username'],$_POST['pass']);
    if($Validate =='allGood'){
            $user = $usercalss->get_by_useranme($_POST['username']);
            if(!empty($user)){
                    $user = array_merge(...$user);
                    $hashed_password = $user['password'];
                    if(password_verify($_POST['pass'], $hashed_password)){
                        session_start();
                        //'id', 'first_name', 'last_name', 'email', 'user_name', 'gender', 'phone', 'address', 'password', 'campaign','rank','education', 'experience', 'created_at'
                        $_SESSION["id"] = $user['id'];
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
                        $_SESSION["created_at"] = $user['created_at'];
                        if($user['rank'] ==='admin'){
                            $results = ['state'=> 'good','msg'=> 'sgined in successfully','url'=> 'admin/Dashboard.admin.php','respond'=>$_SESSION];
                            echo json_encode($results);
                        }else{
                        $results = ['state'=> 'good','msg'=> 'sgined in successfully','url'=> 'Dashboard.php','respond'=>$_SESSION];
                        echo json_encode($results);
                        }
                    }else{
                        $results = ['state'=> 'bad','msg'=> 'worng password','url'=> '','respond'=>''];
                        echo json_encode($results);
                    }
                }else{
                    $results = ['state'=> 'bad','msg'=> 'worng username','url'=> '','respond'=>''];
                    echo json_encode($results);
                }
        }else{
            $results = ['state'=> 'bad','msg'=> $Validate,'url'=> '','respond'=>''];
            echo json_encode($results);
        }
  }else{
    $results = ['state'=> 'bad','msg'=> 'empty post','url'=> '','respond'=>''];
    echo json_encode($results);
  }