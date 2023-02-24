<?php
include 'compo/head.admin.php';
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
<title>Admin Attendance</title>
<style>
    .dataTables_length, .dataTables_filter{
        margin-bottom: 0.5rem;
    }
    .time_sheet_th:before , .time_sheet_th:after,
    .month_th:before , .month_th:after {
        display: none !important;
    }
    .agints_table_th::before,
    .agints_table_th::after{
        color: white;
    }
    @media only screen and (max-width: 768px) {
        .for_in_out_btn {
            position: absolute; 
            top: 5px; 
            left: 5px !important;
        }
    }
    .for_in_out_btn {
            position: absolute;
            top: 5px;
            left: 70px;
        }
</style>
</head>
<?php
include 'compo/navbar.admin.php';
?>
<div class="container attendance_page">
                
                <div class="alert alert-danger mt-2 text-center text-capitalize for_in_out_btn" id="alertbox_danger" style='display:none;' role="alert">
                    this is the alert danger box
                </div>
                <div class="alert alert-success mt-2 text-center for_in_out_btn text-capitalize" id="alertbox_success" style='display:none;' role="alert">
                    this is the alert success box
                </div>

<table class="table table-striped table-hover agints_table" id="agints_table">
                    <thead>
                        <tr class="table-dark text-center">
                            <th class="table-dark text-center text-capitalize Full_Name_th agints_table_th">Full Name</th>
                            <th class="table-dark text-center text-capitalize user_name_th agints_table_th">user name</th>
                            <th class="table-dark text-center text-capitalize campaign_th agints_table_th">Campaign</th>
                            <th class="table-dark text-center text-capitalize month_th agints_table_th" style='width: 3rem !important;'>month</th>                            
                            <th class="table-dark text-center text-capitalize time_sheet_th agints_table_th" style='width: 3rem !important;'>Time Sheet</th>
                        </tr>
                    </thead>
        <tbody id='agints_tbody'>
        </tbody>
        </table>
<script>
$(document).ready(function(){

$.post('controlar/attendance.cont.admin.php',
            //the psot data to send
            {
            // Thismonth: Thismonth,
            needTo: 'get_all_agints'
            },
            // function to ran after the requst
            function(data){
                // Display the returned data in browser
                var res = JSON.parse(data);
                // console.log(res);
                
                if(res.state == 'good'){
                    drawTable(res.respond, 'agints_tbody');
                    //this is for the data table defaults
                    $.extend( $.fn.dataTable.defaults, {
                        searching: true,
                        ordering:  true
                    } );
                    // adding Pagination with data table 
                    $(document).ready( function () {
                        $('#agints_table').DataTable();
                    } );
                }else{
                console.log('requst returned bad');
                }

});

function drawTable(jsData, tbody) {  
        var tr, td;
        tbody = document.getElementById(tbody);
        tbody.innerHTML = '';
        for (var i = 0; i < jsData.length; i++) {
            tr = tbody.insertRow(tbody.rows.length);
            tr.setAttribute("class", "table-primary text-center");

            td = tr.insertCell(tr.cells.length);
            td.setAttribute("class", "table-primary text-center");
            td.innerHTML = jsData[i].first_name+' '+jsData[i].last_name;

            td = tr.insertCell(tr.cells.length);
            td.setAttribute("class", "table-primary text-center");
            td.innerHTML = jsData[i].user_name;

            td = tr.insertCell(tr.cells.length);
            td.setAttribute("class", "table-primary text-center");
            td.innerHTML = jsData[i].campaign;//disabled readonly

            td = tr.insertCell(tr.cells.length);
            td.setAttribute("class", "table-primary text-center");
            let d= new Date();
            td.innerHTML = `<input class="form-control" type="number"  id='month_input_${i}' min='1' max='12' value='${d.getMonth()+1}' >`;//disabled readonly

            td = tr.insertCell(tr.cells.length);
            td.setAttribute("class", "table-primary text-center");
            
            td.innerHTML = `<a class="ajax-popup-link btn btn-outline-success  open_timesheet_btn" onclick="open_timesheet('month_input_${i}','${jsData[i].user_name}','${jsData[i].id}')">open</a>`;
            //open_timesheet('month_input_4')
            // href="http://localhost/MyProject/LoginAgain/admin/attendance_sub_pages/agent_attendance.php?username=${jsData[i].user_name}&userid=${jsData[i].id}&month="

        }
}

});
function open_timesheet(month_id,username,userid){
    let month =  document.getElementById(month_id).value;

    window.location.href = href=`<?=ROOT?>admin/attendance_sub_pages/agent_attendance.php?username=${username}&userid=${userid}&month=${month}`;
    // console.log(month)
}
</script>
<?php
include 'compo/foot.admin.php';
?>