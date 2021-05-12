<div class="container-fluid">
    <div class="row">
        <div class="col-10">
            <div class="messageContainer" id='auto'>
            	  <?php require_once 'application/views/home/messagebox.php' ?>  
            </div>
            <div>
                <form action="api/sendmessages" method="post">
                    <div >
                        <input class="widinput" type="text" name="message" required placeholder="Send message your friend :D">
                    </div>

                    <button class="button" type="submit" >Send message</button>
                </form>
            </div>
        </div>
        <div class="col-2">
            <?php foreach ($users as $key => $value): ?>
            	   <?php  print_r($value[0]); ?>
            	   <?php switch ($value[1]) {
            	   	case '1':
            	   		echo "onlie <br>";
            	   		break;
            	   	case '2':
            	   		echo "busy <br>";
            	   		break;
            	   	case '3':
            	   		echo "inactive <br>";
            	   		break;
            	   	case '4':
            	   		echo "offline <br>";
            	   		break;

            	   	default:
            	   		# code...
            	   		break;
            	   } ?>
            	   <!-- <?php  print_r($value[1]); echo "<br>"; ?> -->
            	 <!-- <?php var_dump($users) ?> -->
           	<?php endforeach ?>
        </div>
    </div>
</div>


<script>
    messageContainer = document.getElementsByClassName('messageContainer')[0];
    messageContainer.scrollBy(0, messageContainer.scrollHeight);
</script>    //location.reload( 'application/views/home/messagebox.php' );

    // setTimeout(function(){ $( "#auto" ).load( 'application/views/home/messagebox.php' ); }, 1000);
    
     setTimeout(function(){ location.reload(true) }, 15000);
     
    //messageBox = document.getElementById('auto');
    //window.location.replace('message');

    //location.reload(true);   
</script>

<!-- <script type="text/javascript">
	$(document).ready(function() {
		alert("ok");
	})

</script>  -->
