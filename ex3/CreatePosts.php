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
    $content = $_POST['post'];
    $insert_post =  "INSERT INTO Posts (author_id, content) VALUES ('$username', '$content')";

    // Check for duplicate username before inserting
    $query = "SELECT user_id FROM Users WHERE user_id='$username'";

    $result = $mysqli->query($query);

    if ($content == "") {
        echo "<p>We prefer posts with content. Please write something...</p>";
    }
    else if ($username == "") {
        echo "<p>Please enter a username</p>";
    }
    // Check whether the result is empty
    else if ($result->num_rows == 0) {
        // If it is empty, insert the user
        echo "<p>Please create an account before posting...</p>";
    } else {
        echo "<p>Creating post for " . $username . "</p>";
        if ($mysqli->query($insert_post)) {
            echo "<p>Successfully created post<p/>";
        }
    }

    // free result
    $result->free();

    // Close connection
    $mysqli->close();
?>