<?php

include_once 'db.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$value = "";
$value = isset($_GET['index']) ? $_GET['index'] : '';
$value = !empty($_GET['index']) ? $_GET['index'] : '';
if ($value == -1) {
    $sql = "SHOW TABLE STATUS";
    $result = mysqli_query($conn, $sql);
    while ($array = mysqli_fetch_array($result)) {
        $total = $array['Data_length'] + $array['Index_length'];
        echo $array['Rows'];
    }
} else {
    $sql = "SELECT * FROM dilemma WHERE questionID=$value";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo json_encode($row);
        }
    } else {
        echo "0 results";
    }
}


$conn->close();