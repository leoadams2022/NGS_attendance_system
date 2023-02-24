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
<title>Admin Announcements</title>
<style>
            body{
                background:#eee;
            }

            hr {
                margin-top: 20px;
                margin-bottom: 20px;
                border: 0;
                border-top: 1px solid #FFFFFF;
            }
            a {
                color: #82b440;
                text-decoration: none;
            }
            .blog-comment::before,
            .blog-comment::after,
            .blog-comment-form::before,
            .blog-comment-form::after{
                content: "";
                display: table;
                clear: both;
            }

            .blog-comment{
                /* padding-left: 15%; */
                /* padding-right: 15%; */
            }

            .blog-comment ul{
                list-style-type: none;
                padding: 0;
            }

            .blog-comment img{
                opacity: 1;
                filter: Alpha(opacity=100);
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                    -o-border-radius: 4px;
                        border-radius: 4px;
            }

            .blog-comment img.avatar {
                position: relative;
                float: left;
                margin-left: 0;
                margin-top: 0;
                width: 65px;
                height: 65px;
                border-radius: 50%;
                outline: 0.1px #00000045 solid;
            }

            .blog-comment .post-comments{
                border: 1px solid #eee;
                margin-bottom: 20px;
                margin-left: 85px;
                margin-right: 0px;
                padding: 10px 20px;
                position: relative;
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                    -o-border-radius: 4px;
                        border-radius: 4px;
                background: #fff;
                color: #6b6e80;
                position: relative;
            }

            .blog-comment .meta {
                font-size: 13px;
                color: #aaaaaa;
                padding-bottom: 8px;
                margin-bottom: 10px !important;
                border-bottom: 1px solid #eee;
            }

            .blog-comment ul.comments ul{
                list-style-type: none;
                padding: 0;
                margin-left: 85px;
            }

            .blog-comment-form{
                padding-left: 15%;
                padding-right: 15%;
                padding-top: 40px;
            }

            .blog-comment h3,
            .blog-comment-form h3{
                margin-bottom: 40px;
                font-size: 26px;
                line-height: 30px;
                font-weight: 800;
            }
            .icons_div > span {
                font-size: 20px;
                float: right;
                color: #9e9e9e70;
                text-transform: capitalize;
                transition: color 0.5s;
                cursor: pointer;
            }
            .icons_div > span#copy_span:hover {
                color: blue;
            }
            .icons_div > span#update_span:hover{
                color: green;
            }
            .icons_div > span#delete_span:hover{
                color: red;
            }
            .alert_for_Copy_func {
                position: fixed;
                top: 60px;
                right: 5px;
                z-index: 100;
            }
            /* for the taps */
            .tab-content>.active {
                display: block;
                width: 100%;
            }
            /* icons div  */
            .icons_div > span {
                margin: 0.3rem;
            }
            .nav-pills .myNavLink.active {
                background: #7f7e7e;
                color: white;
                font-weight: 600;
            }
            .nav-pills .myNavLink {
                    background: none;
                    color: #198754;
                    font-weight: 500;
            }
            span.slelect_all_rec_span,
            span.slelect_all_cam_span{
                background: #ffffff63;
                border: 0.5px solid white;
                border-radius: 5px;
                padding: 3px;
                transition: 0.2s;
            }
            span.slelect_all_rec_span:hover,
            span.slelect_all_cam_span:hover{
                    background: white;
                    color: black;
                }
            .include_th:before,
            .include_th:after {
                display: none !important;
            }
            .recipients_table_th::before,
            .recipients_table_th::after{
                color: white;
            }
            .dataTables_length, .dataTables_filter{
                margin-bottom: 0.5rem;
                /* color: black; */
            }
            .dataTables_length label , .dataTables_filter label{
                color: black;
            }
            div .dataTables_info {
                color: black !important;
            }
            a.paginate_button.current {
                background: #7f7e7e !important;
            }
