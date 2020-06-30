
<!-- The Login/SignUp Page. This page allows for the a user to create and account and login into the website.
Having an account for this site is required for purchasin items. This is so that information of what the user has
added to their cart can have specific references to their acount instead of using methods like cookies. It also
allows for flexibility in the future by adding in functionallity like remembering past order, user information, etc.-->
<?php
  include('login.php');
  include('signup.php');
 ?>
<div class="row">
  <!--Login section of the page-->
  <div class="col-12 col-lg-6 my-5 text-center">
    <h2>Login</h2>
    <form action="index.php?page=loginsignup" method="post">
      <input class="login-input" type="text" name="username" placeholder="Username" maxlength="19" required/>
      <br>
      <input class="login-input" type="password" name="password" placeholder="Password" maxlength="19" required/>
      <?php
        //If feedback message was given by the login.php function then it is displayed
        if(isset($login_feedback)){
          echo "$login_feedback";
        }
        else{
          echo "<br>";
        }
      ?>
      <br>
      <input class="py-2 px-3 m-2 mr-3 button-style-2" type="submit" name="login" value="Login" />
      <?php if (!isset($_GET['signup'])){
        ?><a class=' href="index.php?page=loginsignup&signup=yes"'><button type="button" class='py-2 px-3 m-2 mr-3 button-style-2'>Sign Up</button> </><?php
       } ?>
    </form>
  </div>
  <?php
    if (isset($_GET['signup'])){
      if ($_GET['signup']=='yes') {
   ?>
  <div class="col-md-12 col-lg-6 my-5 text-center">
    <h3>Sign Up</h3>
    <form action="index.php?page=loginsignup" method="post">
      <input class="login-input" type="text" name="newusername" placeholder="Username" maxlength="19" required/>
      <br>
      <input class="login-input" type="password" name="newpassword" placeholder="Password" maxlength="19" required/>
      <br>
      <input class="login-input" type="password" name="confirmpassword" placeholder="Confirm Password" maxlength="19" required/>
      <?php
        //If feedback message was given by the login.php function then it is displayed
        if(isset($signup_feedback)){
          echo "$signup_feedback";
        }
        else{
          echo "<br>";
        }
      ?>
      <br>
      <input class="py-2 px-3 m-2 mx-3 button-style-2" type="submit" name="signup" value="Sign Up" />
    </form>
  </div>
  <?php }} ?>
</div>
