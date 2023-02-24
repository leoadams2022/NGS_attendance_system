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
<title>Dashboard</title>
<style>
                .tile-progress {
            background-color: #303641;
            color: #fff;
            }
            .tile-progress {
            background: #00a65b;
            color: #fff;
            margin-bottom: 20px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            -webkit-background-clip: padding-box;
            -moz-background-clip: padding;
            background-clip: padding-box;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            }
            .tile-progress .tile-header {
            padding: 15px 20px;
            padding-bottom: 40px;
            }
            .tile-progress .tile-progressbar {
            height: 2px;
            background: rgba(0,0,0,0.18);
            margin: 0;
            }
            .tile-progress .tile-progressbar span {
            background: #fff;
            }
            .tile-progress .tile-progressbar span {
            display: block;
            background: #fff;
            width: 0;
            height: 100%;
            -webkit-transition: all 1.5s cubic-bezier(0.230,1.000,0.320,1.000);
            -moz-transition: all 1.5s cubic-bezier(0.230,1.000,0.320,1.000);
            -o-transition: all 1.5s cubic-bezier(0.230,1.000,0.320,1.000);
            transition: all 1.5s cubic-bezier(0.230,1.000,0.320,1.000);
            }
            .tile-progress .tile-footer {
            padding: 20px;
            text-align: right;
            background: rgba(0,0,0,0.1);
            -webkit-border-radius: 0 0 3px 3px;
            -webkit-background-clip: padding-box;
            -moz-border-radius: 0 0 3px 3px;
            -moz-background-clip: padding;
            border-radius: 0 0 3px 3px;
            background-clip: padding-box;
            -webkit-border-radius: 0 0 3px 3px;
            -moz-border-radius: 0 0 3px 3px;
            border-radius: 0 0 3px 3px;
            }
            .tile-progress.tile-red {
            background-color: #f56954;
            color: #fff;
            }
            .tile-progress {
            background-color: #303641;
            color: #fff;
            }
            .tile-progress.tile-blue {
            background-color: #0073b7;
            color: #fff;
            }
            .tile-progress.tile-aqua {
            background-color: #00c0ef;
            color: #fff;
            }
            .tile-progress.tile-green {
            background-color: #00a65a;
            color: #fff;
            }
            .tile-progress.tile-cyan {
            background-color: #00b29e;
            color: #fff;
            }
            .tile-progress.tile-purple {
            background-color: #ba79cb;
            color: #fff;
            }
            .tile-progress.tile-pink {
            background-color: #ec3b83;
            color: #fff;
            }
            .MyRow {
                justify-content: center;
            }
            .tile-footer,
            .tile-header {
                height: 10rem;
            }
            .progressbar {
            height: 5px !important;
            }
</style>
</head>
<?php
include 'compo/navbar.php';
?>
<!-- <div class="height-100 bg-light"> -->
<div class="container">
<div class="row MyRow">
<!-- 
 colors of the card->{tile-primary    tile-red    tile-blue    tile-aqua   tile-green   tile-cyan    tile-purple  tile-pink }
