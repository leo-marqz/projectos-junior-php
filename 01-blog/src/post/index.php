<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h1>Mi primer post</h1>
	<?php
		use Leomarqz\Blog\Model\Post;

		$posts = Post::getPosts();

		foreach($posts as $post)
		{
			echo "<div>{$post->getFileName()}</div>";
		}

	?>
</body>
</html>