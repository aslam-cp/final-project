<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            background: url('https://images.unsplash.com/photo-1503264116251-35a269479413?auto=format&fit=crop&w=1600&q=80') no-repeat center center fixed;
            background-size: cover;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: rgba(44, 62, 80, 0.95);
            height: 100vh;
            color: white;
            position: fixed;
            padding-top: 20px;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            padding: 15px 20px;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: white;
            display: block;
        }

        .sidebar ul li:hover {
            background-color: rgba(52, 73, 94, 0.9);
        }

        /* Main content */
        .main-content {
            margin-left: 250px;
            flex: 1;
        }

        .topbar {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .topbar h1 {
            font-size: 20px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .card {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 2px 5px rgba(0,0,0,0.1);
        }

        .card h3 {
            margin-bottom: 10px;
        }

        .card p {
            font-size: 18px;
            font-weight: bold;
            color: #3498db;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Dashboard</h2>
        <ul>
            <li><a href="myprofile.php">MyProfile</a></li>
            <li><a href="users.html">Edit profile</a></li>
            <li><a href="insuranceplans.php">#</a></li>
            <li><a href="settings.html"></a>#</li>
             <li><a href="settings.html"></a>#</li>
              <li><a href="feedback.php">Feedback</a></li>
               <li><a href="settings.html"></a>#</li>
            <li><a href="logout.php">Logout</a>#</li>
        </ul>
    </div>

    <div class="main-content">
        <div class="topbar">
            <h1>User Dashboard</h1>
            <input type="search" placeholder="Search..." style="padding:5px; border-radius:5px; border:1px solid #ccc;">
        </div>

        <div class="cards">
            <div class="card">
                <h3>Users</h3>
                <p>1,240</p>
            </div>
            <div class="card">
                <h3>Sales</h3>
                <p>$4,520</p>
            </div>
            <div class="card">
                <h3>Orders</h3>
                <p>320</p>
            </div>
            <div class="card">
                <h3>Feedback</h3>
                <p>89%</p>
            </div>
        </div>
    </div>
</body>
</html>
