<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.html');
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Volunteer Dashboard</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="website.css">
        <script src="website.js"></script>
        <script src="jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include 'database.php';
        $sql = "SELECT vol_id, first_name, last_name FROM volunteer_info";
        $result = $conn->query($sql);
        ?>

<body>
    <div class="header">
        <h1>Group 5 project</h1>
        </div>
       <div class="navbar">
        <a href="index.html">Home</a>
        <a href="#">Display Events</a>
        <a href="#">Soical Media</a>
        <a href="#">Donate</a>
        <a href="Logout.php" class="right">Logout</a>
      </div>
    
    <h1>Volunteer Dashboard</h1>
    <h2>Jobs Available</h2>
    
    <div>
        <form method="POST" action="list.php">
        <p>JOBS:
                        <select name='job' id='job'>
                        <option>chose a job</option>
                        <option>WebDev</option>
                        <option>Gadget</option>
                        <option>Data</option>
                        </select></p>
                        <input type="submit" value="Sumbit">
        </form>
    </div>
    <h2>Hours</h2>
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
            <input type="submit" value="Sumbit">
        </form>
    </div>
</body>
</html>
