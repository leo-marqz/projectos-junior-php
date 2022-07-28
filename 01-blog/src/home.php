<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Blog - Home</title>
	<link rel="stylesheet" type="text/css" href="src/resources/style.css">
</head>
<body>

	<?php

		require 'resources/navbar.php';

		use Leomarqz\Blog\Model\Post;
		$posts = Post::getPosts();

		echo "<section class='container-posts'>";
		echo "<h2>My Posts</h2>";

		foreach($posts as $post)
		{
			echo "<a class='post' href='{$post->getUrl()}'> {$post->getPostName()} </a>";
		}

		echo "</section>";

	?>
	
</body>
</html>