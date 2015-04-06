<!-- http://people.cs.clemson.edu/~chaoh/862/assignment7/index.php -->
<html>
	<title>Assignement 7</title>
<head>
<script type="text/javascript" src="jquey.js"></script>
<script type="text/javascript" src="myjavascript.js"></script>
</head>
<body>

<?php 
include_once("dbconnect.inc.php");
$mysqli = new mysqli($host,$user,$password,$database);
$Table_Name="Orders";
?>
<table width=60%>
<tr>
<td>
<!--------------------- show tables ------------------->
<p align="left"><select size="20" id="Select_Table" style="width:150px" onchange="test(this.value)">
<?php 
$query="select distinct tab_name from mymetadata;";
$result=$mysqli->query($query)or die($mysqli->error.__LINE__);
$cnt=0;
if($result->num_rows > 0) 
{
	 while($row = mysqli_fetch_row($result)) 
	 {
	 	?><option><?php echo $row[0];?></option><?php 
		$Show_Attribute[$cnt]=$row[0];
		$cnt++;
	 } 
	 $Number_Table=$cnt; 
}
?>
</select>
</td>
<td>
	<!---------------- show attributes ----------------->
<select size="20" id="Select_Attribute" style="width:250px"  style="overflow:hidden">
<?php 
//$query="describe $Table_Name";
$query="use $database";
$result=$mysqli->query($query)or die($mysqli->error.__LINE__);
$cnt=0;
if($result->num_rows > 0) 
{
	 while($row = mysqli_fetch_row($result)) 
	 {
	 	?><option id="<?php echo "Attribute_"."$cnt"?>"><?php echo$row[0];?></option><?php
		$Show_Attribute[$cnt]=$row[0];$cnt++;
	 } 
	 $Number_Attribute=$cnt;
}
?>
</select>
</td>
<td>
<table>
<tr>
<td> 
<!--  talbe #1 -->
<select size="7" id="Table_1" style="width:300px">
<!--<option>Categories::CategoryID</option>
<option>Orders::OrderDate</option>-->
</select>
</td>	
<td>
<input type="button" id="Table1_Insert" value="InsertToTable" onclick="InsertIntoTable('Table_1')"></input>
<input type="button" id="Table1_Delete" value="Delete" onclick="DeleteItem('Table_1')"></input>
<p></p>
<input type="button" id="Table1_Up" value="Up" onclick="MoveUp('Table_1')"></input>
<input type="button" id="Table1_Down" value="Down" onclick="MoveDown('Table_1')"></input>
</td>
</tr>
<tr>
<td>
<!--  talbe #2 -->
<select size="7" id="Table_2" style="width:300px">
<!--<option>Categories::CategoryID(asc)</option>-->
</select>
</td>	
<td>
<input type="button" id="Table2_Insert" value="Insert" onclick="OrderInsert('Table_2')"></input>
<input type="button" id="Table2_Delete" value="Delete" onclick="DeleteItem('Table_2')"></input>
<p></p>
<input type="button" id="Table2_Up" value="Up" onclick="MoveUp('Table_2')"></input>
<input type="button" id="Table2_Down" value="Down" onclick="MoveDown('Table_2')"></input>
<input type="button" id="Table2_Order" value="ChangeOrder" onclick="ChangeOrder('Table_2')"></input>
<input type="hidden" id="IsChanged" value="true"></input>
</td>
</tr>
<tr>
<td>
<!--  talbe #3 -->
<select size="7" id="Table_3" style="width:300px">
<!--<option>Shippers::ShipperID</option>-->
</select>
</td>	
<td>
<input type="button" id="Table3_Insert" value="Insert" onclick="InsertIntoTable('Table_3')"></input>
<input type="button" id="Table3_Delete" value="Delete" onclick="DeleteItem('Table_3')"></input>
<p></p>
<input type="button" id="Table3_Edit" value="Change" onclick="ChangeConstraint('Table_3')"></input>
</td>	
</tr>
</table>
</td>	
</tr>

<p id="text_test">The query could be seen here</p>

</table>
<input type="button" value="getsql" onclick="GetSQL()"></input>
<form action="Showresult.php" method="post">
<input type="hidden" id="result_query" value="ahah" name="Final_Query"></input>
<input type="submit" value="ShowResult"></input>
</form>

</body>
</html>
