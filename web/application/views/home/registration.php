<div class="title mycolor">
	<h2>Register</h2>
</div>
<div class="mycolor center" style="height: 30em">
	<form action="api/register" method="post">
		<div >
			<input class="input" type="text" name="username" required placeholder="Username">
		</div>
		<div>
			<input class="input" type="text" name="email" required placeholder="Email">
		</div>

		<div>
			<input class="input" type="text" name="password" required placeholder="Password">
		</div>

		<button class="button mycolor"  type="submit" name="reg_user">Submit</button>

		<p>Already a user? <a href="/login"><b>Log in</b></a></p>
		
	</form>
</div>