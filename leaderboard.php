<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboards</title>
    <!-- Include Bootstrap CSS and JavaScript -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Include your custom CSS -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <center>
        <header>Server Leaderboard</header>
        <break>
        <button class="btn btn-info" onclick="location.reload()">Refresh</button>
        <breakspace>
    </center>
    <div class="container-xl">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Amount</th>
                </tr>  
            </thead>
            <tbody>
                <?php
                // Your PHP code for database connection and query
                $host = 'fill'; // Change this to your actual database host
                $username = 'fill';
                $password = 'fill';
                $database = 'fill';

                // Create connection
                $conn = new mysqli($host, $username, $password, $database);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Query the table
                $query = "SELECT DISTINCT rpname, wallet FROM darkrp_player ORDER BY wallet DESC LIMIT 10";
                $result = $conn->query($query);

                // Check if any rows were returned
                if ($result === false) {
                    die("Error in query: " . $conn->error);
                }

                if ($result->num_rows > 0) {
                    // Loop through each row
                    while ($row = $result->fetch_assoc()) {
                        // Access row data
                        $name = $row['rpname'];
                        $wallet = $row['wallet'];

                        // Display the row data
                        echo "<tr>";
                        echo "<td>$name</td>";
                        echo "<td>" . number_format($wallet) . " R.M</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No results found.</td></tr>";
                }

                // Close the connection
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>


</body>
</html>
