<?php session_start(); ?>

<!-- Graphical Interface Design for CS 458 Group Project (Rough Draft)
Initial Design by Mitch Duty -->

<!DOCTYPE html>

<html>

	<head>
		<title> Phase Results </title>
		
		<!-- Link to our CSS stylesheet for easy styling -->
		<link rel="stylesheet" type="text/css" href="GUI_Stylesheet.css">
	</head>
	
	<body>
		<?php
			$db_conn_str =
            "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)
                                       (HOST = cedar.humboldt.edu)
                                       (PORT = 1521))
                            (CONNECT_DATA = (SID = STUDENT)))";
							
			$conn = oci_connect('', '', $db_conn_str); // USERNAME AND PASSWORD REQUIRED
			
			$cmd =
			'INSERT INTO Student_Scores
			VALUES(
			       score_seq.NEXTVAL,
			       \''.$_SESSION['user_id'].'\',
			       '.intval($_POST['phase']).',
				   SYSDATE,
				   '.intval($_POST['right']).',
				   '.intval($_POST['total']).')';
			echo $cmd;
			$stid = oci_parse($conn, $cmd);
			oci_execute($stid);
			
			oci_close($conn);
			
			echo $_SESSION['user_id'];
		?>
		<fieldset id="title_field">
			<fieldset id="score_field">
				<h3> Congratulations!<br>
				<br>
				You have completed Phase <?php echo $_POST["phase"] ?>! </h3>
				
				<h4> You scored <?php echo $_POST["right"] ?> out of <?php echo $_POST["total"] ?> </h4><br><br>
				
				<fieldset id="continue_field">
					<legend> Action Required </legend>
						<h4> Do you wish to continue? </h4><br>
						<input type="submit" name="continue_button" value="Continue" />
						<input type="button" name="logout_button" value="Log Out" 
						onclick="window.location.href = 'LogoutPage.php'" />
				</fieldset>
			</fieldset>
		</fieldset>
	</body>
	
</html>