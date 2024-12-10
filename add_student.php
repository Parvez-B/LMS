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

// Check if form data has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stdid = $_POST['stdid'];
    $name = $_POST['stdname'];
    $Email = $_POST['Email'];
    $password = $_POST['password'];
   
    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO student (Std_Id,Name,Email,Password) VALUES (?,?, ?, ?)");
    $stmt->bind_param("issi", $stdid,$name, $Email, $password); // 'sssis' indicates the types: string, string, string, integer, string

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>
        alert('Student Added Successfully');
        window.location.href = 'Admin.html'; // Redirect after login
      </script>";
        //header("Location: Admin.html");
       
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
