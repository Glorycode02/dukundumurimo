<?php
$conn = mysqli_connect("localhost", 'root', "", "dukundumurimo");

// Join productin and product tables to get product names
$select = mysqli_query($conn, "
        SELECT import.*, foods.Food_Name
        FROM import
        JOIN foods ON import.Food_Id = foods.Food_Id
    ");

$tbody = '';
$num_rows = '';
$a = 1;

if ($select) {
    $num_rows = mysqli_num_rows($select);

    if ($num_rows > 0) {
        while ($fetch = mysqli_fetch_assoc($select)) {
            $tbody .= "<tr>
                <td>" . $a++ . "</td>
                <td>" . $fetch["ImportDate"] . "</td>
                <td>" . $fetch["Quantity"] . "</td>
                <td>" . $fetch["Food_Name"] . "</td>
                <td class='text-align:center;'>
                <a href='export.php?Food_Id=" . $fetch['Food_Id'] . "' class='import'>Export</a>
                </td>
            </tr></br>";
        }
    } else {
        $tbody .= '<tr><td colspan="8" style="text-align:center; font-weight:bold;">No Products found</td></tr>';
    }
} else {
    echo "Not selected";
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
            text-align: center;
        }

        a {
            text-decoration: none;
        }

        .logout-btn:hover {
            background-color: #777;
        }

        .imports {
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
        tr{
            padding: 15px;
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
        <a href="./auth/logout.php" class="logout-btn">Logout</a>
    </div>
    <div class="imports">
        <h1>Imports</h1>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>ImportDate</th>
                    <th>Quantity</th>
                    <th>Food_Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php echo $tbody ?>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>