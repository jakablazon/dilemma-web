<?php

include_once 'db.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM dilemma";
$result = $conn->query($sql);

$value = "";
$value = isset($_POST['val']) ? $_POST['val'] : '';
$value = !empty($_POST['val']) ? $_POST['val'] : '';

$id = "";
$id = isset($_POST['id']) ? $_POST['id'] : '';
$id = !empty($_POST['id']) ? $_POST['id'] : '';

if ($value == 'left') {
    mysqli_query($conn,
        "UPDATE dilemma
        SET count1=count1+1
        WHERE questionID=$id;");
}

if ($value == 'right') {
    mysqli_query($conn,
        "UPDATE dilemma
        SET count2=count2+1
        WHERE questionID=$id;");
}

$conn->close();