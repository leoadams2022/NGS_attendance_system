<div class="modal"></div>
<!-- </div> -->
</div>

<!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<!-- <script  type="text/javascript" src="http://localhost/MyProject/LoginAgain/compo/assets/js/bootstrap.min.js" ></script> -->
<!-- for the nav bar  -->
<script type='text/javascript'>
			document.addEventListener("DOMContentLoaded", function(event) {
				const showNavbar = (toggleId, navId, bodyId, headerId) => {
					const toggle = document.getElementById(toggleId),
						nav = document.getElementById(navId),
						bodypd = document.getElementById(bodyId),
						headerpd = document.getElementById(headerId)
					// Validate that all variables exist
					if (toggle && nav && bodypd && headerpd) {
						toggle.addEventListener('click', () => {
							// show navbar
							nav.classList.toggle('show')
							// change icon
							toggle.classList.toggle('bx-x')
							// add padding to body
							bodypd.classList.toggle('body-pd')
							// add padding to header
							headerpd.classList.toggle('body-pd')
						})
					}
				}
				showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')
				/*===== LINK ACTIVE =====*/
				const linkColor = document.querySelectorAll('.nav_link')
				linkColor.forEach(function(link){
					var href = link.getAttribute("href");
					if(href === window.location.href){
						link.classList.add('active');
					}
				})

				// function colorLink() {
				// 	if (linkColor) {
				// 		linkColor.forEach(l => l.classList.remove('active'))
				// 		this.classList.add('active')
				// 	}
				// }
				// linkColor.forEach(l => l.addEventListener('click', colorLink))
				// Your code to run since DOM is loaded and ready


				setInterval(function(){ 
					//code goes here that will be run every 5 seconds.  
					var post_data = {
					needTo: 'get_unread_count',
					};

					// Send a POST request to the server
					$.post('controlar/announcements.cont.php', post_data)
					.done(function(data) {
							// console.log(data);
							$('#msgs_count').text(data);
					}); 
				}, 1000);
			});

	
</script>
</body>
</html>