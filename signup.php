<div class="col-md-12 col-lg-6  text-center">
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
