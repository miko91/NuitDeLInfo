<?php
namespace Library;
 
class HTTPRequest
{
	public function cookieData($key)
	{
		return isset($_COOKIE[$key]) ? $_COOKIE[$key] : null;
	}
   
	public function cookieExists($key)
	{
		return isset($_COOKIE[$key]);
	}
	
	public function sessionData($key)
	{
		return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
	}
	
	public function sessionExists($key)
	{
		return isset($_SESSION[$key]);
	}
   
	public function getData($key)
	{
		return isset($_GET[$key]) ? $_GET[$key] : null;
	}
   
	public function getExists($key)
	{
		return isset($_GET[$key]);
	}
   
	public function method()
	{
		return $_SERVER['REQUEST_METHOD'];
	}
   
	public function postData($key)
	{
		return isset($_POST[$key]) ? $_POST[$key] : null;
	}
   
	public function postExists($key)
	{
		return isset($_POST[$key]);
	}
	
	public function fileData($key)
	{
		return isset($_FILES[$key]) ? $_FILES[$key] : null;
	}
   
	public function fileExists($key)
	{
		return isset($_FILES[$key]);
	}
	
	public function hasPrevious()
	{
		return isset($_SERVER['HTTP_REFERER']);
	}
	
	public function previousURI()
	{
		return $_SERVER['HTTP_REFERER'];
	}
	
	public function requestURI()
	{
		return $_SERVER['REQUEST_URI'];
	}
	
	public function requestIp()
	{
		return $_SERVER["REMOTE_ADDR"];
	}
}