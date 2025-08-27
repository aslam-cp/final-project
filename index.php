<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Citizen Service Requests & Fees</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    /* Base Styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      background-color: #e6f2ff;
      color: #333;
    }

    /* Header */
    header {
      background-color: #3498db;
      color: white;
      padding: 20px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: sticky;
      top: 0;
      z-index: 999;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    header h1 {
      font-size: 28px;
    }

    nav {
      display: flex;
      gap: 15px;
      align-items: center;
    }

    nav a {
      color: white;
      text-decoration: none;
      font-weight: bold;
      transition: color 0.3s;
    }

    nav a:hover {
      color: #f1c40f;
    }

    .dropdown {
      position: relative;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #3498db;
      min-width: 160px;
      z-index: 1;
      top: 40px;
      left: 0;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    }

    .dropdown-content a {
      color: white;
      padding: 10px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {
      background-color: #2980b9;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    /* Hero Section */
    .hero {
      height: 100vh;
      background: linear-gradient(to right, #85c1e9, #d6eaf8);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      color: #2c3e50;
      padding: 20px;
    }

    .hero h2 {
      font-size: 48px;
      margin-bottom: 15px;
    }

    .hero p {
      font-size: 20px;
      max-width: 600px;
      margin-bottom: 30px;
    }

    .view-plans-button {
      padding: 12px 25px;
      background-color: #f1c40f;
      color: #2c3e50;
      border: none;
      border-radius: 30px;
      font-size: 16px;
      cursor: pointer;
      text-decoration: none;
      display: inline-block;
      font-weight: bold;
    }

    .view-plans-button:hover {
      background-color: #f39c12;
    }

    /* Services Section */
    .plans {
      background: #ffffff;
      padding: 60px 40px;
      text-align: center;
    }

    .plans h2 {
      font-size: 36px;
      margin-bottom: 40px;
      color: #2c3e50;
    }

    .plan-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 30px;
    }

    .plan-card {
      background: #f8f9f9;
      border-radius: 15px;
      padding: 25px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
      transition: transform 0.3s ease;
    }

    .plan-card:hover {
      transform: translateY(-10px);
    }

    .plan-card h3 {
      font-size: 22px;
      color: #3498db;
      margin-bottom: 15px;
    }

    .plan-card p {
      font-size: 16px;
      color: #555;
      margin-bottom: 20px;
      min-height: 80px;
    }

    .price {
      font-size: 20px;
      color: #333;
      font-weight: bold;
      display: block;
      margin-bottom: 20px;
    }

    .plan-card button {
      background-color: #3498db;
      color: white;
      border: none;
      padding: 12px 25px;
      border-radius: 25px;
      cursor: pointer;
      font-size: 15px;
      transition: background 0.3s ease;
    }

    .plan-card button:hover {
      background-color: #2980b9;
    }

    /* Footer */
    footer {
      background-color: #3498db;
      color: white;
      text-align: center;
      padding: 20px;
      margin-top: 40px;
    }

    @media (max-width: 600px) {
      header {
        flex-direction: column;
        text-align: center;
      }

      .hero h2 {
        font-size: 30px;
      }

      .hero p {
        font-size: 16px;
      }

      nav {
        flex-direction: column;
      }

      .dropdown-content {
        position: static;
        box-shadow: none;
        background-color: transparent;
      }

      .dropdown-content a {
        background-color: #3498db;
      }
    }
  </style>
</head>
<body>

  <!-- Header -->
  <header>
    <h1>Citizen Services Portal</h1>
    <nav>
      <a href="#">Home</a>
      <a href="#plans">Services</a>

      <div class="dropdown">
        <a href="in.php">Registration</a>
        <div class="dropdown-content">
          <a href="citizen_register.php"></a>
          <a href="staff_register.php"></a>
        </div>
      </div>

      <div class="dropdown">
        <a href="in.php">Login</a>
        <div class="dropdown-content">
          <a href="citizen_login.php"></a>
          <a href="staff_login.php"></a>
        </div>
      </div>
    </nav>
  </header>

  <!-- Hero -->
  <section class="hero">
    <h2>Access Public Services with Ease</h2>
    <p>Submit service requests, view applicable fees, and track your applications—all in one place.</p>
    <a href="#plans" class="view-plans-button">Explore Services</a>
  </section>

  <!-- Services Section -->
  <section class="plans" id="plans">
    <h2>Available Citizen Services</h2>
    <div class="plan-container">

      <div class="plan-card">
        <h3>Birth Certificate</h3>
        <p>Apply for a birth certificate online with secure verification and delivery.</p>
        <span class="price">₹100</span>
        <button>Request Now</button>
      </div>

      <div class="plan-card">
        <h3>Water Connection</h3>
        <p>Submit a new water connection request with real-time tracking and updates.</p>
        <span class="price">₹500</span>
        <button>Apply Now</button>
      </div>

      <div class="plan-card">
        <h3>Property Tax Payment</h3>
        <p>Pay your property tax online and download instant receipts.</p>
        <span class="price">Variable</span>
        <button>Pay Now</button>
      </div>

      <div class="plan-card">
        <h3>Grievance Redressal</h3>
        <p>Report civic issues and receive timely updates from municipal staff.</p>
        <span class="price">Free</span>
        <button>Report Issue</button>
      </div>

    </div>
  </section>

  <!-- Footer -->
  <footer>
    &copy; 2025 Citizen Services Portal. All rights reserved.
  </footer>

</body>
</html>
