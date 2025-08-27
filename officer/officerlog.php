<?php
session_start();
include("config.php");

// ✅ Check connection
if (!isset($conn)) {
    die("❌ Connection variable \$conn not found.");
}
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Officer Login</title>
    <style>
        body {
            background: #000;
            font-family: Arial, sans-serif;
        }
        center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background-color: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
            width: 400px;
        }
        h1 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }
        table {
            width: 100%;
        }
        td {
            padding: 10px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .message {
            text-align: center;
            margin-top: 15px;
            font-weight: bold;
            color: red;
        }
        .sidebar {
            text-align: center;
            margin-top: 15px;
        }
        .sidebar a {
            text-decoration: none;
            color: #2980b9;
            font-weight: bold;
            margin: 0 10px;
        }
    </style>
</head>
<body>
<center>
    <form action="" method="post">
        <h1>OFFICER LOGIN</h1>
        <table>
            <tr><td>EMAIL</td><td><input type="text" name="email" required></td></tr>
            <tr><td>PASSWORD</td><td><input type="password" name="password" required></td></tr>
        </table>
        <input type="submit" name="log" value="LOGIN">

        <div class="sidebar">
            <a href="..">|BACK|</a>
            <a href="officerreg.php">|SIGN UP|</a>
        </div>

        <div class="message">
        <?php
        if (isset($_POST['log'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Fetch officer by email and plain-text password
            $stmt = $conn->prepare("SELECT officer_id FROM tbl_officer WHERE email = ? AND password = ?");
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($officerID);
                $stmt->fetch();

                $_SESSION['OfficerID'] = $officerID;
                header("Location: homepage.php");
                exit();
            } else {
                echo "❌ Invalid email or password.";
            }

            $stmt->close();
        }
        ?>
        </div>
    </form>
</center>
</body>
</html>