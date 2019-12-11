<?php session_start(); ?>

<html>
	<head>
	</head>
	<body>
		<?php
			echo 'Logging in...';
			/*
			$db_conn_str =
            "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)
                                       (HOST = cedar.humboldt.edu)
                                       (PORT = 1521))
                            (CONNECT_DATA = (SID = STUDENT)))";
							
			$conn = oci_connect('mad949', 'Infinit3', $db_conn_str);
			
			$cmd =
			'SELECT current_phase FROM project_users
			WHERE user_id=\''.$_POST['user_id'].'\' AND password=\''.$_POST['user_pw'].'\'';
			$stid = oci_parse($conn, $cmd);
			oci_execute($stid);
			
			oci_close($conn);
			
			$row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS); */
			
			$_SESSION['user_id'] = strip_tags($_POST['user_id']);
			
			echo 'Login Successful!<br/><a href="QuizInterface.php">Click here to procede!';
		?>
	</body>
</html>