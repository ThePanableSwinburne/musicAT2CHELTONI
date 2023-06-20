<?php
require_once 'config.php';

// Perform the MySQL query to retrieve the desired data (e.g., MEMORY)
$query = "SELECT * FROM MEMORY";
$result = mysqli_query($link, $query);

// Check if the query was successful
if ($result) {
    // Fetch the data into an associative array
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Return the data as JSON response
    echo json_encode($data);
} else {
    echo 'failed to execute query';
}

// Close the database connection
mysqli_close($link);
?>
