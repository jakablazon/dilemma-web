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

$user_ip = getUserIP();

// check if user voted today
$sql = "SELECT * FROM ip_lock WHERE ip = '$user_ip' AND dilemma_questionID = $id AND vote_date = CURDATE()";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    $return = array(
        'type' => 'error',
        'message' => 'You already voted today!',
    );
} else {
    $value = ($value == 'left' ? 'count1' : 'count2');
    increment($conn, $id, $value);
    lock_ip($conn, $id, $user_ip);
}

if (!isset($return)) {
    $return = array(
        'type' => 'success',
        'message' => 'Vote cast',
    );
}

echo json_encode($return);

$conn->close();