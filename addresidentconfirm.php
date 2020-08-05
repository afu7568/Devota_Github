<h1>hello</h1>
<?php
//makes sure that something has been posted and someone hasn't forcefully come to this page through the URL
if(isset($_POST['addresident'])) {
  $_SESSION['addresident']['name']=$_POST['name'];
  $_SESSION['addresident']['roomNumber']=$_POST['roomNumber'];
  $_SESSION['addresident']['other']=$_POST['other'];
}
else {
  header('Location:index.php?page=addresident');
}
      $feedback = "";
      $uploadOk = 1;
    	if($_FILES['fileToUpload']['name']!="") {
    		$_SESSION['addresident']['img']=$_FILES['fileToUpload']['name'];
    		$target_dir = "img/profPictures/";
    		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    		$uploadOk = 1;
    		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    		// Check if image file is a actual image or fake image
    		if(isset($_POST["submit"])) {
    			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    			if($check !== false) {
    				$uploadOk = 1;
    			} else {
    				$feedback ="File was not an image.";
    				$uploadOk = 0;
    			}
    		}
    		// Check if file already exists
    		if (file_exists($target_file)) {
    			$feedback ="Sorry, file already exists.";
    			$uploadOk = 0;
    		}
    		// Check file size
    		if ($_FILES["fileToUpload"]["size"] > 500000) {
    			$feedback = "Sorry, your file is too large.";
    			$uploadOk = 0;
    		}
    		// Allow certain file formats
    		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    			$feedback = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    			$uploadOk = 0;
    		}
    		// Check if $uploadOk is set to 0 by an error
    		if ($uploadOk == 0) {
          $_SESSION['addresident']['residentcover']='noimage.png';
    			// if everything is ok, try to upload file
    		}
        else {
          move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    		}

    } // the code below only runs if no image is selected
      //shows the info that has been entered for the new resident
    	else {
    		$_SESSION['addresident']['img']="noimage.png";
    	}
    ?>
    <div class="row mt-5 pt-5">
      <div class="col-1">
      </div>
      <div class="col text-right mt-3">
        <img src="img/profPictures/<?php echo $_SESSION['addresident']['img']; ?>" width="40%"/>
        <p class="text-danger"><?php echo $feedback ?></p>
      </div>
      <div class="col mt-5">
        <h1>Confirm resident details</h1>
        <p>Name: <?php echo $_SESSION['addresident']['name']; ?></p>
        <p>Room Number: <?php echo $_SESSION['addresident']['roomNumber']; ?></p>
        <p>Other Information: </p>
        <p><?php echo $_SESSION['addresident']['other']; ?></p>
      </div>
      <div class="col">
      </div>
    </div>
    <div class="row">
      <div class="col-1">
      </div>
      <div class="col">

      </div>
      <div class="col">
        <a href="index.php?page=addresident" class="btn btn-primary">Go back</a>
        <?php if ($uploadOk == 1){
          ?>
          <a href="index.php?page=residents&message=addsuccess" class="btn btn-primary">Confirm</a>
          <?php
        } ?>

      </div>
      <div class="col">

      </div>
    </div>
