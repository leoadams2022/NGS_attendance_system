<?php
require_once 'Crud.class.php';
/* -------
id
username
userid
date
timein
timeout
created_at
------- */
class Attendance_Class extends Crud {

    
    public function __construct(){
        $this->test();
    }

    public function get_by_day_date($day_date,$user_name,$user_id){
        // $Crud =   new Crud(DATA_BASE,USER,PASSWORD);
        $data = $this->find('all', array(
            'table'      => 'attendance',
            'fields'     => array('id', 'user_name', 'user_id', 'day_date', 'is_it_over', 'time_in', 'time_out', 'created_at'), 
            'conditions' => array('day_date' => $day_date,'user_name'=>$user_name, 'user_id'=>$user_id)
            )
        );
        return($data);
    }

    public function day_date_exist($day_date,$user_name,$user_id){
        $getRes = $this->get_by_day_date($day_date,$user_name,$user_id);
        if(empty($getRes)){
              return false;
        }else{
              return true;
        }
    }

    public function is_day_over($user_name,$user_id){
        // $Crud =   new Crud(DATA_BASE,USER,PASSWORD);
        $data = $this->find('all', array(
            'table'      => 'attendance',
            'fields'     => array('id', 'user_name', 'user_id', 'day_date', 'is_it_over', 'time_in', 'time_out', 'created_at'), 
            'conditions' => array('user_name' => $user_name, 'user_id' => $user_id, 'is_it_over' => 'no')
            )
        );
        // $data = array_merge(...$data);
        if(empty($data)){
            return true;// the day is over

        }else{
            return $data;// tha day in NOT over 
        }
    }

    //  `user_name`, `user_id`, `day_date`, `time_in`, `time_out`
   public function im_In($timeZone='Etc/GMT-2',$user_name,$user_id){

    date_default_timezone_set($timeZone); //cairo timeZone Etc/GMT-2
    $today = date("Y-m-d");
    $today_exixt =  $this->day_date_exist($today,$user_name,$user_id);
    if($today_exixt === false){
        // this day is not in the Db
        $is_day_over = $this->is_day_over($user_name,$user_id);
        if($is_day_over === true){
                $today_time_in = date("Y-m-d H:i:s");
                // $Crud =   new Crud(DATA_BASE,USER,PASSWORD);
                $data = $this->save(array(
                'table'    => 'attendance',
                    'user_name'  => $user_name,
                    'user_id'  => $user_id,
                    'day_date'  => $today,
                    'is_it_over' => 'no',
                    'time_in'  => $today_time_in
                ));
                if($data !==FALSE){ 
                    // return 'added successfully';
                    // session_start();
                    // $_SESSION["attendance_case"] = 'in';
                    $results = array('state'=> 'good','msg'=> 'Your day started successfully. <br> Have A Great Day','url'=> '','respond'=>'');
                    return $results;
                }else{ 
                    // return 'somthiog went wrong adding the data';
                    $results = array('state'=> 'bad','msg'=> 'somthiog went wrong adding the data','url'=> '','respond'=>'');
                    return $results;
                }
            }else{
                $results = array('state'=> 'bad','msg'=> 'you have to get out befor you go in again','url'=> '','respond'=>'');
                return $results;
            }
    }elseif($today_exixt === true){
        // return 'this day is already in theDb';
        $results = array('state'=> 'bad','msg'=> 'you have already started and ended this day.','url'=> '','respond'=>'');
        return $results;
    }
   }
    //  ``, ``, ``, ``, `time_out`
    public function im_out($timeZone='Etc/GMT-2',$user_name,$user_id){
       date_default_timezone_set($timeZone); //cairo timeZone Etc/GMT-2
       $is_day_over = $this->is_day_over($user_name,$user_id);
       // if ther is no open day it will return 1
       if($is_day_over != 1){
            $is_day_over = array_merge(...$is_day_over);
            $day_date = $is_day_over['day_date'];
            $id = $is_day_over['id'];
            $today_time_out = date("Y-m-d H:i:s");
            // $Crud =   new Crud(DATA_BASE,USER,PASSWORD);
            $data = $this->save(array(
                    'table'  => 'attendance',
                    'id'  => $id, // you need to pass a id (int)
                    'time_out' => $today_time_out
                ));
                // $Crud =  new Crud("user-registration","root",'');   
                $data2 = $this->save(array(
                    'table'  => 'attendance',
                    'id'  => $id, // you need to pass a id (int)
                    'is_it_over' => 'yes'
                ));
                if($data !==FALSE && $data2 !==FALSE){ 
                    // return 'added successfully';
                    // session_start();
                    // $_SESSION["attendance_case"] = 'out';
                    $results = array('state'=> 'good','msg'=> 'Your day ended successfully. <br>  Have A Great Night','url'=> '','respond'=>'');
                    return $results;
                }else{ 
                    // return 'somthiog went wrong adding the data';
                    $results = array('state'=> 'bad','msg'=> 'somthiog went wrong adding the data','url'=> '','respond'=>'');
                    return $results;
                }
       }elseif($is_day_over === true){
                $results = array('state'=> 'bad','msg'=> 'you have no open day','url'=> '','respond'=>'');
                return $results;
       }
    }
    //  `user_name`, `user_id`, `day_date`, `time_in`, `time_out`
    public function get_attendance_log_for_user($user_name,$user_id){
        // $Crud =   new Crud(DATA_BASE,USER,PASSWORD);
        $data = $this->find('all', array(
            'table'      => 'attendance',
            //'id', 'user_name', 'user_id', 'is_it_over', , 'created_at'
            'fields'     => array('day_date', 'time_in', 'time_out'), 
            'conditions' => array('user_name' => $user_name, 'user_id' => $user_id, 'is_it_over' => 'yes')
            )
        );
        // $data = array_merge(...$data);
        if(empty($data)){
            return true;// there is no attendance log for you 
        }else{
            return $data;// here is your attendance data
        }
    }

    public function get_attendance_month_user($month,$user_name,$user_id){
        // $Crud =   new Crud(DATA_BASE,USER,PASSWORD);
        //`id`, `user_name`, `user_id`, `day_date`, `is_it_over`, `time_in`, `time_out`, `created_at
        $data = $this->query("SELECT  `id`, `day_date`, `is_it_over`, `time_in`, `time_out` FROM `attendance` WHERE MONTH(day_date) = $month AND `user_name` = '$user_name' AND `user_id` = $user_id ORDER BY `day_date`");
        if(empty($data)){
            return 'no data';//
        }else{
            return $data;// 
        }
    }

    public function update_entry($entry_id,$new_inTime,$new_outTime){
        //Updating DATA
        $update = $this->save(array(
            'table'  => 'attendance',
            'id'  => $entry_id, // you need to pass a id (int)
            'time_in' => $new_inTime,
            'time_out' => $new_outTime
            )
        );
        if($update !==FALSE){
            return "successfully updated data"; // data is updated successfully
        }
    }

}//for the whole class
