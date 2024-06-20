<?php
// Check if form is submitted
if(isset($_POST['submit'])) {
    // Database credentials
    $servername = "localhost";
    $username = "root"; // Default username for XAMPP MySQL
    $password = ""; // Default password for XAMPP MySQL
    $dbname = "internet cafe"; // Change to your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO customers (CId, Name, Email, Phone, SId) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isssi", $CId, $Name, $Email, $Phone, $SId);

    // Set parameters
    $cid = $_POST['CId'];
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $phone = $_POST['Phone'];
    $sid = $_POST['SId'];

    // Execute statement
    if ($stmt->execute() === TRUE) {
        echo '<script>alert("Record inserted successfully!")</script>';
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connection
    $stmt->close();
    $conn->close();
}
?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <style>
        /* Custom CSS for form styling */
        body {
            background-color: #f8f9fa;
            background: url('bb.jpg') no-repeat;
            background-size: cover;
            background-position: center;
        }

        .container {
            max-width: 500px;
            background:transparent ;
            width: 100%;
            height:100%;
            backdrop-filter: blur(20px);
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-group label {
            font-weight: bold;
            color: white;
        }

        .form-control {
            border-radius: 5px;
            border-color: #ced4da;
        }

        .form-control:focus {
            border-color: #4d94ff;
            box-shadow: none;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: black;
            border-color: #0056b3;
        }
    </style>

    <title>CRUD OPERATION</title>
</head>
<body>
<div class="container my-5">
    <form method="post">

        <div class="form-group">
            <label for="cid">CId</label>
            <input type="number" class="form-control" placeholder="Enter your id number" name="CId" autocomplete="off">
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" placeholder="Enter your name" name="Name" autocomplete="off">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" placeholder="Enter your email" name="Email" autocomplete="off">
        </div>

        

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" placeholder="Enter phone number" name="Phone" autocomplete="off">
        </div>
        
        <div class="form-group">
            <label for="sid">SId</label>
            <input type="number" class="form-control" placeholder="Enter your salesman id number" name="SId" autocomplete="off">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>

</body>
</html>
