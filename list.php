

<?php

require_once('database.php') ;

if (isset($_POST['job'])) {
    $job= filter_var($_POST['job'], FILTER_SANITIZE_STRING) ;
    
}


$sqlIncomplete1 = "SELECT task_name, start_date, end_date FROM tasks WHERE job_id = 7068 AND is_completed = 'no'" ;
$sqlIncomplete2 = "SELECT task_name, start_date, end_date FROM tasks WHERE job_id = 7071 AND is_completed = 'no'" ;
$sqlIncomplete3 = "SELECT task_name, start_date, end_date FROM tasks WHERE job_id = 7079 AND is_completed = 'no'" ;

$q1Result = mysqli_query($conn, $sqlIncomplete1) ;
$q2Result = mysqli_query($conn, $sqlIncomplete2) ;
$q3Result = mysqli_query($conn, $sqlIncomplete3) ;

//Fetch all imcomplete list items
$incompleteItems1 = mysqli_fetch_all($q1Result);
$incompleteItems2 = mysqli_fetch_all($q2Result);
$incompleteItems3 = mysqli_fetch_all($q3Result);

//Get incomplete items
$sqlCompleted1 = "SELECT task_id, task_name, start_date, end_date FROM tasks WHERE job_id = 7068 AND is_completed = 'yes'" ;
$sqlCompleted2 = "SELECT task_id, task_name, start_date, end_date FROM tasks WHERE job_id = 7071 AND is_completed = 'yes'" ;
$sqlCompleted3 = "SELECT task_id, task_name, start_date, end_date FROM tasks WHERE job_id = 7079 AND is_completed = 'yes'" ;

$completeResult1 = mysqli_query($conn, $sqlIncomplete1) ;
$completeResult2 = mysqli_query($conn, $sqlIncomplete2) ;
$completeResult3 = mysqli_query($conn, $sqlIncomplete3) ;

//Fetch all completed items
$completeItems1 = mysqli_fetch_all($completeResult1);
$completeItems2 = mysqli_fetch_all($completeResult2);
$completeItems3 = mysqli_fetch_all($completeResult3);       


//Free result set
mysqli_free_result($sqlCompleted1);
mysqli_free_result($sqlCompleted2);
mysqli_free_result($sqlCompleted3);
mysqli_free_result($q1Result);
mysqli_free_result($q2Result);
mysqli_free_result($q3Result);


mysqli_close($conn) ;

?>

<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Task To-Do List</title>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="list.css">
</head>
<body>

<p><h2 align="center">Task To-Do List</h2></p>
<div class="li_containers">

<?php 

if ($job == 'WebDev') {

    foreach ($incomleteItems1 as $key => $item) { ?>

        <div class="ui-widget-content listitems" data-itemid=<?php echo $item['task_id'] ?> >
      
          <p><strong><?php echo $item['task_name'] ?></strong></p>
      
          <hr />
      
          <p><?php echo $item['start_date'] ?></p>
     
          <p><?php echo $item['end_date'] ?></p>
      
        </div>
      
      <?php } ?> 
       
     
     <div id="droppable" class="ui-widget-header">
       <?php foreach ($completeItems1 as $key => $citem) { ?>
         <div class="listitems" >
           <p><strong><?php echo $citem['task_name'] ?></strong></p>
           <hr />
     
           <p><?php echo $citem['start_date'] ?></p>
     
           <p><?php echo $citem['end_date'] ?></p>
        </div> 
       <?php } ?>
     </div>
<?php } ?>

<?php if ($job == 'Gadget') {

    foreach ($incomleteItems2 as $key => $item) { ?>

	<div class="ui-widget-content listitems" data-itemid=<?php echo $item['task_id'] ?> >

        <p><strong><?php echo $item['task_name'] ?></strong></p>

	<hr />

	<p><?php echo $item['start_date'] ?></p>

	<p><?php echo $item['end_date'] ?></p>

	</div>

    <?php } ?> 

<div id="droppable" class="ui-widget-header">
<?php foreach ($completeItems2 as $key => $citem) { ?>
 <div class="listitems" >
   <p><strong><?php echo $citem['task_name'] ?></strong></p>
   <hr />

   <p><?php echo $citem['start_date'] ?></p>

   <p><?php echo $citem['end_date'] ?></p>
  </div>
<?php } ?>

</div>
<?php } ?>

<?php if ($job == 'Data') {

foreach ($incomleteItems3 as $key => $item) { ?>

<div class="ui-widget-content listitems" data-itemid=<?php echo $item['task_id'] ?> >

  <p><strong><?php echo $item['task_name'] ?></strong></p>

  <hr />

  <p><?php echo $item['start_date'] ?></p>

  <p><?php echo $item['end_date'] ?></p>

</div>

<?php } ?> 

<div id="droppable" class="ui-widget-header">
    <?php foreach ($completeItems3 as $key => $citem) { ?>
    <div class="listitems" >
    <p><strong><?php echo $citem['task_name'] ?></strong></p>
    <hr />

    <p><?php echo $citem['start_date'] ?></p>

    <p><?php echo $citem['end_date'] ?></p>
    </div>
    <?php } ?>
</div>

<?php } ?>


<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="list.js"></script>

</body>
</html>
