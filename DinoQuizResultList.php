<!-- Mitch Duty
CS 328 - HW 6-2
5-9-2019 -->
<html>
	
	<head>
		<link href="Hw6_2_Styles.css" type="text/css" rel="stylesheet"/>
	
		<title> Quiz Report </title>
		
	</head>
	
	<body>
	<h2> Quiz Data </h2>
	    
	<?php $username = "mad949";

        $password = "uNSPKBL0";

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
		<span>

        <table >
            <caption><h3>Quiz Answers and Scores</h3></caption>
            <tr> <th scope="col"> User Name </th>
                 <th scope="col" size="4" > A1 </th>
				 <th scope="col" size="4" > A2 </th>
				 <th scope="col" size="4" > A3 </th>
				 <th scope="col" size="4" > A4 </th>
				 <th scope="col" size="7" > A5 </th>
				 <th scope="col" size="7" > A6 </th>
				 <th scope="col" size="7" > A7 </th>
				 <th scope="col" size="7" > A8 </th>
				 <th scope="col" size="7" > A9 </th>
				 <th scope="col" > A10 </th>
				 <th scope="col" size="7" > Score </th> </tr>

        <?php
		
			$quiz_query_str = "select student_id, answer1, answer2, answer3, 
							answer4, answer5, answer6, answer7, answer8,
							answer9, answer10, score
							from DinoQuizForms";
			$dino_quiz_query = oci_parse($conn, $quiz_query_str);

			oci_execute($dino_quiz_query, OCI_DEFAULT);

            while (oci_fetch($dino_quiz_query))
            {
                $curr_user_id = oci_result($dino_quiz_query, 'STUDENT_ID');
                $curr_a1 = oci_result($dino_quiz_query, 'ANSWER1');
                $curr_a2 = oci_result($dino_quiz_query, 'ANSWER2');
				$curr_a3 = oci_result($dino_quiz_query, 'ANSWER3');
				$curr_a4 = oci_result($dino_quiz_query, 'ANSWER4');
				$curr_a5 = oci_result($dino_quiz_query, 'ANSWER5');
				$curr_a6 = oci_result($dino_quiz_query, 'ANSWER6');
				$curr_a7 = oci_result($dino_quiz_query, 'ANSWER7');
				$curr_a8 = oci_result($dino_quiz_query, 'ANSWER8');
				$curr_a9 = oci_result($dino_quiz_query, 'ANSWER9');
				$curr_a10 = oci_result($dino_quiz_query, 'ANSWER10');
				$curr_score = oci_result($dino_quiz_query, 'SCORE');


                ?>
                <tr> <td> <?= $curr_user_id ?> </td>
                    <td> <?= $curr_a1 ?> </td>
					<td> <?= $curr_a2 ?> </td>
					<td> <?= $curr_a3 ?> </td>
					<td> <?= $curr_a4 ?> </td>
					<td> <?= $curr_a5 ?> </td>
					<td> <?= $curr_a6 ?> </td>
					<td> <?= $curr_a7 ?> </td>
					<td> <?= $curr_a8 ?> </td>
					<td> <?= $curr_a9 ?> </td>
					<td> <?= $curr_a10 ?> </td>
					<td> <?= $curr_score ?> </td>
                </tr> 
                <?php
            }
            ?>
            </table>
			<br>

            <?php

             oci_free_statement($dino_quiz_query);
             oci_close($conn);

			?> 
		</span>
	</fieldset>
	<br>

	<form action="#" method="post">
	<fieldset>
		<legend> Extinction Button </legend>
		<label><h5>Destroy Table with Evolving Volcanic Meteors</h5></label>
		<input name="extinction_button" type="button" value="Boom."/>
	<?php
		if (isset($_POST['extinction_button']))
		{
			// Call our procedure to reset the table if they pushed the Extinction Button.
			$deletion_str = "EXEC ClearDinoForms;";
			
			$deletion_stmt = oci_parse($conn, $deletion_str);

			oci_execute($deletion_stmt, OCI_DEFAULT);
			
			echo "<span><p> BOOM. </p></span>";
			
			oci_commit($conn);
		}
	?>
	</fieldset>
	<br>
	<a href="DinoQuizLogin.html">Back to Login Page</a>
	</body>
</html>