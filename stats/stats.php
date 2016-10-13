<?php
/**
 * Created by PhpStorm.
 * User: jure
 * Date: 13/10/2016
 * Time: 19:24
 */

include_once '../db.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$result = mysqli_query($conn, "SELECT option1, option2, count1, count2 FROM dilemma" );

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo json_encode($row);
    }
} else {
    echo "0 results";
}