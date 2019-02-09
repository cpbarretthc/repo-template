<?php
	date_default_timezone_set('America/New_York');
	include 'dba.inc.php';
	include 'comments.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<title>Title of the document</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<img src="DSC_0330.jpg" alt="Tea" width="500" height="333">

<?php
echo "<form method='POST' action='".setComment($conn)."'>
	<input type='hidden' name='uid' value='Anonymous'>
	<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
	<textarea name='message'></textarea> <br>
	<button type='submit' name='commentSubmit'>Comment</button>
</form>";

getComments($conn);
?>

</body>
</html>