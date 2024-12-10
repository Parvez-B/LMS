<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="homestyles.css">
    <style>
        /* Basic styling for error messages */
        .error {
            color: red;
            font-weight: bold;
        }
        .login-type {
            margin-bottom: 15px;
            display: flex;
            justify-content: center;
        }
        .login-type select {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>

    <nav>
        <h1><a href="Home.html">Library Management System</a></h1>
        <ul>
            <li><a href="Home.html">Home</a></li>
            <li><a href="Home.html">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="login2.php">Login</a></li>
        </ul>
    </nav>
<div class="container">
    <h2 class="title">Login</h2>
    <form action="" method="POST" class="form-container">
        <div class="login-type">
            <select id="login-type" name="login_type" required>
                <option value="student">Student</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <div class="input-box email">
            <input type="text" id="user-email" name="email" required placeholder="Email or Admin Name">
        </div>
        <div class="input-box password">
            <input type="password" id="user-password" name="password" required placeholder="Password">
        </div> 
        <div class="button">
            <button type="submit" class="login">Login</button>
        </div>
    </form>

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

    $error_message = "";
    $success_message = "";

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $loginType = $_POST['login_type'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($loginType === "student") {
            // Student Login Logic
            $stmt = $conn->prepare("SELECT password FROM Student WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();
            
            if ($stmt->num_rows > 0) {
                $stmt->bind_result($stored_password);
                $stmt->fetch();

                // Verify the password
                if ($stored_password == $password) {
                    $success_message = "Student Login successful!";
                    echo "<script>
                            alert('$success_message');
                            window.location.href = 'student.html?email=$email';  
                          </script>";
                } else {
                    $error_message = "Invalid password.";
                }
            } else {
                $error_message = "No student found with that email.";
            }

            $stmt->close();
        } elseif ($loginType === "admin") {
            // Hardcoded Admin Login Logic
            $adminName = "Admin";
            $adminPassword = "1234";

            if ($email === $adminName && $password === $adminPassword) {
                $success_message = "Admin Login successful!";
                echo "<script>
                        alert('$success_message');
                        window.location.href = 'Admin.html'; // Redirect after login
                      </script>";
            } else {
                $error_message = "Invalid admin credentials.";
            }
        }
    }

    $conn->close();

    // Display error message if any
    if (!empty($error_message)) {
        echo "<p class='error'>$error_message</p>";
    }
    ?>
</div>

</body>
</html>
