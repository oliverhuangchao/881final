<?php 
// this function would be regared as ajax function 
?>
<?php

	//include the basic information
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
	//$stream = ssh2_exec($connection, "ssh $hostNode");
	
	// do the search
	//$stream = ssh2_exec($connection, "\$HADOOP_HOME/search.sh");
	
	// it shoudl wait for some time
	//sleep(10);

	//show result below
	//the final result will be shown in part-r-00000
	//the echo result should be $json_content as a json format
	$stream = ssh2_exec($connection, "cat ~/PBS_result/search_output/part-r-00000");
	stream_set_blocking($stream, true);
	$content = stream_get_contents($stream);
	
	$eachLine = array();
	$eachLine = explode("\n", $content);
	$json_content = array();
	foreach ($eachLine as $ea) {
		$tmp = explode("\t", $ea);
		$json_content[] = $tmp;
	}
	echo json_encode($json_content);

/*
	$stream = ssh2_exec($connection, "cp ~/work/searchCopy.pbs ~/work/search.pbs");
	$stream = ssh2_exec($connection, "perl -pi -e 's/&&&inputstring&&&/$input/g' ~/work/search.pbs");
	$stream = ssh2_exec($connection, "perl -pi -e 's/&&&index&&&/$flag/g' ~/work/search.pbs");
	$stream = ssh2_exec($connection, "perl -pi -e 's/&&&flag&&&/$flag/g' ~/work/search.pbs");
	$stream = ssh2_exec($connection, "qsub ~/work/search.pbs");
*/
?>
<!-- </body>

<form action="getResult.php" method="POST">
	<input name = "word" value = "<?php echo $input; ?>"></input>
	<input type="submit" id="btn1" value="Get Reuslt"></input>
</form>
</body>
 -->

