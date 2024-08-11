<?php
	
require_once 'connectionwp.php';
	
	if (isset($_POST['t1']) && isset($_POST['id']) && isset($_POST['t2']) && isset($_POST['ssn']) && isset($_POST['t3']) && isset($_POST['t4']) && isset($_POST['t5']) && isset($_POST['b']) && isset($_POST['s']) && isset($_POST['cs']) )
	{
		
		$Doctor = $_POST['t1'];
		$Doctor_ID = $_POST['id'];
        $Patient = $_POST['t2'];
		$Patient_SSN = $_POST['ssn'];
        $P_Phone = $_POST['t3'];
        $P_Address = $_POST['t4'];
        $D_Specialization = $_POST['t5'];
        $Blood = $_POST['b'];
        $Sign = $_POST['s'];
        $Status = $_POST['cs'];
        $BS = $Blood.$Sign;
		
		
		$sql_add_query = "insert into hospital values ('$Doctor','$Doctor_ID','$Patient','$Patient_SSN','$P_Phone','$P_Address','$D_Specialization','$BS','$Status')";
		if(mysqli_query($con, $sql_add_query))
		{
			echo "Done";
		}
		else
		{
			die("Could not add the new hospital"); //like echo. But appear in a section especially for the error
		}
	}

	mysqli_close($con);
	
?>