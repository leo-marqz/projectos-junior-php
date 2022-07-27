<?php

namespace Leomarqz\Blog\Model;

class Url
{
	/*
	*@return string - path
	*/
	public static function getRootPath():string
	{
		return substr(__DIR__, 0, strpos(__DIR__, 'src') + 3);
	}
}

?>