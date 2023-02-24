<?php
include 'compo/head.php';
?>
 <title>Sgin up</title>
 <!-- Custom styles for this template -->
 <link href="assets/css/sign-in.css" rel="stylesheet">
<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
      input.dddd {
         margin: 20px 0px;
      }
</style>
</head>
<body class="text-center">
<div class="container">
 <!--
  ----------------------------------------------------------------------------------------
-->
<main class="form-signin w-100 m-auto">
  <form>
    <!-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
    <h1 class="h3 mb-3 fw-normal">sign up</h1>
    <!-- `first_name`, `last_name`, `email`, `user_name`, `gender`, `phone`, `address`, `password` -->
    <div class="form-floating dddd">
      <input name="" type="" class="form-control " id="firstName" placeholder="First Name">
      <label for="floatingInput">First Name</label>
    </div>
    <div class="form-floating dddd">
      <input  name=""  type="" class="form-control " id="lastName" placeholder="Last name">
      <label for="floatingPassword">Last name</label>
    </div>
    <div class="form-floating dddd">
      <input name="" type="email" class="form-control " id="email" placeholder="name@example.com">
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating dddd">
      <input  name=""  type="" class="form-control" id="userName" placeholder="Username">
      <label for="floatingPassword">Username</label>
    </div>
    <div class="form-floating dddd">
      <!-- <input name="email" type="" class="form-control " id="username" placeholder="name@example.com"> -->
      <select name="" class="form-control" id="gender"> 
         <option value="">--</option>
         <option value="male">male</option>
         <option value="female">female</option>
      </select>
      <label for="floatingInput">gender</label>
    </div>
    <div class="form-floating dddd">
      <input  name=""  type="" class="form-control " id="phone" placeholder="0199999999">
      <label for="floatingPassword">phone</label>
    </div>
    <div class="form-floating dddd">
      <input name="" type="" class="form-control " id="address" placeholder="address">
      <label for="floatingInput">address</label>
    </div>
    <div class="form-floating dddd">
      <input  name=""  type="password" class="form-control " id="password" placeholder="Password">
      <label for="floatingPassword">password</label>
    </div>

    <div class="alert alert-danger" id="alertbox" style='display:none;' role="alert">
               
    </div>
    
    <button class="w-100 btn btn-lg btn-primary" type="submit" id="sginup">Sign up</button>
    <p class="mt-3 mb-1 text-muted">Or</p>
    <a class="mt-1 mb-3 text-muted sgininBtn" href="sgin_in.php" type="submit" id="">Sign in</a>
    <p class="mt-5 mb-3 text-muted">&copy; 2023</p>
  </form>
</main>

<script>
$(document).ready(function(){
    $("form").submit(function(event){
        // Stop form from submitting normally
        event.preventDefault();
        // geting form data
        var firstName = $('#firstName').val();
        var lastName = $('#lastName').val();
        var email = $('#email').val();
        var userName = $('#userName').val();
        var gender = $('#gender').val();
        var phone = $('#phone').val();
        var address = $('#address').val();
        var password = $('#password').val();
        // Send the form data using post
        $.ajax({
        // the url
        url: 'controlar/sgin_up.cont.php',
        // http method
        type: 'POST', 
        // data to submit
        data: {
            firstName: firstName,
            lastName: lastName,
            email: email,
            userName: userName,
            gender: gender,
            phone: phone,
            address: address,
            password: password
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
            console.log(data);
            var res = JSON.parse(data);
            if(res.state == 'good'){
              $("#alertbox").css("display", "none");
              console.log(res.url);
              window.location.href= res.url;
            }else{
              $("#alertbox").css("display", "block");
              $('#alertbox').text(res.msg);
              console.log(res.msg);
            }      
            },
        error: function (Xhr, textStatus, errorMessage) {
            //xhr object , status text
            console.log('Error' + errorMessage + ' status: '+ textStatus);
            }                                       
      });
        // $.post('controlar/sgin_up.cont.php', 
        // {
        //     firstName: firstName,
        //     lastName: lastName,
        //     email: email,
        //     userName: userName,
        //     gender: gender,
        //     phone: phone,
        //     address: address,
        //     password: password
        // }, function(data){
        //     // Display the returned data in browser
        //     console.log(data);
        //     var res = JSON.parse(data);
        //     if(res.state == 'good'){
        //       $("#alertbox").css("display", "none");
        //       console.log(res.url);
        //       window.location.href= res.url;
        //     }else{
        //       $("#alertbox").css("display", "block");
        //       $('#alertbox').text(res.msg);
        //       console.log(res.msg);
        //     }

        // });
    });
});
</script>
<?php
include 'compo/foot.php';
?>
