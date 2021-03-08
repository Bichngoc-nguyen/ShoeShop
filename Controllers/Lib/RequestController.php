<?php
class RequestController
{	
	public function getPost()
	{
		return $_POST;
	}

	public function getGet()
	{
		return $_GET;
	}

	public function getInput()
	{
		return array_merge($_GET, $_POST);
	}
}
