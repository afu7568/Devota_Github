
<!-- The Admin Section. This page displays products on the website and allows you to navigate these product with a search bar
clicking on these product will direct you to a page to delete them. There is also an option at the end of all of the products on the page
that links to a page where you can add products-->

<?php

  //Verifies that the user is an admin, redirects them if they aren't
  include('admincheck.php');

  //Checks whether the user has made a search
  $admin_search_sql = "SELECT userID, name, latCord, lonCord FROM resthome ORDER BY name";

  //Queries the database
  $admin_search_qry = mysqli_query($dbconnect, $admin_search_sql);

  //If an error occurs then it redirects to an error 404 page
 ?>

<!--Actual html starts-->
<div class="row">
  <div class="col-lg-12 col-xl-8 m-auto">
    <!--Products section, this is the only section of this page-->
    <h3 class="text-center">Resthomes</h3>
    <!--The search bar - used for search for products by name-->
    <div class="row">
      <?php
        //Loops through every product that was returned by the above query
        while ($admin_search_aa = mysqli_fetch_assoc($admin_search_qry)){

          //Assigns product information to variables
          $user_ID = $admin_search_aa['userID'];
          $name = $admin_search_aa['name'];
          $latCord = $admin_search_aa['latCord'];
          $lonCord = $admin_search_aa['lonCord'];

          //Displays the products information in a format. The cover links to a page that can eb sued to delete the product (and possibly edit later on)
          echo "<div class='col-12 col-sm-6 col-md-4 col-lg-3 my-3'>
              <div class='col-12 product-background rounded text-center btn-light'>
                <a href='index.php?page=editproduct&product=$user_ID'>
                </a>
                <h4 class='product-title py-4'>$name</h4>
                <p class='product-info'>Latitude: $latCord</p>
                <p class='product-info'>Longitude: $lonCord</p>
              </div>
            </div>";
        }
      ?>
    </div>
  </div>
</div>
