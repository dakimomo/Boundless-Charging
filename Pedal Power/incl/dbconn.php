<?php


$conn = mysqli_connect('localhost','INF4001Nweb','INF4001Npass',
              'pedal_power');//servername, username, password, databasename


if ($conn->connect_errno) {
    echo "<b>Failed to connect to MySQL:</b> ("
        . $conn->connect_errno . ") "
        . $conn->connect_error;
}
?>
