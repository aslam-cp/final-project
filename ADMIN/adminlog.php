<!DOCTYPE html>
<html>
<head>
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

    input[type="text"], input[type="password"] {
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
    }

    .sidebar {
        text-align: center;
        margin-top: 15px;
    }

    .sidebar a {
        text-decoration: none;
        color: #2980b9;
        font-weight: bold;
    }
</style>
</head>
<body>
<center>
    <form action="" method="post">
        <h1>ADMIN LOGIN</h1>
        <table>
            <tr><td>USERNAME</td><td><input type="text"  required name="email" ></td></tr>
            <tr><td>PASSWORD</td><td><input type="password" name="password" required></td></tr>
          
        
</table>
<input type="submit" name="log" value="LOGIN">
        <div class="sidebar">
            <a href="..">|BACK|</a>
        </div>

        <div class="message">
        <?php
if (isset($_POST["log"])) {
    $user1 = "admin@gmail.com";
    $pass1 = "Aslam@2003";
    

    $user = $_POST["email"];
    $pass = $_POST["password"];
 

    // Connect to database
    $con = mysqli_connect("localhost", "root", "", "db_ksii");

    if (mysqli_connect_errno()) {
        die('❌ Could not connect: ' . mysqli_connect_error());
    }

    // Insert into database
    $query = "INSERT INTO tbl_admin (email, password) VALUES ('$user', '$pass')";
    $result = mysqli_query($con, $query);

    if (!$result) {
        echo "❌ Query failed: " . mysqli_error($con);
    } else {
        echo "✅ Inserted successfully<br>";
    }

    // Check credentials
    if ($user1 === $user && $pass1 === $pass) {
        echo "✅ WELCOME";

        // ✅ Redirect to agent homepage using JavaScript
        echo "<script>window.location.href = 'dashboard.php';</script>";
    } else {
        echo "❌ LOGIN FAILED";
    }

    mysqli_close($con);
}
?>

        </div>
    </form>
</center>
</body>
</html>
