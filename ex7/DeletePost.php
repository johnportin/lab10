<?php

    $checklist = $_POST['checklist'];

      // Connect to DB
      $mysqli = new mysqli("mysql.eecs.ku.edu", "johnportin", "eh3iehig", "johnportin");

      // Check Connection
      if ($mysqli->connect_errno) {
          printf("<p>Connect failed: %s</p>", $mysqli->connect_error);
          exit();
      } else {
          printf("<p>Connect successfully...</p>");
      }
  

    foreach($checklist as $item) {
        echo "Attempting to delete " . $item . "\n";
        $query = "DELETE FROM Posts WHERE post_id=$item";
        $result = $mysqli->query($query);
        if ($result) {
            echo "\tDeleted " . $item . "\n";
        }
    }

?>

<!-- https://stackoverflow.com/questions/4997252/get-post-from-multiple-checkboxes -->