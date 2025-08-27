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
      height: 100vh;
    }
    form {
      background-color: #fff;
      color: #333;
      padding: 30px 40px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(255,255,255,0.1);
      width: 400px;
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

    <div class="message">
      <?php
      if (isset($_POST["submit"])) {
        $requestId = $_POST["request_id"];
        $amount = $_POST["amount"];
        $status = $_POST["status"];
        $gatewayResponse = $_POST["gateway_response"];

        $con = new mysqli("localhost", "root", "", "db_ksii");
        if ($con->connect_error) {
          die("Connection failed: " . $con->connect_error);
        }

        $stmt = $con->prepare("INSERT INTO payment_transactions (request_id, amount, status, gateway_response) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sdss", $requestId, $amount, $status, $gatewayResponse);

        if ($stmt->execute()) {
          echo "✅ Transaction logged successfully.";
        } else {
          echo "❌ Error: " . $stmt->error;
        }

        $stmt->close();
        $con->close();
      }
      ?>
    </div>
  </form>
</div>
</body>
</html>
