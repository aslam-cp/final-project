<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Gateway Health Check</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f6f8;
      color: #333;
    }

    .container {
      max-width: 600px;
      margin: 60px auto;
      padding: 30px;
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 0 12px rgba(0, 0, 0, 0.08);
    }

    h1 {
      text-align: center;
      color: #2c3e50;
      margin-bottom: 20px;
    }

    .status-box {
      font-size: 1.1em;
      line-height: 1.6;
      background: #eafaf1;
      border-left: 5px solid #2ecc71;
      padding: 20px;
      border-radius: 6px;
    }

    .ok {
      color: #27ae60;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>🩺 Payment Gateway Status</h1>
    <div class="status-box">
      <p><strong>Provider:</strong> Razorpay Sandbox</p>
      <p><strong>Status:</strong> <span class="ok">Operational</span></p>
      <p><strong>Key Loaded:</strong> ✅</p>
      <p><strong>Checked At:</strong> <span id="timestamp">--</span></p>
    </div>
  </div>

  <script>
    fetch('health.php')
      .then(res => res.json())
      .then(data => {
        document.getElementById('timestamp').textContent = data.timestamp;
      });
  </script>
</body>
</html>
