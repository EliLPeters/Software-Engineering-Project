<?php session_start(); ?>

<html>
	<head>
	</head>
	<body>
		<?php
			echo 'Logging in...';
			
			$db_conn_str =
            "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)
                                       (HOST = cedar.humboldt.edu)
                                       (PORT = 1521))
                            (CONNECT_DATA = (SID = STUDENT)))";
							
			$conn = oci_connect('', '', $db_conn_str); // USERNAME AND PASSWORD REQUIRED
			
			$cmd =
			'SELECT * FROM project_users
			WHERE user_id=\''.$_POST['user_id'].'\' AND password=\''.$_POST['user_pw'].'\'';
			$stid = oci_parse($conn, $cmd);
			oci_execute($stid);

			if(oci_fetch($stid))
			{
				$_SESSION['user_id'] = strip_tags($_POST['user_id']);
			
				echo 'Login Successful!';
				echo '<script type="text/javascript">window.location.replace("InstructorScorePage.php")</script>';
			}
			else
			{
				echo 'Username and/or password incorrect!';
				echo '<script type="text/javascript">window.location.replace("InstructorLogin.html")</script>';
			}

			oci_close($conn);
		?>
	</body>
</html>