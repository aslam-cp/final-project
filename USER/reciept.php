<!DOCTYPE html>
<html>
<head>
  <title>Log Payment Transaction</title>
  <style>
    body {
      background-color: #1e1e2f;
      font-family: Arial, sans-serif;
      color: #fff;
      margin: 0;
      padding: 0;
    }
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      min-height: 100vh;
      padding: 20px;
    }
    form {
      background-color: #fff;
      color: #333;
      padding: 30px 40px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(255,255,255,0.1);
      width: 400px;
      margin-bottom: 30px;
    }
    h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #2c3e50;
    }
    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
    }
    input[type="text"],
    input[type="number"],
    textarea,
    select {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }
    input[type="submit"] {
      width: 100%;
      background-color: #3498db;
      color: white;
      border: none;
      padding: 12px;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }
    input[type="submit"]:hover {
      background-color: #2980b9;
    }
    .message {
      margin-top: 20px;
      text-align: center;
      font-weight: bold;
    }
    .receipt {
      background-color: #fff;
      color: #333;
      padding: 20px 30px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(255,255,255,0.1);
      width: 400px;
      font-size: 15px;
    }
    .receipt h3 {
      text-align: center;
      margin-bottom: 20px;
      color: #2c3e50;
    }
    .receipt p {
      margin: 8px 0;
    }
    .print-btn {
      margin-top: 15px;
      display: block;
      width: 100%;
      background-color: #00b894;
      color: white;
      border: none;
      padding: 10px;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
    }
    @media print {
      body * {
        visibility: hidden;
      }
      .receipt, .receipt * {
        visibility: visible;
      }
      .receipt {
        position: absolute;
        top: 0;
        left: 0;
      }
    }
  </style>
</head>
<body>
<div class="container">
  <form method="post">
    <h2>Log Payment Transaction</h2>
    <label for="request_id">Request ID</label>
    <input type="text" name="request_id" required>

    <label for="amount">Amount (₹)</label>
    <input type="number" name="amount" step="0.01" required>

    <label for="status">Status</label>
    <select name="status" required>
      <option value="">Select Status</option>
      <option value="Pending">Pending</option>
      <option value="Success">Success</option>
      <option value="Failed">Failed</option>
    </select>

    <label for="gateway_response">Gateway Response</label>
    <textarea name="gateway_response" rows="4" required></textarea>

    <input type="submit" name="submit" value="Log Transaction">
  </form>
 <a href="Homepage.php" class="back-link">| BACK |</a>
  <?php
  if (isset($_POST["submit"])) {
    $requestId = intval($_POST["request_id"]);
    $amount = floatval($_POST["amount"]);
    $status = $_POST["status"];
    $gatewayResponse = $_POST["gateway_response"];
    $timestamp = date("Y-m-d H:i:s");

    $con = new mysqli("localhost", "root", "", "db_ksii");
    if ($con->connect_error) {
      die("<div class='message'>❌ Connection failed: " . $con->connect_error . "</div>");
    }

    $stmt = $con->prepare("INSERT INTO payment_transactions (request_id, amount, status, gateway_response, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sdssss", $requestId, $amount, $status, $gatewayResponse, $timestamp, $timestamp);

    if ($stmt->execute()) {
      $lastId = $stmt->insert_id;
      echo "<div class='message'>✅ Transaction logged successfully.</div>";

      // Fetch the inserted record
      $receiptStmt = $con->prepare("SELECT id, request_id, amount, status, gateway_response, created_at FROM payment_transactions WHERE id = ?");
      $receiptStmt->bind_param("i", $lastId);
      $receiptStmt->execute();
      $receiptStmt->bind_result($id, $reqId, $amt, $stat, $resp, $created);
      if ($receiptStmt->fetch()) {
        echo "<div class='receipt'>
                <h3>🧾 Payment Receipt</h3>
                <p><strong>Payment ID:</strong> $id</p>
                <p><strong>Request ID:</strong> $reqId</p>
                <p><strong>Status:</strong> $stat</p>
                <p><strong>Amount:</strong> ₹$amt</p>
                <p><strong>Timestamp:</strong> $created</p>
                <p><strong>Gateway Response:</strong><br>$resp</p>
                <button class='print-btn' onclick='window.print()'>🖨️ Print Receipt</button>
              </div>";
      }
      $receiptStmt->close();
    } else {
      echo "<div class='message'>❌ Error: " . $stmt->error . "</div>";
    }

    $stmt->close();
    $con->close();
  }
  ?>
</div>
</body>
</html>
