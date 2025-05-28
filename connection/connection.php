<?php
$conn = new mysqli("localhost", "root", "", "lauk_ketjeh");

if ($conn->connect_error) {
    echo "failed connect to db".$conn->connect_error;
}
?>