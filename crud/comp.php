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
    $stmt = $conn->prepare("INSERT INTO computer (Computer_id, Floor, Status) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $Computer_id, $Floor, $Status);

    // Set parameters
    $Computer_id = $_POST['Computer_id'];
    $Floor = $_POST['Floor'];
    $Status = $_POST['Status'];

    // Execute statement
    if ($stmt->execute() == TRUE) {
        echo '<script> alert("Record inserted successfully!")</script>';
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
            height: 100vh;
        }

        .container {
            max-width: 500px;
            background:transparent ;
            width: 100%;
            
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
            <label for="Compter_id">Computer Id</label>
            <input type="number" class="form-control" placeholder="Enter your computer id number" name="Computer_id" autocomplete="off">
        </div>

        <div class="form-group">
            <label for="Floor">Select floor</label>
            <select class="form-control" id="Floor" name="Floor">
                <option value="ground">Ground Floor</option>
                <option value="one">Floor 1</option>
                <option value="two">Floor 2</option>
                <option value="three">Floor 3</option>
            </select>
        </div>

        <div class="form-group">
            <label for="Status">Select status</label>
            <select class="form-control" id="Status" name="Status">
                <option value="idle">Idle</option>
                <option value="active">Active</option>
            </select>
        </div>


        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>

</body>
</html>
