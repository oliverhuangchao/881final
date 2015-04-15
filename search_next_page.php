<?php
/*
	prepare for next search page
	in this time, the page still live in the first page. But do some preparation for next page

*/
	include 'info.php';
	
	//login authrized, change your password and test if you want
	$connection = ssh2_connect($host, $port);
	ssh2_auth_password($connection, $username, $password);

	//copy the old file
	$stream = ssh2_exec($connection, "cp \$HADOOP_HOME/copy_search_next.sh \$HADOOP_HOME/searchNextPage.sh");
	
	//chage the content detail
	$stream = ssh2_exec($connection, "perl -pi -e 's/&&&search_page&&&/$page/g' \$HADOOP_HOME/searchNextPage.sh");
	
	//run hadoop
	$stream = ssh2_exec($connection, "\$HADOOP_HOME/searchNextPage.sh");

	sleep(1);//it seems necessary to do this

	//return result
	$sftp = ssh2_sftp($connection);
	$remote = fopen("ssh2.sftp://$sftp/home/chaoh/Documents/hadoop/hadoop-1.2.1/input/prepare_next.xml", 'rb');

	$local = fopen('/home/chaoh/Documents/881/website/data/first.xml', 'w');

	while(!feof($remote)){
	    fwrite($local, fread($remote, 8192));
	}

	fclose($local);
	fclose($remote);

	include "xmlParse.php";
?>