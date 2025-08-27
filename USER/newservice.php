<?php
session_start();
if (!isset($_SESSION['UserID'])) {
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Create Service Request</title>
  <style>
    body {
      background: #000;
      font-family: Arial, sans-serif;
      color: #333;
      margin: 0;
      padding: 0;
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
      box-shadow: 0 0 20px rgba(255,255,255,0.15);
      width: 400px;
    }
    h1 {
      text-align: center;
      margin-bottom: 25px;
      color: #2c3e50;
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
    input[type="number"] {
      width: 100%;
      padding: 8px 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }
    input[type="submit"] {
      width: 100%;
      background-color: #007BFF;
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
      background-color: #0056b3;
    }
    .message {
      margin-top: 20px;
      color: white;
      font-weight: bold;
      text-align: center;
    }
  </style>
</head>
<body>
<center>
  <div>
    <form method="post">
      <h1>CREATE SERVICE REQUEST</h1>
      <table>
        <tr>
          <td>SERVICE TYPE</td>
          <td><input type="text" name="ServiceType" placeholder="e.g. Birth Certificate" required></td>
        </tr>
        <tr>
          <td>DESCRIPTION</td>
          <td><input type="text" name="Description" placeholder="Brief description..." required></td>
        </tr>
        <tr>
          <td>FEE AMOUNT</td>
          <td><input type="number" name="FeeAmount" placeholder="e.g. 100" required></td>
        </tr>
      </table>
      <input type="submit" name="submit" value="SUBMIT REQUEST">
    </form>

    <div class="message">
      <a href="Homepage.php" class="back-link">| BACK |</a>
      <?php
      if (isset($_POST["submit"])) {
        $UserID = $_SESSION['UserID'];
        $ServiceType = trim($_POST['ServiceType']);
        $Description = trim($_POST['Description']);
        $FeeAmount = intval($_POST['FeeAmount']);
        $Status = 'Pending';
        $CreatedAt = date('Y-m-d H:i:s');

        // DB Connection
        $con = new mysqli("localhost", "root", "", "db_ksii");
        if ($con->connect_error) {
          die("Connection failed: " . $con->connect_error);
        }

        $stmt = $con->prepare("INSERT INTO service_requests (UserID, ServiceType, Description, FeeAmount, Status, CreatedAt)
                               VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ississ", $UserID, $ServiceType, $Description, $FeeAmount, $Status, $CreatedAt);

        if ($stmt->execute()) {
          echo "✅ Request submitted successfully!";
        } else {
          echo "❌ Error: " . $stmt->error;
        }

        $stmt->close();
        $con->close();
      }
      ?>
    </div>
  </div>
</center>
</body>
</html>
