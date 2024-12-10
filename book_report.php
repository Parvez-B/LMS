<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f0f8ff; /* Light blue background */
    padding: 20px;
}

table {
    width: 100%;
    border-collapse: collapse; /* Collapse borders */
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    margin-top: 20px;
}

th, td {
    padding: 12px;
    text-align: left;
    border: 1px solid #b0bec5; /* Light gray border */
}

th {
    background-color: #4db6ac; /* Header color */
    color: white;
    font-weight: bold;
}

tr {
    transition: background-color 0.3s ease; /* Transition for hover effect */
}

tr:hover {
    background-color: #b2dfdb; /* Light hover color */
}

td {
    background-color: #e0f7fa; /* Light blue for cells */
}

td:hover {
    background-color: #a7ffeb; /* Light greenish on hover */
}

    </style>
</head>
<body>
    


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
$sql = "SELECT * FROM book_details";  
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Display data in a table
    echo "<table border='1'>";
    echo "<tr><th>Book ID</th><th>Title</th><th>Author</th><th>Branch</th><th>Published Year</th><th>Quantity</th></tr>";
    
    // Output data for each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['Bookid']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Book_Title']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Author']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Branch']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Publish_Year']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Quantity']) . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
   
} else {
    echo "No books found.";
}

$conn->close();
?>
</body>
</html>
