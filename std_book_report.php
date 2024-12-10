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

if (isset($_POST['email'])) {
    $studentEmail = $_POST['email'];
    
    // Sanitize the email input to prevent SQL injection
    $studentEmail = $conn->real_escape_string($studentEmail);

    // Fetch data from the database (use quotes for string in SQL)
    $sql = "SELECT * FROM std_book WHERE Email='$studentEmail'";  
    
    $result = $conn->query($sql);

    // Check if there are results
    if ($result->num_rows > 0) {
        // Display data in a table
        echo "<table border='1'>";
        echo "<tr><th>Email</th><th>Book ID</th><th>Title</th><th>Author</th><th>Branch</th><th>Published Year</th></tr>";
        
        // Output data for each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Bookid']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Title']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Author']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Branch']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Publish_Year']) . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "No books found.";
    }
}
$conn->close();
?>
