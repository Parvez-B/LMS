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

// Retrieve form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ubookid1 = $_POST['ubookid'];
    $ubookTitle1 = $_POST['ubookTitle'];
    $ubookAuthor1 = $_POST['ubookAuthor'];
    $ubranch1 = $_POST['ubranch'];
    $upublicationYear1 = $_POST['upublicationYear'];
    $uQuantity1 = $_POST['uQuantity'];

    // Prepare the update statement
    $sql = "UPDATE book_details SET Book_Title=?,Author=?,Branch=?,Publish_Year=?,Quantity=? WHERE bookid=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssii", $ubookTitle1, $ubookAuthor1, $ubranch1, $upublicationYear1, $uQuantity1, $ubookid1); // 'ssi' means string, string, integer

    if ($stmt->execute()) {
       // echo "Record updated successfully";
        echo "<script>
        alert('Book updated Successfully');
        window.location.href = 'Admin.html'; // Redirect after login
      </script>";
       // header("Location: Admin.html");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
// Close connections
$stmt->close();
$conn->close();
?>
</body>
</html>