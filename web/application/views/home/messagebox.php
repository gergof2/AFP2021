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