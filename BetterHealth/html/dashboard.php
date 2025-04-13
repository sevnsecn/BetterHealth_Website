<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <!-- basic -->
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Dashboard</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">


      <style>
        body {
            background-color: #111;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #1f1f1f;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            color: #00e676;
            margin: 0;
        }

        .nav-links a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-weight: 500;
        }

        .dashboard-container {
            padding: 60px;
            text-align: center;
        }

        .dashboard-container h2 {
            font-size: 2.5rem;
            margin-bottom: 40px;
        }

        .card-grid {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .card {
            background-color: #222;
            padding: 30px 50px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.3);
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card a {
            text-decoration: none;
            color: #00e676;
            font-size: 1.2rem;
            font-weight: bold;
        }
    </style>


</head>
<body>
    <header>
    <h1>BetterHealth</h1>
    <div class="nav-links">
        <a href="index.php">Home</a>
        <a href="logout.php" onclick="return confirmLogout();">Logout</a>
    </div>
</header>

<div class="dashboard-container">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <div class="card-grid">
        <div class="card">
            <a href="index.php">Return Home</a>
        </div>
        <div class="card">
            <a href="tutors.php">Book a Tutor!</a>
        </div>
        <div class="card">
            <a href="guides.php">Read our Guides!</a>
        </div>
    </div>
</div>
      <!--Logout confirmation -->
      <script>
      function confirmLogout() {
      return confirm("Are you sure you want to log out?");
      }
      </script>
</body>
</html>