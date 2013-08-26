					<!-- item Registration-->
		<div id="main">
			<h2>Registration:</h2>
			</br>
			
					<!-- registration form with fields for registration -->
		<form method="POST" enctype="multipart/form-data">			
			<div class="markedField">
				<label>*</label></div>
			<div class="inputLabel">
				<label>Login:</label></div>
			<div class="inputFieldRegistrationCheck">	
						<!-- start check method in check javascript-->
				<input type="text" name="login" id="login" size="10" onchange="check();"></div>
			
			<div class="checklog_status" id="checklog_status"> Check result</div>							

			<div class="markedField">
				<label>*</label></div>
			<div class="inputLabel">
				<label>Password:</label></div>
			<div class="inputFieldRegistration">
				<input type="password" size="10" name="password"></div>
		  
			<div class="markedField">
				<label>*</label></div>
			<div class="inputLabel">
				<label>Confirm password:</label></div>
			<div class="inputFieldRegistration">
				<input type="password" size="10" name="password2"></div>
			
			<div class="inputLabelNotMarked">
				<label>First Name:</label></div>
			<div class="inputFieldRegistration">
				<input type="text" size="10" name="firstName"></div>
			
			<div class="inputLabelNotMarked">
				<label>Last Name:</label></div>
			<div class="inputFieldRegistration">
				<input type="text" size="10" name="lastName"></div>
				
			<div class="inputLabelNotMarked">
				<label>Address:</label></div>
			<div class="inputFieldRegistration">
				<input type="text" size="15" name="street">
				<label>буд</label>
				<input type="text" onkeyup="this.value = this.value.replace (/\D+/, '')" size="4" name="building"> 		<!-- only digital field -->
				<label>кв</label>
				<input type="text" onkeyup="this.value = this.value.replace (/\D+/, '')" size="4" name="flat"> 			<!-- only digital field -->
			</div>
			
			<div class="markedField">
					<label>*</label></div>
			<div class="inputLabel">				
				<label>Phone number:</label></div>
			<div class="inputFieldRegistration">
				<input type="text" size="10" name="phone"></div>
			
			<div class="markedField">
					<label>*</label></div>
			<div class="inputLabel">
				<label>E-mail:</label></div>			
			<div class="inputFieldRegistration">
				<input type="text" name="email" size="10"></div>
			
			
			<div class="inputLabelNotMarked">
			<label>Image:</label></div>
			<input type="file" name="filename">
			</br><font color="red"><label>File for load need to have only jpg extension and size not more than 50 Kb!!!</label></font>
			
			<div class="note">
			<div class="markedField">*</div>
			<label> field have to be filled in</label></div>
			
			<div class="submitButtonReg">
				<input type="submit" value="Sing up..." name="registration"></div>
			</br>
		</form>
			
			
			
			
			
			<div class="error">

<?php
    include_once("logic/bd.php");
	
				
						//check condition for registration
    if (isset($_POST['registration'])){		
				
		if(empty($_POST['login']))  {
			echo '<br><font color="red"><img border="0" src="media/images/error.gif"> Enter login! </font>';			
		} 
		elseif (!preg_match("/[A-z0-9]{3,10}$/", $_POST['login'])) {
			echo '<br><font color="red"><img border="0" src="media/images/error.gif">	Login need to have at least 3 chars (number, letters and _) and 
			have to be not longer then 10 chars!</font>';
		}
		elseif(empty($_POST['password'])) {
			echo '<br><font color="red"><img border="0" src="media/images/error.gif"> Enter password!</font>';
		}
		elseif (!preg_match("/\A(\w){6,10}\Z/", $_POST['password'])) {
			echo '<br><font color="red"><img border="0" src="media/images/error.gif"> Password need to have at least 6 chars and 
			have to be not longer then 10 chars! </font>';
		}
		elseif(empty($_POST['password2'])) {
			echo '<br><font color="red"><img border="0" src="media/images/error.gif"> Enter password confirmation!</font>';
		}
		elseif($_POST['password'] != $_POST['password2']) {
			echo '<br><font color="red"><img border="0" src="media/images/error.gif"> Entered passwords does not the same!</font>';
		}
		elseif(!is_numeric($_POST['phone']))	{
			echo '<br><font color="red"><img border="0" src="media/images/error.gif"> Phone could  take only number!</font>';
		}
		elseif(empty($_POST['email'])) {
			echo '<br><font color="red"><img border="0" src="media/images/error.gif">Enter e-mail!</font>';
		}
		elseif (!preg_match("/^[a-zA-Z0-9_\.\-]+@([a-zA-Z0-9\-]+\.)+[a-zA-Z]{2,6}$/", $_POST['email'])) {
			echo '<br><font color="red"><img border="0" src="media/images/error.gif"> Wrong e-mail form! Example: name@gmail.com! </font>';
		}
		
		else	{
			$allowedExts = array ('jpg');
			$extension = end(explode('.', $_FILES['filename']['name']));
			
			//make folder if not exists jet
			if(!empty($_FILES['filename']['name']))	{		
			
				if (!(is_dir("media/uploadimg")))	{
							
					mkdir("media/uploadimg", 0700);
				}	
		}
			
			
		
			$login = $_POST['login'];
			$password = $_POST['password'];
			$mdPassword = md5($password);
			$password2 = $_POST['password2'];
			$firstName = $_POST['firstName'];
			$lastName = $_POST['lastName'];
			$street = $_POST['street'];
			$building = $_POST['building'];
			$flat = $_POST['flat'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];	
			
			
			
			if (in_array($extension, $allowedExts) & ($_FILES['filename']['size'] < 51200))	{
				$image = $_FILES['filename']['name'];
				if (file_exists("media/uploadimg/" . $_FILES["filename"]["name"])) 	{ 
                }	else	{ 
					move_uploaded_file($_FILES["filename"]["tmp_name"], 
					"media/uploadimg/" . $_FILES["filename"]["name"]);           
					}  
				}	else	{		
					$image = NULL;		
					}		
		
		
		
			$query = ("SELECT id FROM users WHERE login='$login'");
			$sql = mysql_query($query) or die(mysql_error());
			
			if (mysql_num_rows($sql) > 0) {
				echo '<font color="red"><img border="0" src="media/images/error.gif">	User with this login already exist!</font>';
			}
			else {
				$query2 = ("SELECT id FROM users WHERE email='$email'");
				$sql = mysql_query($query2) or die(mysql_error());
				if (mysql_num_rows($sql) > 0){
					echo '<font color="red"><img border="0" src="media/images/error.gif">	User with this e-mail already exist!</font>';
				}
				else{
					$query = "INSERT INTO users (login, password, firstName, lastName, street, building, flat, phone, email, image )
							  VALUES ('$login', '$mdPassword', '$firstName', '$lastName', '$street', '$building', '$flat', '$phone', '$email', '$image')";
					$result = mysql_query($query) or die(mysql_error());
					echo '<font color="green"><img border="0" src="media/images/ok.gif" align="middle" alt="Congratulation!"> Congratulation!</font><br>';
					exit("<meta http-equiv='Refresh' content='0; URL=../index.php?page=0'>");								
					
				}
			}
		}
    }
?>
			</div>
		</div>
<script src="media/scripts/check.js"></script>


	