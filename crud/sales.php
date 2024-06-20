<?php
// Check if form is submitted
if(isset($_POST['submit'])) {
    // Check if Name field is empty
    if(empty($_POST['Name'])) {
        echo "Name cannot be empty";
        exit; // Stop further execution
    }

    // Database connection settings
    $servername = "localhost"; // XAMPP default servername
    $username = "root"; // XAMPP default username
    $password = ""; // XAMPP default password (empty by default)
    $dbname = "internet cafe"; // Replace with your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO salesman (Sid, Name, Email, age, salary) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isssi", $Sid, $Name, $Email, $age, $salary);

    // Set parameters
    $Sid = $_POST['Sid'];
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $age = $_POST['age'];
    $salary = $_POST['salary'];

    // Execute statement
    if ($stmt->execute()) {
        echo '<script> alert("New record inserted successfully!")</script>';
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
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
            <label for="Sid">SId</label>
            <input type="number" class="form-control" placeholder="Enter your id number" name="Sid" autocomplete="off">
        </div>

        <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" class="form-control" placeholder="Enter your name" name="Name" autocomplete="off">
        </div>

        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" class="form-control" placeholder="Enter your email" name="Email" autocomplete="off">
        </div>

        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" class="form-control" placeholder="Enter your age" name="age" autocomplete="off">
        </div>

        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="number" class="form-control" placeholder="Enter salary" name="salary" autocomplete="off">
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>

</body>

</html>