-->
<!-- target card->[id's] span# target_progressbar span# target_per_counter span# target_still_need -->
      <div class="col-sm-4">
    		<div class="tile-progress tile-blue">
    			<div class="tile-header">
    				<h3>Target</h3>
    				<span>your target is 22 per month</span>
                    <!-- <input type="number"class="form-control target" placeholder="Target" aria-label="default input example" value="" id="target_input" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"> -->
    			</div>
    			<div class="tile-progressbar">
    				<span data-fill="65.5%" style="width: 0%;" id="target_progressbar"  class="progressbar"></span>
    			</div>
    			<div class="tile-footer">
    				<h4>
    					<span class="pct-counter" id="target_per_counter">0</span>%
    				</h4>
    				<span>you have <span id="target_aproved">0</span> aproved sales.</span>
    			</div>
    		</div>
    	</div>
<!-- attendance card->[id's] span# attendance_progressbar , span# attendance_per_counter , span# attendance_still_need -->
        <div class="col-sm-4">
    		<div class="tile-progress tile-primary">
    			<div class="tile-header">
    				<h3>Attendance</h3>
    				<span>so far in this month.</span>
    			</div>
    			<div class="tile-progressbar">
    				<span data-fill="65.5%" style="width: 0%;" id="attendance_progressbar" class="progressbar"></span>
    			</div>
    			<div class="tile-footer">
    				<h4>
    					<span class="pct-counter" id="attendance_per_counter">0</span> Days
    				</h4>
    				<span>You are still missing <span id="attendance_still_need"></span> days to get to 22 days this month</span>
    			</div>
    		</div>
    	</div>



<!-- Salary card->[id's] span# salary_progressbar , span# salary_per_counter , span# salary_still_need -->
      <div class="col-sm-4">
    		<div class="tile-progress tile-red">
    			<div class="tile-header">
    				<h3>Dedications</h3>
    				<span></span>
    			</div>
    			<div class="tile-progressbar">
    				<span data-fill="65.5%" style="width: 65.5%;" id="dedication_progressbar"  class="progressbar"></span>
    			</div>
    			<div class="tile-footer">
    				<h4>
    					<span class="pct-counter" id="dedication_per_counter"></span>EGP
    				</h4>
    				<span>you have <span id="dedication_still_need"></span> EGP as a dedication :(</span>
    			</div>
    		</div>
    	</div>
<!-- Salary card->[id's] span# salary_progressbar , span# salary_per_counter , span# salary_still_need -->
        <div class="col-sm-4">
                    <div class="tile-progress tile-cyan">
                        <div class="tile-header">
                            <h3>Salary</h3>
                            <span>this is your salary</span>
                        </div>
                        <div class="tile-progressbar">
                            <span data-fill="65.5%" style="width: 0%;" id="salary_progressbar"  class="progressbar"></span>
                        </div>
                        <div class="tile-footer">
                            <h4>
                                <span class="pct-counter" id="salary_per_counter"></span>EGP
                            </h4>
                            <!-- <span>you are stil missing<span id="salary_still_need">25</span> EGP</span> -->
                        </div>
                    </div>
                </div>
        </div>
<script>
$(document).ready(function(){
    //Target
    $.ajax({
        // the url
        url: 'controlar/dashboard.cont.php',
        // http method
        type: 'POST', 
        // data to submit
        data: {
            needTo: 'get_cards_data'
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
            var res = JSON.parse(data);    
            let info = res.respond;
            let dedication= info.dedication;
            let salary = info.salary;
            let target= info.target;
            console.log(data); 
            $('#target_aproved').text(target);//span
            //let agintTarget = $('#target_input').val()// agint target
            let progress_width = Math.round(target/22*100)
            $('#target_per_counter').text(progress_width)//span
            $('#target_progressbar').attr("style",`width:${progress_width}%;`);//the target progress bar 

            $('#dedication_progressbar').attr("style",`width:${0}%;`);
            $('#dedication_per_counter').text(dedication)//
            $('#dedication_still_need').text(dedication)//

            $('#salary_per_counter').text(salary);

            },
        error: function (Xhr, textStatus, errorMessage) {
            //xhr object , status text
            console.log('Error' + errorMessage + ' status: '+ textStatus);
            }                                       
});
    // Attendance
    const date = new Date();
    let Thismonth = date.getMonth()+1;
    $.ajax({
        // the url
        url: 'controlar/dashboard.cont.php',
        // http method
        type: 'POST', 
        // data to submit
        data: {
            Thismonth: Thismonth,
            needTo: 'get_month_attendance'
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
            // console.log(data); 
            // Display the returned data in browser
            // console.log(data)
             var res = JSON.parse(data);
            if(res.state == 'good'){
                if(res.respond ==='no data'){

                }else{
                    var daysCount = res.respond.length;
                     var progress_width = daysCount/22*100 ;
                     $('#attendance_progressbar').attr("style",`width:${Math.round(progress_width)}%;`);
                     $('#attendance_per_counter').html(Math.round(daysCount));
                     $('#attendance_still_need').html(Math.round(22-daysCount));
                     // console.log(progress_width);
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

});
</script>
<?php
include 'compo/foot.php';
?>