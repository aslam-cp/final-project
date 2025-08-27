<!DOCTYPE html>
<html>
<head>
  <title>User Registration</title>
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
      <h1>USER REGISTRATION</h1>
      <table>
        <tr>
          <td>NAME</td>
          <td><input type="text" name="name" required pattern="^[A-Z][a-zA-Z ]{2,}$" title="Start with capital, min 3 characters"></td>
        </tr>
        <tr>
          <td>EMAIL</td>
          <td><input type="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Valid email format"></td>
        </tr>
        <tr>
          <td>MOBILE</td>
          <td><input type="text" name="mobile" required pattern="[6-9]{1}[0-9]{9}" title="10-digit Indian mobile number"></td>
        </tr>
        <tr>
          <td>PASSWORD</td>
          <td><input type="password" name="password" required pattern="(?=.*[A-Z])(?=.*[@#$%^&+=])(?=.*\d)[A-Za-z\d@#$%^&+=]{8,}" title="Min 8 chars, 1 uppercase, 1 special, 1 number"></td>
        </tr>
        <tr>
          <td>ROLE</td>
          <td>
            <select name="role" required>
              <option value="">Select Role</option>
              <option value="Citizen">Citizen</option>
              <option value="Staff">Staff</option>
            </select>
          </td>
        </tr>
      </table>
      <input type="submit" name="submit" value="REGISTER">
    </form>

    <div class="message">
      <?php
if (isset($_POST["submit"])) {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $mobile = $_POST["mobile"];
  $password = $_POST["password"];
  $role = $_POST["role"];
  $createdAt = date("Y-m-d H:i:s");

  // DB Connection
  $con = new mysqli("localhost", "root", "", "db_ksii");
  if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  }

  $stmt = $con->prepare("INSERT INTO users (Name, Email, Mobile, PasswordHash, Role, CreatedAT) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssisss", $name, $email, $mobile, $password, $role, $createdAt);

  if ($stmt->execute()) {
    echo "✅ Registration successful.";
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
