<?php
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

// Check if form is submitted
if(isset($_POST['submit'])) {
    // Retrieve form data
    $oid = $_POST['Order_id'];
    $food = $_POST['Select_Order'];
    $price = $_POST['price'];
    $sid = $_POST['sid'];
    $coid = $_POST['CId'];

    // Prepare and bind SQL statement
    $sql = "INSERT INTO orrder (Order_id, Select_Order, price, sid, CId) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isiii", $Order_id, $Select_Order, $price, $sid, $CId);

    // Execute statement
    if ($stmt->execute()) {
        echo "New record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
            <label for="oid">Order Id</label>
            <input type="number" class="form-control" placeholder="Enter your order id number" name="oid" autocomplete="off">
        </div>

        <div class="form-group">
            <label for="food">Select order</label>
            <select class="form-control" id="food" name="food">
                <option value="coffee">Coffee</option>
                <option value="tea">Tea</option>
                <option value="juice">Juice</option>
                
            </select>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="price" class="form-control" placeholder="total price" name="price" autocomplete="off">
        </div>

        <div class="form-group">
            <label for="sid">SId</label>
            <input type="number" class="form-control" placeholder="Enter salesman id number" name="sid" autocomplete="off">
        </div>

        <div class="form-group">
            <label for="coid">CId</label>
            <input type="number" class="form-control" placeholder="Enter customer id number" name="coid" autocomplete="off">
        </div>


        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>

</body>
</html>