</style>
</head>
<?php
include 'compo/navbar.admin.php';
?>
<div class="container announcements_page">
    
    <div class="alert alert-success mt-2 text-center alert_for_Copy_func" id="alertbox_success" style='display:none;' role="alert">Message Copied</div>
    <div class="alert alert-danger text-center alert_for_Copy_func" id="alertbox_danger" style='display:none;' role="alert">alert-danger</div>
        <ul class="nav nav-pills flex-row  nav-fill" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Previous Announcements</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">New Announcement</button>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">

            <!-- previous announcements -->
            <div class="tab-pane fade show active text-dark mt-2" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <!-- previous announcements ------------------------------------------------------  -->
                <div class="container bootstrap snippets bootdey">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="blog-comment">
                                <hr/>
                                <ul class="comments" id='msgsUL'>
                                
                                </ul>
                               <!-- it was here  -->
                            </div>
                        </div>
                    </div> 
                </div>
                <!-- ------------------------------------------------------  previous announcements  -->
            </div>
            <!-- New Announcement -->
            <div class="tab-pane fade text-dark mt-2" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <!-- New Announcement ------------------------------------------------------  -->
                    <div class="tabs mt-2">
                        <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="Recipients-tab-pane" role="tabpanel" aria-labelledby="Recipients-tab" tabindex="0">
                                    <div class="recipients w-100 mt-2">
                                        <table class="table table-striped table-hover agints_table" id="recipients_table">
                                            <thead>
                                                <tr class="table-dark text-center">
                                                    <th class="table-dark text-center text-capitalize Full_Name_th recipients_table_th">Full Name</th>
                                                    <th class="table-dark text-center text-capitalize user_name_th recipients_table_th">user name</th>
                                                    <th class="table-dark text-center text-capitalize include_th recipients_table_th">
                                                    <span class='slelect_all_rec_span' id="slelect_all_rec_span" onclick="select_all('resipients');">Check all</sapn>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id='recipients_tbody'>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Campaign-tab-pane" role="tabpanel" aria-labelledby="Campaign-tab" tabindex="0">
                                    <div class="campaign mt-2">
                                        <table class="table table-striped table-hover campaign_table" id="campaign_table">
                                            <thead>
                                                <tr class="table-dark text-center">
                                                    <th class="table-dark text-center text-capitalize Full_Name_th campaign_table_th">campaign</th>
                                                    <th class="table-dark text-center text-capitalize include_th campaign_table_th"><span class='slelect_all_cam_span' id="slelect_all_cam_span" onclick="select_all('campaign');">Check all</sapn></th>
                                                </tr>
                                            </thead>
                                            <tbody id='campaign_tbody'>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        </div>
                        <ul class="nav nav-pills " id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                            <button class="nav-link myNavLink active" id="Recipients-tab" data-bs-toggle="tab" data-bs-target="#Recipients-tab-pane" type="button" role="tab" aria-controls="Recipients-tab-pane" aria-selected="true">To Recipients</button>
                            </li>
                            <li class="nav-item" role="presentation">
                            <button class="nav-link myNavLink" id="Campaign-tab" data-bs-toggle="tab" data-bs-target="#Campaign-tab-pane" type="button" role="tab" aria-controls="Campaign-tab-pane" aria-selected="false">To Campaign</button>
                            </li>
                        </ul> 
                    </div>
                    <div class="form mt-3">
                        <div class="row g-3">
                            <div class="form-floating mt-3 col-md-11">
                                <!-- style="height: 100px" -->
                                <textarea class="form-control" placeholder="Write your message here" id="msg_textarea"></textarea>
                                <label for="msg_textarea">Message</label>
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-outline-success rounded-pill" id="new_msg_send_btn">Send</button>
                            </div>
                        </div>
                    </div>
                <!-- ------------------------------------------------------  New Announcement  -->
            </div>

        </div>

