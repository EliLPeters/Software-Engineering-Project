<?php session_start() ?>
<!-- Graphical Interface Design for CS 458 Group Project (Rough Draft)
Initial Design by Mitch Duty -->

<!DOCTYPE html>

<html>

	<head>
		<title> Logout Successful </title>
		
		<!-- Link to our CSS stylesheet for easy styling -->
		<link rel="stylesheet" type="text/css" href="GUI_Stylesheet.css">
	</head>
	
	<body>
		<fieldset id="title_field">
			<fieldset id="logout_field">
				<h3> Thanks for stopping by! </h3>
				
				<h4> You have been successfully logged out. </h4><br><br>
				
				<a href="StudentLogin.html">Student Login Page</a><br>
				<a href="InstructorLogin.html">Instructor Login Page</a>
				
			</fieldset>
		</fieldset>
	</body>
	
</html>
<?php session_destroy() ?>