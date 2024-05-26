<?php
$conn = mysqli_connect("localhost", 'root', "", "dukundumurimo");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch import records
$import_query = "
    SELECT import.*, foods.Food_Name
    FROM import
    JOIN foods ON import.Food_Id = foods.Food_Id
";

$export_query = "
    SELECT export.*, foods.Food_Name
    FROM export
    JOIN foods ON export.Food_Id = foods.Food_Id
";

$import_result = mysqli_query($conn, $import_query);
$export_result = mysqli_query($conn, $export_query);

$import_rows = "";
$export_rows = "";

$a = 1;
if ($import_result) {
    while ($fetch = mysqli_fetch_assoc($import_result)) {
        $import_rows .= "<tr>
            <td>" . $a++ . "</td>
            <td>" . $fetch["ImportDate"] . "</td>
            <td>" . $fetch["Quantity"] . "</td>
            <td>" . $fetch["Food_Name"] . "</td>
        </tr>";
    }
}

$b = 1;
if ($export_result) {
    while ($fetch = mysqli_fetch_assoc($export_result)) {
        $export_rows .= "<tr>
            <td>" . $b++ . "</td>
            <td>" . $fetch["ExportDate"] . "</td>
            <td>" . $fetch["Quantity"] . "</td>
            <td>" . $fetch["Food_Name"] . "</td>
        </tr>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
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

        .reports {
            flex: 1;
            margin-left: 250px;
            padding: 20px;
            height: 100vh;
            overflow-y: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            text-align: left;
        }

        tr {
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
            color: white;
            text-align: center;
            padding: 15px;
        }

        .print-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .print-btn:hover {
            background-color: #45a049;
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

    <div class="reports">
        <h1>Report</h1>
        <button class="print-btn" onclick="window.print()">Print Report</button>
        <h2>Import Records</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Import Date</th>
                    <th>Quantity</th>
                    <th>Food Name</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $import_rows; ?>
            </tbody>
        </table>

        <h2>Export Records</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Export Date</th>
                    <th>Quantity</th>
                    <th>Food Name</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $export_rows; ?>
            </tbody>
        </table>
    </div>
</body>

</html>