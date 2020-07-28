<?php
//seeing if the addbook session has been set and if it hasn't then setting them all to their blank defaults
	if(!isset($_SESSION['addbook'])) {
		$_SESSION['addbook']['title']="";
		$_SESSION['addbook']['genre_ID']="1";
		$_SESSION['addbook']['author']="";
		$_SESSION['addbook']['publisher']="";
		$_SESSION['addbook']['bookcover']="noimage.png";
	} else {
//if the session has been set it means they've been to the next page
//this means an image must have been uploaded so if they go back to the confirm page it will say file exists
//to get around it we remove the photo from the img folder
		if($_SESSION['addbook']['bookcover']!="noimage.png"){
			unlink("img/".$_SESSION['addbook']['bookcover']);
		}
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
	<!--Input form for admin to input details for new book-->
	<!--Uses the sessions for the value so if they came back from the confirm page it would have the same inputs from before-->
	<form method="post" action="index.php?page=addBookConfirm" enctype="multipart/form-data">
		<p>Name: <input type="text" name="title" value="<?php echo $_SESSION['addbook']['title']; ?>" required /></p>
		<p>Photo: <input type="file" name="fileToUpload" id="fileToUpload" /></p>
		<p>Room Number: <input type="text" name="author" value="<?php echo $_SESSION['addbook']['author']; ?>" required/></p>
		<p>Other Information: </p>
		<p><input type="text" name="publisher" value="<?php echo $_SESSION['addbook']['publisher']; ?>" required/></p>
		<input type="submit" name="addbook" value="Submit" class="btn btn-primary" />
	</form>
  <p></p>
  <p><a href="index.php?page=residents"><< Back to list</a></p>
  </div>
  <div class="col">

  </div>
</div>
