<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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

        .content {
            margin-left: 250px;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .card {
            width: calc(33.33% - 20px);
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
        }

        .card h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .card p {
            color: #666;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .empty {
            flex: 1;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            width: 95%;
            margin-left: 30px;
        }

        .admin-info {
            margin-left: 250px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .admin-info h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .admin-info p {
            color: #666;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 10px;
        }
        .info{
            padding: 20px;
            justify-content: space-between;
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

    <div class="content">
        <div class="card">
            <h2>Beans</h2>
            <p>Current Stock: 500 kg</p>
            <p>Low Stock Alert: 100 kg</p>
        </div>
        <div class="card">
            <h2>Rice</h2>
            <p>Current Stock: 800 kg</p>
            <p>Low Stock Alert: 200 kg</p>
        </div>
        <div class="card">
            <h2>Cassava Flour</h2>
            <p>Current Stock: 500 kg</p>
            <p>Low Stock Alert: 100 kg</p>
        </div>
        <div class="card">
            <h2>Maize Flour</h2>
            <p>Current Stock: 800 kg</p>
            <p>Low Stock Alert: 200 kg</p>
        </div>
    </div>
    <div class="info">

        <div class="admin-info">
            <h2>Admin Information</h2>
            <?php
            // Assuming you have already established a database connection
            $conn = mysqli_connect("localhost", "root", "", "dukundumurimo");

            // Query to fetch admin information from the database
            $query = "SELECT * FROM Manager";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<p>Name: {$row['UserName']}</p>";
                    echo "<p>Company Name: Dukundumurimo</p>";
                    echo "<p>Date: 12/5/2024</p>";
                }
            } else {
                echo "<p>No admin found</p>";
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </div>
    </div>
</body>

</html>