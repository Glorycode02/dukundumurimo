<?php
$conn = mysqli_connect("localhost", "root", "", "dukundumurimo");

// Check if the form is submitted
if (isset($_POST['add'])) {
    // Retrieve form data
    $pname = $_POST['pname'];
    $owner = $_POST['owner'];

    // Insert product into the database
    $insert = mysqli_query($conn, "INSERT INTO foods (`Food_Name`,`Food_OwnerName`) VALUES ('$pname','$owner')");

    if ($insert) {
        echo "<script>alert('Product added successfully');</script>";
        header("Location: ./products.php");
        exit;
    } else {
        echo "<script>alert('Failed to add product');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="./css/addproduct.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
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

        .div1,
        .div2 {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"] {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .submit {
            margin-top: 20px;
        }

        .login {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            width: 100%;
        }

        .login:hover {
            background-color: #45a049;
        }

        .link {
            margin-top: 15px;
        }

        .link a {
            color: #4CAF50;
            text-decoration: none;
        }

        .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="" method="POST">
            <h1>Dukundumurimo cmpny Ltd</h1>
            <p>Add your product</p>
            <div class="div2">
                <label>Product name</label>
                <input type="text" placeholder="Food name" name="pname">
            </div>
            <div class="div2">
                <label>Product OwnerName</label>
                <input type="text" placeholder="Food OwnerName" name="owner">
            </div>

            <div class="submit">
                <input type="submit" value="Add product" name="add" class="login">
            </div>
            <div class="link">
                <p><a href="./products.php">Back to products</a></p>
            </div>
        </form>
    </div>
</body>

</html>