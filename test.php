<?php
// Takes raw data from the request
$json = file_get_contents('php://input');

// Converts it into a PHP object
$data = json_decode($json);
echo $data;
echo "123";

echo $data
$json = {'food','hi'}
$data = json_decode($json);
echo $data;
?>