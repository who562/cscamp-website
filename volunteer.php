<?php
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit;
} 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Volunteer Dashboard</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="dash.css">
        <script src="website.js"></script>
        <script src="jquery-3.6.0.js"></script>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include 'database.php';
        
        ?>

<body>
<div class="container">
  <nav class="navbar">
      <ul>
      <li><a href="#home">Top</a></li>
          <li><a href="#jobs">Jobs</a></li>
          <li><a href="#hours">Hours</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </nav>


      <section id="home">
    <h1>Thank you for your hard work!</h1>
    <p class="lead">please chose a job and make sure to sumbit the hours</p>
  </section>
  <section id="jobs">
  
    <h1>Volunteer Dashboard</h1>
    <h2>Jobs Available</h2>
    
    <div>
    <form method="POST" action="list.php">
            <p>Web Development</p>
            <input type="radio" name="job" value="WebDev"></p>
            <p>Gadgeteers</p>
            <input type="radio" name="job" value="Gadget"></p>
            <p>Data Analysis</p>
            <input type="radio" name="job" value="Data"></p>
            <input type="submit" value="Submit">
        </form>
    </div>
    </section>
    
    <section id="hours">
    <h1>Hours</h1>
    <div>
        <form method="POST" action="hours.php">
            <p>Volunteer ID: <?php echo $_SESSION['vol_id'];?>
            <input type="hidden" name="VolID" id="VolID" value="<?php echo $_SESSION['vol_id'];?>"></p>
            <p>Date:
            <input type="date" name="Date" id="Date" min="06/14/2021" max="07/02/2021"></p>
            <p>Time In: 
            <input type="time" name="TimeIn" id="TimeIn" min="8:00" max="13:00"></p>
            <p>Time Out: 
            <input type="time" name="TimeOut" id="TimeOut" min="13:00" max="18:00"></p>
            <p>TaskID(job choice): 
            <input type="number" name="TaskID" min="8031" max="8039" id="TaskID"></p>
            <input type="submit" value="Sumbit">
        </form>
    </div>
    </section>
</body>
</html>
