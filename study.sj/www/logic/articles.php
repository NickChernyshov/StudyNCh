<div id="article">

<?php

include_once("logic/bd.php");
			
			//create "articles" table
	$sqlArticles = "CREATE TABLE  IF NOT EXISTS `articles` ( 
				 `id` INT NOT NULL AUTO_INCREMENT ,
				 `autor` VARCHAR( 20 ) NOT NULL ,
				 `title` VARCHAR( 35 ) NOT NULL , 
				 `article` VARCHAR( 250 ) 	NOT NULL, 
					PRIMARY KEY (  `id` ) )"; 
	mysql_query($sqlArticles);
	
					//show view articles form
	if (empty($login) != 1)	{
		print <<<HERE
		<form method="POST" enctype="multipart/form-data">			
				
				<div class="inputLabel">
					<label>Author:</label></div>
				<div class="inputFieldRegistrationCheck">				
					<input type="text" name="author" size="10" value=$login disabled></div>
				<div class="inputLabel">
				
					<label>Title:</label></div>
				<div class="inputFieldRegistrationCheck">
					<input type="text" name="title" size="15"> -Title need to be without spaces</div>
				
				<div class="inputLabel">
				
					<label>Article:</label></div>
				<div class="inputFieldRegistrationCheck">
					<textarea name="article" rows="5" cols="20"></textarea></div>
					
				<div>
					<input type="submit" name="saveArticle" value="Add article..."></div>
					
					</form>
HERE;
						//save article to the data base
		if (isset($_POST['saveArticle']))	{
			$title = $_POST['title'];
			$article = $_POST['article'];
			
			if (preg_match("/\\s/", $_POST['title']))	{
				echo 'Title need to be without spaces';
			}	else	{
	
				$title = $_POST['title'];
				$article = $_POST['article'];
				if(!(empty($title)) && !(empty($article)))	{
					$query = "INSERT INTO articles (autor, title, article)	VALUES ('$login', '$title', '$article')";
					$result = mysql_query($query) or die(mysql_error());
					echo '<font color="green"><img border="0" src="media/images/ok.gif" align="middle"> Congratulation  article saved!!</font><br>';}					
				}
		}
	}	else	{
			echo '<font color="red"> Only registered users could add the articles!!!</font></br>';
		}	
			echo '<hr align="center" width="500" size="2" color="#ff0000" />';

			
	
	$start = 0;
	$cntPerPage = 4;
	if(isset($_GET['currPage'])) {
	$start = $_GET['currPage']*$cntPerPage; 
	}
	$query2 = ("SELECT * FROM articles limit $start, $cntPerPage ");
	
	$query22 = ("SELECT * FROM articles");
	$result22 = mysql_query($query22) or die (mysql_error());
	
	$numArt = mysql_num_rows($result22);
	$numPage = (($numArt/$cntPerPage)-1);
	//var_dump($numPage); //information about variable
	
	$result2 = mysql_query($query2) or die(mysql_error());
	$whatArt = '';
	
	while($row=mysql_fetch_array($result2))	{
	print '<form method="POST" enctype="multipart/form-data">
	<p>Author article: <font size="5" color="#DAA520">'.$row['autor'].'</font> Article title: <font size="5" color="#9400D3">'.$row['title'].'</font></p>
	<p><input type="submit" name="choose'.$row['title'].$row['autor'].'" value="Read article" ></form></p>
			
			
			<hr align="center" width="500" size="2" color=" #9ACD32" />'; 

			if (isset($_POST['choose'.$row['title'].$row['autor']])) {
			$whatArt = $row['autor'].$row['title'];
			$_SESSION['article']['author'] = $row['autor'];
			$_SESSION['article']['title'] = $row['title'];
			$_SESSION['article']['articleText'] = $row['article'];
			header ('Location: ?page=7');  // redirection to need place
			exit();
			}
	}  
							//make referents for Back-Next page
		if ($_GET['currPage'] < $numPage) 	
		{	
			$nextPage = ($_GET['currPage'])+1;
			
		} 	else	{
			$nextPage = $_GET['currPage'];
			
			}
			
		if	($_GET['currPage']>0)	
		{
			$backPage = ($_GET['currPage'])-1; 
		}	 else 	{ 
			$backPage = $_GET['currPage']; 
			}
?>

<div class="numPage" >

<?php		

	$queryArticles = ("SELECT * FROM articles");
	$resultArticles = mysql_query($queryArticles) or die (mysql_error());
						
						//show number page control
	if (mysql_num_rows($resultArticles) > 0) { 
		echo '<a href="?page=6&currPage='.$backPage.'">-Back-</a>';
		for ($i=0; $i<=ceil($numPage); $i++)	{
			echo'<a href="?page=6&currPage='.$i.'"> '.($i+1).' </a>';}
		echo '<a href="?page=6&currPage='.$nextPage.'">-Next-</a>';
	}
?>

</div>

</div>
