<?php
$conn = mysqli_connect("localhost", "root", "", "dukundumurimo");

$Food_Id = $_GET['Food_Id'];

if (!isset($Food_Id)) {
    header("Location: ./products.php");
}

$select = mysqli_query($conn, "SELECT * FROM foods WHERE `Food_Id` = '{$Food_Id}'");
$fetch = mysqli_fetch_assoc($select);

$form = '
<div class="container">
<form action="" method="POST">
    <h1>Dukundumurimo cmpny Ltd</h1>
    <p>Update your product</p>
    <div class="div1">
        <label>Product Code</label>
        <input type="text" name="code" value="' . $fetch['Food_Id'] . '" disabled>
    </div>
    <div class="div2">
        <label>Product name</label>
        <input type="text" placeholder="Food name" name="pname" value="' . $fetch['Food_Name'] . '">
    </div>
    <div class="div2">
        <label>Product OwnerName</label>
        <input type="text" placeholder="Food ownerName" name="owner" value="' . $fetch['Food_OwnerName'] . '">
    </div>

    <div class="submit">
        <input type="submit" value="Update product" name="update" class="login">
    </div>
    <div class="link">
        <p><a href="./products.php">Back to products</a></p>
    </div>
</form>
</div>
';

if (isset($_POST['update'])) {
    $pname = $_POST['pname'];
    $owner = $_POST['owner'];
    $update = mysqli_query($conn, "UPDATE foods SET `Food_Name` = '{$pname}',`Food_OwnerName` = '{$owner}' WHERE `Food_Id` = $Food_Id");
    if ($update) {
        echo "<script>Item updated succesfully</script>";
        header("Location: ./products.php");
    }
} else {
    echo "<script>Item not updated</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
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
</head>

<body>
    <?php echo $form ?>
</body>

</html>