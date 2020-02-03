<?php include("templates/page_header.php");?>
<?php include("lib/auth.php") ?>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$author = $_SESSION['id'];	
		add_article($dbconn, $_POST['title'], $_POST['content'], $author);
		Header ("Location: /");		
	}
?>

<!doctype html>
<html lang="en">
<head>
	<title>New Post</title>
	<?php include("templates/header.php"); ?>
</head>
<body>
	<?php include("templates/nav.php"); ?>
	<?php include("templates/contentstart.php"); ?>

<h2>New Article</h2>

<form action='#' method='POST'>
	<div class="form-group">
	<label for="inputTitle" class="sr-only">Post Title</label>
	<input type="text" id="inputTitle" placeholder="Title" required autofocus class="form-control" name='title'>
	</div>
	<div class="form-group">
	<label for="inputContent" class="sr-only">Post Content</label>
	<textarea name='content' class="form-control" id="inputContent" placeholder="Content" rows='10'></textarea>
	</div>
	<input type="submit" value="Publish" name="submit" class="btn btn-primary">
</form>
<br>

	<?php include("templates/contentstop.php"); ?>
	<?php include("templates/footer.php"); ?>
</body>
</html>
