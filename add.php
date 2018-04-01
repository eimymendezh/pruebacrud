<!DOCTYPE html>
<head>
<title>Nuevo usuario</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
li {listt-style: none;}
</style>
</head>
<body>
<h2>Enter information</h2>
<ul>
<form name="add" action="add.php" method="POST" >
<li>ID:</li><li><input type="text" name="id" /></li>
<li>Name:</li><li><input type="text" name="username" /></li>
<li>Password:</li><li><input type="text" name="password" /></li>
<li><input type="submit" /></li>
</form>
</ul>
</body>
</html>
<?php
$db = pg_connect("host=localhost port=5432 dbname=eimybase user=postgres password=teleco");
$query = "INSERT INTO users (id, username, password) VALUES ('".$_POST["id"]."', '".$_POST["username"]."', '".$_POST["password"]."')";
$result = pg_query($query);
?>