<?php
include 'compo/head.php';
/************  Dont forget you have acsess to ****************
            $id =  $_SESSION["id"];
            $first_name = $_SESSION["first_name"] ;
            $last_name = $_SESSION["last_name"] ;
            $email = $_SESSION["email"];
            $user_name = $_SESSION["user_name"];
            $gender = $_SESSION["gender"];
            $phone = $_SESSION["phone"] ;
            $address = $_SESSION["address"];
            $rank = $_SESSION["rank"]; 
*/
?>
<title>Attendance</title>
<!-- luxon timezone library  -->
<script src="https://cdn.jsdelivr.net/npm/luxon@3.2.1/build/global/luxon.min.js"></script>
<style>
    table.attendancce_log_table{
        margin: 1rem 0rem;
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
    div#attendancce_log_table_length {
        margin-bottom: 0.5rem;
    }
 /* this is for the   js_clocks */
    .js_clock {
        padding: 20px 40px;
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 10px;
        text-align: center;
        width: 400px;
    }
    .js_dayName {
        text-transform: uppercase;
        font-size: 15px;
    }
    .js_flexbox {
        display: flex;
        justify-content: center;
        align-items: end;
        padding: 10px;
    }
    .js_HrMinSec {
        font-size: 35px;
    }
    .js_merdian {
        font-size: 12px;
        padding-left: 20px;
        padding-bottom: 10px;
    }
</style>
</head>
<?php
include 'compo/navbar.php';
?>
<!-- <div class="height-100 bg-light"> -->
<div class="container attendance_page">
    <div class="d-flex justify-content-center mb-2">
        <div class="js_clock bg-dark-subtle">
        <div class="js_dayName">Saturday</div>
        <div class="js_flexbox">
            <div class="js_HrMinSec">00:00:00</div>
            <div class="js_merdian">AM</div>
        </div>
        <div class="js_date">
            <span class="js_month">May</span>
            <span class="js_today">12</span>
            <span class="js_year">2021</span>
        </div>
        </div>
    </div>
                <div class="btns_div d-flex justify-content-center">
                    <button id="in_btn" style="display:none;" class="btn btn-success btn-lg text-capitalize">start your day</button>
                    <button id="out_btn" style="display:none;" class="btn btn-danger btn-lg text-capitalize">end your day</button>
                </div>
                <div class="alert alert-danger mt-2 text-center text-capitalize for_in_out_btn" id="alertbox_danger" style='display:none;' role="alert">
                    this is the alert danger box
                </div>
                <div class="alert alert-success mt-2 text-center for_in_out_btn text-capitalize" id="alertbox_success" style='display:none;' role="alert">
                    this is the alert success box
                </div>
            </div>

            <table class="table table-striped table-hover attendancce_log_table" id="attendancce_log_table">
                <thead>
                    <tr class="table-dark text-center">
                        <th class="table-dark text-center text-capitalize">date</th>
                        <th class="table-dark text-center text-capitalize">time in</th>
                        <th class="table-dark text-center text-capitalize">time out</th>
                    </tr>
                </thead>
                <tbody id='attendancce_log_tbody'>
                 
                </tbody>
            </table>
