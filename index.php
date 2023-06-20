<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
          .dark-mode {
            background-color: #333;
            color: white;
        }
    </style>
    <script>
               $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            
            // Check if dark mode preference is stored in a cookie
            var darkMode = getCookie('darkMode');
            
            // Apply the stored preference on page load
            if (darkMode === 'true') {
                enableDarkMode();
            }
        });
        
        // Function to toggle dark mode and store the preference in a cookie
        function toggleDarkMode() {
            var darkMode = getCookie('darkMode');
            
            // Toggle the dark mode class
            if (darkMode === 'true') {
                disableDarkMode();
            } else {
                enableDarkMode();
            }
        }
        
        // Function to enable dark mode and set the darkMode cookie to true
        function enableDarkMode() {
            $('body').addClass('dark-mode');
            setCookie('darkMode', 'true', 365);
        }
        
        // Function to disable dark mode and set the darkMode cookie to false
        function disableDarkMode() {
            $('body').removeClass('dark-mode');
            setCookie('darkMode', 'false', 365);
        }
        
        // Function to get the value of a cookie by its name
        function getCookie(name) {
            var cookies = document.cookie.split(';');
            
            for (var i = 0; i < cookies.length; i++) {
                var cookie = cookies[i].trim();
                if (cookie.indexOf(name + '=') === 0) {
                    return cookie.substring(name.length + 1, cookie.length);
                }
            }
            
            return '';
        }
        
        // Function to set a cookie with a given name, value, and expiration days
        function setCookie(name, value, days) {
            var expires = '';
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = '; expires=' + date.toUTCString();
            }
            
            document.cookie = name + '=' + value + expires + '; path=/';
        }
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Chelton's Computer Store</h2>
                         <div class="pull-right">
                            <button class="btn btn-link" onclick="toggleDarkMode()">Toggle Dark Mode</button>
                         </div>
			<form action="search.php" method="GET" class="form-inline pull-right">
                            <input type="text" name="searchTerm" class="form-control" placeholder="Search...">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM songs";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
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
                                while($row = mysqli_fetch_array($result)){
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
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
