<?php
echo "<!doctype html>

        <html lang='en'>
            <head>
                <meta charset='utf-8'>
                <link rel='stylesheet' href='style.css'>
                <title>View User</title>
            </head>
            <body>";

// Connect to DB
$mysqli = new mysqli("mysql.eecs.ku.edu", "johnportin", "eh3iehig", "johnportin");

// Retrieve user data
$user = $_POST['users'];
$result = $mysqli->query("SELECT * FROM Posts WHERE author_id='$user'");

echo "<table> <tr> <th>". $user . "'s Posts</th> </tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr> <td>" . $row['content'] . "</td> </tr>";
}

echo "</table> </body> </html>";

// free result
$result->free();

// Close connection
$mysqli->close()
?>