<script>
function get_msgs(){
        
            $.ajax({
            // the url
            url: 'controlar/announcements.cont.admin.php',
            // http method
            type: 'POST', 
            // data to submit
            data: {
                needTo: 'get_msgs'
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
                            //   console.log(data);
                    var res = JSON.parse(data);
                    // Update the page with the response
                    // console.log(res.respond);
                    if(res.msg === 'No Messages found'){
                        var msgsUl = document.getElementById('msgsUL');
                        msgsUl.innerHTML = 'No Messages found';
                    }else{
                        var msgs_obj = res.respond;
                        $('#msgsUL').html('');
                        var msgsUl = document.getElementById('msgsUL');
                        msgs_obj.forEach(function (msg, i){
                            let recipient = '';
                            let name = '';
                            if(Object.is(msg.recipient, null)){
                                name = 'Campaign';
                                recipient = msg.campaign
                            }else{
                                name = 'Recipient';
                                recipient = msg.recipient
                            }
                            msgsUl.innerHTML +=`
                            <li class="clearfix">
                                        <img class="avatar" alt="" src="<?=ROOT?>images/${msg.auther}_profile_image.jpg" onerror="this.onerror=null; this.src='<?=ROOT?>images/user.png'" >
                                        
                                        <div class="post-comments">
                                            <p class="meta">
                                                <span id="date">${msg.date_send}</span>
                                                auther :
                                                <span id="auther" style="color: black;">${msg.auther}</span>
                                                ${name} :
                                                <span id="recipient" style="color: black;">${recipient}</span>
                                            </p>
                                            <div id="msg" class="msg msg_${i}">
                                                <textarea type="text" class="form-control msg_${i}" placeholder="message" value="" id="msg_${msg.id}" >${msg.msg}</textarea>
                                                <br> 
                                                <div class='icons_div  text-center d-flex justify-content-end '>  
                                                    <span id="copy_span" title="Copy" onclick="
                                                    unsecuredCopyToClipboard('#msg_${msg.id}');
                                                    "><i class="bx bxs-copy-alt"></i></span>
                                                    
                                                    <span id="update_span" title="Update" onclick="
                                                    update_msg('${msg.id}');
                                                    "><i class="bx bx-mail-send"></i></span>

                                                    <span id="delete_span" title="Delete" onclick="
                                                    delete_msg('${msg.id}');
                                                    "><i class="bx bxs-message-x"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </li> 
                            `;
                            /* 
                            var msg_text = document.querySelector('.msg_${i}').innerText;
                            navigator.clipboard.writeText(msg_text);  
                            */
                        });
                    }
                },
            error: function (Xhr, textStatus, errorMessage) {
                //xhr object , status text
                    console.log('Error' + errorMessage + ' status: '+ textStatus);
                }
                                                    
            });
       
}

get_msgs();

function update_msg(msg_id){
            let inputID =  '#msg_'+msg_id;
            // console.log(inputID)
            $.ajax({
            // the url
            url: 'controlar/announcements.cont.admin.php',
            // http method
            type: 'POST', 
            // data to submit
            data: {
                new_msg: $(inputID).val(),
                msg_id: msg_id,
                needTo: 'update_msg'
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
                get_msgs();
                $('#alertbox_success').text('Message Updated');
                $('#alertbox_success').show(500);
                setTimeout(() => { $('#alertbox_success').hide(500);  }, 2000);     
                },
            error: function (Xhr, textStatus, errorMessage) {
                //xhr object , status text
                console.log('Error' + errorMessage + ' status: '+ textStatus);
                }                                       
            });
}

function delete_msg(msg_id){
            // let inputID =  '#msg_'+msg_id;
            // console.log(inputID)
            $.ajax({
                // the url
                url: 'controlar/announcements.cont.admin.php',
                // http method
                type: 'POST', 
                // data to submit
                data: {
                    // new_msg: $(inputID).val(),
                    msg_id: msg_id,
                    needTo: 'delete_msg'
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
                    get_msgs();
                    $('#alertbox_success').text('Message Deleted');
                    $('#alertbox_success').show(500);
                    setTimeout(() => { $('#alertbox_success').hide(500);  }, 2000);   
                    },
                error: function (Xhr, textStatus, errorMessage) {
                    //xhr object , status text
                    console.log('Error' + errorMessage + ' status: '+ textStatus);
                    }                                       
            });
}

