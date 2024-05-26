<?php

$conn = mysqli_connect("localhost", "root", "", "dukundumurimo");
$Food_Id = $_GET['Food_Id'];

if (!isset($Food_Id)) {
    header("Location: ./products.php");
}

$select = mysqli_query($conn, "SELECT * FROM foods WHERE `Food_Id` = '$Food_Id'");
$fetch = mysqli_fetch_assoc($select);

$form = '
<div class="container">
    <form action="" method="POST">
        <h1>Dukundumurimo Company Ltd</h1>
        <p>Import your products to the store</p>
        <div class="div1">
            <label>Food_Id</label>
            <input type="text" placeholder="Food_Id name="pid" value="' . $fetch['Food_Id'] . '" disabled>
        </div>
        <div class="div2">
            <label>Product name</label>
            <input type="text" placeholder="Product name" name="pname" value="' . $fetch['Food_Name'] . '" disabled>
        </div>
        <div class="div2">
            <label>Date</label>
            <input type="date" placeholder="Date" name="date" required>
        </div>
        <div class="div2">
            <label>Quantity</label>
            <input type="text" placeholder="Quantity" name="quant" required>
        </div>

        <div class="submit">
            <input type="submit" value="Import product" name="import" class="login">
        </div>
        <div class="link">
            <p><a href="./productin.php">Back to productin</a></p>
        </div>
    </form>
</div>
';

if (isset($_POST['import'])) {
    $date = $_POST['date'];
    $quantity = $_POST['quant'];

    $import = mysqli_query($conn, "INSERT INTO import VALUES ('','$Food_Id','$date','$quantity')");
    if ($import) {
        echo "<script>alert('Product imported successfully');</script>";
        header("Location: ./stockin.php");
    } else {
        echo "<script>alert('Failed to import product');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Product</title>
    <link rel="stylesheet" href="./css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 400px;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"] {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            width: 100%;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .login {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .login:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <?php echo $form ?>
</body>

</html>