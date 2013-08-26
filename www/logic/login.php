<div id="headerLogPage">
<?php
	if(empty($login) and empty($password)){
	print <<<HERE
	<form method="post">
		</br>
		<div class="inputLabel">
			<label>Login:</label>
		</div>
		<div class="inputField">
			<input name="login" type="text" size="10px">
		</div>
		<div class="inputLabel">
			<label>Password:</label>
		</div>
		<div class="inputField">
			<input name="password" type="password" size="10"></br>
		</div>		
		<div class="button">
			<input type="submit" name="logIn" value="OK">
			<input type="reset" value="Reset">
		</div>
		<div>				
				<a class="registration" href="?page=4">Registration</a>
		</div>	
	</form>
HERE;
}	else 	{
	echo "<br>Hello, <strong>{$login}</strong> | <a  style='color:#FF1493' href='logic/logout.php'>LogOut</a><br>This is visiable only for registered users</br>
			<a style='color:#90EE90' href='?page=5'>Profile</a>";			/*#90EE90 - LightGreen*/
}
?>
	</div>    