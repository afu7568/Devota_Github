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
        ?><a href="index.php?page=loginsignup&signup=yes"><button type="button" class='py-2 px-3 m-2 mr-3 button-style-2'>Sign Up</button> </><?php
       } ?>
    </form>
  </div>
