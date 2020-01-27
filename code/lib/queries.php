<?php

//Return record if username and password matches
$get_user=
"SELECT
	authors.id as id,
	authors.username as username,
	authors.password as password,
	authors.role as role
FROM
	authors
WHERE
	username=\'$_POST['username']\'
AND
	password=\'".hashpassword($_POST['password'])."\'
LIMIT 1";

//Author list (for article creation)
$author_list=
"SELECT
	authors.id as id,
	authors.username as author
FROM 
	authors
ORDER BY
	author";

//Insert an article
$article_insert=
"INSERT INTO 
	articles (aid, title, author, stub, content)
VALUES
	(\'$_POST['aid']\', \'$_POST['title']\', $_POST['authorid'], \'".substr($_POST['content'],0,30)."\', \'$_POST['content']\')";


?>
