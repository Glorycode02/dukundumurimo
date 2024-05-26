<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "dukundumurimo");

if (isset($_SESSION['ManagerId'])) {
    header("Location: ../index.php");
    exit;
}

if (isset($_POST['submit'])) {
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    // Corrected the query syntax
    $check = mysqli_query($conn, "INSERT INTO manager (username, password) VALUES ('$uname', '$pass')");

    if ($check) { // Changed the condition to check if the query executed successfully
        $_SESSION['ManagerId'] = $uname;
        header("Location: ../index.php");
        exit;
    } else {
        echo "<script>alert('Account not created')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            height: 100vh;
            width: 100%
        }

        .image-side {
            width: 50%;
            background: url('../imgs/img.jpg') no-repeat center center;
            background-size: cover;
        }


        .form-side {
            flex: 1;
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
        }

        .signup-form {
            background: white;
            padding: 40px;
            width: ;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .signup-form h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .signup-form input {
            width: 97%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .signup-form button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .signup-form button:hover {
            background-color: #218838;
        }

        .link a {
            text-decoration: none;
            color: #28a745;
        }

        .link a:hover {
            color: #218838;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="image-side"></div>
        <form action="" method="POST">
            <div class="form-side">
                <div class="signup-form">
                    <h2>Sign Up</h2>
                    <form action="your_php_script.php" method="POST">
                        <input type="text" name="uname" placeholder="Username" required>
                        <input type="password" name="pass" placeholder="Password" required>
                        <button type="submit" name="submit">Sign Up</button>
                    </form>
                    <p class="link">Already have an account? <a href="./login.php">Login</a></p>
                </div>
            </div>
        </form>
    </div>
</body>

</html>