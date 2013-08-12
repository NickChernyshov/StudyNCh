<?php
include_once("logic/bd.php");

	$author = $_SESSION['article']['author'];
	$title = $_SESSION['article']['title'];
	$article = $_SESSION['article']['articleText'];
	$logUser = $_SESSION['loguser']['login'];
	
				//show one article form with comments
	print '<form method=post><font size="5" color="#DAA520">'.$title.'</font></br>
	<textarea cols="40" rows="10" disabled>'.$article.'</textarea>article writen by: <font size="4" color="#9400D3">'.$author.'</font></br>
	<label>U may leave your comment here:</label>
	<textarea name="comment"></textarea>
	<input type="submit" name="saveComment" value="Add comment"></form>
	<a class="back" href="?page=6" class="menu" title="Back to the list of articles">Back</a>
	<hr color="#8B0000">';
	
	//create "comments" table
	$sqlArticles = "CREATE TABLE  IF NOT EXISTS `coments` ( 
				 `id` INT NOT NULL AUTO_INCREMENT ,
				 `autor` VARCHAR( 20 ) NOT NULL ,
				 `title` VARCHAR( 35 ) NOT NULL , 
				 `logUser` VARCHAR( 20 ) 	NOT NULL,
				 `comment` VARCHAR ( 250 ) 	NOT NULL,
					PRIMARY KEY (  `id` ) )"; 
	mysql_query($sqlArticles);
	
	
	$queryThisComments = ("SELECT * FROM coments WHERE autor='$author' AND title='$title'");
	$resultThisComments = mysql_query($queryThisComments) or die(mysql_error());
	
	while($rowThisComments=mysql_fetch_array($resultThisComments))	{
		
	print '<p><font size="3" color="#DAA520">'.$rowThisComments['logUser']
			.'</font> : <font size="3" color="#9400D3">'.$rowThisComments['comment'].'</font></p>'; 
	}	
	
			//check and save comment
	if (isset($_POST['saveComment']))	{
				
		if(preg_match("/\\n/", $_POST['comment']) || empty($_POST['comment']))	{
		
			echo "<script language=javascript>alert('comment field need to be not empty or be typed in one line');</script>";	
		}		else	{	
					if  (empty($logUser))	{

							$logUser = "unregisred";	
					}
						
					$comment = $_POST['comment'];
					$query = "INSERT INTO coments (autor, title, logUser, comment)	VALUES ('$author', '$title', '$logUser', '$comment')";
								$result = mysql_query($query) or die(mysql_error());						
						header ('Location: ?page=7');  // refresh page
						exit();
				}
	}
