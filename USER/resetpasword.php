<!DOCTYPE html>
<html>
<head>
  <title>Reset Password</title>
  <style>
    body {
      background: #000;
      font-family: Arial, sans-serif;
      color: #fff;
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
      color: #333;
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
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 8px 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }
    input[type="submit"] {
      width: 100%;
      background-color: #f39c12;
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
      background-color: #e67e22;
    }
    .message {
      margin-top: 20px;
      font-weight: bold;
      text-align: center;
      color: white;
    }
  </style>
</head>
<body>
<center>
  <form method="post">
    <h1>Reset Password</h1>
    <table>
      <tr>
        <td>Email</td>
        <td><input type="email" name="email" required></td>
      </tr>
      <tr>
        <td>New Password</td>
        <td><input type="password" name="new_password" required
          pattern="(?=.*[A-Z])(?=.*[@#$%^&+=])(?=.*\d)[A-Za-z\d@#$%^&+=]{8,}"
          title="Min 8 chars, 1 uppercase, 1 special, 1 number"></td>
      </tr>
    </table>
    <input type="submit" name="reset" value="Reset Password">

    <div class="message">
      <?php
      if (isset($_POST["reset"])) {
        $email = $_POST["email"];
        $newPassword = $_POST["new_password"];

        // Connect to DB
        $con = new mysqli("localhost", "root", "", "db_ksii");
        if ($con->connect_error) {
          die("Connection failed: " . $con->connect_error);
        }

        // Update password
        $stmt = $con->prepare("UPDATE users SET PasswordHash = ? WHERE Email = ?");
        $stmt->bind_param("ss", $newPassword, $email);

        if ($stmt->execute()) {
          if ($stmt->affected_rows > 0) {
            echo "✅ Password updated successfully.";
          } else {
            echo "❌ Email not found.";
          }
        } else {
          echo "❌ Error: " . $stmt->error;
        }

        $stmt->close();
        $con->close();
      }
      ?>
    </div>
  </form>
</center>
</body>
</html>