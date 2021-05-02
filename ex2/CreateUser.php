<?php
    // Connect to DB
    $mysqli = new mysqli("mysql.eecs.ku.edu", "johnportin", "eh3iehig", "johnportin");

    // Check Connection
    if ($mysqli->connect_errno) {
        printf("<p>Connect failed: %s</p>", $mysqli->connect_error);
        exit();
    } else {
        printf("<p>Connect successfully...</p>");
    }

    // INSERT user
    $username = $_POST['username'];
    $insert_user =  "INSERT INTO Users (user_id) VALUES ('" . $username . "')";

    // Check for duplicate username before inserting
    $query = "SELECT user_id FROM Users WHERE user_id='$username'";

    $result = $mysqli->query($query);

    if ($username == "") {
        echo "<p>Cannot create user with empty username...</p>";
    }
    // Check whether the result is empty
    else if ($result->num_rows == 0) {
        // If it is empty, insert the user
        if ($mysqli->query($insert_user)) {
            echo "<p>User " . $username . " created...</p>";
        }
    } else {
        echo "<p>Duplicate username, try again...</p>";
    }

    // free result
    $result->free();

    // Close connection
    $mysqli->close();
?>