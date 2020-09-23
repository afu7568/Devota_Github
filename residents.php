
<?php
if( isset($_GET['message'])){
    if ($_GET['message']=='addsuccess') {
      include("enterresident.php");
    }
    if ($_GET['message']=='delsuccess') {
      ?>
      <div class="alert alert-info alert-dismissible fade show" role="alert">
      	Resident Succesfully deleted
      	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
      		<span aria-hidden="true">&times;</span>
      	</button>
      </div>
      <?php
    }
}
?>
<!-- The Admin Section. This page displays residents on the website and allows you to navigate these resident with a search bar
clicking on these resident will direct you to a page to delete them. There is also an option at the end of all of the residents on the page
that links to a page where you can add residents-->
<?php
  $resthome_id = $_SESSION['resthome'];
  //Checks whether the user has made a search
  $admin_search_sql = "SELECT * FROM resident WHERE resthomeID='$resthome_id'  ORDER BY name";

  //Queries the database
  $admin_search_qry = mysqli_query($dbconnect, $admin_search_sql);

  //If an error occurs then it redirects to an error 404 page
 ?>

<!--Actual html starts-->
<div class="row">
  <div class="col-6 col-sm-5 col-md-4 col-lg-6 col-xl-7 m-auto py-5">
    <!--residents section, this is the only section of this page-->
    <h3 class="text-center">Residents</h3>
    <!--The search bar - used for search for residents by name-->
    <div class="row">
      <?php
        //After displaying all residents from the database it then displays a blank resident that can be click on to add new items to the database
        //This is appropriatly labeled as "New Item"
        echo "<div class='col-12  col-lg-6 col-xl-4 my-3'>
          <a href='index.php?page=addresident'>
          <div class='col-12 resident-background rounded text-center'> 
          <br>
          <br>
          <h3 class='resident-title py-5'>Add</h3>
          </div>
          </a>
        </div>";
        //Loops through every resident that was returned by the above query
        while ($admin_search_aa = mysqli_fetch_assoc($admin_search_qry)){

          //Assigns resident information to variables
          $residentID = $admin_search_aa['residentID'];
          $img = $admin_search_aa['img'];
          $username = $admin_search_aa['name'];
          //checks if there is a photo
          if ($img=='') {
            //if not then it just uses a default image
            $img='noimage.png';
          }

          //Displays the resident information in a format. The cover links to a page that can eb sued to delete the resident (and possibly edit later on)
          echo "
            <div class='col-12 col-lg-6 col-xl-4 my-3'>
              <a href='index.php?page=residentsum&resident=$residentID'>
                <div class='col-12 resident-background rounded text-center'>
                <img src='img/profPictures/$img' alt='resident photo' class='img-fluid img-thumbnail mt-5' width= '120px'>
                <h4 class='resident-title pt-3'>$username</h4>
                <br>
                </div>
              </a>
            </div>
            ";
        }
      ?>
       
    </div>
  </div>
</div>
