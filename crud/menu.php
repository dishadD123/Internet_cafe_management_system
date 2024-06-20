<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url('bb.jpg') no-repeat fixed;
            background-size: cover;
            background-position: center;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background:transparent ;
            width: 100%;
            height:100%;
            backdrop-filter: blur(20px);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color:#c50fa5;
        }

        .menu-items {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .menu-item {
            width: calc(33.33% - 20px); /* Adjust width based on the number of items per row */
            margin-bottom: 20px;
            background-color:#7d2e4861;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .menu-item img {
            width: 100%; /* Ensures the image fills its container */
            height: auto; /* Maintains aspect ratio */
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .menu-item-details {
            padding: 10px;
        }

        .menu-item-name {
            font-weight: bold;
            color: #ffffff;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-size: larger;
        }

        .menu-item-price {
            color: #777;
        }

        .menu-item-description {
            color: #999;
        }

        @media (max-width: 600px) {
            .menu-item {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Menu</h1>
        <div class="menu-items">
            <a href="sales.php" class="menu-item">
                <img src="sales.jpeg" alt="Salesman">
                <div class="menu-item-details">
                    <div class="menu-item-name">Salesman</div>
                </div>
            </a>
            <a href="cous.php" class="menu-item">
                <img src="cust.jpeg" alt="Customer">
                <div class="menu-item-details">
                    <div class="menu-item-name">Customer</div>
                </div>
            </a>
            <a href="order.php" class="menu-item">
                <img src="order1.jpeg" alt="Orders">
                <div class="menu-item-details">
                    <div class="menu-item-name">Orders</div>
                </div>
            </a>
            <a href="comp.php" class="menu-item">
                <img src="comp.jpg" alt="Computer">
                <div class="menu-item-details">
                    <div class="menu-item-name">Computer</div>
                </div>
            </a>
            <a href="inter.php" class="menu-item">
                <img src="inter.jpeg" alt="Internet Records">
                <div class="menu-item-details">
                    <div class="menu-item-name">Internet usage records</div>
                </div>
            </a>
            <a href="trans.php" class="menu-item">
                <img src="trans1.jpeg" alt="Transaction">
                <div class="menu-item-details">
                    <div class="menu-item-name">Transaction</div>
                </div>
            </a>
        </div>
    </div>
</body>
</html>
