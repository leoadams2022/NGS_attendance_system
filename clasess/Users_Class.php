<?php
require_once 'Crud.class.php';

class Users_Class extends Crud {

 
public function __construct(){
    $this->test();
}

// get user -------------
public function get_by_id($id){
        // $Crud =   new Crud(DATA_BASE,USER,PASSWORD);
        $data = $this->find('all', array(
            'table'      => 'users',
            'fields'     => array('id', 'first_name', 'last_name', 'email', 'user_name', 'gender', 'phone', 'address', 'password', 'campaign', 'rank', 'education', 'experience', 'target', 'salary', 'dedication', 'enter_time', 'leave_time', 'created_at'), // 
            'conditions' => array('id' => $id) //
            )
        );
        return($data);
}

public function get_by_useranme($username,$fields= array('id', 'first_name', 'last_name', 'email', 'user_name', 'gender', 'phone', 'address', 'password','campaign', 'rank', 'education', 'experience', 'target', 'salary', 'dedication', 'enter_time', 'leave_time', 'created_at')){
        // $Crud =   new Crud(DATA_BASE,USER,PASSWORD);
        $data = $this->find('all', array(
            'table'      => 'users',
            //`id`, `first_name`, `last_name`, `email`, `user_name`, `gender`, `phone`, `address`, `password`, `campaign`, `rank`, `education`, `experience`, `created_at`
            'fields'     => $fields, // 
            'conditions' => array('user_name' => $username) //
            )
        );
        return($data);
}
    
public function get_by_email($email){
        // $Crud =   new Crud(DATA_BASE,USER,PASSWORD);
        $data = $this->find('all', array(
            'table'      => 'users',
            'fields'     => array('id', 'first_name', 'last_name', 'email', 'user_name', 'gender', 'phone', 'address', 'password', 'campaign', 'rank', 'education', 'experience', 'target', 'salary', 'dedication', 'enter_time', 'leave_time', 'created_at'), // 
            'conditions' => array('email' => $email) //
            )
        );
        return($data);
}
//------------- get user 

public function Validate_sgin_up($firstName,$lastName,$email,$userName,$gender,$phone,$address,$password){
    if(empty($firstName)||empty($lastName)||empty($email)||empty($userName)||empty($gender)||empty($phone)||empty($address)||empty($password)){
        return 'empty filed';
        end();
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return 'Invalid email format';
        end();
    }elseif(!preg_match("/^[a-zA-Z-' ]*$/",$firstName)||!preg_match("/^[a-zA-Z-' ]*$/",$lastName)){
        return 'Only letters and white space allowed as a first and last name';
        end();
    }elseif(!is_numeric($phone)){
        return 'Only Numbers are allowed for the phone number';
        end();
    }elseif(!preg_match('/^[a-zA-Z0-9]{5,}$/', $userName)){
        return 'Invalid username format';
        end();
    }else{
        return 'allGood';
        end();
    }
}

public function Validate_sgin_in($userName,$password){
    if(empty($userName)||empty($userName)){
        return 'empty filed';
        end();
    }elseif(!preg_match('/^[a-zA-Z0-9]{5,}$/', $userName)){
        return 'Invalid username format';
        end();
    }else{
        return 'allGood';
        end();
    }
}

public function username_exist($userName){
    $getRes = $this->get_by_useranme($userName);
    if(empty($getRes)){
          return false;
    }else{
          return true;
    }
}

public function email_exist($email){
    $getRes = $this->get_by_email($email);
    if(empty($getRes)){
          return false;
    }else{
          return true;
    }
}

public function adding_user($firstName,$lastName,$email,$userName,$gender,$phone,$address,$password,$campaign=''){
    // `first_name`, `last_name`, `email`, `user_name`, `gender`, `phone`, `address`, `password`
    	//ADDING DATA
        $dup_username = $this->username_exist($userName);
        if(!$dup_username){
            $dup_email = $this->email_exist($email);
              if(!$dup_email){
                // $Crud =   new Crud(DATA_BASE,USER,PASSWORD);
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $data = $this->save(array(
                    'table'    => 'users',
                        'first_name'  => $firstName,
                        'last_name'  => $lastName,
                        'email'  => $email,
                        'user_name'  => $userName,
                        'gender'  => $gender,
                        'phone'  => $phone,
                        'address'  => $address,
                        'password'  => $hashed_password
                        // 'campaign' => $campaign
                    )
                );
                if($data !==FALSE){
                    $results = array('state'=> 'good','msg'=> 'success','url'=> '','respond'=>$Crud->getLastId());
                    return  $results; // data is added successfully
                }else{
                    $results = array('state'=> 'bad','msg'=> 'something went wrong in the adding_user function','url'=> '','respond'=>'');
                    return $results;
                }
            }else{
                $results = array('state'=> 'bad','msg'=> 'email alrady taken','url'=> '','respond'=>'');
                return  $results; 
            }
        }else{
            $results = array('state'=> 'bad','msg'=> 'username alrady taken','url'=> '','respond'=>'');
            return  $results; 
        }





	// Get last insert ID
	// echo $Crud->getLastId();

}

public function Validate_update_profile($phone,$address,$email,$education,$experience){
    if(empty($email)||empty($education)||empty($phone)||empty($address)||empty($experience)){
        return 'empty filed';
        end();
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return 'Invalid email format';
        end();
    // }elseif(!preg_match("/^[a-zA-Z-' ]*$/",$firstName)||!preg_match("/^[a-zA-Z-' ]*$/",$lastName)){
    //     return 'Only letters and white space allowed as a first and last name';
    //     end();
    }elseif(!is_numeric($phone)){
        return 'Only Numbers are allowed for the phone number';
        end();
    // }elseif(!preg_match('/^[a-zA-Z0-9]{5,}$/', $userName)){
    //     return 'Invalid username format';
    //     end();
    }else{
        return 'allGood';
        end();
    }
}

public function update_profile($user_id,$phone,$address,$email,$education,$experience){
    if($this->Validate_update_profile($phone,$address,$email,$education,$experience) === 'allGood'){
    //Updating DATA
        // $Crud =   new Crud(DATA_BASE,USER,PASSWORD);
        // `id`, `first_name`, `last_name`, `email`, `user_name`, `gender`, `phone`, `address`, `password`, `campaign`, `rank`, `education`, `experience`, `created_at`
        $update = $this->save(array(
            'table'  => 'users',
            'id'  => $user_id, // you need to pass a id (int)
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'education' => $education,
            'experience' => $experience
            )
        );
        if($update !==FALSE){
            // up dateing the sessin vars
            $user = $this->get_by_id($user_id);
            $user = array_merge(...$user);
                            // $_SESSION["id"] = $user['id'];
                            // $_SESSION["first_name"] = $user['first_name'];
                            // $_SESSION["last_name"] = $user['last_name'];
                            $_SESSION["email"] = $user['email'];
                            // $_SESSION["user_name"] = $user['user_name'];
                            // $_SESSION["gender"] = $user['gender'];
                            $_SESSION["phone"] = $user['phone'];
                            $_SESSION["address"] = $user['address'];
                            // $_SESSION["password"] = $user['password'];
                            $_SESSION["campaign"] = $user['campaign'];
                            // $_SESSION["rank"] = $user['rank'];
                            $_SESSION["education"] = $user['education'];
                            $_SESSION["experience"] = $user['experience'];
                            $_SESSION["created_at"] = $user['created_at'];
            return "successfully updated data"; // data is updated successfully
        }
    }else{
        return $this->Validate_update_profile($phone,$address,$email,$education,$experience);
    }
}

public function get_all_agints($fields= array('id', 'first_name', 'last_name', 'email', 'user_name', 'gender', 'phone', 'address', 'password','campaign', 'rank', 'education', 'experience', 'target', 'salary', 'dedication', 'enter_time', 'leave_time', 'created_at')){
    // $Crud =  new Crud("user-registration","root",'');
    $data = $this->find('all', array(
            'table'      => 'users',
		'fields'     => $fields, // 
		'conditions' => array('rank' => 'agint') //
		)
	);
    return $data;
}

//CTSD stands for => campaign	target	salary	dedication in_time out_time
public function Validate_CTSD($valus){
    extract($valus);
    if(isset($campaign)&&isset($target)&&isset($salary)&&isset($dedication)&&isset($in_time)&&isset($out_time)){
        if(empty($campaign)){
            return 'empty campaign';//.' target= '.$target.' salary= '.$salary.' dedication= '.$dedication
            end();
        }elseif(!is_numeric($target)||!is_numeric($salary)||!is_numeric($dedication)){
            return 'Only Numbers are allowed for the target	salary	dedication';
            end();
        }elseif($target < 0 || $salary < 0 || $dedication < 0){
            return 'Only positive numbers accepted';
            end();
        }
        
        else{
            return 'allGood';
            end();
        }
    }else{
        return 'one or more of the CTSD is not set';
    }

}

//$valus=['campaign'=> 'value','target'=> 'value','salary'=> 'value','dedication'=> 'value']
public function update_agint_CTSD($user_id,$valus){
   $valid = $this->Validate_CTSD($valus);
   if($valid === 'allGood'){
        extract($valus);
        // $Crud =   new Crud(DATA_BASE,USER,PASSWORD);
        //`enter_time`, `leave_time`,
            $update = $this->save(array(
                'table'  => 'users',
                'id'  => $user_id, // you need to pass a id (int)
                'campaign' => $campaign,
                'target' => $target,
                'salary' => $salary,
                'enter_time' => $in_time,
                'leave_time' => $out_time,
                'dedication' => $dedication
                )
            );
        return 'successfully updated data ';
        
   }else{
    return $valid;
   }
}

public function get_cards_data($user_id){
   $data = $this->get_by_id($user_id);
   if(!empty($data)){
       $data = array_merge(...$data);
       //'id', 'first_name', 'last_name', 'email', 'user_name', 'gender', 'phone', 'address', 'password', 'campaign', 'rank', 'education', 'experience', 'target', 'salary', 'dedication', 'created_at'
       $data_arr = array('target'=> $data['target'],'salary'=> $data['salary'],'dedication'=> $data['dedication']);
       return $data_arr;
   }else{
        $data_arr = array('msg'=>'unvalid user id');
        return $data_arr;
   }
}

public function get_all_campagins(){
    $all_users = $this->get_all_agints(array('campaign'));
    $campaigns = array();
    foreach ($all_users as $key => $value) {
        array_push($campaigns,$value['campaign']);
    }
    $campaigns = array_unique($campaigns);  
    $campaigns =  array_values($campaigns);
    return $campaigns;
}
}

