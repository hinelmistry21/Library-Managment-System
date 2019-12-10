<!DOCTYPE html>
<html>
<head>
	<title>trial</title>
</head>
<body>
<h1>How To Display Records From Database</h1>
<h2>Using Stored Procedure</h2>
<?php
include('includes/config.php');
$result=mysqli_query($conn,"CALL display()");
echo "<table><tr><th>studentid</th></tr>";
while($row=mysqli_fetch_array($result))
{
	echo "<td>".$row['StudentId']."</td>";
	echo"<br/>";
	echo"</table>";
}
?>
</body>
</html>