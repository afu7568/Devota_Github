<!-- Script for Google Maps UI -->
<?php
if (session_status() != PHP_SESSION_ACTIVE){
  header("Location: index.php");
};
if ($_SESSION['admin'] == 0){
  $residentID = $_SESSION['user_ID'];
  $resident_select_sql = "SELECT * FROM resident WHERE resthomeID=$residentID";
  $resident_select_qry = mysqli_query($dbconnect, $resident_select_sql);
}
else {
  $resident_select_sql = "SELECT * FROM resthome";
  $resident_select_qry = mysqli_query($dbconnect, $resident_select_sql);
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
      if ($_SESSION['admin'] == 0){
        while ($resident_select_aa = mysqli_fetch_assoc($resident_select_qry)){
          $device_ID = $resident_select_aa['device_ID'];
          $gps_select_sql = "SELECT latitude, longitude 
                            FROM gps 
                            WHERE device_ID = '$device_ID'
                            ORDER BY time_stamp DESC LIMIT 1";
          $gps_select_qry = mysqli_query($dbconnect, $gps_select_sql);

          do{
            $latCord = $gps_select_aa['latitude'];
            $lonCord = $gps_select_aa['longitude'];
            $name = $resident_select_aa['name'];
            echo "
            var marker = new google.maps.Marker({
            position: new google.maps.LatLng($latCord,$lonCord),
            map: map,
            title: '$name'});
            marker.setMap(map);
            ";
          } while ($gps_select_aa = mysqli_fetch_assoc($gps_select_qry));
        }
      }
      else{
        while ($resident_select_aa = mysqli_fetch_assoc($resident_select_qry)){
          $latCord = $resident_select_aa['latitude'];
          $lonCord = $resident_select_aa['longitude'];
          $name = $resident_select_aa['name'];
          echo "
          var marker = new google.maps.Marker({
          position: new google.maps.LatLng($latCord,$lonCord),
          map: map,
          title: '$name'});
          marker.setMap(map);
          ";
        }
      }
    ?>}
  google.maps.event.addDomListener(window, 'load', initialize);
</script>
<div id="googleMap" class='col-7 mx-5' style="height:500px;float:right;border-radius:15px;"></div>

</div>