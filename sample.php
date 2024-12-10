<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, 
                   initial-scale=1.0"
    />
    <title>Library</title>
    <script src="index.js"></script>
    <link rel="stylesheet" href="admin.css" />
    <link rel="stylesheet" href="responsive.css" />

    <style>
      .table-container {
        display: none;
        /* background-color: aqua; */
      }
      .active {
        display: block;
      }
    </style>
  </head>

  <body>
    <!-- for header part -->
    <header>
      <div class="logosec">
        <div class="logo">Admin</div>
        <img
          src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182541/Untitled-design-(30).png"
          class="icn menuicn"
          id="menuicn"
          alt="menu-icon"
        />
      </div>

      <div class="message">
        <div class="circle"></div>
        <img
          src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/8.png"
          class="icn"
          alt=""
        />
        <div class="dp">
          <img
            src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180014/profile-removebg-preview.png"
            class="dpicn"
            alt="dp"
          />
        </div>
      </div>
    </header>

    <div class="main-container">
      <div class="navcontainer">
        <nav class="nav">
          <div class="nav-upper-options">
            <div class="nav-option option1">
              <img
                src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png"
                class="nav-img"
                alt="dashboard"
              />
              <h3>Dashboard</h3>
            </div>

            <div class="option2 nav-option">
              <img
                src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png"
                class="nav-img"
                alt="articles"
              />
              <button id="toggleTable1">Add Book</button>
            </div>

            <div class="nav-option option3">
              <img
                src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/5.png"
                class="nav-img"
                alt="report"
              />
              <!-- <form action="book_report.php" method="post"></form> -->
              <button id="toggleTable2" type="submit" onclick="fetchBooks()">Book Report</button>
            
            </div>


            <!-- <div class="nav-option option3">
                <img
                  src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/5.png"
                  class="nav-img"
                  alt="report"
                />
                <button id="toggleTable3">Book Request</button>
              </div> -->

            <div class="nav-option option4">
              <img
                src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/6.png"
                class="nav-img"
                alt="institution"
              />
              <button id="btn">Add Student</button>
            </div>

            <div class="nav-option option5">
              <img
                src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png"
                class="nav-img"
                alt="blog"
              />
              <button id="btn-1" type="submit" onclick="fetchBooks1()">Student Report</button>
            </div>

            <div class="nav-option option6">
              <img
                src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/4.png"
                class="nav-img"
                alt="settings"
              />
              <button id="btn-2">Manage Book</button>
            </div>

            <div class="nav-option logout">
              <img
                src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/7.png"
                class="nav-img"
                alt="logout"
              />
              <a href="login2.php" style="text-decoration: solid">
                <h3>Logout</h3>
              </a>
            </div>
          </div>
        </nav>
      </div>
      <div class="main">
       <!-- <div class="searchbar2">
          <input type="text" name="" id="" placeholder="Search" />
          <div class="searchbtn">
            <img
              src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
              class="icn srchicn"
              alt="search-button"
            />
          </div>
        </div>
 
        <div class="box-container">
          <div class="box box1">
            <div class="text">
              <h2 class="topic-heading">60.5k</h2>
              <h2 class="topic">Article Views</h2>
            </div>

            <img
              src="https://media.geeksforgeeks.org/wp-content/uploads/20221210184645/Untitled-design-(31).png"
              alt="Views"
            />
          </div>

          <div class="box box2">
            <div class="text">
              <h2 class="topic-heading">150</h2>
              <h2 class="topic">Likes</h2>
            </div>

            <img
              src="https://media.geeksforgeeks.org/wp-content/uploads/20221210185030/14.png"
              alt="likes"
            />
          </div>

          <div class="box box3">
            <div class="text">
              <h2 class="topic-heading">320</h2>
              <h2 class="topic">Comments</h2>
            </div>

            <img
              src="https://media.geeksforgeeks.org/wp-content/uploads/20221210184645/Untitled-design-(32).png"
              alt="comments"
            />
          </div>

          <div class="box box4">
            <div class="text">
              <h2 class="topic-heading">70</h2>
              <h2 class="topic">Published</h2>
            </div>
            <img
              src="https://media.geeksforgeeks.org/wp-content/uploads/20221210185029/13.png"
              alt="published"
            />
          </div>
        </div> -->
        <div id="table1" class="table-container active">
          <div class="form-container">
            <div class="form-card">
              <h2>Add New Book</h2>
              <form id="addBookForm" method="post" action="">
                <div class="form-group">
                  <label for="bookTitle">Book ID:</label>
                  <input type="number" id="bookid" name="bookid" required />
                </div>
                <div class="form-group">
                  <label for="bookTitle">Book Title:</label>
                  <input type="text" id="bookTitle" name="bookTitle" required />
                </div>
                <div class="form-group">
                  <label for="bookAuthor">Author:</label>
                  <input type="text" id="bookAuthor"  name="bookAuthor" required/>

                </div>
                <div class="form-group">
                  <label for="Branch">Branch:</label>
                  <input type="text" id="branch" name="branch" required />
                </div>
                <div class="form-group">
                  <label for="publicationYear">Publication Year:</label>
                  <input
                    type="number"
                    id="publicationYear"
                    name="publicationYear"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="Quantity">Quantity:</label>
                  <input type="number" id="Quantity" name="quantity" required />
                </div>
                <button type="submit" id="form-button">Add Book</button>
              </form>
            </div>
          </div>


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
                alert('Book Added');
                window.location.href = 'sample.php';  
              </script>";
        
       
    } else {
          
         echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

        </div>

        <div id="table2" class="table-container">
          <h2>Available Books</h2>
          <script>
            function fetchBooks() {
                const xhr = new XMLHttpRequest();
                xhr.open('post', 'book_report.php', true);
                xhr.onload = function() {
                    if (this.status === 200) {
                        document.getElementById('bookTable').innerHTML = this.responseText;
                    } else {
                        alert('Error fetching data.');
                    }
                };
                xhr.send();
            }
        </script>
        
          <div id="bookTable">
            <!-- Data will be inserted here -->
        </div>
           
        </div>
 

        <div id="table3" class="table-container">
            <div class="form-container">
                <div class="form-card">
                  <h2>Add New Student</h2>
                  <form id="addBookForm" method="post" action="">
                    <div class="form-group">
                      <label for="bookTitle">Student ID:</label>
                      <input type="number" id="stdid" name="stdid" required />
                    </div>
                    <div class="form-group">
                      <label for="bookTitle">Name:</label>
                      <input type="text" id="stdname" name="stdname" required />
                    </div>
                    <div class="form-group">
                      <label for="bookAuthor">Email:</label>
                      <input
                        type="email"
                        id="Email"
                        name="Email"
                        required
                      />
                    </div>
                    <div class="form-group">
                      <label for="Branch">Password:</label>
                      <input type="password" id="pass" name="password" required />
                    </div>
                    
                    <button type="submit" id="form-button">Add Student</button>
                  </form>
                </div>
              </div> 
              
              

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
        alert('Student Added');
        window.location.href = 'sample.php';  
      </script>";
        
       
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

            </div>


            
        <div id="table4" class="table-container">
            <h2>Student Data</h2>
            <script>
              function fetchBooks1() {
                  const xhr = new XMLHttpRequest();
                  xhr.open('post', 'student_report.php', true);
                  xhr.onload = function() {
                      if (this.status === 200) {
                          document.getElementById('bookTable1').innerHTML = this.responseText;
                      } else {
                          alert('Error fetching data.');
                      }
                  };
                  xhr.send();
              }
          </script>
            <div id="bookTable1">
              <!-- Data will be inserted here -->
          </div>
           
        </div>

        <div id="table5" class="table-container">
            <h2>Manage Books</h2>
            <div class="form-container">
                <div class="form-card">
                  <h2>Update Book</h2>
                  <form id="addBookForm" method="post" action="update.php">
                    <div class="form-group">
                      <label for="bookTitle">Book ID:</label>
                      <input type="number" id="ubookid" name="ubookid" required />
                    </div>
                    <div class="form-group">
                      <label for="bookTitle">Book Title:</label>
                      <input type="text" id="ubookTitle" name="ubookTitle" required />
                    </div>
                    <div class="form-group">
                      <label for="bookAuthor">Author:</label>
                      <input
                        type="text"
                        id="ubookAuthor"
                        name="ubookAuthor"
                        required
                      />
                    </div>
                    <div class="form-group" >
                      <label for="Branch">Branch:</label>
                      <input type="text" id="ubranch" name="ubranch" required />
                    </div>
                    <div class="form-group">
                      <label for="publicationYear">Publication Year:</label>
                      <input
                        type="number"
                        id="upublicationYear"
                        name="upublicationYear"
                        required
                      />
                    </div>
                    <div class="form-group">
                      <label for="Quantity">Quantity:</label>
                      <input type="number" id="uQuantity" name="uQuantity" required />
                    </div>
                    <button type="submit" id="form-button">Update</button> 
                  </form>
              
              </div>
              <div class="boxx1">
                <div class="form-card new" style="margin-left: 20%;">
                  <h2>Delete Book</h2>
                  <form id="addBookForm" method="post" action="delete.php">
                    <div class="form-group">
                      <label for="bookTitle">Book ID:</label>
                      <input type="number" id="dbookid" name="dbookid" required />
                    </div>
                    <button type="Delete" id="form-button">Delete</button>
                  </form>
                </div>
                </div>
                </div>
              
             
          </div>
      </div>
    </div>
    <script src="admin.js"></script>

    <script>
 

      const buttons = [
        { buttonId: "toggleTable1", tableId: "table1" },
        { buttonId: "toggleTable2", tableId: "table2" },
        { buttonId: "btn", tableId: "table3" },
        { buttonId: "btn-1", tableId: "table4" },
        { buttonId: "btn-2", tableId: "table5" },
         
      ];

      buttons.forEach(({ buttonId, tableId }) => {
        const button = document.getElementById(buttonId);
        const table = document.getElementById(tableId);
        button.addEventListener("click", () => {
          // Hide all tables
          buttons.forEach(({ tableId }) => {
            document.getElementById(tableId).classList.remove("active");
          });
          // Show the selected table
          table.classList.add("active");
        });
      });
    </script>
  </body>


  
  
</html>


