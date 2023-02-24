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
<title>Tools</title>
<style>
	
	</style>
</head>
<?php
include 'compo/navbar.php';
?>
<!-- <div class="height-100 bg-light"> -->
<div class="container">
<ul class="nav nav-pills flex-row  nav-fill" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Profile</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Contact</button>
          </li>
          <!-- <li class="nav-item" role="presentation">
            <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false" disabled>Disabled</button>
          </li> -->
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active text-dark mt-2" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
			<p>This is A TAB Named : home</p>
		</div>
          <div class="tab-pane fade text-dark mt-2" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
			<p>This is A TAB Named : profile</p>
		</div>
          <div class="tab-pane fade text-dark mt-2" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
			<p>This is A TAB Named : contact</p>
		</div>
          <!-- <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">...</div> -->
        </div>
<script>

</script>
<?php
include 'compo/foot.php';
?>