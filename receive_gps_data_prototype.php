<?php
//Because it's seperate from the rest of the site, it needs to be connected to the database
include("dbconnect.php");
//sets what http addresses can send/get information from the site
header("Access-Control-Allow-Origin: *");
//sets type of content being recieved
header("Content-Type: application/json; charset=UTF-8");
//sets the method 
header("Access-Control-Allow-Methods: POST");
//sets the max cache size
header("Access-Control-Allow-Max-Age: 3600");
//allowing all the headers previously set
header("Access-Control-Allow_headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//Testing code to see how the payload is being recieved
//$filename = 'file-decoded-unhexed-lat-extracted.txt';
//$myfile = fopen($filename, 'w') or die("Unable to open file!");
//fwrite($myfile, $DevEUI);
//fwrite($myfile, "\n");
//fwrite($myfile,$payload_ASCII);
//fwrite($myfile, "\n");
//fwrite($myfile,$payload_hex);
//fwrite($myfile, "\n");
//fwrite($myfile,$lat);
//fwrite($myfile, "\n");
//fwrite($myfile,$long);
//fclose($myfile);

//recieves payload and sets it to a variable
$data = file_get_contents("php://input");
//decodes the json payload so it can be formatted in php
$data = json_decode($data);
//extracting the information needed from the array (devEUI and payload-hex)
$DevEUI = $data->dev_id;
$lat = $data->payload_fields->gps_1->latitude;
$long = $data->payload_fields->gps_1->longitude;
//setting up time recieved stuff
date_default_timezone_set('UTC');
$date_time = date('Y-m-d H:i:s');
$DevEUI_check_sql = "SELECT * FROM devices WHERE DevEUI ='$DevEUI'";
$DevEUI_check_qry = mysqli_query($dbconnect, $DevEUI_check_sql);
//checking if this device has been register in the database before
if ($DevEUI_check_qry){
    $DevEUI_check_aa = mysqli_fetch_assoc($DevEUI_check_qry);
    if (!$DevEUI_check_aa){
        $DevEUI_sql = "INSERT INTO devices (DevEUI) VALUES ('$DevEUI')";
        $DevEUI_qry = mysqli_query($dbconnect,$DevEUI_sql);
        $ID_sql = "SELECT * FROM devices WHERE DevEUI ='$DevEUI'";
        $ID_qry = mysqli_query($dbconnect, $ID_sql);
        $ID_aa = mysqli_fetch_assoc($ID_qry);
        $device_ID = $ID_aa['device_ID'];
    }
    else{
        $device_ID = $DevEUI_check_aa['device_ID'];
    }
}
$gps_sql = "INSERT INTO gps ( device_ID, latitude, longitude, time_stamp) VALUES ($device_ID, $lat, $long, '$date_time')";
$gps_qry = mysqli_query($dbconnect, $gps_sql);
?>