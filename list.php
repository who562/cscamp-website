<?php

    require_once('database.php') ;

    if (!isset($_POST['job'])) {
       echo"<p>Please Choose a Job</p>" ;
    }else{
        $job= filter_var($_POST['job'], FILTER_SANITIZE_STRING);
    
        $sqlIncomplete1 = "SELECT task_name, start_date, end_date FROM tasks WHERE job_id = 7068 AND is_completed = 'no'" ;
        $sqlIncomplete2 = "SELECT task_name, start_date, end_date FROM tasks WHERE job_id = 7071 AND is_completed = 'no'" ;
        $sqlIncomplete3 = "SELECT task_name, start_date, end_date FROM tasks WHERE job_id = 7079 AND is_completed = 'no'" ;

        $q1Result = mysqli_query($conn, $sqlIncomplete1) ;
        $q2Result = mysqli_query($conn, $sqlIncomplete2) ;
        $q3Result = mysqli_query($conn, $sqlIncomplete3) ;


         //Fetch all imcomplete list items
        $incompleteItems1 = mysqli_fetch_all($q1Result, MYSQLI_ASSOC);
        $incompleteItems2 = mysqli_fetch_all($q2Result, MYSQLI_ASSOC);
        $incompleteItems3 = mysqli_fetch_all($q3Result, MYSQLI_ASSOC);

        //Get incomplete items
        $sqlCompleted1 = "SELECT task_id, task_name, start_date, end_date FROM tasks WHERE job_id = 7068 AND is_completed = 'yes'" ;
        $sqlCompleted2 = "SELECT task_id, task_name, start_date, end_date FROM tasks WHERE job_id = 7071 AND is_completed = 'yes'" ;
        $sqlCompleted3 = "SELECT task_id, task_name, start_date, end_date FROM tasks WHERE job_id = 7079 AND is_completed = 'yes'" ;

        $completeResult1 = mysqli_query($conn, $sqlIncomplete1) ;
        $completeResult2 = mysqli_query($conn, $sqlIncomplete2) ;
        $completeResult3 = mysqli_query($conn, $sqlIncomplete3) ;

        //Fetch all completed items
        $completeItems1 = mysqli_fetch_all($completeResult1, MYSQLI_ASSOC);
        $completeItems2 = mysqli_fetch_all($completeResult2, MYSQLI_ASSOC);
        $completeItems3 = mysqli_fetch_all($completeResult3, MYSQLI_ASSOC);       


        // Disply query result
        echo "<!doctype html>";
        echo "<html lang='en'>";
        echo "<head>";

        echo "<meta charset='utf-8'>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1'>";

        echo "<title>Task To-Do List</title>";

        echo "<link rel='stylesheet' href='//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'>";
        echo "<link rel='stylesheet' href='list.css'>";
        echo "</head>";
        echo "<body>";

        echo "<p><h2 align='center'>Task To-Do List</h2></p>";
        echo "<div class='li_containers'>";
 

        if ($job == 'WebDev') {

            foreach ($incompleteItems1 as $key => $item) { 

                echo "<div class='ui-widget-content listitems' data-itemid=".$item["task_id"].">";
    
                echo "<p><strong><".$item['task_name']."</strong></p>";
      
                echo "<hr/>";
      
                echo "<p>".$item['start_date']."</p>";
     
                echo "<p>".$item['end_date']."</p>";
      
                echo "</div>";
      
            }
            echo "</div>";

            echo "<div id='droppable' class='ui-widget-header'>";
            foreach ($completeItems1 as $key => $citem) {
                echo "<div class='listitems'>";
                echo "<p><strong>".$citem['task_name']."</p>";
                echo "<hr/>";
     
                echo "<p>".$citem['start_date']."</p>";

                echo "<p>".$citem['end_date']."</p>";
                
                echo "</div>";
	        }
            echo "</div>";
        } 

        if ($job == 'WebDev') {

            foreach ($incomleteItems1 as $key => $item) { 

                echo "<div class='ui-widget-content listitems' data-itemid=". $item["task_id"].">";
  
                echo "<p><strong><".$item['task_name']."</strong></p>";
    
                echo "<hr/>";
    
                echo "<p>".$item['start_date']."</p>";
   
                echo "<p>".$item['end_date']."</p>";
    
                echo "</div>";
    
            }
            echo "</div>";

            echo "<div id='droppable' class='ui-widget-header'>";
            foreach ($completeItems1 as $key => $citem) {
                echo "<div class='listitems'>";
                echo "<p><strong>".$citem['task_name']."</p>";
                echo "<hr/>";
   
                echo "<p>".$citem['start_date']."</p>";

                echo "<p>".$citem['end_date']."</p>";
              
                echo "</div>";
            }
            echo "</div>";
        } 

        if ($job == 'WebDev') {

            foreach ($incomleteItems1 as $key => $item) { 

                echo "<div class='ui-widget-content listitems' data-itemid=". $item["task_id"].">";

                echo "<p><strong><".$item['task_name']."</strong></p>";
  
                echo "<hr/>";
  
                echo "<p>".$item['start_date']."</p>";
 
                echo "<p>".$item['end_date']."</p>";
  
                echo "</div>";
  
            }
            echo "</div>";

            echo "<div id='droppable' class='ui-widget-header'>";
            foreach ($completeItems1 as $key => $citem) {
               echo "<div class='listitems'>";
               echo "<p><strong>".$citem['task_name']."</p>";
               echo "<hr/>";
 
               echo "<p>".$citem['start_date']."</p>";

               echo "<p>".$citem['end_date']."</p>";
            
               echo "</div>";
            }
            echo "</div>";
        } 

        echo "<script src='https://code.jquery.com/jquery-1.12.4.js'></script>";
        echo "<script src='https://code.jquery.com/ui/1.12.1/jquery-ui.js'></script>";
        echo "<script src='list.js'></script>";

        echo "</body>";
        echo "</html>";

    
        //Free result set
        mysqli_free_result($completeResult1);
        mysqli_free_result($completeResult2);
        mysqli_free_result($completeResult3);
        mysqli_free_result($q1Result);
        mysqli_free_result($q2Result);
        mysqli_free_result($q3Result);


        mysqli_close($conn) ;
    }
?>
