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
    $password =  $_SESSION["password"];
    $rank = $_SESSION["rank"];
    $campaign = $_SESSION['campaign'];
    $education = $_SESSION["education"];
    $experience = $_SESSION["experience"];
    $created_at = $_SESSION["created_at"];
*/
?>
<title>Profile</title>
<style>
		body {
			/* background: rgb(99, 39, 120) */
		}

		.form-control:focus {
			box-shadow: none;
			border-color: #BA68C8
		}

		.profile-button {
			background: rgb(99, 39, 120);
			box-shadow: none;
			border: none
		}

		.profile-button:hover {
			background: #682773
		}

		.profile-button:focus {
			background: #682773;
			box-shadow: none
		}

		.profile-button:active {
			background: #682773;
			box-shadow: none
		}

		.back:hover {
			color: #682773;
			cursor: pointer
		}

		.labels {
			font-size: 11px
		}

		.add-experience:hover {
			background: #BA68C8;
			color: #fff;
			cursor: pointer;
			border: solid 1px #BA68C8
		}
        .profile_img{
            height: 150px !important;
        }
        .profile-button {
            background: #4723d9;
        }
        .alert_for_data_update {
            /* position: absolute; */
            /* top: 9px; */
            /* left: 9%; */
        }
        @media only screen and (max-width: 768px) {
        .alert_for_data_update {
            position: absolute; 
            top: 5px; 
            left: 5px !important;
        }
        }
        .alert_for_data_update {
                position: absolute;
                top: 5px;
                left: 70px;
            }
	</style>
</head>
<?php
include 'compo/navbar.php';
?>
<!-- <div class="height-100 bg-light"> -->
<div class="container">
<div class="container rounded bg-white mt-5 mb-5">
		<div class="row">
			<div class="col-md-3 border-right">
				<div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5 profile_img" width="150px" id='profile_img' src="<?php
                    if(file_exists('images/'. $user_name .'_profile_image.jpg')){
                        echo ROOT . 'images/'. $user_name .'_profile_image.jpg?t='.time();
                    }else{
                        if($gender === 'male'){
                            echo ROOT . 'images/male.png?t='.time();
                        }else{
                            echo ROOT . 'images/female.png?t='.time();
                        }
                    }
                     ?>">
                    <span class="font-weight-bold" id="name_span"><?=$first_name?></span>
                    <span class="text-black-50" id="user_name_span"><?=$user_name?></span>
                    <span> </span>
                    <form class="mt-2" id="my-form" method="POST" enctype="multipart/form-data">
                        <label for="file" class="form-label">Add/Update Profile picture</label>
                        <input  class="form-control" type="file" name="file" id="file">
                        <button class="btn btn-outline-primary m-3" type="submit">Upload</button>
                        <span class="btn btn-outline-danger m-3" type="" id="delete_img">Delete</span>
                    </form>
                </div>
			</div>
			<div class="col-md-5 border-right">
				<div class="p-3 py-5">
					<div class="d-flex justify-content-between align-items-center mb-3">
						<h4 class="text-right">Profile</h4>
					</div>
					<div class="row mt-2">
						<div class="col-md-6">
                            <label class="labels">First Name</label>
                            <input type="text" class="form-control" placeholder="first name" value="<?=$first_name?>" id="first_name" disabled readonly>
                        </div>
						<div class="col-md-6">
                            <label class="labels">Last Name</label>
                            <input type="text" class="form-control" value="<?=$last_name?>" placeholder="Last Name" id="last_name" disabled readonly>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">User Name</label>
                            <input type="text" class="form-control" value="<?=$user_name?>" placeholder="user name" id="user_name" disabled readonly>
                        </div>
					</div>
					<div class="row mt-3">
						<!-- `id`, `first_name`, `last_name`, `email`, `user_name`, `gender`, `phone`, `address`, `password`, `campaign`, `rank`, `education`, `experience`, `created_at` -->
                        <div class="col-md-6">
                            <label class="labels">gender</label>
                            <input type="text" class="form-control" placeholder="gender" value="<?=$gender?>" id="gender" disabled readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Campaign</label>
                            <input type="text" class="form-control" placeholder="Campaign" value="<?=$campaign?>" id="campaign" disabled readonly>
                        </div>
						<div class="col-md-12">
                            <label class="labels">Mobile Number</label>
                            <input type="text" class="form-control" placeholder="phone number" value="<?=$phone?>" id="phone">
                        </div>
                        
						<div class="col-md-12">
                            <label class="labels">Address</label>
                            <input type="text" class="form-control" placeholder="address line" value="<?=$address?>" id="address">
                        </div>
						<div class="col-md-12">
                            <label class="labels">Email</label>
                            <input type="text" class="form-control" placeholder="email" value="<?=$email?>" id="email">
                        </div>
                        
					</div>
					<div class="row mt-3">
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="p-3 py-5">
					<div class="d-flex justify-content-between align-items-center experience">
                        <span>Experience</span>
                    </div>
                    <br>
					<div class="col-md-12">
                        <label class="labels">write a summary of your experience:</label>
                        <textarea type="text" class="form-control" placeholder="experience" value="" id="experience"><?=$experience?></textarea>
                    </div>
                    <br>
					<div class="col-md-12">
                            <label class="labels">write a summary of your education</label>
                            <textarea type="text" class="form-control" placeholder="education" value="" id="education"><?=$education?></textarea>
                    </div>
                    <div class="alert alert-danger mt-2 text-center alert_for_data_update" id="alertbox_danger" style='display:none;' role="alert">
                                this is the alert danger box
                    </div>
                    <div class="alert alert-success mt-2 text-center alert_for_data_update" id="alertbox_success" style='display:none;' role="alert">
                            this is the alert success box
                    </div>
                    <div class="mt-5 text-center col-md-12">
                        <button class="btn btn-primary profile-button" type="button" id="update_profile">Update Profile</button>
                    </div>
				</div>
			</div>
		</div>
	</div>
