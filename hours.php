<head>
    <title>Volunteer Main Page</title>
    <meta charset="UTF-8">
</head>

<body>
    <?php
            include("database.php");

            if (isset($_POST['VolID']) && isset($_POST['Date']) && isset($_POST['TimeIn']) && isset($_POST['TimeOut']) && isset($_POST['TaskID']))
            {
                $volId = filter_var($_POST['VolID'], FILTER_SANITIZE_STRING) ;
                $date = filter_var($_POST['Date'], FILTER_SANITIZE_STRING) ;
                $timeIn = filter_var($_POST['TimeIn'], FILTER_SANITIZE_STRING) ;
                $timeOut = filter_var($_POST['TimeOut'], FILTER_SANITIZE_STRING) ;
                $TaskID = filter_var($_POST['TaskID'], FILTER_SANITIZE_STRING) ;

                $query = "INSERT INTO volunteer_hours (vol_id, curr_date, time_in, time_out, TaskID) VALUES (".$volId.", '".$date."', '".$timeIn."', '".$timeOut."', ".$TaskID.")" ;
                echo "<p>".$query."</p>" ;
                $ResultSet = @mysqli_query($conn, $query)
                 Or die("<p>Unable to execute the update</p>"
                  ."<p>Error code: ".mysqli_errno($conn).": "
                  .mysqli_error($conn))."</p>" ;
                echo "<p>Successfully updated ".mysqli_affected_rows($conn)." record(s).</p>" ;
             } else {
               // Close the database connection
               mysqli_close($conn) ; 
             }       

    ?>          

</body>

