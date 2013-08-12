<?php
	include_once("logic/bd.php");
	
	$row = mysql_fetch_array(mysql_query("SELECT * FROM users2 WHERE login='$login'"));
?>
					<!-- profile item -->
		<div id="main">
			<h2>Profile:</h2>
			</br>
		<form method="POST" enctype="multipart/form-data">	
			<div class="inputLabel">
				<label>Login:</label></div>
			<div class="inputFieldProfile">
				<input name="login" type="text" size="15px" value=<?php echo $row['login'] ?> disabled></div>
			
			<div class="inputLabel">
				<?php					
					echo "E-mail: ";
				?></div>
			<div class="inputFieldProfile">				
				<input name="email" type="text" size="15px" value=<?php echo $row['email'] ?>></div>
			
			<div class="inputLabel">
				<?php
					echo "FirstName: ";
				?></div>
			<div class="inputFieldProfile">				
				<input type="text" size="15" name="firstName" value=<?php echo $row['firstName'] ?>></div>
			
			<div class="inputLabel">
				<?php				
					echo "LastName: ";
				?></div>
			<div class="inputFieldProfile">
					<input type="text" size="15" name="lastName" value=<?php echo $row['lastName'] ?>></div>
			
			<div class="inputLabel">
				<?php				
					echo "Адреса: ";
				?></div>
			<div class="inputFieldProfile">
					<input type="text" size="15" name="street" value=<?php echo $row['street'] ?>>
					<label>буд</label>
					<input type="text" size="4" name="building" value=<?php echo $row['building'] ?>>
					<label>кв</label>
					<input type="text" size="4" name="flat" value=<?php echo $row['flat'] ?>>
					</div>
					
			<div class="inputLabel">
				<?php
					echo "Phone number: ";
				?></div>
			<div class="inputFieldProfile">
				<input type="text" size="15" name="phone" value=<?php echo $row['phone'] ?>></div> 
				
			<div class="inputLabel">				
				<label>Image:</label>	</br>
			<?php
					//check if picture for user exists
				if (file_exists("media/uploadimg/" .$row['image'])) 	{ 
                echo '<IMG src="media/uploadimg/'.$row['image'].'">';
				}	else	{
					echo '<br><font color="red"> There is no images for this user</font>';
					}				
				?>
			</div>
			
			<div class="inputFieldProfile">
				<input type="text" size="15" name="image" value=<?php echo $row['image'] ?> disabled>				
				<input type="file" name="filename" accept="image/jpeg"></div>
				
			<div class="submitButtonProfile">
				<input type="submit" name="saveChanges" value="save ...">				
				<a href="index.php?page=5">Reload</a></div>
						
			
				
				
<?php
				//condition for saving changes
	if(isset($_POST['saveChanges']))	{	
	
		$save=0;
		
		if($row['email'] != $_POST['email'])	{
			if (!preg_match("/^[a-zA-Z0-9_\.\-]+@([a-zA-Z0-9\-]+\.)+[a-zA-Z]{2,6}$/", $_POST['email'])) {
			
				echo '<br><font color="red"><img border="0" src="media/images/error.gif"> Wrong e-mail form! Example: name@gmail.com! </font>';
			}	else	{
			
				$email1=$_POST['email'];
				mysql_query("UPDATE users2 SET email='$email1' WHERE login='$login'");
				$save+=1;
			}			
		}
		
		
		if($row['firstName'] != $_POST['firstName'])	{
		
			$firstName = $_POST['firstName'];
			mysql_query("UPDATE users2 SET firstName='$firstName' WHERE login='$login'");
			$save+=1;
		}
			
			
		if($row['lastName'] != $_POST['lastName'])	{
		
			$lastName = $_POST['lastName'];
			mysql_query("UPDATE users2 SET lastName='$lastName' WHERE login='$login'");
			$save+=1;
		}
		
		
		if($row['street'] !=$_POST['street'])	{
		
			$street = $_POST['street'];
			mysql_query("UPDATE users2 SET street='$street' WHERE login='$login'");
			$save+=1;
		}
		
		
		if($row['building'] !=$_POST['building'])	{
		
			$building = $_POST['building'];
			mysql_query("UPDATE users2 SET building='$building' WHERE login='$login'");
			$save+=1;
		}
		
		
		if($row['flat'] !=$_POST['flat'])	{
		
			$flat = $_POST['flat'];
			mysql_query("UPDATE users2 SET flat='$flat' WHERE login='$login'");
			$save+=1;
		}
		
		
		if($row['phone'] != $_POST['phone'])	{
		
			$phone=$_POST['phone'];
			if(!is_numeric($_POST['phone']))	{
			
				echo '<br><font color="red"><img border="0" src="media/images/error.gif"> Phone have to be only with numbers!</font>';				
			}	else	{
			
				mysql_query("UPDATE users2 SET phone='$phone' WHERE login='$login'");
				$save+=1;
			}
		}	

		
		if($_FILES['filename']['name'] != "")	{
		
			$allowedExts = array ('jpg');
			$extension = end(explode('.', $_FILES['filename']['name']));
			if (in_array($extension, $allowedExts) & ($_FILES['filename']['size'] < 51200))	{
			
				$image = $_FILES['filename']['name'];
				if (file_exists("uploadimg/" . $_FILES["filename"]["name"])) 	{ 
				
                }	else	{ 
				
            move_uploaded_file($_FILES["filename"]["tmp_name"], "media/uploadimg/" . $_FILES["filename"]["name"]);           
					}  
			mysql_query("UPDATE users2 SET image='$image' WHERE login='$login'");
			}	else	{
			
				echo '<br><font color="red"><img border="0" src="media/images/error.gif">image for loading need to be only with jpg extension and it size not more than 50 Kb! </font>';	
				$save+=1;
				}
		}
		
		if ($save==1)	{
			echo '<font color="green"><img border="0" src="media/images/ok.gif" align="middle" alt="Congratulation!"> All changes saved!</font><br>';
		}
	}
?>
</div>
	