<!-- Graphical Interface Design for CS 458 Group Project (Rough Draft)
Initial Design by Mitch Duty -->

<!DOCTYPE html>

<html>

	<head>
		<title> Instructor Score Page </title>
		
		<!-- Link to our CSS stylesheet for easy styling -->
		<link rel="stylesheet" type="text/css" href="GUI_Stylesheet.css">
	</head>
	
	<body>
		<fieldset id="title_field">
			<fieldset id="score_field">
				<legend>Log In</legend>
				<h3> Welcome, <?php echo $_POST["user_id"] ?>! </h3>
				
				<table id="table_entries">
					<thead>
						<tr>
							<td><strong>Entry</strong></td>
							<td><strong>User Name</strong></td>
							<td><strong>Phase</strong></td>
							<td><strong>Date</strong></td>
							<td><strong>Correct</strong></td>
							<td><strong>Total</strong></td>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table><br>
				
				<input type="button" name="logout_button" value="Log Out" 
						onclick="window.location.href = 'LogoutPage.html'" />
				
			</fieldset>
		</fieldset>
	</body>
	
</html>
	