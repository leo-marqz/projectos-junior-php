<?php

use Leomarqz\Blog\Model\Post;

$post = new Post($postName . '.md');

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="src/resources/style.css">
</head>
<body>

	<?php

		require 'src/resources/navbar.php';	

		echo "<article class='container-one-post'>";	
		echo $post->getContent();
		echo "</article>";
		

	?> 
</body>
</html>