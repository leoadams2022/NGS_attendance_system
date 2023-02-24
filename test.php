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
<title>Page Tamplate</title>
</head>
<?php
include 'compo/navbar.php';
?>
<!-- <div class="height-100 bg-light"> -->
<div class="container">
    <h1>this is a test page </h1>
<script>
    $.post('controlar/test_cont.php',
                //the psot data to send
                {
                attendance_csae: '',
                needTo: ''
                },
                // function to ran after the requst
                function(data){
                    // Display the returned data in browser
                    console.log(data);
                    // var res = JSON.parse(data);
                    // if(res.state == 'good'){
                    // // console.log(res.msg);
                    // // console.log(res.respond);
                    // if(res.respond === 'show_#in_btn'){
                    //     $('#in_btn').show(time);
                    //     $('#out_btn').hide(time);
                    // }else if (res.respond === 'show_#out_btn'){
                    //     $('#in_btn').hide(time);
                    //     $('#out_btn').show(time);
                    // }
                    // }else{
                    // // console.log('requst returned bad');
                    // }

                });
</script>
<?php
include 'compo/foot.php';
?>