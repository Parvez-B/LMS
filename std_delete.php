<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


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
$sql = "DELETE FROM student WHERE Std_Id=?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id); // 'i' means integer

if ($stmt->execute()) {
   // echo "Record deleted successfully";
   echo "<script>
   alert('Student Deleted Successfully');
   window.location.href = 'Admin.html'; // Redirect after login
 </script>";
   // header("Location: Admin.html");
} else {
    echo "<script>
    alert('Invalid Student ID');
   
  </script>";
   echo "Error deleting record: " . $conn->error;
}

// Close connections
$stmt->close();
$conn->close();
?>
</body>
</html>
