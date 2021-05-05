

<?php

    require_once('database.php') ;

    if (isset($_POST['WebDev']) && isset($_POST['Gadget']) && isset($_POST['Data']))
        $webDev = filter_var($_POST['WebDev'], FILTER_SANITIZE_STRING) ;
        $gadget = filter_var($_POST['Gadget'], FILTER_SANITIZE_STRING) ;
        $data = filter_var($_POST['Data'], FILTER_SANITIZE_STRING) ;

    
    $query1 = "SELECT * FROM tasks WHERE job_id = 7068" ;
    $query2 = "SELECT * FROM tasks WHERE job_id = 7071" ;
    $query3 = "SELECT * FROM tasks WHERE job_id = 7079" ;

    $q1Result = mysqli_query($conn, $query1) ;
    $q2Result = mysqli_query($conn, $query2) ;
    $q3Result = mysqli_query($conn, $query3) ;

    $NumFields1 = mysqli_num_fields($q1Result);
    $NumFields2 = mysqli_num_fields($q2Result);
    $NumFields3 = mysqli_num_fields($q3Result);

     // Disply query result
     echo "<table width='100%' border='1'>" ;
     echo "<tr><th>Task ID</th><th>Task Name</th><th>Job ID</th><th>Start Date</th><th>End Date</th></tr>" ;
     if($webDev){
        $Row = @mysqli_fetch_row($q1Result) ;
        do {
            echo "<tr>" ;
            for ($i = 0 ; $i < $NumFields1 ; $i++) {
            echo "<td>{$Row[$i]}</td>" ;
        }
        echo "</tr>" ;
        $Row = @mysqli_fetch_row($q1Result) ;
        } while ($Row) ;
        echo "</table>" ;
        echo "<p>Total rows returned: ".@mysqli_num_rows($q1Result)."</p>"; 
    }
    else if($gadget){
        $Row = @mysqli_fetch_row($q2Result) ;
        do {
            echo "<tr>" ;
            for ($i = 0 ; $i < $NumFields2 ; $i++) {
            echo "<td>{$Row[$i]}</td>" ;
        }
        echo "</tr>" ;
        $Row = @mysqli_fetch_row($q2Result) ;
        } while ($Row) ;
        echo "</table>" ;
        echo "<p>Total rows returned: ".@mysqli_num_rows($q2Result)."</p>" ;
        
    }else($data){
        
        do {
            echo "<tr>" ;
            for ($i = 0 ; $i < $NumFields3 ; $i++) {
            echo "<td>{$Row[$i]}</td>" ;
                                                }
        echo "</tr>" ;
        $Row = @mysqli_fetch_row($q3Result) ;
                                            
             } while ($Row) ;
        echo "</table>" ;
        echo "<p>Total rows returned: ".@mysqli_num_rows($q3Result)."</p>" ;        
    }
    

    mysqli_free_result($q1Result);
    mysqli_free_result($q2Result);
    mysqli_free_result($q3Result);


    mysqli_close($conn) ;

?>