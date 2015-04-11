<html>
<head>
	<title>Show Result</title>
</head>
<body>
<a href='input.php'>return</a>
<p>
<p>

<?php
	$input = $_GET['word'];
	echo "search word is $input";
	echo "<br>";
	$command = "cat /home/chaoh/Documents/hadoop/hadoop-1.2.1/output/part-r-00000";

	exec($command,$array);
	$sorted_array = array();
	foreach($array as $each ){
		$content = split("\t",$each);
		$content = array_reverse($content);
		array_push($sorted_array, $content);
	}
	arsort($sorted_array);
?>

<table border="1" style='text-align:center;margin:10px 0;' align="left">
<tr>
	<td>Documents</td>
	<td align="left">tf-idf value</td>
</tr>
<?php
$count = 0;
foreach ($sorted_array as $eachdetail){
?>
	<tr>
		<td><?php echo $eachdetail[1]?></td>
		<td align="left"><?php echo $eachdetail[0];?></td>
	</tr>
<?php } ?>
</table>
</body>
</html>


