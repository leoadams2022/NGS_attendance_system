<div class="modal"></div>
<!-- </div> -->
</div>

<!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

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

			});

		
</script>
</body>
</html>