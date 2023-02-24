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
<title>Announcements</title>
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
            span#copy {
                font-size: 20px;
                float: right;
                color: #9e9e9e70;
                text-transform: capitalize;
                transition: color 0.5s;
                cursor: pointer;
                margin-top: -20px;
            }
            span#copy:hover {
                color: blue;
            }
            .alert_for_Copy_func {
                position: fixed;
                top: 50px;
                right: 5px;
            }
</style>
</head>
<?php
include 'compo/navbar.php';
?>
<!-- <div class="height-100 bg-light"> -->
<div class="container">
<div class="container bootstrap snippets bootdey">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-comment">
                    <h3 class="text-success">Announcements</h3>
                    <hr/>
                    <ul class="comments" id='msgsUL'>
                        <!-- <li class="clearfix">
                            <img src="https://bootdey.com/img/Content/user_3.jpg" class="avatar" alt="">
                            <div class="post-comments">
                                <p class="meta"><span id="date">Dec 18, 2014 </span><span id="auther"> JohnDoe</span> says : </p>
                                <p id="msg">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Etiam a sapien odio, sit amet
                                </p>
                            </div>
                        </li>
                        <li class="clearfix">
                            <img src="https://bootdey.com/img/Content/user_2.jpg" class="avatar" alt="">
                            <div class="post-comments">
                                <p class="meta"><span id="date">Dec 19, 2014 </span><span id="auther"> JohnDoe</span> says : </p>
                                <p id="msg">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Etiam a sapien odio, sit amet

                                    
                                </p>
                            </div>
                        </li> -->
                    </ul>
                    <div class="alert alert-success mt-2 text-center alert_for_Copy_func" id="alertbox_success" style='display:none;' role="alert">
                            Message Copied
                    </div>
                </div>
            </div>
        </div>
    </div> 
<script>
// JavaScript code
$(document).ready(function() {
 // Get the data from the form
function get_msgs(){
    $.ajax({
    // the url
    url: 'controlar/announcements.cont.php',
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
                // code gos in here
                 // data retuernd data
                 // status of the request
                 // xhr object
                      console.log(data);
            var res = JSON.parse(data);
            // Update the page with the response
            // console.log(res.respond[1]['msg']);
             if(res.msg === 'No Messages found'){
                var msgsUl = document.getElementById('msgsUL');
                msgsUl.innerHTML = 'No Messages found';
            }else{
                var msgs_obj = res.respond;
                $('#msgsUL').html('');
                var msgsUl = document.getElementById('msgsUL');
                msgs_obj.forEach(function (msg, i){
                    msgsUl.innerHTML +=`
                    <li class="clearfix">
                                <img class="avatar" alt="" src="<?=ROOT?>images/${msg.auther}_profile_image.jpg" onerror="this.onerror=null; this.src='<?=ROOT?>images/user.png'" >
                                
                                <div class="post-comments">
                                    <p class="meta">
                                        <span id="date">${msg.date_send}</span>
                                        <span id="auther">${msg.auther}</span>
                                        says : 
                                    </p>
                                    <p id="msg" class="msg msg_${i}">
                                    <pre>${msg.msg}</pre>    
                                    <span id="copy" onclick="unsecuredCopyToClipboard('.msg_${i}');">
                                        <i class="bx bxs-copy-alt"></i>
                                    </span>
                                    </p>
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
setInterval(() => {
    $counter = $('#msgs_count').text();
    if($counter !=0){
        get_msgs();
    }
}, 1000);

});
//Copy function
    function Copy(calss){
                var msg_text = document.querySelector(calss).innerText;
                navigator.clipboard.writeText(msg_text);
                $('#alertbox_success').show(500);
                setTimeout(() => { $('#alertbox_success').hide(500);  }, 2000);
    }
    function unsecuredCopyToClipboard(calss) {
        if (window.isSecureContext && navigator.clipboard) {
            var msg_text = document.querySelector(calss).innerText;
                navigator.clipboard.writeText(msg_text);
                $('#alertbox_success').show(500);
                setTimeout(() => { $('#alertbox_success').hide(500);  }, 2000);
        } else {
            text  = document.querySelector(calss).innerText;
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
            $('#alertbox_success').show(500);
            setTimeout(() => { $('#alertbox_success').hide(500);  }, 2000);
        }
            
}
</script>
<?php
include 'compo/foot.php';
?>