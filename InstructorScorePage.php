<?php session_start() ?>
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
				<h3> Welcome, <?php echo $_SESSION["user_id"] ?>! </h3>
				
				<?php $username = "mad949";

        $password = "Infinit3";

		// Connection info. Still not totally clear on this, but In Sharon We Trust, I guess.
        $db_conn_str =
            "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)
                                       (HOST = cedar.humboldt.edu)
                                       (PORT = 1521))
                            (CONNECT_DATA = (SID = STUDENT)))";

        $conn = oci_connect($username, $password, $db_conn_str);

		// Inform the user then give up if the login fails.
        if (!$conn)
        {
            ?>
            <p> Sorry, could not log into Oracle. </p>

            <?php
            exit;
        }
			?>
	<fieldset>
		<legend> Results </legend>

        <table>
		<thead>
            <caption><h3>Quiz Scores</h3></caption>
            <tr> 
				<th scope="col"><strong> Quiz Number </strong></th>
                <th scope="col"><strong> User Name </strong></th>
				<th scope="col"><strong> Phase </strong></th>
				<th scope="col"><strong> Date </strong></th>
				<th scope="col"><strong> Correct </strong></th>
				<th scope="col"><strong> Total </strong></th>
			</tr>
		</thead>
		<tbody>
        <?php
		
			$score_query_str = "select ss.score_id, ss.user_id, ss.phase_num, ss.date_stamp, ss.que_right, ss.que_total
				from Student_Scores ss 
				join students s on ss.user_id = s. student_id
				join project_users p on ss.user_id = p.user_id
				where s.teacher_id = '".$_SESSION['user_id']."'
												order by score_id";
			
			$score_query = oci_parse($conn, $score_query_str);

			oci_execute($score_query, OCI_DEFAULT);

            while (oci_fetch($score_query))
            {
                $curr_score_id = oci_result($score_query, 'SCORE_ID');
                $curr_user_id = oci_result($score_query, 'USER_ID');
				$curr_phase = oci_result($score_query, 'PHASE_NUM');
                $curr_date_taken = oci_result($score_query, 'DATE_STAMP');
				$curr_correct = oci_result($score_query, 'QUE_RIGHT');
				$curr_total_asked = oci_result($score_query, 'QUE_TOTAL');
                ?>
				
                <tr> 
					<td> <?= $curr_score_id ?> </td>
                    <td> <?= $curr_user_id ?> </td>
					<td> <?= $curr_phase ?> </td>
					<td> <?= $curr_date_taken ?> </td>
					<td> <?= $curr_correct ?> </td>
					<td> <?= $curr_total_asked ?> </td>
                </tr> 
				
                <?php
            }
            ?>
			</tbody>
         </table>
		<br>

        <?php

			oci_free_statement($score_query);
			oci_close($conn);
		?> 
				
				<input type="button" name="logout_button" value="Log Out" 
				onclick="window.location.href = 'LogoutPage.php'" />
			</fieldset>
		</fieldset>
	</body>
	
</html>
	