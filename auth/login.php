<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "dukundumurimo");

if (isset($_SESSION['ManagerId'])) {
    header("Location: ../index.php");
    exit;
}

if (isset($_POST['login'])) {
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $check = mysqli_query($conn, "SELECT * FROM manager WHERE `UserName`='$uname' AND `Password`='$pass'");

    if (mysqli_num_rows($check) == 1) {
        $_SESSION['ManagerId'] = $uname;
        header("Location: ../index.php");
        exit;
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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
        }

        .image-side {
            flex: 1;
            background: url('../imgs/img.jpg') no-repeat center center;
            background-size: cover;
        }

        .form-side {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
        }

        .login-form {
            background: white;
            padding: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .login-form h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .login-form input {
            width: 95%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .submit {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        

        .submit:hover {
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
        <div class="form-side">
            <div class="login-form">
                <h2>Login</h2>
                <form method="POST">
                    <input type="text" placeholder="Username" name="uname" required>
                    <input type="password" placeholder="Password" name="pass" required>
                    <input type="submit" value="Login" name="login" class="submit">
                </form>
                <p class="link">Don't have an account?<a href="./signup.php">Signup</a></p>
            </div>
        </div>
    </div>
</body>

</html>