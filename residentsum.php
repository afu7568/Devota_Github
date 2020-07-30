<?php
  // checking if a book has been selected
  if (!isset($_GET['resident'])) {
    header("Location:index.php?page=residents");
  }
  $resident_ID = $_GET['resident'];
  //query to get all the info from the genre and book tables based on the book_ID from the book get arrray
  $sum_sql = "SELECT * FROM resident WHERE residentID=$resident_ID";
  $sum_qry = mysqli_query($dbconnect,$sum_sql);
  $sum_aa = mysqli_fetch_assoc($sum_qry);
  //sets all the information from the query above as variables for easier access later
  $name = $sum_aa['name'];
  $img = $sum_aa['img'];
  $room_number = $sum_aa['roomNumber'];
  $location_status = $sum_aa['locationStatus'];
  $latcord = $sum_aa['latCord'];
  $loncord = $sum_aa['lonCord'];
  $other = $sum_aa['other'];
  // checking if user has confirmed delete
  if (isset($_GET['action']) && $_GET['action']=='confirmdelete') {
    //running sql to delete the book from the table
    $del_sql = "DELETE FROM resident WHERE residentID=$resident_ID";
    $del_qry = mysqli_query($dbconnect,$del_sql);
    header("Location:index.php?page=residents&message=delsuccess");
  }
 ?>
 <div class="row mx-5 my-5 py-5">
   <a href="index.php?page=residents"><< Back</a>
 </div>
      <div class="row my-5 mx-0">

      </div>
      <?php
      //checks if there is a cover image
      if ($img=='') {
        //if not then it just uses a default image
        $img='noimage.png';
      }
      ?>
      <div class="row mx-0">
        <div class="col text-right">
          <?php
          //displays all the book info
          echo "<img src='img/profPictures/$img' alt='resident photo' class='img-fluid img-thumbnail' width= '200px'>";
            ?>
        </div>
          <div class="col-6 my-2 text-left">
          <?php
          echo "<h2 class='ml-2'>$name</h2>";
          echo "<p class='ml-2 mt-0'>Room Number: $room_number</p>";
          echo "<p class='ml-2 mt-0'>Current Location: $latcord , $loncord</p>";
          echo "<p class='ml-2'>$other</p>";
          echo "<a href='index.php?page=editresident&resident=$resident_ID'><button type='button' class='py-2 px-3 m-2 mr-3 button-style-2'>Edit</button></a>";
            if (isset($_GET['action']) && $_GET['action']=='delete') {
                echo "<a href='index.php?page=residentsum&resident=$resident_ID&action=confirmdelete'><button type='button' class='py-2 px-3 m-2 mr-3 button-style-2'>Confirm Delete</button></a>";
                echo "<a href='index.php?page=residentsum&resident=$resident_ID'><button type='button' class='py-2 px-3 m-2 mr-3 button-style-2'>Cancel</button></a>";
              }else {
                echo "<a href='index.php?page=residentsum&resident=$resident_ID&action=delete'><button type='button' class='py-2 px-3 m-2 mr-3 button-style-2'>Delete</button></a>";
              }
          ?>
         </div>
      </div>
