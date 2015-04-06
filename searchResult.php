<html>
<head>
<title>Result Page</title>
</head>
<body>
<?php
	include 'info.php';
	//get old string
	$input = $_GET['Ori_String'];
	//login authrized, change your password and test if you want
	$connection = ssh2_connect($host, $port);
	ssh2_auth_password($connection, $username, $password);

	//get the host node's name
	$stream = ssh2_exec($connection, "cat \$HADOOP_CONF_DIR/masters");
	stream_set_blocking( $stream, true );
	$hostNode = stream_get_contents($stream);
	
	// login to the host node
	$stream = ssh2_exec($connection, "ssh $hostNode");

	

	echo $content;	
/*
	$stream = ssh2_exec($connection, "cp ~/work/searchCopy.pbs ~/work/search.pbs");
	$stream = ssh2_exec($connection, "perl -pi -e 's/&&&inputstring&&&/$input/g' ~/work/search.pbs");
	$stream = ssh2_exec($connection, "perl -pi -e 's/&&&index&&&/$flag/g' ~/work/search.pbs");
	$stream = ssh2_exec($connection, "perl -pi -e 's/&&&flag&&&/$flag/g' ~/work/search.pbs");
	$stream = ssh2_exec($connection, "qsub ~/work/search.pbs");
*/
//perl -pi -e 's/&&&inputstring&&&/aaap/g' search.pbs
?>
</body>

<form action="getResult.php" method="POST">
	<input name = "word" value = "<?php echo $input; ?>"></input>
	<input type="submit" id="btn1" value="Get Reuslt"></input>
</form>
</body>


