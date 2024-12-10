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
    $name = $_POST['name'];
    $Email= $_POST['Email'];
    $msgg = $_POST['msgg'];
     

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO contact (Name,Email_id,Msg) VALUES (?,?, ?)");
    $stmt->bind_param("sss",$name,$Email,$msgg); // 'sssis' indicates the types: string, string, string, integer, string

    // Execute the statement
    if ($stmt->execute()) {
      
        echo "<script>
        alert('Messsage sent!');
        window.location.href = 'Home.html'; // Redirect after login
      </script>";
        // header("Location: Admin.html#table2");
        // exit();
       
    } else {
          
         echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
