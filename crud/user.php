<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internet Cafe Management System</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-image: url('bb.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }
        .logo {
            font-size: 3rem;
            margin-bottom: 20px;
        }
        .text-sci {
            margin-bottom: 30px;
        }
        .text-sci h2 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        .text-sci span {
            color: #ffcc00;
        }
        .social-icons {
            margin-top: 20px;
        }
        .social-icons a {
            color: white;
            font-size: 1.5rem;
            margin: 0 10px;
        }
        .logreg-box {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
        }
        .form-box h2 {
            margin-bottom: 20px;
            font-size: 1.8rem;
        }
        .input-box {
            margin-bottom: 20px;
            position: relative;
        }
        .input-box input {
            width: 100%;
            padding: 10px;
            border: none;
            border-bottom: 2px solid #ffcc00;
            background: transparent;
            color: white;
            font-size: 1rem;
            outline: none;
        }
        .input-box label {
            position: absolute;
            top: 10px;
            left: 0;
            color: #ffcc00;
            pointer-events: none;
            transition: 0.5s;
        }
        .input-box input:focus ~ label,
        .input-box input:valid ~ label {
            top: -15px;
            left: 0;
            color: #ffcc00;
            font-size: 0.8rem;
        }
        .btn {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #ffcc00;
            color: #222;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #ffc200;
        }
        .login-register {
            margin-top: 10px;
            font-size: 0.9rem;
        }
        .login-register a {
            color: #ffcc00;
            text-decoration: none;
        }
        .login-register a:hover {
            text-decoration: underline;
        }
    </style>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <header class="header">
        <nav class="navbar">
            <a href="user.php">Home</a>
            <a href="about.php">About</a>
            <a href="services.php">Services</a>
            <a href="contact.php">Contact</a>
        </nav>
    </header>

    <div class="container">
        <div class="content">
            <h2 class="logo"><i class='bx bxl-netlify' style='color:rgb(240, 231, 231)'  ></i>Internet cafe</h2>
            <div class="text-sci">
                <h2>Welcome<br><span>To Our Internet Cafe Management System</span></h2>
                <p>"Surf, Sip, and Stay Connected: Your Refreshing Internet Oasis"</p>
                <div class="social-icons">
                    <a href="#"><i class='bx bxl-linkedin'></i></a>
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                    <a href="#"><i class='bx bxl-twitter'></i></a>
                </div>
            </div>
        </div>

        <div class="logreg-box">
            <div class="form-box login">
                <h2>Admin Login</h2>
                <button type="button" class="btn" onclick="redirectToIndex()">Click here to login as admin</button>
                <div class="login-register">
                    <p>Don't have an account? <a href="#" class="register-link">Sign-up</a></p>
                </div>
            </div>
        </div>
    </div>
    <script>
        function redirectToIndex() {
            window.location.href = "index.php";
        }
    </script>
</body>
</html>
