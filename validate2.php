<!DOCTYPE html>
 <head>  <title>Usarios</title>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <style>
li {list-style: none;}
</style>
</head>
<body>
<h2>Usuarios</h2>
<ul>
<form action="validate2.php" method="POST" >
<li>Name:</li><li><input type="text" name="username" /></li>
<li>Password:</li><li><input type="text" name="password" /></li>
<li><input type="submit" name="submit" /></li>
</form>
</ul>
</body>
</html>
<?php
$db = pg_connect("host=localhost port=5432 dbname=eimybase user=postgres password=teleco");
if (isset($_POST['submit'])){
	$result = pg_query($db, "SELECT * FROM users where username = '$_POST[username]'");
	$row = pg_fetch_assoc($result);

	if($row[password]==$_POST[password]){
	echo "Correcto";		
	}
	else{
	echo "Incorrecto";	
	}
}
?>