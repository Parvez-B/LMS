<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the ID from the form
$id = $_POST['dbookid'];

// Prepare the delete statement
$sql = "DELETE FROM book_details WHERE Bookid=?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id); // 'i' means integer

if ($stmt->execute()) {
    echo "<script>
    alert('Book Deleted Successfully');
    window.location.href = 'Admin.html'; // Redirect after login
  </script>";
    
   // header("Location: Admin.html");
} else {
    echo "Error deleting record: " . $conn->error;
}

// Close connections
$stmt->close();
$conn->close();
?>
