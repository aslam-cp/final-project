<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Public Services Portal</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to right, #dbeeff, #f0f9ff);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .container {
      background-color: white;
      padding: 40px 50px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      text-align: center;
      width: 360px;
      animation: fadeInUp 1s ease-out;
    }

    h1 {
      font-size: 28px;
      color: #2c3e50;
      margin-bottom: 25px;
    }

    .btn {
      display: block;
      width: 100%;
      padding: 12px;
      margin: 12px 0;
      background-color: #3498db;
      color: white;
      font-size: 16px;
      text-decoration: none;
      border-radius: 6px;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #2980b9;
    }

    p {
      margin-top: 20px;
      color: #555;
      font-size: 14px;
    }

    a.back-link {
      display: inline-block;
      margin-top: 10px;
      color: #3498db;
      text-decoration: none;
      font-weight: bold;
    }

    a.back-link:hover {
      text-decoration: underline;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(40px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>Welcome to the Services Portal</h1>
    <a href="ADMIN/adminlog.php" class="btn">Admin Login </a>
    <a href="officer/officerlog.php" class="btn">Officer login</a>
    <a href="USER/userlog.php" class="btn">Citizen Login </a>
    <p>Access public services, manage requests, and stay informed.</p>
    <a href="index.php" class="back-link">| BACK |</a>
  </div>
  <div class="container">
    <h1>Welcome to the Services Portal</h1>
    <a href="officer/officerreg.php" class="btn">Officer Register</a>
    <a href="USER/userreg.php" class="btn">Citizen Register </a>
    <p>Access public services, manage requests, and stay informed.</p>
    <a href="index.php" class="back-link">| BACK |</a>
  </div>

</body>
</html>