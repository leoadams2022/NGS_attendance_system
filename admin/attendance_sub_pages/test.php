<?php
include '../compo/head.admin.php';
/************  Dont forget you have acsess to ****************
    $id =  $_SESSION["id"];
    $first_name = $_SESSION["first_name"] ;
    $last_name = $_SESSION["last_name"] ;
    $email = $_SESSION["email"];
    $user_name = $_SESSION["user_name"];
    $gender = $_SESSION["gender"];
    $phone = $_SESSION["phone"] ;
    $address = $_SESSION["address"];
    $password =  $_SESSION["password"];
    $rank = $_SESSION["rank"];
    $campaign = $_SESSION['campaign'];
    $education = $_SESSION["education"];
    $experience = $_SESSION["experience"];
    $created_at = $_SESSION["created_at"];
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title> -->
</head>
<body>  

    <!-- attendance table  -->
    <table class="table table-striped table-hover attendancce_log_table" id="attendancce_log_table">
                  <thead>
                      <tr class="table-dark text-center">
                          <th class="table-dark text-center text-capitalize">date</th>
                          <th class="table-dark text-center text-capitalize">time in</th>
                          <th class="table-dark text-center text-capitalize">time out</th>
                          <!-- <th class="table-dark text-center text-capitalize">submit</th> -->
                      </tr>
                  </thead>
                  <tbody id='attendancce_log_tbody'>
                  <tr class="table-primary text-center">
                    <td class="text-center"><?=$_GET['day_date']?></td>
                    <td class="text-center">
                        <!-- 12:39:53 AM -->
                       
                        <input type="time" id="in_time" name="appt_edit" value=''>
                    </td>

                    <td class="text-center">
                        <!-- 2:00:00 AM -->
                       
                        <input type="time" id="out_time" name="appt_edit" value=''>

                    </td>
                </tr>
                  </tbody>
        </table>
      <!-- -------------------------------------------------------------// attendance table  -->
      <!-- submit botton  -->
        <button id='submit_btn' class="btn btn-outline-success submit_btn">submit</button>
      <!---------------------------------------------------------------// submit botton  -->
<script>
    if (typeof(time_in) === undefined) {
        let time_in = '<?=$_GET['time_in']?>';
    }else{
        time_in = '<?=$_GET['time_in']?>';
    }

    if (typeof(time_out) === undefined) {
        let time_out = '<?=$_GET['time_out']?>';
    }else{
        time_out = '<?=$_GET['time_out']?>';
    }




    if (typeof(in_only_time) === undefined) {
        let in_only = time_in.split('_');
    }else{
        in_only = time_in.split('_');
    }
    in_only_time  = in_only[1];
    in_only_date = in_only[0];
    $('#in_time').val(in_only_time);

    if (typeof(out_only_time) === undefined) {
        let out_only_ =  time_out.split('_');
    }else{
        out_only_ =  time_out.split('_');
    }
    out_only_time  = out_only_[1];
    out_only_date = out_only_[0];
    $('#out_time').val(out_only_time);




    if (typeof(entry_id) === undefined) {
        let entry_id = <?=$_GET['entry_id']?>;
    }else{
        entry_id = <?=$_GET['entry_id']?>;
    }


//'2023-02-20_19:00:00' '2023-02-25_02:00:00'


console.log(out_only_date,in_only_date);
 $('#submit_btn').click(function (){
    console.log(in_only_date+' '+document.getElementById('in_time').value);
    $.post('../controlar/attendance.cont.admin.php',
            //the psot data to send
            {
            // Thismonth: Thismonth,
            needTo: 'update_entry',
            entry_id: entry_id,
            new_inTime: in_only_date+' '+document.getElementById('in_time').value,// $('#in_time').val(),
            new_outTime: out_only_date+' '+document.getElementById('out_time').value,//$('#out_time').val()
            },
            // function to ran after the requst
            function(data){
                // Display the returned data in browser
                // var res = JSON.parse(data);
                // console.log(data);
                var close_window_btn = document.querySelector('[aria-label="Close"]');
                    close_window_btn.click();
                    setTimeout(() => {
                             location.reload(true);
                            }, 1000);
                // window.location.href = href=`admin/attendance_sub_pages/agent_attendance.php?username=${username}&userid=${userid}&month=${month}`;
                // if(res.state == 'good'){
                //     drawTable(res.respond, 'agints_tbody');
                //     //this is for the data table defaults
                //     $.extend( $.fn.dataTable.defaults, {
                //         searching: true,
                //         ordering:  true
                //     } );
                //     // adding Pagination with data table 
                //     $(document).ready( function () {
                //         $('#agints_table').DataTable();
                //     } );
                // }else{
                // console.log('requst returned bad');
                // }
    });

});



</script>
</body>
</html>