<!-- in_out_script  -->
<script>
$(document).ready(function(){

function im_i_in_or_out(time = 0){
    $.ajax({
        // the url
        url: 'controlar/attendance.cont.php',
        // http method
        type: 'POST', 
        // data to submit
        data: {
            attendance_csae: '',
            needTo: 'im_i_in_or_out'
            },  
        // function to run BEFORE sending the request
        beforeSend: function() { 
            //code goes here
            $body = $("body");
            $body.addClass("loading");
        },
        // function to run AFTER sending the request
        complete: function() {
            //code goes here
            $body = $("body");
            $body.removeClass("loading");
            },
        // function to run if the request was success
        success: function(data, status, xhr){
                        // console.log(data);
                        var res = JSON.parse(data);
                        if(res.state == 'good'){
                        // console.log(res.msg);
                        // console.log(res.respond);
                        if(res.respond === 'show_#in_btn'){
                            $('#in_btn').show(time);
                            $('#out_btn').hide(time);
                        }else if (res.respond === 'show_#out_btn'){
                            $('#in_btn').hide(time);
                            $('#out_btn').show(time);
                        }
                        }else{
                        console.log('requst returned bad');
                        }
            },
        error: function (Xhr, textStatus, errorMessage) {
            //xhr object , status text
            console.log('Error' + errorMessage + ' status: '+ textStatus);
            }                              
    });
    get_attendance_log();
}

im_i_in_or_out();


$('#in_btn').click(function (){
        // stop any default actions
        event.preventDefault();
        // console.log('you have clicked in_Btn');
        var louclTimeZone = Intl.DateTimeFormat().resolvedOptions().timeZone;
        // Send the data using post
        $.ajax({
                // the url
                url: 'controlar/attendance.cont.php',
                // http method
                type: 'POST', 
                // data to submit
                data: {
                    timeZone: louclTimeZone,
                    needTo: 'in'
                    },  
                // function to run BEFORE sending the request
                beforeSend: function() { 
                    //code goes here
                    $body = $("body");
                    $body.addClass("loading"); 
                },
                // function to run AFTER sending the request
                complete: function() {
                    //code goes here
                    $body = $("body");
                    $body.removeClass("loading");
                    },
                // function to run if the request was success
                success: function(data, status, xhr){
                    // console.log(data);
                    var res = JSON.parse(data);
                    if(res.state == 'good'){
                    //   console.log(res.msg);
                    //   console.log(res.respond);
                        im_i_in_or_out(500);
                        $('#alertbox_success').html(res.msg);
                        $('#alertbox_success').show(500);
                        setTimeout(() => { $('#alertbox_success').hide(500);  }, 3000);
                    }else if(res.state === 'bad'){
                        $('#alertbox_danger').html(res.msg);
                        $('#alertbox_danger').show(500);
                        setTimeout(() => { $('#alertbox_danger').hide(500);  }, 3000);
                        // console.log('requst returned bad');
                    }      
                    },
                error: function (Xhr, textStatus, errorMessage) {
                    //xhr object , status text
                    console.log('Error' + errorMessage + ' status: '+ textStatus);
                    }                                       
        });
});

$('#out_btn').click(function (){
        // stop any default actions
        event.preventDefault();
        // console.log('you have clicked out_Btn');
        var louclTimeZone = Intl.DateTimeFormat().resolvedOptions().timeZone;
        // Send the data using post
        $.post('controlar/attendance.cont.php',
        //the psot data to send
        {
          timeZone: louclTimeZone,
          needTo: 'out'
        },
        // function to ran after the requst
        function(data){
            // Display the returned data in browser
            // console.log(data);
            var res = JSON.parse(data);
            if(res.state == 'good'){
            //   console.log(res.msg);
            //   console.log(res.respond);
                im_i_in_or_out(500);
                $('#alertbox_success').html(res.msg);
                $('#alertbox_success').show();
                setTimeout(() => { $('#alertbox_success').hide(500);  }, 3000);
            }else{
                $('#alertbox_danger').html(res.msg);
                $('#alertbox_danger').show();
                setTimeout(() => { $('#alertbox_danger').hide(500);  }, 3000);
                // console.log('requst returned bad');
            }

        });
});

let in_timeing_obj,out_timeing_obj
function get_attendance_log(){
    const date = new Date();
    let Thismonth = date.getMonth()+1;
    $.ajax({
            // the url
            url: 'controlar/attendance.cont.php',
            // http method
            type: 'POST', 
            // data to submit
            data: {
                Thismonth: Thismonth,
                get_attendance_log: '',
                needTo: 'get_attendance_log'
                },  
            // function to run BEFORE sending the request
            beforeSend: function() { 
                //code goes here
                $body = $("body");
                $body.addClass("loading"); 
            },
            // function to run AFTER sending the request
            complete: function() {
                //code goes here
                $body = $("body");
                $body.removeClass("loading");
                },
            // function to run if the request was success
            success: function(data, status, xhr){
                // code gos in here
                // data retuernd data
                // status of the request
                // xhr object
                 // Display the returned data in browser
                 var res = JSON.parse(data);
                //  console.log(res.msg);
                    if(res.state == 'good'){
                        in_timeing_obj = '';
                        out_timeing_obj = '';
                        if(res.msg[0]['enter_time'] !== null && res.msg[0]['leave_time'] !== null){
                            in_timeing_obj = DateStringToObject(res.msg[0]['enter_time']);
                            out_timeing_obj = DateStringToObject(res.msg[0]['leave_time']);
                        }else{
                            in_timeing_obj = 'Not_Set';
                            out_timeing_obj = 'Not_Set';
                        }
                        // console.log(in_timeing_obj.toLocaleString("en-US")+' -- '+out_timeing_obj.toLocaleString("en-US"));
                        var dataCollection = res.respond;
                        // console.log('dataCollection  ',dataCollection);
                        drawTable(dataCollection, 'attendancce_log_tbody');
                        //this is for the data table defaults
                        $.extend( $.fn.dataTable.defaults, {
                            searching: false,
                            ordering:  false
                        } );
                        // adding Pagination with data table 
                        $(document).ready( function () {
                            $('#attendancce_log_table').DataTable();
                            
                        } );
                    }else{
                    console.log('requst returned bad');
                    }     
                },
            error: function (Xhr, textStatus, errorMessage) {
                //xhr object , status text
                console.log('Error' + errorMessage + ' status: '+ textStatus);
                }                                       
    });
}

// cheack if agent is late 
function compareDates(now, must){ 
    if(must === 'Not_Set' || now === 'Not_Set'){
        return 'good';
    }else{
        let date1 = now.getHours();
        let date2 = must.getHours();
        let date3 = now.getMinutes();
        let date4 = must.getMinutes();
    
        if (date1 < date2) {
            // he is elry on the hour
            return 'good';
        } else if (date1 > date2) {
            // late hou
            // console.log('hour late')
            return 'bad';
        } else {
                    // just right hour 
                    if (date3 < date4) {
                        // erly min
                        // console.log('just right hour  erly min');
                        return 'good';
                    } else if (date3 > date4) {
                        // late min
                        // console.log('just right hour  late min')
                        return 'bad';
                    } else {
                        // just right min 
                        // console.log(`just right hour eqol min`);
                        return 'good';
                    }
        }
    }
}
//------------
function drawTable(jsData, tbody) {
	var tr, td;
	tbody = document.getElementById(tbody);
	tbody.innerHTML = '';
	for (var i = 0; i < jsData.length; i++) {

        
        tr = tbody.insertRow(tbody.rows.length);
        tr.setAttribute("class", " text-center");

		td = tr.insertCell(tr.cells.length);
		td.setAttribute("class", "table-primary text-center");
        td.innerHTML = jsData[i].day_date;

		td = tr.insertCell(tr.cells.length);

        var d= DateStringToObject(jsData[i].time_in);
        var compare = compareDates(d, in_timeing_obj)
        if(compare === 'good'){
            td.setAttribute("class", "table-primary text-center");
        }else if (compare === 'bad'){
            td.setAttribute("class", "table-danger text-center");
        }
		let time_only = d.toLocaleString("en-US").split(',');
        td.innerHTML = time_only[1];

		td = tr.insertCell(tr.cells.length);
		// td.setAttribute("class", "table-primary text-center");
		// td.innerHTML = jsData[i].time_out;
        // console.log(jsData[i].time_out + '---' +jsData[i].day_date + '---' +out_timeing_obj);
        if(jsData[i].time_out !== null){
            var d= DateStringToObject(jsData[i].time_out);
            var compare = compareDates(out_timeing_obj, d)
            if(compare === 'good'){
                td.setAttribute("class", "table-primary text-center");
            }else if (compare === 'bad'){
                td.setAttribute("class", "table-danger text-center");
            }
            let time_only = d.toLocaleString("en-US").split(',');
            td.innerHTML = time_only[1];
        }else{
            td.setAttribute("class", "table-primary text-center");
            td.innerHTML = 'not set yet';
        }
		
	}
}

function DateStringToObject(DateString, return_Type = 'DateObj') {
  if(DateString !== null){

      var month, day, year, HH, MM, SS, H, PmAM;
      //var DateString = '10/13/2025, 8:57:39 AM';
      // var DTparts = DateString.split(',');
      var TheDate = DateString.slice(0, 10);//DTparts[0];
      var TheTime = DateString.slice(10);//DTparts[1];
      // console.log( TheDate,'---',TheTime);
      //geting the month day year
      /*
      it is y m d
      must be  m d y
      2023-02-10
      */
      var DateParts = TheDate.split('-');
      month = DateParts[1];
      day = DateParts[2];
      year = DateParts[0];
      month = Number(month);
      day = Number(day);
      year = Number(year);
      //console.log( month,'---',day,'---',year);// month day year
      //geting the HH MM SS PmAm
      var PmAmCheack = TheTime.endsWith("PM");
      if (PmAmCheack == true) {
          PmAm = 'PM';
          TheTime = TheTime.replace("PM", "");
      } else if (PmAmCheack == false) {
          PmAm = 'AM';
          TheTime = TheTime.replace("AM", "");
      }
      var TimeParts = TheTime.split(':');
      HH = TimeParts[0];
      MM = TimeParts[1];
      SS = TimeParts[2];
      HH = Number(HH);
      MM = Number(MM);
      SS = Number(SS);
      //console.log(HH,'---',MM,'---',SS,'---',PmAm)// '8 --- 57 --- 39'
      if (PmAm == 'PM') {
          if (HH == 12) {
              H = 12
          } else {
              H = HH + 12
          }
      } else {
          if (HH == 12) {
              H = 0
          } else {
              H = HH
          }
      }
      //console.log(H);
      var D = new Date();
      D.setFullYear(year);
      D.setMonth(month - 1);
      D.setDate(day);
      D.setHours(H);
      D.setMinutes(MM);
      D.setSeconds(SS);
      //console.log(D);
      if(return_Type === 'DateObj'){
          return D;
      }else if(return_Type === 'infoObj'){
        var Date_info= [{
            day: D.getDate(),
            month: D.getMonth()+1,
            year: D.getFullYear(),
            huor: D.getHours(),
            minute: D.getMinutes(),
            second: D.getSeconds() 
        }];
        return Date_info;
      }
  }else{
    return "there is no date";
  }
}


// this is for the js oclock
function showClock() {
  // Declare Variables
  var time = new Date();
  var hours = time.getHours();
  var minutes = time.getMinutes();
  var seconds = time.getSeconds();
  var day = time.getDay();
  var date = time.getDate();
  var month = time.getMonth();
  var year = time.getFullYear();
  var meridian = hours > 12 ? "PM" : "AM";
  var daysOfWeek = [
    "SUNDAY",
    "MONDAY",
    "TUESDAY",
    "THURSDAY",
    "WEDNESDAY",
    "FRIDAY",
    "SATURDAY"
  ];
  var monthsOfYear = [
    "JAN",
    "FEB",
    "MAR",
    "APR",
    "MAY",
    "JUN",
    "JUL",
    "AUG",
    "SEP",
    "OCT",
    "NOV",
    "DEC"
  ];
  var currentDay = daysOfWeek[day];
  var currentMonth = monthsOfYear[month];
  if (hours > 12) {
    hours = hours - 12;
  }

  // Add Leading Zero
  hours = hours < 10 ? "0" + hours : hours;
  minutes = minutes < 10 ? "0" + minutes : minutes;
  seconds = seconds < 10 ? "0" + seconds : seconds;

  var HrMinSec = hours + " : " + minutes + " : " + seconds;
  // Implement values to DOM
  document.querySelector(".js_dayName").innerHTML = currentDay;
  document.querySelector(".js_HrMinSec").innerHTML = HrMinSec;
  document.querySelector(".js_merdian").innerHTML = meridian;
  document.querySelector(".js_month").innerHTML = currentMonth;
  document.querySelector(".js_today").innerHTML = date;
  document.querySelector(".js_year").innerHTML = year;
}
setInterval(() => { showClock(); }, 1000);
});
</script>
<?php
include 'compo/foot.php';
?>