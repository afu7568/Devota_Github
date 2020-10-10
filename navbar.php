 
<!-- The Navbar. This is displayed on every page and contains navigation links to almost every part of the site
also is used to log out. The links displayed will depend on whether you are logged in or not, i.e. providing access to admin section if you are admin-->
<div class="row mt-5">
  <!-- Navbar style is set to light as it fit with the style of my site, and allows for the navbar collapse image to be visible-->
  <nav class='navbar navbar-expand-xl col-12 position-fixed custom-nav navbar-bg'>

    <!--Displays logo-->
    <a class="" href="index.php"><img class='mx-4' src="img/log.png" height="100%" width="50px"></a>

    <!--Collapsing navbar so that the website is responsive for different device sizes-->
    <button class="navbar-toggler navbar-light"  type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon navbar navbar-dark"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <!--List of navbar items on the left side-->
      <ul class="navbar-nav mr-auto">
        <li class='nav-item'>
          <a class='nav-link my-3 px-4 link-style' href='index.php'>Home</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link my-3  px-4 link-style' href='index.php?page=about'>About Us</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link my-3  px-4 link-style' href='index.php?page=vita_trace'>Vita Trace</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link my-3  px-4 link-style' href='index.php?page=contact'>Contact Us</a>
        </li>
      </ul>

      <!--List of navbar items on the right side-->
      <ul class="navbar-nav ml-auto">
        <?php
          //Checks if the user is logged in
          if (session_status() == PHP_SESSION_ACTIVE){
            //Checks if the user is logged in as an admin
            if ($_SESSION['admin']==1){
              //If they are an admin then a link to the admin section is put in the navbar
              echo "<li class='nav-item dropdown'>
                <a class='nav-link my-3  px-4 link-style ' href='index.php?page=adminsection'>Admin</a>
              </li>";
            }
            //If a user is logged in then a link to the cart page of the website is added, and a button which logs out the user
            else {
              echo "<li class='nav-item dropdown'>
                <a class='nav-link my-3  px-4 link-style ' href='index.php?page=residents'>Residents</a>
              </li>";
            }
            echo "<li class='nav-item dropdown'>
              <a class='nav-link my-3  px-4 link-style ' href='index.php?page=map'>Map</a>
            </li>
            <li class='nav-item dropdown'>
              <a class='nav-link my-3  px-4 link-style' href='index.php?logout=1'>Logout</a>
            </li>";
          }
          //If a user is not logged in then the only link displayed is a link to the login and sign up page on the website
          else{
            echo "<li class='nav-item dropdown'>
              <a class='nav-link my-3  px-4 link-style' href='index.php?page=loginsignup'>Login</a>
            </li>";
          }
         ?>
      </ul>
    </div>
  </nav>
</div>
