<?php
	// Adds new resident to the database
	$enter_sql= "INSERT INTO resident (resthomeID, name, roomNumber, other, img) VALUES ('".mysqli_real_escape_string($dbconnect, $_SESSION['resthome'])."', '".mysqli_real_escape_string($dbconnect, $_SESSION['addresident']['name'])."', '".mysqli_real_escape_string($dbconnect, $_SESSION['addresident']['roomNumber'])."', '".mysqli_real_escape_string($dbconnect, $_SESSION['addresident']['other'])."', '".mysqli_real_escape_string($dbconnect, $_SESSION['addresident']['img'])."')";
	$enter_query=mysqli_query($dbconnect, $enter_sql);
	// Unset the addstock session
	unset($_SESSION['addresident']);
?>
<div class="alert alert-info alert-dismissible fade show" role="alert">
	New resident has been succesfully added
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
