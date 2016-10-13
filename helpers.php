<?php

function increment($conn, $id, $column)
{
    mysqli_query($conn,
        "UPDATE dilemma
        SET $column=$column+1
        WHERE questionID=$id;");
}
