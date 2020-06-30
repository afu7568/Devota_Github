
<!-- The Login/SignUp Page. This page allows for the a user to create and account and login into the website.
Having an account for this site is required for purchasin items. This is so that information of what the user has
added to their cart can have specific references to their acount instead of using methods like cookies. It also
allows for flexibility in the future by adding in functionallity like remembering past order, user information, etc.-->
<div class="row">
<?php
    include("loginaction.php");
    include("signupaction.php");
    if (isset($_GET['signup'] ) and $_GET['signup']=='yes'){
        include('login.php');
        include('signup.php');
      }
    else{
      ?>
      <div class="col-3">
      </div>
      <?php include('login.php'); ?>
      <div class="col-3">
      </div>
      <?php
    }
 ?>
</div>
