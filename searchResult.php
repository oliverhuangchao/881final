<?php

	//include the basic information
	include 'info.php';
	//get old string
	//$input = $_GET['Ori_String'];

	//login authrized, change your password and test if you want
	$connection = ssh2_connect($host, $port);
	ssh2_auth_password($connection, $username, $password);

	//get the host node's name
	
	//$stream = ssh2_exec($connection, "cat \$HADOOP_CONF_DIR/masters");
	//stream_set_blocking( $stream, true );
	//$hostNode = stream_get_contents($stream);
	//echo $hostNode;
	// login to the host node
	//$stream = ssh2_exec($connection, "ssh $hostNode");
	
	//copy the old file
	//$stream = ssh2_exec($connection, "cp \$HADOOP_HOME/copy_search.sh \$HADOOP_HOME/search.sh");
	//$stream = ssh2_exec($connection, "perl -pi -e 's/&&&searchword&&&/$input/g' \$HADOOP_HOME/search.sh");


	// do the search
	//$stream = ssh2_exec($connection, "\$HADOOP_HOME/search.sh");
	///$stream = ssh2_exec($connection, "/home/chaoh/Documents/hadoop/hadoop-1.2.1/search.sh");
	//$stream = ssh2_exec($connection, "/home/chaoh/Documents/hadoop/hadoop-1.2.1/bin/hadoop jar /home/chaoh/Documents/hadoop/hadoop-1.2.1/searcher.jar chaohBIM.BIMSearch /home/chaoh/Documents/hadoop/hadoop-1.2.1/input/word_doc.txt /home/chaoh/Documents/hadoop/hadoop-1.2.1/output year");

	// it shoudl wait for some time
	//sleep(20);

	//return result
	//the echo result should be $json_content as a json format
	

	//palmetto server
	//$stream = ssh2_exec($connection, "cat ~/PBS_result/search_output/part-r-00000");

	//localhost
	//$stream = ssh2_exec($connection, "cat /home/chaoh/Documents/hadoop/hadoop-1.2.1/input/doc_detail.txt");
	

	//stream_set_blocking($stream, 1);
	//$content = stream_get_filters ();

	//print_r($content);

	//ssh2_scp_recv($connection, "/home/chaoh/.bashrc","/home/chaoh/aaa.txt");

	$sftp = ssh2_sftp($connection);

	$remote = fopen("ssh2.sftp://$sftp/home/chaoh/software/hadoop-1.2.1/conf/core-site.xml", 'rb');
	
	$local = fopen('/home/chaoh/aaa.xml', 'w');

	while(!feof($remote)){
	    fwrite($local, fread($remote, 8192));
	}

	fclose($local);

	fclose($remote);


/*	$eachLine = array();
	$eachLine = explode("\n", $content);
	$json_content = array();
	foreach ($eachLine as $ea) {
		$tmp = explode("\t", $ea);
		$json_content[] = $tmp;
	}
	echo json_encode($json_content);
*/
?>


