<!DOCTYPE html>
<html>
	<head>
		<title>Get Info</title>
		<link rel="stylesheet" type="text/css" href="GetInfo.css">
		<script src="Date.js"></script>
	</head>
	
	<body>
	<form action="GetInfo.php" method="Post">
	
	<table border="0" class="in">
	
	<caption> Get Information </caption>
	
	<tr>
	<th colspan="2">
	<div id="clock" style="color:black"></div>
	</th>
	</tr>
	
	<tr>
	<th> Doctor_ID : </th>
	<td> <input type="text" name="dr" /> </td>
	</tr>
	
	<tr>
	<th> Patient_SSN : </th>
	<td> <input type="text" name="pn" /> </td>
	</tr>
	
	<tr>
	<td> <input type="submit" value="DONE" /> </td>
	</tr>
	</table>
		
		
	</form>
	<?php
	// Connect to the database
	$db_connection = mysqli_connect('localhost', 'root', '', 'webproject');

	// Check if the connection was successful
	if (!$db_connection) {
    die('Connection failed: ' . mysqli_connect_error());
	}

	if (isset($_POST['dr']) && ($_POST['dr'] > 0)){	
	// Get the input value from a form or query string
	$input_value = $_POST['dr'];
	
	// Escape the value to be checked
	$value = mysqli_real_escape_string($db_connection, $_POST['dr']);

	// Select specific data from the table using the input value
	$sql = "SELECT Patient, Patient_SSN, P_Phone, P_Address, Blood_Group, P_Status FROM hospital WHERE Doctor_ID = '$value'";
	$result = mysqli_query($db_connection, $sql);

	// Check if the query was successful
	if (!$result) {
    die('Error: ' . mysqli_error($db_connection));
	}
	
	if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_assoc($result);
				$col_names = array_keys($row);
				
				echo '<table border="1" class="a1" >';
				echo '<tr>';
				for ($i=0; $i < count($col_names); $i++)
				{
					echo "<th class='a1'>$col_names[$i]</th>";
				}
				echo '</tr>';
				
				do
				{
					echo '<tr>';
					/*
					for ($i=0; $i < count($col_names); $i++)
					{
						echo "<td>$row[$col_names[$i]]</td>";
					}
					*/
					foreach ($row as $col => $val)
					{
						echo "<td class='a2' >$val</td>";
					}
					echo '</tr>';
				}while($row = mysqli_fetch_assoc($result));
				
				echo '</table>';
				
			}else
				echo "<p>Invalid Id!!</p>";
	
	}

	if (isset($_POST['pn']) && ($_POST['pn'] > 0)){
	// Get the input value from a form or query string
	$input_value2 = $_POST['pn'];
	
	// Escape the value to be checked
	$value2 = mysqli_real_escape_string($db_connection, $_POST['pn']);

	// Select specific data from the table using the input value
	$sql2 = "SELECT Doctor, Doctor_ID, D_Specialization FROM hospital WHERE Patient_SSN = '$value2'";
	$result2 = mysqli_query($db_connection, $sql2);

	// Check if the query was successful
	if (!$result2) {
    die('Error: ' . mysqli_error($db_connection));
	}
	
	if(mysqli_num_rows($result2) > 0)
			{
				$row2 = mysqli_fetch_assoc($result2);
				$col_names2 = array_keys($row2);
				
				echo '<table border="1" class="a2">';
				echo '<tr>';
				for ($i=0; $i < count($col_names2); $i++)
				{
					echo "<th class='b1'>$col_names2[$i]</th>";
				}
				echo '</tr>';
				
				do
				{
					echo '<tr>';
					/*
					for ($i=0; $i < count($col_names2); $i++)
					{
						echo "<td>$row[$col_names2[$i]]</td>";
					}
					*/
					foreach ($row2 as $col2 => $val2)
					{
						echo "<td class='b2'>$val2</td>";
					}
					echo '</tr>';
				}while($row2 = mysqli_fetch_assoc($result2));
				
				echo '</table>';
				
			}else
				echo "<p>Invalid SSN</p>";
	
	}
	
	

	// Close the connection
	mysqli_close($db_connection);
	?>

	</body>		
</html>