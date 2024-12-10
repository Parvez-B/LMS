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
    $id = $_POST['bookid'];
    $title = $_POST['bookTitle'];
    $author = $_POST['bookAuthor'];
    $brn = $_POST['branch'];
    $pubyear = $_POST['publicationYear'];
    $quantity = $_POST['quantity'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO book_details (Bookid,Book_title, Author,Branch, publish_year, Quantity) VALUES (?,?, ?, ?, ?, ?)");
    $stmt->bind_param("isssii", $id,$title, $author, $brn, $pubyear, $quantity); // 'sssis' indicates the types: string, string, string, integer, string

    // Execute the statement
    if ($stmt->execute()) {
      
        echo "<script>
        alert('Book Added Successfully');
        window.location.href = 'Admin.html'; // Redirect after login
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
