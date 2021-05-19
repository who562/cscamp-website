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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dash.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css" integrity="sha384-Uu6IeWbM+gzNVXJcM9XV3SohHtmWE+3VGi496jvgX1jyvDTXfdK+rfZc8C1Aehk5" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="jquery-3.6.0.js"></script> 
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
    <h1>Thank you!</h1>
    <p class="lead">Please choose a Job and make sure to submit the hours</p>
  </section>
  <section id="jobs">
  
    <h1>Volunteer Dashboard</h1>
    <h2>Jobs Available:</h2>
    
    <div>
    <form id="myTable" class="pure-form" action="list.php" method="POST" >
    
    <script src="website.js"></script>
    <p>Web Development</p>
            <input type="radio" name="job" value="WebDev"></p>
            <p>Gadgeteers</p>
            <input type="radio" name="job" value="Gadget"></p>
            <p>Data Analysis</p>
            <input type="radio" name="job" value="Data"></p>
            <button type="submit" onclick="hideForm()" id="table" class="pure-button pure-button-primary">Submit</button>
            </form>
            <div id="result"></div>
    </div>
    </section>
    
    <section id="hours">
    <h1>Hours</h1>
    <div>
        <form method="POST" class="pure-form" action="hours.php">
            <p>Volunteer ID: <?php echo $_SESSION['vol_id'];?>
            <input type="hidden" name="VolID" id="VolID" value="<?php echo $_SESSION['vol_id'];?>"></p>
            <p>Date:
            <input type="date" name="Date" id="Date" min="06/14/2021" max="07/02/2021"required></p>
            <p>Time In: 
            <input type="time" name="TimeIn" id="TimeIn" min="8:00" max="13:00"required></p>
            <p>Time Out: 
            <input type="time" name="TimeOut" id="TimeOut" min="13:00" max="18:00"required></p>
            <p>TaskID(job choice): 
            <input type="number" name="TaskID" min="8031" max="8039" id="TaskID"required></p>
            <button type="submit" class="pure-button pure-button-primary">Submit</button>
        </form>
    </div>
    </section>
</body>
</html>
