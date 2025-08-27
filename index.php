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
      background-color: #f4f4f4;
      color: #333;
    }

    /* Header */
    header {
      background-color: #2c3e50;
      color: white;
      padding: 20px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: sticky;
      top: 0;
      z-index: 999;
      animation: slideDown 1s ease-in-out;
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
      color: #f39c12;
    }

    .dropdown {
      position: relative;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #2c3e50;
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
      transition: background 0.3s;
    }

    .dropdown-content a:hover {
      background-color: #34495e;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    /* Hero Section */
    .hero {
      height: 100vh;
      background: url("img/govtech.jpg") center/cover no-repeat;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      color: white;
      padding: 20px;
      animation: fadeIn 1.5s ease-in-out;
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
      background-color: #f39c12;
      color: black;
      border: none;
      border-radius: 30px;
      font-size: 16px;
      cursor: pointer;
      transition: transform 0.3s;
      text-decoration: none;
      display: inline-block;
    }

    .view-plans-button:hover {
      transform: scale(1.05);
    }

    /* Services Section */
    .plans {
      background: #f9f9f9;
      padding: 60px 40px;
      text-align: center;
      animation: fadeInUp 1.5s ease-in-out;
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
      background: white;
      border-radius: 15px;
      padding: 25px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
      animation: fadeIn 1s ease-in;
    }

    .plan-card:hover {
      transform: translateY(-10px);
    }

    .plan-card h3 {
      font-size: 22px;
      color: #2980b9;
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
      background-color: #f39c12;
      color: #000;
      border: none;
      padding: 12px 25px;
      border-radius: 25px;
      cursor: pointer;
      font-size: 15px;
      transition: background 0.3s ease;
    }

    .plan-card button:hover {
      background-color: #e67e22;
    }

    /* Footer */
    footer {
      background-color: #2c3e50;
      color: white;
      text-align: center;
      padding: 20px;
      margin-top: 40px;
    }

    /* Animations */
    @keyframes fadeIn {
      0% { opacity: 0; }
      100% { opacity: 1; }
    }

    @keyframes fadeInUp {
      0% {
        opacity: 0;
        transform: translateY(30px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes slideDown {
      from { transform: translateY(-100%); }
      to { transform: translateY(0); }
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
        background-color: #2c3e50;
      }
    }
  </style>

  <!-- ✅ Override for Black Background -->
  <style>
    body {
      background-color: #000 !important;
      color: #fff !important;
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
        <a href="userreg.php">USER REGISTER</a>
        <div class="dropdown-content">
          <a href="citizen_register.php">Citizen Register</a>
          <a href="staff_register.php">Staff Register</a>
        </div>
      </div>

      <div class="dropdown">
        <a href="#">Login</a>
        <div class="dropdown-content">
          <a href="citizen_login.php">Citizen Login</a>
          <a href="staff_login.php">Staff Login</a>
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
        <p>Report civic issues and receive
  </div>
  </html>