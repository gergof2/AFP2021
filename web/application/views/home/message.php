<div class="container-fluid">
    <div class="row">
        <div class="col-10">
            <div class="messageContainer">
                <?php foreach ($data as $key => $value): ?>
                    <div >
                        <?php if ($value[1] == $_SESSION['username']) { ?>

                            <div class="text" style="text-align:right; margin-left: 20vw" >
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

                            <div class="text" style="text-align:left; margin-right: 20vw">
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
            <?php ?>
            Én
            te
        </div>
    </div>
</div>




<script>
    messageContainer = document.getElementsByClassName('messageContainer')[0];
    messageContainer.scrollBy(0, messageContainer.scrollHeight);
</script>