<script>
$(document).ready(function(){
    // console.log($('#education').val())
    $("#my-form").submit(function(event){
        // Stop form from submitting normally
        event.preventDefault();
        // geting form data
        // Get the file data
         file = $('#file')[0].files[0];

        // Create a FormData object to store the file data
        var formData = new FormData();
        formData.append('file', file);
        formData.append('needTo', 'Add_img');
        // formData.append('filename', $('#image').attr('src').split('/').pop());
        // Send the form data using post
        $.ajax({
            url: 'controlar/profile.cont.php',
            type: 'POST',
            data: formData,
            // needTo: 'Add_img',
            contentType: false,
            processData: false,
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
                location.reload(true);
                },
            success: function(response) {
                // Update the page with the URL of the uploaded file
                console.log(response);
                // $('#header_img_div').html('<img src="' + response + '">');
                
            },
            error: function() {
                // Handle errors
                // console.log(response);
                $('#response').text('An error occurred while uploading the file.');
            }
        });
    });
    $('#delete_img').click(function (){
        $.post('controlar/profile.cont.php',{needTo: 'delete_img'},function(data){
            // console.log(data);
            location.reload(true);
        });
    });

    $('#update_profile').click(function (){
        $.ajax({
            // the url
            url: 'controlar/profile.cont.php',
            // http method
            type: 'POST', 
            // data to submit
            data: {
                phone: $('#phone').val(),
                address: $('#address').val(),
                email: $('#email').val(),
                education: $('#education').val(),
                experience: $('#experience').val(),
                needTo: 'update_profile'
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
                    var res = JSON.parse(data);
                    if(res.state == 'good'){
                            if(res.msg == 'successfully updated data'){
                                $('#alertbox_success').html(res.msg);
                                $('#alertbox_success').show(500);
                                setTimeout(() => { $('#alertbox_success').hide(500); location.reload(true);}, 3000);
                                
                            }else{
                                $('#alertbox_danger').html(res.msg);
                                $('#alertbox_danger').show(500);
                                setTimeout(() => { $('#alertbox_danger').hide(500); location.reload(true);}, 3000);
                                // setTimeout(() => {  location.reload(true);  }, 4000);
                            }
                    }else{

                    }
     
                },
            error: function (Xhr, textStatus, errorMessage) {
                //xhr object , status text
                console.log('Error' + errorMessage + ' status: '+ textStatus);
                }                                       
        });
    // $.post('controlar/profile.cont.php',
    //             //the psot data to send
    //             {
    //             phone: $('#phone').val(),
    //             address: $('#address').val(),
    //             email: $('#email').val(),
    //             education: $('#education').val(),
    //             experience: $('#experience').val(),
    //             needTo: 'update_profile'
    //             },
    //             // function to ran after the requst
    //             function(data){
    //                 // Display the returned data in browser
    //                console.log(data);
    //                 var res = JSON.parse(data);
    //                 if(res.state == 'good'){
    //                         if(res.msg == 'successfully updated data'){
    //                             $('#alertbox_success').html(res.msg);
    //                             $('#alertbox_success').show(500);
    //                             setTimeout(() => { $('#alertbox_success').hide(500); location.reload(true); }, 3000);
                                
    //                         }else{
    //                             $('#alertbox_danger').html(res.msg);
    //                             $('#alertbox_danger').show(500);
    //                             setTimeout(() => { $('#alertbox_danger').hide(500); }, 3000);
    //                             // setTimeout(() => {  location.reload(true);  }, 4000);
    //                         }
    //                 }else{

    //                 }

    // });
    });
});

</script>

<?php
include 'compo/foot.php';
?>