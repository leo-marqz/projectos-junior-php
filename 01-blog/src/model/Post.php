<?php

namespace Leomarqz\Blog\Model;

// use Leomarqz\Blog\Model\Url;

class Post
{
	private string $file;
	public function __construct(string $file) {
		$this->file = $file;
	}

	public function getContent()
	{
		$stream = fopen($this->getFileName(), 'r');
		$content = fread($stream, filesize( $this->getFileName() ) );

		echo $content;
	}

	public function getFileName()
	{
		$dir = Url::getRootPath();
		$fileName = "{$dir}/entries/{$this->file}";
		return $fileName;
	}

	public static function getPosts()
	{
		$posts = array();
		$files = scandir(Url::getRootPath() . '/entries');
		foreach($files as $file)
		{
			if(strpos($file, '.md') > 0)
			{
				$post = new Post($file);
				array_push($posts, $post);
			}
		}
		return $posts;
	}

	
}

?>