<div class="title mycolor">
	<h2>Login</h2>
</div>
<div class="mycolor center" style="height: 30em">
	<form action="api/login" method="post">
		<div >
			<input class="input" type="text" name="username" required placeholder="Username">
		</div>
		<div>
			<input class="input" type="text" name="password" required placeholder="Password">
		</div>

		<button class="button mycolor" type="submit" name="login_user">Log In</button>

		<p>Not a user? <a href="/registration"><b>Register Here</b></a></p>
		<?php
		if (!empty($_SESSION['message'])) {
			echo $_SESSION['message'];
		} ?>
	</form>
</div>