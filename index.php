<html>

<head>
<title> Drop-down app </title>
</head>

<body>

<div class="center">
<h2> Welcome to drop-down app </h2>
<br />
<form action="query.php" method="post">
<input type="text" name="subject">
<input type="hidden" name="parent_id" value="<?php echo $_GET['parent_id']; ?>">
<input type="submit">
</form>
</div>

<div>
<form action="http://localhost/dropdown/delete.php">
    <input type="submit" value="Empty the database" />
</form>
</div>
<div>
<form action="http://localhost/dropdown/dropdown.php">
    <input type="submit" value="Show the drop-down" />
</form>
</div>
</body>
</html>
