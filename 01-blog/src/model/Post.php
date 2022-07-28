<?php

namespace Leomarqz\Blog\Model;

// use Leomarqz\Blog\Model\Url;
use League\CommonMark\CommonMarkConverter;

class Post
{
	private string $file;
	public function __construct(string $file) {
		$this->file = $file;
	}

	public function getContent()
	{
		$converter = new CommonMarkConverter();
		 
		$content = null;
		if(file_exists($this->getFileName()))
		{
			$stream = fopen($this->getFileName(), 'r');
			$content = fread($stream, filesize( $this->getFileName() ) );
			// return nl2br($content);
			return $converter->convert($content);
		}else
		{
			$this->getFileNameWithoutDash();
			if(file_exists($this->getFileName()))
			{
				$stream = fopen($this->getFileName(), 'r');
				$content = fread($stream, filesize( $this->getFileName() ) );
				// return nl2br($content);
				return $converter->convert($content);
			}
		}
		throw new Error('File does not exist');
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

	public function getUrl()
	{
		$url = substr($this->file, 0, strpos($this->file, '.md'));
		$title = str_replace(' ', '-', $url);
		return "http://localhost/apps/01-blog/?post={$title}";
	}


	private function getFileNameWithoutDash()
	{
		$fileName = str_replace('-', ' ', $this->file);	
		$this->file = $fileName;
		return $fileName;
	}

	public function getPostName()
	{
		$title = $this->file;
		$title = str_replace('-', ' ', $title );
		$title = str_replace('.md', '', $title );
		return $title;	
	}
	
}

?>