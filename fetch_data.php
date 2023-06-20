<?php
require_once 'config.php';

// Initialize an array to hold the results from each table
$data = [];

// Define the tables to fetch data from
$tables = ['MEMORY', 'STORAGE', 'DISPLAY', 'GPU'];

// Loop through each table and fetch the data
foreach ($tables as $table) {
    $query = "SELECT * FROM $table";
    $result = mysqli_query($link, $query);

    // Check if the query was successful
    if ($result) {
        // Fetch the data into an associative array
        $tableData = mysqli_fetch_all($result, MYSQLI_ASSOC);

        // Add the table data to the main data array
        $data[$table] = $tableData;
    } else {
        echo 'Failed to execute query for table: ' . $table;
    }
}

// Return the data as JSON response
echo json_encode($data);

// Close the database connection
mysqli_close($link);
?>
