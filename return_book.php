<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

// Check if the form values are set
if (isset($_POST['remail']) && isset($_POST['rbookid'])) {
    // Get the values from the form
    $email = $_POST['remail'];
    $bookid = $_POST['rbookid'];

    // Prepare the SQL DELETE statement
    $sql = "DELETE FROM std_book WHERE Email = ? AND Bookid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $email, $bookid);

    // Execute the DELETE statement
    if ($stmt->execute()) {
        // After deletion, update the quantity in book_details
        $update_sql = "UPDATE book_details SET Quantity = Quantity + 1 WHERE Bookid = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("i", $bookid);

        // Execute the update statement
        if ($update_stmt->execute()) {

            echo "<script>
            alert('Book Return Successfull');
            window.location.href = 'student.html?email=$email'; 
          </script>";
            // echo "Record deleted successfully, and quantity updated.";
            // header("Location: student.html");
            // exit(); // Ensure to exit after redirection
        } else {
            echo "Error updating quantity: " . $update_stmt->error;
        }

        // Close the update statement
        $update_stmt->close();
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    // Close the DELETE statement
    $stmt->close();
} else {
    echo "Please provide all required values.";
}

// Close the database connection
$conn->close();
?>
</body>
</html>