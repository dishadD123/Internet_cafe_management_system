<?php
// Check if form is submitted
if(isset($_POST['submit'])) {
    // Database credentials
    $servername = "localhost";
    $username = "root"; // Default username for XAMPP MySQL
    $password = ""; // Default password for XAMPP MySQL
    $dbname = "internet_cafe"; // Change to your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO internet_usage (I_Id, Stime, Etime, TTime, Price, Computer_id, CId) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssdii", $I_Id, $Stime, $Etime, $TTime, $price, $Computer_d, $CId);

    // Set parameters
    $Iid = $_POST['I_Id'];
    $stime = $_POST['Stime'];
    $etime = $_POST['Etime'];
    $totalTime = $_POST['TTime'];
    $price = $_POST['Price'];
    $coid = $_POST['Computer_id'];
    $cid = $_POST['CId'];

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
            <label for="Iid">Internet Id</label>
            <input type="number" class="form-control" placeholder="Enter Internet id number" name="Iid" autocomplete="off">
        </div>


    <div class="form-group">
    <label for="stime">Start Time</label>
    <input type="time" class="form-control" placeholder="Enter the starting time" name="Stime" id="Stime" autocomplete="off">
</div>

<div class="form-group">
    <label for="etime">End Time</label>
    <input type="time" class="form-control" placeholder="Enter the ending time" name="Etime" id="Etime" autocomplete="off">
</div>

<div class="form-group">
    <label for="totalTime">Total Time</label>
    <input type="time" class="form-control" name="TTime" id="TTime" readonly>
</div>

<div class="form-group">
    <label for="price">Price</label>
    <input type="text" class="form-control" placeholder="Total price" name="Price" id="Price" readonly>
</div>

<script>
    // Function to calculate the total time
    function calculateTotalTime() {
        var startTime = document.getElementById("Stime").value;
        var endTime = document.getElementById("Etime").value;

        // Convert start time and end time to Date objects
        var startDate = new Date("2000-01-01T" + startTime + ":00");
        var endDate = new Date("2000-01-01T" + endTime + ":00");

        // Calculate the time difference in milliseconds
        var timeDiff = endDate.getTime() - startDate.getTime();

        // Convert time difference to hours and minutes
        var hours = Math.floor(timeDiff / (1000 * 60 * 60));
        var minutes = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));

        // Format the total time
        var totalHours = String(hours).padStart(2, '0');
        var totalMinutes = String(minutes).padStart(2, '0');

        // Display the total time
        document.getElementById("totalTime").value = totalHours + ":" + totalMinutes;

        // Calculate the price (assuming a rate of $10 per hour)
        var ratePerHour = 50; // Adjust this rate as needed
        var totalPrice = hours * ratePerHour + (minutes / 60) * ratePerHour;

        // Display the total price
        document.getElementById("price").value = totalPrice.toFixed(2); // Ensure two decimal places
    }

    // Event listener to call the function when start time or end time changes
    document.getElementById("Stime").addEventListener("change", calculateTotalTime);
    document.getElementById("Etime").addEventListener("change", calculateTotalTime);
</script>


        <div class="form-group">
            <label for="Computer_id">Computer Id</label>
            <input type="number" class="form-control" placeholder="Enter your computer id number" name="Computer_id" autocomplete="off">
        </div>

        <div class="form-group">
            <label for="CId">CId</label>
            <input type="number" class="form-control" placeholder="Enter customer id number" name="CId" autocomplete="off">
        </div>


        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>

</body>
</html>
