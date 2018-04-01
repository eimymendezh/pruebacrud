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
<form name="display" action="update.php" method="POST" >
<li>ID:</li><li><input type="text" name="id" /></li>
<li><input type="submit" name="submit" href="/add.php"/></li>
</form>
</ul>
</body>
</html>
<?php
$db = pg_connect("host=localhost port=5432 dbname=eimybase user=postgres password=teleco");
$result = pg_query($db, "SELECT * FROM users where id = '$_POST[id]'");
$row = pg_fetch_assoc($result);
if (isset($_POST['submit']))
{
echo "<ul>
<form name='update' action='update.php' method='POST' >
<li>ID:</li><li><input type='text' name='id_updated' value='$row[id]'  /></li>
<li>Name:</li><li><input type='text' name='name_updated' value='$row[username]' /></li>
<li>Password:</li><li><input type='text' name='pass_updated' value='$row[password]' /></li>
<li><input type='submit' name='new' /></li>  </form>
</ul>";
}
if (isset($_POST['new']))
{
$result1 = pg_query($db, "UPDATE users SET id = '$_POST[id_updated]', username = '$_POST[name_updated]', password = '$_POST[pass_updated]' WHERE id = '$_POST[id]'");
if (!$result1)
{
echo "Update failed!!";
} else
{
echo "Update successfull;";
}
}
?>