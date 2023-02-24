<?php
require_once 'Crud.class.php';

class Announcements_Class extends Crud {

    
    public function __construct(){
       
            $this->test();
        
          
    }


    public function get_msgs_by_username($username){
        // $Crud =   new Crud(DATA_BASE,USER,PASSWORD);
        //`id`, `recipient`, `msg`, `auther`, `created_at`, `date_send`
        $data = $this->find('all', array(
            'table'      => 'announcements',
            'fields'     => array('id', 'msg','auther','date_send'),
            'order' => array('date_send' => 'desc'), // descending // 
            'conditions' => array('recipient' => $username) //
            )
        );
        return $data;
    }

    public function get_msgs_by_campaign($campaign){
        // $Crud =   new Crud(DATA_BASE,USER,PASSWORD);
        //`id`, `recipient`, `msg`, `auther`, `created_at`, `date_send`
        $data = $this->find('all', array(
            'table'      => 'announcements',
            'fields'     => array('id', 'msg','auther','date_send','campaign'), // 
            'conditions' => array('campaign' => $campaign) //
            )
        );
        return $data;
    }


    public function set_status_to_yes($msgs_ids=[]){
        // $Crud =   new Crud(DATA_BASE,USER,PASSWORD);
        foreach ($msgs_ids as $msg_id){
            $update = $this->save(array(
                'table'  => 'announcements',
                'id'  => $msg_id, // you need to pass a id (int)
                'status' => 'yes'
                )
            );
            // if($update !==FALSE){
            //     return "successfully updated data add yes to all"; // data is updated successfully
            // }
        }
    }

    public function get_unread_msgs_count($recipient,$campaign){
        // $Crud =   new Crud(DATA_BASE,USER,PASSWORD);
        $data_res = $this->find('all', array(
            'table'      => 'announcements',
            'fields'     => array('id', 'recipient', 'status', 'msg', 'auther', 'created_at', 'date_send'), // 
            'conditions' => array('recipient' => $recipient, 'status' => 'no') //
            )
        );
        $data_cam = $this->find('all', array(
            'table'      => 'announcements',
            'fields'     => array('id', 'recipient', 'status', 'msg', 'auther', 'created_at', 'date_send'), // 
            'conditions' => array('campaign' => $campaign, 'status' => 'no') //
            )
        );
        if($data_res != 0 && $data_cam != 0){
            $counter = count($data_res) + count($data_cam);
            return ($counter);
        }elseif($data_res != 0){
            $counter = count($data_res);
            return ($counter);
        }elseif($data_cam != 0){
            $counter = count($data_cam);
            return ($counter);
        }else{
            return 0;
        }
        

    }
    // admin methods
    public function add_msg_by_recipients($auther,$msg,$recipients=[]){
        // $Crud =   new Crud(DATA_BASE,USER,PASSWORD);
        date_default_timezone_set("Etc/GMT-2");
        $adding_time = date("Y-m-d H:i:s"); 
        $retuers=[];
        foreach ($recipients as $recipient) {
        //(`id`, `recipient`, `msg`, `auther`, `created_at`, `date_send`)
            $data = $this->save(array(
                    'table'  => 'announcements',
                    'recipient'  => $recipient,
                    'msg' => $msg,
                    'auther' => $auther,
                    'created_at' => $adding_time
                ));
                if($data !==FALSE){
                    array_push($retuers,$recipient.' data success');
                }
            }
        return $retuers;
    }
    public function add_msg_by_campaign($auther,$msg,$campaign=[]){
        // $Crud =   new Crud(DATA_BASE,USER,PASSWORD);
        date_default_timezone_set("Etc/GMT-2");
        $adding_time = date("Y-m-d H:i:s"); 
        $retuers=[];
        foreach ($campaign as $campaign) {
            $data = $this->save(array(
                    'table'  => 'announcements',
                    'campaign'  => $campaign,
                    'msg' => $msg,
                    'auther' => $auther,
                    'created_at' => $adding_time
                ));
                if($data !==FALSE){
                    array_push($retuers,' data success');
                }
            }
        return $retuers;
    }
    public function get_all_msgs_admin(){
        // $Crud =   new Crud(DATA_BASE,USER,PASSWORD);
        //Like SELECT * FROM table_name
        $data = $this->find('all', array(
            'table'  => 'announcements',
		    'order' => array('date_send' => 'desc') // descending
            )
        );
        if(!empty($data)){
            // $data = $this->same_msg_multi_resipeints($data);
            return $data;
        }else{
            return 'no messages were found :(';
        }
    }
    public function update_msg_admin($msg_id,$new_msg){
        // $Crud =   new Crud(DATA_BASE,USER,PASSWORD);
        if(!empty($msg_id)&&!empty($new_msg)){
            date_default_timezone_set("Etc/GMT-2");
		    $updat_time = date("Y-m-d H:i:s"); 
            $update = $this->save(array(
                'table'  => 'announcements',
                'id'  => $msg_id, // you need to pass a id (int)
                'msg' => $new_msg,
                'created_at' => $updat_time,
                'status' => 'no'
                )
            );
            if($update !==FALSE){
                echo "successfully updated Message"; // data is updated successfully
            }
        }else{
            return 'empty filed';
        }
    }
    public function delete_msg_admin($msg_id){
        // $Crud =   new Crud(DATA_BASE,USER,PASSWORD);
        if(!empty($msg_id)){
            $delete = $this->delete(array(
                'table' => 'announcements',
                'id'    => $msg_id // int value
                )
            );
        }
    }
   
}