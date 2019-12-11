<?php session_start(); ?>
<!-- Graphical Interface Design for CS 458 Group Project (Rough Draft)
Initial Design by Mitch Duty -->

<!DOCTYPE html>

<html>
	<head>
		<!-- Name the page's tab -->
		<title>Phase Window</title>
		<!-- Refer to an external CSS style sheet -->
		<link rel="stylesheet" type="text/css" href="GUI_Stylesheet.css">
		<!-- Refer to our quiz, which is written in JavaScript -->
		<script src="quiztest.js"></script>
	<head>
	
	<body>
		<!-- Create fields for each part of the GUI -->
		<fieldset id="main_field">
			<fieldset id="phase_field">
				<legend> [Current Phase] </legend>
					<fieldset id="challenge_field">
						<legend> Please select the best answer. </legend><br/>
							<section id="question">
								<form action="#">
									<input type="button" id="beginquiz" value="Begin Quiz">
								</form>
							</section><br/>
					</fieldset>
					<form action="#" method="post">
						<fieldset id="options_field">
							<legend> Options </legend>
								<input type="button" name="logout_button" value="Log Out" 
								onclick="window.location.href = 'LogoutPage.html'" />
						</fieldset>
					</form>
					<br>
			</fieldset>
					<fieldset id="player_field">
			<label> Player Information </label><br><br>
			<fieldset id="stat_field">
				<legend> Stats </legend>
					<!-- Enter variables for the user's info. -->
					<?php $name = $_SESSION['user_id'];
					strip_tags($name);
					?>
					<label> Name: <?php echo $name; ?> </label><br><br>
					<label> Phase: [Phase Number] </label><br><br>
					<label> Score:
						<section id="score">0/0</section><br>
						<section id="percent">0%</section><br>
					</label><br>
			</fieldset>
			<br>
			<fieldset id="progress_field">
				<legend> Progress </legend><br>
					<div id="quizProgress">
						<div id="progressBar"><br/></div>
					</div><br/>
					<!-- <form action="#">
						<input type="button" id="pump" value="INCREASE!"> <br/>
						<input type="button" id="deflate" value="DECREASE!">
					</form> -->
			</fieldset>
			<br>			
			<fieldset id="help_field">
				<legend> Help </legend><br>
					<input type="button" name="help_button" value="View Tutorial" onclick="window.open('TutorialPage.html');" /><br><br>
					<input type="button" name="credits_button" value="View Credits" onclick="window.open('CreditsPage.html');" /><br><br>
			</fieldset>
		</fieldset>
	<body>
</html>