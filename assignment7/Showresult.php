<html>
The query is :
<br></br>
<?php
include_once("dbconnect.inc.php");
$mysqli = new mysqli($host,$user,$password,$database);
$query=$_POST['Final_Query'];
echo $query;
$result=$mysqli->query($query)or die($mysqli->error.__LINE__);
?>
<p>The result is : </p>
<table border="1"> 
<tr>
<?php 
while($field=mysqli_fetch_field($result))
{
	echo "<td>".$field->name."</td>";
}
?>	
</tr>
<?php 
if($result->num_rows > 0) 
{
	while($row = mysqli_fetch_row($result)) 
	{	
		?><tr><?php
		for ($i=0;$i<count($row);$i++)
		{
			?><td><?php echo $row[$i]?></td><?php
		}
		?></tr><?php
	}
}
?>
</table>
</html>
