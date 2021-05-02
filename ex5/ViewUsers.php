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
$result = $mysqli->query("SELECT * FROM Users");

echo "<table> <tr> <th>Username</th> </tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr> <td>" . $row['user_id'] . "</td> </tr>";
}

echo "</table> </body> </html>";

// free result
$result->free();

// Close connection
$mysqli->close()
?>