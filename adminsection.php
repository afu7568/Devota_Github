
<!-- The Admin Section. This page displays residents on the website and allows you to navigate these resident with a search bar
clicking on these resident will direct you to a page to delete them. There is also an option at the end of all of the residents on the page
that links to a page where you can add residents-->

<?php

  //Verifies that the user is an admin, redirects them if they aren't
  include('admincheck.php');

  //Checks whether the user has made a search
  $admin_search_sql = "SELECT userID, name, latitude, longitude FROM resthome ORDER BY name";

  //Queries the database
  $admin_search_qry = mysqli_query($dbconnect, $admin_search_sql);

  //If an error occurs then it redirects to an error 404 page
 ?>

<!--Actual html starts-->
<div class="row">
  <div class="col-lg-12 col-xl-8 m-auto">
    <!--residents section, this is the only section of this page-->
    <h3 class="text-center">Resthomes</h3>
    <!--The search bar - used for search for residents by name-->
    <div class="row">
      <?php
        //Loops through every resident that was returned by the above query
        while ($admin_search_aa = mysqli_fetch_assoc($admin_search_qry)){

          //Assigns resident information to variables
          $user_ID = $admin_search_aa['userID'];
          $name = $admin_search_aa['name'];
          $latitude = $admin_search_aa['latitude'];
          $longitude = $admin_search_aa['longitude'];
          $latitude=number_format((float)$latitude, 2, '.', '');
          $longitude=number_format((float)$longitude, 2, '.', '');

          //Displays the residents information in a format. The cover links to a page that can eb sued to delete the resident (and possibly edit later on)
          echo "<div class='col-12 col-sm-6 col-md-4 col-lg-3 my-3'>
              <div class='col-12 resident-background rounded text-center btn-light'>
                <a href='index.php?page=editresident&resident=$user_ID'>
                </a>
                <h4 class='resident-title py-4'>$name</h4>
                <h5 class='resident-info'>Latitude: $latitude</h5>
                <h5 class='resident-info'>Longitude:$longitude</h5>
              </div>
            </div>";
        }
      ?>
    </div>
  </div>
</div>
