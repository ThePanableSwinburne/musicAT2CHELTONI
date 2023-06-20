<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Search Results</h2>
                    </div>
                    <div id="searchResults">
                        <?php
                        // Include config file
                        require_once "config.php";

                        // Check if the search term is provided
                        if (isset($_GET['searchTerm'])) {
                            // Sanitize the search term to prevent SQL injection
                            $searchTerm = mysqli_real_escape_string($link, $_GET['searchTerm']);

                            // Prepare the SQL query to search for matching records
                            $sql = "SELECT * FROM songs WHERE title LIKE '%$searchTerm%' OR artist LIKE '%$searchTerm%' OR album LIKE '%$searchTerm%'";

                            // Attempt the query execution
                            if ($result = mysqli_query($link, $sql)) {
                                if (mysqli_num_rows($result) > 0) {
                                    echo '<table class="table table-bordered table-striped">';
                                    echo "<thead>";
                                    echo "<tr>";
                                    echo "<th>#</th>";
                                    echo "<th>Title</th>";
                                    echo "<th>Artist</th>";
                                    echo "<th>Album</th>";
                                    echo "<th>Release Year</th>";
                                    echo "<th>Language</th>";
                                    echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['title'] . "</td>";
                                        echo "<td>" . $row['artist'] . "</td>";
                                        echo "<td>" . $row['album'] . "</td>";
                                        echo "<td>" . $row['release_year'] . "</td>";
                                        echo "<td>" . $row['language'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";
                                    echo "</table>";
                                    // Free result set
                                    mysqli_free_result($result);
                                } else {
                                    echo '<div class="alert alert-danger"><em>No matching records were found.</em></div>';
                                }
                            } else {
                                echo '<div class="alert alert-danger"><em>Oops! Something went wrong.</em></div>';
                            }
                        } else {
                            echo '<div class="alert alert-danger"><em>No search term provided.</em></div>';
                        }

                        // Close connection
                        mysqli_close($link);
                        ?>
                    </div>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
