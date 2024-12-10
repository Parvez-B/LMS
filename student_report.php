<?php
// Database connection parameters
$servername = "localhost";
$username = "root";  
$password = "";  
$dbname = "library";  

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT * FROM student";  
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Display data in a table
    echo "<table border='1'>";
    echo "<tr><th>Student ID</th><th>Name</th><th>Email</th><th>Password</th> </tr>";
    
    // Output data for each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['Std_Id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Password']) . "</td>";
    
        echo "</tr>";
    }
    
    echo "</table>";
     
} else {
    echo "No books found.";
}

$conn->close();
?>
