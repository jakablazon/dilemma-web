<?php

include_once 'db.php';
include_once 'helpers.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$value = "";
$value = isset($_POST['val']) ? $_POST['val'] : '';
$value = !empty($_POST['val']) ? $_POST['val'] : '';

$id = "";
$id = isset($_POST['id']) ? $_POST['id'] : '';
$id = !empty($_POST['id']) ? $_POST['id'] : '';


$value = ($value == 'left' ? 'count1' : 'count2');
increment($conn, $id, $value);


if (!isset($return)) {
    $return = array(
        'type' => 'success',
        'message' => 'Vote cast!',
    );
}

echo json_encode($return);

$conn->close();