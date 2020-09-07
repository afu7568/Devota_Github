
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
<!-- The Admin Section. This page displays products on the website and allows you to navigate these product with a search bar
clicking on these product will direct you to a page to delete them. There is also an option at the end of all of the products on the page
that links to a page where you can add products-->
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
  <div class="col-lg-12 col-xl-8 m-auto py-5">
    <!--Products section, this is the only section of this page-->
    <h3 class="text-center">Resident</h3>
    <!--The search bar - used for search for products by name-->
    <div class="row">
      <?php
        //After displaying all products from the database it then displays a blank product that can be click on to add new items to the database
        //This is appropriatly labeled as "New Item"
        echo "<div class='col-12 col-sm-6 col-md-4 col-lg-3 my-3'>
          <a href='index.php?page=addresident'>
          <div class='col-12 product-background rounded text-center btn-light'>
            <h4 class='product-title py-4'>Add</h4>
          </div>
          </a>
        </div>";
        //Loops through every product that was returned by the above query
        while ($admin_search_aa = mysqli_fetch_assoc($admin_search_qry)){

          //Assigns product information to variables
          $residentID = $admin_search_aa['residentID'];
          $img = $admin_search_aa['img'];
          $username = $admin_search_aa['name'];
          //checks if there is a photo
          if ($img=='') {
            //if not then it just uses a default image
            $img='noimage.png';
          }

          //Displays the resident information in a format. The cover links to a page that can eb sued to delete the product (and possibly edit later on)
          echo "<div class='col-12 col-sm-6 col-md-4 col-lg-3 my-3'>
              <a href='index.php?page=residentsum&resident=$residentID'>
                <div class='col-12 product-background rounded text-center btn-light'>
                <img src='img/profPictures/$img' alt='resident photo' class='img-fluid img-thumbnail mt-4' width= '60%'>
                  <h4 class='name'>$username</h4>
                </div>
              </a>
            </div>";
        }
      ?>
    </div>
  </div>
</div>
