<?php
session_start();
if (!isset($_SESSION['UserID'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Service Requests</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to bottom right, #1c1c1c, #2c3e50);
            color: white;
            overflow-x: hidden;
        }

        .graphic-bg {
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle at center, #2980b9 0%, transparent 70%);
            top: -200px;
            left: -200px;
            z-index: 0;
        }

        .container {
            position: relative;
            z-index: 1;
            padding: 50px 20px;
            max-width: 900px;
            margin: auto;
            animation: fadeIn 1.5s ease-in-out;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 36px;
            color: #00ffff;
        }

        .buttons {
            text-align: center;
            margin-bottom: 30px;
        }

        input[type="submit"],
        .back-btn {
            padding: 12px 30px;
            background: #00b894;
            color: white;
            border: none;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease;
            margin: 5px;
            text-decoration: none;
            display: inline-block;
        }

        input[type="submit"]:hover,
        .back-btn:hover {
            background: #009e80;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.1);
        }

        th, td {
            padding: 14px;
            text-align: center;
            border-bottom: 1px solid #555;
            color: #fff;
        }

        th {
            background-color: #34495e;
            color: #fff;
            font-size: 18px;
        }

        tr:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }

        .footer-note {
            text-align: center;
            margin-top: 50px;
            color: #ccc;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="graphic-bg"></div>

<div class="container">
    <h1>Service Requests</h1>

    <div class="buttons">
        <form action="" method="post" style="display: inline;">
            <input type="submit" name="submit" value="VIEW">
        </form>
        <a href="Homepage.php" class="back-btn">← Back</a>
    </div>

    <?php
    if (isset($_POST["submit"])) {
        $con = new mysqli("localhost", "root", "", "db_ksii");

        if ($con->connect_error) {
            die('<p style="color:red; text-align:center;">❌ Connection failed: ' . $con->connect_error . '</p>');
        }

        $query = "SELECT RequestID, UserID, ServiceType, Description, FeeAmount, Status, CreatedAt FROM service_requests ORDER BY CreatedAt DESC";
        $result = $con->query($query);

        if (!$result) {
            echo "<p style='text-align:center;'>Query failed: " . $con->error . "</p>";
        } else {
            echo "<table>";
            echo "<tr><th>Request ID</th><th>User ID</th><th>Service Type</th><th>Description</th><th>Fee</th><th>Status</th><th>Created At</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['RequestID']) . "</td>
                        <td>" . htmlspecialchars($row['UserID']) . "</td>
                        <td>" . htmlspecialchars($row['ServiceType']) . "</td>
                        <td>" . htmlspecialchars($row['Description']) . "</td>
                        <td>" . htmlspecialchars($row['FeeAmount']) . "</td>
                        <td>" . htmlspecialchars($row['Status']) . "</td>
                        <td>" . htmlspecialchars($row['CreatedAt']) . "</td>
                      </tr>";
            }

            echo "</table>";
        }

        $con->close();
    }
    ?>

    <div class="footer-note">© 2025 Citizen Services Portal | All Rights Reserved</div>
</div>

</body>
</html>