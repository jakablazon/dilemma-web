<?php

function getUserIP()
{
    $client = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote = $_SERVER['REMOTE_ADDR'];

    if (filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }

    return $ip;
}

function increment($conn, $id, $column)
{
    mysqli_query($conn,
        "UPDATE dilemma
        SET $column=$column+1
        WHERE questionID=$id;");
}

function lock_ip($conn, $id, $user_ip)
{
    // check if ip exists
    $result = mysqli_query($conn, "SELECT ip FROM ip_lock WHERE dilemma_questionID = $id AND ip='$user_ip'");

    if ($result->num_rows == 0) {
        mysqli_query($conn, "INSERT INTO ip_lock (ip, dilemma_questionID, vote_date) VALUES ('$user_ip', $id, CURDATE())");
    } else {
        mysqli_query($conn, "UPDATE ip_lock SET vote_date = CURDATE() WHERE dilemma_questionID = $id AND ip = '$user_ip'");
    }
}