<?php
$conn = mysqli_connect("localhost", 'root', "", "dukundumurimo");

$select = mysqli_query($conn, "SELECT * FROM foods");

$tbody = "";
$a = 1;

while ($fetch = mysqli_fetch_assoc($select)) {
    if (mysqli_num_rows($select) > 0) {
        $tbody .= '
        <tr>
        <td>' . $a++ . '</td>
        <td>' . $fetch['Food_Name'] . '</td>
        <td>' . $fetch['Food_OwnerName'] . '</td>
        <td>
        <a href="update.php?Food_Id=' . $fetch["Food_Id"] . '" class="update">Edit</a>
        <a href="delete.php?Food_Id=' . $fetch["Food_Id"] . '" class="delete">Delete</a>        
        <a href="import.php?Food_Id=' . $fetch["Food_Id"] . '" class="import">Import</a>        
        </td>
        </tr>
        ';
    } else {
        $tbody .= "<tr>No products found</tr>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .sidebar {
            width: 250px;
            background-color: #1e272e;
            color: white;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 98vh;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar-links {
            padding-left: 20px;
        }

        .sidebar-links a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 10px 10px;
        }

        .sidebar-links a:hover {
            background-color: #34495e;
        }

        .logout-btn {
            background-color: #555;
            color: white;
            border: none;
            width: 100%;
            padding: 10px 0;
            cursor: pointer;
            margin-bottom: 10px;
        }

        .logout-btn:hover {
            background-color: #777;
        }

        .products {
            flex: 1;
            height: 100vh;
            margin-left: 250px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        td,
        th {
            border: 1px solid #dddddd;
            padding: 15px;
        }

        th {
            background-color: #1e272e;
            padding: 15px;
            color: white;
            text-align: center;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
        }

        .add {
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            background: #45a049;
            font-weight: bold;
            padding: 10px;
            border-radius: 10px;
            gap: 5px;
            color: #fff;
        }

        a {
            text-decoration: none;
        }

        .update {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border-radius: 6px;
            margin: 10px;
        }

        .delete {
            background-color: #f44336;
            color: white;
            padding: 10px;
            border-radius: 6px;
            margin: 10px;
        }

        .import {
            background-color: #2196F3;
            color: white;
            padding: 10px;
            border-radius: 6px;
        }

        .update:hover,
        .delete:hover,
        .import:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="logo">
            <h2>Dukundumurimo Company Ltd</h2>
        </div>
        <div class="sidebar-links">
            <a href="./index.php">Home</a>
            <a href="./products.php">Products</a>
            <a href="./stockin.php">Import</a>
            <a href="./stockout.php">Export</a>
            <a href="./reports.php">Report</a>
        </div>
        <button class="logout-btn" class="./auth/logout.php">Logout</button>
    </div>
    <div class="products">
        <div class="header">
            <h1>Products</h1>
            <a href="./add.php" id="add"><button class="add">Add product <img src="./imgs/plus.svg"
                        style="width:30px; height:30px;" alt="add"></button></a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>FoodName</th>
                    <th>FoodownerName</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $tbody ?>
            </tbody>
        </table>
    </div>
</body>

</html>