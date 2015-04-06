<?php
$Table_Name=$_GET['TableName'];
include_once("dbconnect.inc.php");
$mysqli = new mysqli($host,$user,$password,$database);
//$query="describe $Table_Name";
$query="select show_name from mymetadata where tab_name=\"$Table_Name\"";
$result=$mysqli->query($query)or die($mysqli->error.__LINE__);
$cnt=0;
$str="";
if($result->num_rows > 0) 
{
	 while($row = mysqli_fetch_row($result)) 
	 {	 	
		$Show_Attribute[$cnt]=$Table_Name."::".$row[0];
		$cnt++;
		$str.=$row[0].",";
	 } 
}

echo json_encode($Show_Attribute);
?>