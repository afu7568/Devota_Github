<?php
//seeing if the addresident session has been set and if it hasn't then setting them all to their blank defaults
	if(!isset($_SESSION['addresident'])) {
		$_SESSION['addresident']['name']="";
		$_SESSION['addresident']['roomNumber']="";
		$_SESSION['addresident']['other']="";
		$_SESSION['addresident']['img']="noimage.png";
	}

?>
<div class="row my-5 py-5">
  <div class="col-1">
  </div>
  <div class="col">

  </div>
  <div class="col">

  <h1> <ins>New Resident</ins> </h1>
	<h4>Enter details for new resident</h4>
	<!--Input form for admin to input details for new resident-->
	<!--Uses the sessions for the value so if they came back from the confirm page it would have the same inputs from before-->
	<form method="post" action="index.php?page=addresidentConfirm" enctype="multipart/form-data">
		<p>Name: <input type="text" name="name" value="<?php echo $_SESSION['addresident']['name']; ?>" required /></p>
		<p>Photo: <input type="file" name="fileToUpload" id="fileToUpload" /></p>
		<p>Room Number: <input type="text" name="roomNumber" value="<?php echo $_SESSION['addresident']['roomNumber']; ?>" required/></p>
		<p>Other Information: </p>
		<p><input type="text" name="other" value="<?php echo $_SESSION['addresident']['other']; ?>" required/></p>
		<input type="submit" name="addresident" value="Submit" class="btn btn-primary" />
	</form>
  <p></p>
  <p><a href="index.php?page=residents"><< Back to list</a></p>
  </div>
  <div class="col">

  </div>
</div>
