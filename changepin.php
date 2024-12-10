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
    $Email = $_POST['email'];
    $old = $_POST['oldpass'];
    $new = $_POST['newpassword'];
    

    // Prepare the update statement
    $sql = "UPDATE student SET Password=? WHERE email=? AND Password=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isi", $new, $Email, $old); // 'ssi' means string, string, integer

    if ($stmt->execute()) {
        echo "<script>
        alert('Password Updated Successfully');
        window.location.href = 'student.html'; // Redirect after login
      </script>";
        // echo "Record updated successfully";
        // header("Location: student.html");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
// Close connections
$stmt->close();
$conn->close();
?>