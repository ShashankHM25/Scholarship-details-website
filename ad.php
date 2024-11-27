<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
</head>
<body>
    <h1>Student Details</h1>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
        </tr>
        <?php
            // Database connection parameters
            $servername = "localhost";
            $username = "root"; // Your MySQL username
            $password = "";     // Your MySQL password
            $dbname = "your_database";

            // Create a connection to the database
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check the connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // SQL query to fetch student details
            $sql = "SELECT username, email FROM users";
            $result = $conn->query($sql);

            // Display student details in the HTML table
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                   
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "No students found.";
            }

            // Close the database connection
            $conn->close();
        ?>
    </table>
</body>
</html>