function unsecuredCopyToClipboard(id) {
            if (window.isSecureContext && navigator.clipboard) {
                var msg_text = $(id).val();//document.querySelector(calss).value;
                    navigator.clipboard.writeText(msg_text);
                    $('#alertbox_success').text('Message Copied');
                    $('#alertbox_success').show(500);
                    setTimeout(() => { $('#alertbox_success').hide(500);  }, 2000);
            } else {
                var msg_text = $(id).val();//document.querySelector(calss).value;
                const textArea = document.createElement("textarea");
                textArea.value = text;
                document.body.appendChild(textArea);
                textArea.focus();
                textArea.select();
                try {
                    document.execCommand('copy');
                } catch (err) {
                    console.error('Unable to copy to clipboard', err);
                }
                document.body.removeChild(textArea);
                $('#alertbox_success').text('Message Copied');
                $('#alertbox_success').show(500);
                setTimeout(() => { $('#alertbox_success').hide(500);  }, 2000);
            }
                
}

$( "#home-tab" ).click(function(){ get_msgs() });
// ------------------------------------------New Messages

function get_agints_and_campagin(){
    $.ajax({
            // the url
            url: 'controlar/announcements.cont.admin.php',
            // http method
            type: 'POST', 
            // data to submit
            data: {
                needTo: 'get_all_agints'
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
                    var res = JSON.parse(data);

                    var objResipients = res.respond;
                    var objCampaigns = res.msg;

                   
                    
                    //this is for the data table defaults
                    $.extend( $.fn.dataTable.defaults, {
                            searching: true,
                            ordering:  true
                        } );

                    drawTable(objResipients, 'recipients_tbody', 'resipients');
                    $('#recipients_table').DataTable();
                    
                    drawTable(objCampaigns, 'campaign_tbody', 'campaign');
                    $('#campaign_table').DataTable();                   
                },
            error: function (Xhr, textStatus, errorMessage) {
                //xhr object , status text
                    console.log('Error' + errorMessage + ' status: '+ textStatus);
                }
                                                    
            });
}

// get_agints_and_campagin();

$( "#profile-tab" ).click(function(){ get_agints_and_campagin() });

$( "#new_msg_send_btn" ).click(function() {
    var resipients = get_resipients_or_campaigns();
    // console.log(sendBy);
    
    // console.log(sendBy);
    $.ajax({
        // the url
        url: 'controlar/announcements.cont.admin.php',
            // http method
        type: 'POST', 
            // data to submit
        data: {
            needTo: 'send_msg',
            resipientsArray: resipients,
            sendTo:  sendBy,
            msg: $('#msg_textarea').val()
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
            //alertbox_danger
            // get_msgs(); // i wil make it to get msgs onclik for old msgs tsb button
            // console.log(data)
            var res = JSON.parse(data);
            // console.log(res.msg);
            if(res.state  === 'bad'){
                $('#alertbox_danger').text(res.msg);
                $('#alertbox_danger').show(500);
                setTimeout(() => { $('#alertbox_danger').hide(500);  }, 2000);
            }else if(res.state  === 'good'){
                $('#alertbox_success').text(res.msg);
                $('#alertbox_success').show(500);
                setTimeout(() => { $('#alertbox_success').hide(500);  }, 2000);   
            }
            },
        error: function (Xhr, textStatus, errorMessage) {
            //xhr object , status text
            console.log('Error' + errorMessage + ' status: '+ textStatus);
            }                                       
    });
    sendBy = 'null';
});

