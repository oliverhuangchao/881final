<html>
<head>
	<title>Show Result</title>
</head>
<body>
<?php
	$input = $_POST['word'];
	echo $input;
	$connection = ssh2_connect('user.palmetto.clemson.edu', 22);
	ssh2_auth_password($connection, 'chaoh', '*Buzhidao1122');
	$stream = ssh2_exec($connection, "cat ~/PBS_result/search_output/part-r-00000");
	stream_set_blocking( $stream, true );
	$content = stream_get_contents($stream);
	$splitContent = array();
	$splitContent = split("\n",$content);

	//print_r($splitContent);

?>

<table border="1" style='text-align:center;margin:10px 0;' align="left">
<tr>
	<td>Word</td>
	<td align="left">Index</td>
</tr>
<?php
$count = 0;
foreach ($splitContent as $each){
	$eachdetail = split("\t",$each);
?>
	<tr>
		<td><?php 
		$a = explode("the",$eachdetail[0]);
		echo $a[0];?><font color = "red"><?php echo $input;?></font><?php if(sizeof($a) != 1) echo $a[1];
		//echo $eachdetail[0];
		?></td>
		<td align="left"><?php echo $eachdetail[1];?></td>
	</tr>
<?php
}
?>
</table>
</body>
</html>


