$( function() {
  
    $( ".listitems" ).draggable();

    $( "#droppable" ).droppable({
       drop: function( event, ui ) {
        
       $(this).addClass( "ui-state-highlight" );
       var itemid = ui.draggable.attr('data-itemid')
          
        $.ajax({
         
            method: "POST",
            url: "update_item_status.php",
            data:{'itemid': itemid}, 
         
         }).done(function( data ) {
             var result = $.parseJSON(data);
          });
        }
      	
     });
  });