<?php

$question = isset($_GET['question']) ? $_GET['question'] : '';

if (!empty($question)) {
    $mysqli = new mysqli("localhost", "root", "", "quiz");

    if ($mysqli->connect_error) {
        die(sprintf("Database connection error: %s", $mysqli->connect_error));
    }

    $query = sprintf("INSERT INTO questions (question) VALUES ('$%s')", $question);
    if ($mysqli->query($query)) {
        echo "Data has been successfully added to the database.";
    } else {
        echo sprintf("Error while adding data to the database: %s", $mysqli->error);
    }

    $mysqli->close();
} else {
    echo "Missing required parameters.";
}


