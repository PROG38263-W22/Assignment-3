<?php

	$dbconn = pg_pconnect("host=$pg_host port=$pg_port dbname=$pg_dbname user=$pg_dbuser password=$pg_dbpassword") or die("Could not connect");
	if ($debug) {
		echo "host=$pg_host, port=$pg_port, dbname=$pg_dbname, user=$pg_dbuser, password=$pg_dbpassword<br>";
		$stat = pg_connection_status($dbconn);
		if ($stat === PGSQL_CONNECTION_OK) {
		        echo 'Connection status ok';
		} else {
			echo 'Connection status bad';
		}    
	}

	function run_query($dbconn, $query) {
		if ($debug) {
			echo "$query<br>";
		}
		$result = pg_query($dbconn, $query);
		if ($result == False and $debug) {
			echo "Query failed<br>";
		}
		return $result;
	}

	//database functions
	function get_article_list($dbconn){
		$query= 
		"SELECT 
			articles.created_on as date,
			articles.aid as aid,
			articles.title as title,
			authors.username as author,
			articles.stub as stub
		FROM
			articles
		INNER JOIN
			authors ON articles.author=authors.id
		ORDER BY
			date";
		return run_query($dbconn, $query);
	}

	function get_article($dbconn, $aid) {
		$query= 
		"SELECT 
			articles.created_on as date,
			articles.aid as aid,
			articles.title as title,
			authors.username as author,
			articles.stub as stub,
			articles.content as content
		FROM 
			articles
		INNER JOIN
			authors ON articles.author=authors.id
		WHERE
			aid='".$aid."'
		LIMIT 1";
		return run_query($dbconn, $query);
	}	
?>
