<div class="container-fluid">
    <div class="row">
        <div class="col-10">
            <div class="messageContainer">
                <?php foreach ($data as $key => $value): ?>
                    <div >
                        <?php if ($value[1] == $_SESSION['username']) { ?>

                            <div class="text" style="text-align:right; margin-left: 10vw" >
                                <div class="container" data-theme="<?=$_SESSION['data-theme']?>" >
                                    <div style="font-weight: bold">
                                        <?php  	print_r($value[1]); echo "<br>"; ?>
                                    </div>
                                    <?php  	print_r($value[2]); echo "<br>"; ?>
                                    <div style="color: #aaa; font-size: 16px">
                                        <?php  	print_r($value[3]); echo "<br>"; ?>
                                    </div>
                                </div>
                            </div>

                        <?php }else { ?>

                            <div class="text" style="text-align:left; margin-right: 10vw">
                                <div class="container darker" data-theme="<?=$_SESSION['data-theme']?>" >
                                    <div style="font-weight: bold">
                                        <?php  	print_r($value[1]); echo "<br>"; ?>
                                    </div>
                                    <?php  	print_r($value[2]); echo "<br>"; ?>
                                    <div style="color: #aaa; font-size: 16px">
                                        <?php  	print_r($value[3]); echo "<br>"; ?>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>
                    </div>
                <?php endforeach ?>
            </div>
            <div>
                <form action="api/sendmessages" method="post">
                    <div >
                        <input class="widinput" type="text" name="message" required placeholder="Send message your friend :D">
                    </div>

                    <button class="button mycolor" type="submit" >Send message</button>
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
</script>