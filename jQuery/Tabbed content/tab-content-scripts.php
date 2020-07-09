<?php


function hc_tabbed_content_scripts() {
		?>
		<script>
		function openView(evt, viewName) {
			// Declare all variables
			var i, tabcontent, tablinks;

			// Get all elements with class="tabcontent" and hide them
			tabcontent = document.getElementsByClassName("tabcontent");
			for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			}

			// Get all elements with class="tablinks" and remove the class "active"
			tablinks = document.getElementsByClassName("tablinks");
			for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			}

			// Show the current tab, and add an "active" class to the button that opened the tab
			document.getElementById(viewName).style.display = "block";
			evt.currentTarget.className += " active";
		}
		</script>
		<script>
			document.getElementById("defaultOpen").click();
		</script>
		<?php	
}
add_action( 'wp_footer', 'hc_tabbed_content_scripts' );