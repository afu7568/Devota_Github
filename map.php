<!-- Script for Google Maps UI -->
<?php
if (session_status() != PHP_SESSION_ACTIVE){
  header("Location: index.php");
};
if ($_SESSION['admin'] == 0){
  $residentID = $_SESSION['user_ID'];
  $cart_select_sql = "SELECT residentID, name, latCord, lonCord FROM resident WHERE resthomeID=$residentID";
  $cart_select_qry = mysqli_query($dbconnect, $cart_select_sql);
}
else {
  $cart_select_sql = "SELECT userID, name, latCord, lonCord FROM resthome";
  $cart_select_qry = mysqli_query($dbconnect, $cart_select_sql);
}
?>
<div class="row">
<h3 class='text-center'><?php echo $_SESSION['name'] ?></h3>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOVimkgTO9qca4suI9LiOe8bd7nKP5G9g&sensor=false&region=NZ"></script>
<script>
  function initialize(){
    var mapProp = {
      center: new google.maps.LatLng(-43.5320, 172.6397),
      zoom:10,
      disableDefaultUI:false,
      mapTypeId: 'terrain'
    };
    var map = new google.maps.Map(document.getElementById('googleMap'),mapProp);
    <?php
      while ($cart_select_aa = mysqli_fetch_assoc($cart_select_qry)){
        $latCord = $cart_select_aa['latCord'];
        $lonCord = $cart_select_aa['lonCord'];
        $name = $cart_select_aa['name'];
        echo "
        var marker = new google.maps.Marker({
        position: new google.maps.LatLng($latCord,$lonCord),
        map: map,
        title: '$name'});
        marker.setMap(map);
        ";
      }
    ?>}
  google.maps.event.addDomListener(window, 'load', initialize);
</script>
<div id="googleMap" class='col-7 mx-5' style="height:500px;float:right;border-radius:15px;"></div>

</div>