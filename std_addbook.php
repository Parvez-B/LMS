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

// Check if the form value is set
if (isset($_POST['mbookid']) && isset($_POST['aemail'])) {
    // Get the condition value from the form
    $bookid = $_POST['mbookid'];
    $aEmail = $_POST['aemail'];

    // Prepare the SQL statement to fetch data from the source table
    $fetch_sql = "SELECT Bookid, Book_Title, Author, Branch, Publish_year, Quantity FROM book_details WHERE Bookid = ?";
    $fetch_stmt = $conn->prepare($fetch_sql);
    $fetch_stmt->bind_param("s", $bookid);

    // Execute the statement
    if (!$fetch_stmt->execute()) {
        die("Error executing fetch statement: " . $fetch_stmt->error);
    }

    // Get the result
    $fetch_result = $fetch_stmt->get_result();

    // Check if any rows were returned
    if ($fetch_result->num_rows > 0) {
        // Prepare the SQL statement to insert data into the target table
        $insert_sql = "INSERT INTO std_book (Email, Bookid, Title, Author, Branch, Publish_year) VALUES ( ?, ?, ?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);

        // Loop through the fetched results
        while ($row = $fetch_result->fetch_assoc()) {
            $Bookid = $row['Bookid'];
            $Title = $row['Book_Title']; // Corrected to match the fetch
            $Author = $row['Author'];
            $Branch = $row['Branch'];
            $Publish = $row['Publish_year']; // Corrected field name
            $quantity = $row['Quantity'];

            // Bind parameters for the insert statement
            $insert_stmt->bind_param("sissss", $aEmail, $Bookid, $Title, $Author, $Branch, $Publish);

            // Execute the insert statement
            if (!$insert_stmt->execute()) {
                echo "Error adding record: " . $insert_stmt->error . "<br>";
            } else {
                echo "Record added successfully:<br>";
                $newQuantity = $quantity - 1;
                $update_sql = "UPDATE book_details SET Quantity = ? WHERE Bookid = ?";
                $update_stmt = $conn->prepare($update_sql);
                $update_stmt->bind_param("is", $newQuantity, $Bookid);

                // Execute the update statement
                if (!$update_stmt->execute()) {
                    echo "Error updating quantity: " . $update_stmt->error . "<br>";
                } else {
                    echo "Quantity updated successfully to: $newQuantity<br>";
                }

                // Close the update statement
                $update_stmt->close();
                echo "<script>
                alert('Book Recived');
                window.location.href = 'student.html?email=$aEmail'; // Redirect after login
              </script>";
                // header("Location: student.html");
            }
        }





        // Close the insert statement
        $insert_stmt->close();
    } else {
        echo "No records found.";
    }

    // Close the fetch statement
    $fetch_stmt->close();
} else {
    echo "No condition value provided.";
}

// Close the database connection
$conn->close();
?>
