<?php
include 'compo/head.php';
?>
 <title>Signin</title>
 <!-- Custom styles for this template -->
 <!-- <link href="assets/css/sign-in.css" rel="stylesheet"> -->
<style>
      html,
      body {
        height: 100%;
      }

      body {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 330px;
        padding: 15px;
      }

      .form-signin .form-floating:focus-within {
        z-index: 2;
      }

      .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
      }

      .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }





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
      .sgininBtn {
        /* margin: 10px 0px; */
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
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating dddd">
      <input name="email" type="" class="form-control " id="username" placeholder="name@example.com">
      <label for="floatingInput">User Name</label>
    </div>
    <div class="form-floating">
      <input  name="pass"  type="password" class="form-control dddd" id="password" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    
    <div class="alert alert-danger" id="alertbox" style='display:none;' role="alert">
               
    </div>
    
    <button class="w-100 btn btn-lg btn-primary  sgininBtn" type="submit" id="sginin">Sign in</button>
    <p class="mt-3 mb-1 text-muted">Or</p>
    <a class="mt-1 mb-3 text-muted sgininBtn" href="sgin_up.php" type="submit" id="">Sign Up</a>
    <p class="mt-5 mb-3 text-muted">&copy; 2023</p>
  </form>
</main>

<script>
$(document).ready(function(){
    $("form").submit(function(event){
        // Stop form from submitting normally
        event.preventDefault();
        // geting form data
        var username = $('#username').val();
        var pass = $('#password').val();
        // Send the form data using post
        $.ajax({
            // the url
            url: 'controlar/sgin_in.cont.php',
            // http method
            type: 'POST', 
            // data to submit
            data: {
              username: username,
              pass: pass
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
                // console.log(data);
                var res = JSON.parse(data);
                if(res.state == 'good'){
                  $("#alertbox").css("display", "none");
                  // console.log(res.url);
                  // console.log(res.respond);
                  window.location.href= res.url;
                }else{
                  $("#alertbox").css("display", "block");
                  $('#alertbox').text(res.msg);
                  // console.log(res.msg);
                }      
                },
            error: function (Xhr, textStatus, errorMessage) {
                //xhr object , status text
                console.log('Error' + errorMessage + ' status: '+ textStatus);
                }                                       
        });
    });
});
</script>
<?php
include 'compo/foot.php';
?>
