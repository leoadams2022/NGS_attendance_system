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
<title>Admin Dashboard</title>
<style>
    .dataTables_length, .dataTables_filter{
        margin-bottom: 0.5rem;
    }
    .campaign_th:before , .target_th:before  , .salary_th:before  , .dedication_th:before  , .update_th:before ,
    .campaign_th:after , .target_th:after  , .salary_th:after  , .dedication_th:after  , .update_th:after {
        display: none !important;
    }
    .in_time_th:before , .out_time_th:before  , .in_time_th:after , .out_time_th:after{
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
<!-- <div class="height-100 bg-light"> -->
<div class=" dashboard_page">
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
                            <th class="table-dark text-center text-capitalize target_th agints_table_th">target</th>
                            <th class="table-dark text-center text-capitalize salary_th agints_table_th">salary</th>
                            <th class="table-dark text-center text-capitalize dedication_th agints_table_th">dedication</th>
                            <th class="table-dark text-center text-capitalize in_time_th agints_table_th">In time</th>
                            <th class="table-dark text-center text-capitalize out_time_th agints_table_th">Out time</th>
                            <th class="table-dark text-center text-capitalize update_th agints_table_th">update</th>
                            <th class="table-dark text-center text-capitalize created_at_th agints_table_th">created at</th>
                        </tr>
                    </thead>
        <tbody id='agints_tbody'>
        </tbody>
        </table>
    
    <!-- <div class="m-3 text-center d-flex justify-content-end ">
        <button class="btn btn-outline-success update_all_agints_btn" type="button" id="update_all_agints_btn">Update All Agints</button>
    </div> -->

<script>

$(document).ready(function(){

    $.post('controlar/dashboard.cont.admin.php',
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
                        console.log(res.respond);
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
                td.innerHTML = `<input  class="form-control campaign" type="text" placeholder="Default input" aria-label="default input example"  value="${jsData[i].campaign}" id="campaign_${i}" for-username="${jsData[i].user_name}" for-userid="${jsData[i].id}" >`;//disabled readonly

                td = tr.insertCell(tr.cells.length);
                td.setAttribute("class", "table-primary text-center");
                td.innerHTML = `<input  class="form-control target" type="number" placeholder="Default input" aria-label="default input example" value="${jsData[i].target}" id="target_${i}" for-username="${jsData[i].user_name}" for-userid="${jsData[i].id}"  min="0">`;

                td = tr.insertCell(tr.cells.length);
                td.setAttribute("class", "table-primary text-center");
                td.innerHTML = `<input  class="form-control salary" type="number" placeholder="Default input" aria-label="default input example" value="${jsData[i].salary}" id="salary_${i}" for-username="${jsData[i].user_name}" for-userid="${jsData[i].id}"  min="0" >`;

                td = tr.insertCell(tr.cells.length);
                td.setAttribute("class", "table-primary text-center");
                td.innerHTML = `<input  class="form-control dedication" type="number" placeholder="Default input" aria-label="default input example" value="${jsData[i].dedication}" id="dedication_${i}" for-username="${jsData[i].user_name}" for-userid="${jsData[i].id}"   min="0">`;//oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"

                td = tr.insertCell(tr.cells.length);
                td.setAttribute("class", "table-primary text-center");
                if(jsData[i].enter_time !== null){
                    let time_in = jsData[i].enter_time;
                    time_in = time_in.split(' ');
                    time_in = time_in[1]
                    console.log(time_in)
                    td.innerHTML = ` <input type="time" id="in_time_${i}" name="appt" value='${time_in}'>`;
                }else{ 
                    td.innerHTML = ` <input type="time" id="in_time_${i}" name="appt"  value=''>`;
                }

                td = tr.insertCell(tr.cells.length);
                td.setAttribute("class", "table-primary text-center");
                if(jsData[i].leave_time !== null){
                    let time_out = jsData[i].leave_time;
                    time_out = time_out.split(' ');
                    time_out = time_out[1];
                    td.innerHTML = ` <input type="time" id="out_time_${i}" name="appt" value="${time_out}">`;
                }else{ 
                    td.innerHTML = ` <input type="time" id="out_time_${i}" name="appt" value="">`;
                }
                

                td = tr.insertCell(tr.cells.length);
                td.setAttribute("class", "table-primary text-center");
                td.innerHTML = `<button class="btn btn-outline-success update_agint_btn" onclick="update_agint_data('${jsData[i].id}','campaign_${i}','target_${i}','salary_${i}','dedication_${i}','in_time_${i}','out_time_${i}')
                ">update</button>`;

                td = tr.insertCell(tr.cells.length);
                td.setAttribute("class", "table-primary text-center");
                td.innerHTML = jsData[i].created_at;


                
                
            }
    }
});

 //CTSD stands for => campaign	target	salary	dedication
function update_agint_data(agint_id,campaign_id,target_id,salary_id,dedication_id,id_1,id_2){
    /*
        2023-02-01 03:13:09
        22:41
    */
     let full_date = '0000-00-00 '+document.getElementById(id_1).value+':00'
    console.log(full_date);
    console.log(document.getElementById(id_2).value);
    $.ajax({
        url: 'controlar/dashboard.cont.admin.php',
        type: 'POST',  // http method
        data: {
                campaign: document.getElementById(campaign_id).value,
                target: document.getElementById(target_id).value,
                salary: document.getElementById(salary_id).value,
                dedication: document.getElementById(dedication_id).value,
                agint_id: agint_id,
                in_time: '2023-01-01 '+document.getElementById(id_1).value+':00',
                out_time: '2023-01-01 '+document.getElementById(id_2).value+':00',
                needTo: 'upadate_agints_data'
            },  // data to submit
        beforeSend: function() { 
            $body = $("body");
            $body.addClass("loading"); 
            // console.log('ajax start') 
        },
        complete: function() {
            $body = $("body");
            $body.removeClass("loading");
            // location.reload(true);
            // console.log('ajax end') 
            },
        success: function(data, status, xhr){
                    // Display the returned data in browser
                    var res = JSON.parse(data);
                    // console.log(res);
                    
                    if(res.state == 'good'){
                      if(res.msg === 'successfully updated data '){
                        $('#alertbox_success').html(res.msg);
                        $('#alertbox_success').show(500);
                        setTimeout(() => { $('#alertbox_success').hide(500); 
                            //  location.reload(true);
                            }, 1500);
                      }else{
                        $('#alertbox_danger').html(res.msg);
                        $('#alertbox_danger').show(500);
                        setTimeout(() => { $('#alertbox_danger').hide(500);  }, 3000);
                      }
                    }else{
                    console.log('requst returned bad');
                    }

            },
        error: function (jqXhr, textStatus, errorMessage) {
                console.log('Error' + errorMessage);
            }
                                                
        });      
}

// function update_all_agint_data(){
//     var update_agint_btns  = document.querySelectorAll('.update_agint_btn');
//     update_agint_btns.forEach(function (btn, index) { 
//             $body = $("body");
//             $body.addClass("loading"); 
//             btn.click();
//             $body.removeClass("loading");
//     });
// }

// $('#update_all_agints_btn').click(function (){ update_all_agint_data();   });
 
</script>
<?php
include 'compo/foot.admin.php';
?>