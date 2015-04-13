<?php
	//include the basic information
	include 'info.php';
	
	//get old string
	$input = "year";
	//$input = $_GET['Ori_String'];

	//login authrized, change your password and test if you want
	$connection = ssh2_connect($host, $port);
	ssh2_auth_password($connection, $username, $password);

	//copy the old file
	//$stream = ssh2_exec($connection, "cp \$HADOOP_HOME/copy_search.sh \$HADOOP_HOME/search.sh");
	//$stream = ssh2_exec($connection, "perl -pi -e 's/&&&searchword&&&/$input/g' \$HADOOP_HOME/search.sh");


	$stream = ssh2_exec($connection, "\$HADOOP_HOME/search.sh");

	sleep(5);

	//return result
	$sftp = ssh2_sftp($connection);

	//$remote = fopen("ssh2.sftp://$sftp/home/chaoh/software/hadoop-1.2.1/final_output/doc_detail.xml", 'rb');
	
	$remote = fopen("ssh2.sftp://$sftp/home/chaoh/Documents/hadoop/hadoop-1.2.1/input/doc_detail.xml", 'rb');
	
	
	$local = fopen('/home/chaoh/aaa.xml', 'w');


	while(!feof($remote)){
	    fwrite($local, fread($remote, 8192));
	}

	fclose($local);

	fclose($remote);
?>