var sendBy = 'null';
function get_resipients_or_campaigns(){
  var resipientArray = [];
  var campaignArray = [];
  var resipiebtTabBtn = document.getElementById('Recipients-tab');
  var isResipientsTabActive = resipiebtTabBtn.classList.contains('active');
  var campaignTabBtn = document.getElementById('Campaign-tab');
  var iscampaignTabActive = campaignTabBtn.classList.contains('active');
  if(isResipientsTabActive){
      sendBy = 'resipients';
      var markedCheckbox = document.getElementsByName('rerecipient_checkbox');  
      for (var checkbox of markedCheckbox) {  
        if (checkbox.checked)  
        //   document.body.append(checkbox.value + ' ');  
        // let resipient = checkbox.value;
        resipientArray.push(checkbox.value);
      }  
    //   console.log(resipientArray);
      return resipientArray;
  }else if(iscampaignTabActive){
    sendBy = 'campaign';
    var markedCheckbox = document.getElementsByName('campaign_checkbox');  
      for (var checkbox of markedCheckbox) {  
        if (checkbox.checked)  
        //   document.body.append(checkbox.value + ' ');  
        // let resipient = checkbox.value;
        campaignArray.push(checkbox.value);
      }  
    //   console.log(campaignArray);
      return campaignArray;
  }
}

function select_all(resCam){
        if(resCam === 'resipients'){
            if( $('#slelect_all_rec_span').text()==='Un Check All'){
                var markedCheckbox = document.getElementsByName('rerecipient_checkbox');  
                for (var checkbox of markedCheckbox) {  
                        if (checkbox.checked){
                            // inputs[i].checked = true;  
                            checkbox.checked = false;
                        } else{
                            
                        }
                    } 
                    $('#slelect_all_rec_span').text('Check all'); 
            }else{
                var markedCheckbox = document.getElementsByName('rerecipient_checkbox');  
                for (var checkbox of markedCheckbox) {  
                        if (checkbox.checked){
                            // inputs[i].checked = true;  
                        } else{
                            checkbox.checked = true;
                            
                        }
                    }  
                    $('#slelect_all_rec_span').text('Un Check All');
            }
           
     
        }else if(resCam === 'campaign'){
            if( $('#slelect_all_cam_span').text()==='Un Check All'){
                var markedCheckbox = document.getElementsByName('campaign_checkbox');  
                for (var checkbox of markedCheckbox) {  
                    if (checkbox.checked){
                        checkbox.checked = false; 
                    }else{
                        
                    }
                }  
                $('#slelect_all_cam_span').text('Check All');
            }else{
                var markedCheckbox = document.getElementsByName('campaign_checkbox');  
                for (var checkbox of markedCheckbox) {  
                    if (checkbox.checked){
                
                    }else{
                        checkbox.checked = true; 
                
                    }
                }  
                $('#slelect_all_cam_span').text('Un Check All');
            }
        }

}

function drawTable(jsData, tbody, resCam) { 
    if(resCam ==='resipients'){
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
            td.innerHTML = `<input class="form-check-input rerecipient_checkbox" name="rerecipient_checkbox" type="checkbox" value="${jsData[i].user_name}">`; 
        }
    }else if(resCam === 'campaign'){
        var tr, td;
        tbody = document.getElementById(tbody);
        tbody.innerHTML = '';
        for (var i = 0; i < jsData.length; i++) {
            tr = tbody.insertRow(tbody.rows.length);
            tr.setAttribute("class", "table-primary text-center");

            td = tr.insertCell(tr.cells.length);
            td.setAttribute("class", "table-primary text-center");
            td.innerHTML = jsData[i];

            td = tr.insertCell(tr.cells.length);
            td.setAttribute("class", "table-primary text-center");
            td.innerHTML = `<input class="form-check-input campaign_checkbox" name="campaign_checkbox" type="checkbox" value="${jsData[i]}">`; 
        }
    }

        
}

</script>
<?php
include 'compo/foot.admin.php';
?>