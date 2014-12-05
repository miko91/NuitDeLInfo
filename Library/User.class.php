<?php
namespace Library;
 
session_start();
 
class User extends ApplicationComponent
{
	public function __construct(Application $app)
	{
		parent::__construct($app);
		if(!$this->isAuthenticated() && $this->hasCookie() != false)
		{
			$cookie = unserialize(base64_decode($this->hasCookie()));
			//echo "<pre>Cookie OK <br/>";print_r($cookie);echo "</pre>------<br/>";
			$auth = explode('@@--@@', $cookie['auth']);
			$manager = new Managers('PDO', PDOFactory::getMysqlConnexion($this->app->config()));
			$user = $manager->getManagerOf('User')->getUnique($auth[0]);
			if($user instanceof \Library\Entities\User)
			{
				//echo "<pre>User OK <br/>";print_r($user);echo "</pre>------<br/>";
				$key = sha1($user->id() . $user->username() . $user->id() . $_SERVER['REMOTE_ADDR']);
				if($key == $auth[1])
				{
					//echo "Clé OK<br/>";
					$this->setAuthenticated(true);
					$this->setAttribute('username', $cookie['username']);
					$this->setAttribute('displayname', $cookie['displayname']);
					$this->setAttribute('groups', $cookie['groups']);
					$this->setAttribute('admin', $cookie['admin']);
				}
			}
			//echo "<pre>Session <br/>";print_r($_SESSION);echo "</pre>------<br/>";
			//die();
		}
	}
	
	public function getAttribute($attr)
	{
		return isset($_SESSION[$attr]) ? $_SESSION[$attr] : null;
	}
   
	public function getFlash()
	{
		$flash = $_SESSION['flash'];
		unset($_SESSION['flash']);
     
		return $flash;
	}
	
	public function getQuery()
	{
		$query = $_SESSION['query'];
		unset($_SESSION['query']);
     
		return $query;
	}
	
	public function hasQuery()
	{
		return isset($_SESSION['query']);
	}
   
	public function hasFlash()
	{
		return isset($_SESSION['flash']);
	}
   
	public function isAuthenticated()
	{
		return isset($_SESSION['auth']) && $_SESSION['auth'] === true;
	}
	
	public function isAdmin()
	{
		return isset($_SESSION['admin']) && $_SESSION['admin'] === true;
	}
	
	public function hasCookie()
	{
		return isset($_COOKIE['auth']) && $_COOKIE['auth'] != '' ? $_COOKIE['auth'] : false ;
	}
	
	public function getCookie($var)
	{
		return isset($_COOKIE[$var]) && $_COOKIE[$var] ? $_COOKIE[$var] : false;
	}
   
	public function setAttribute($attr, $value)
	{
		if(isset($_SESSION[$attr]))
		{
			unset($_SESSION[$attr]);
		}
		$_SESSION[$attr] = $value;
	}
   
	public function setAuthenticated($authenticated = true)
	{
		if (!is_bool($authenticated))
		{
			throw new \InvalidArgumentException('La valeur spécifiée à la méthode User::setAuthenticated() doit être un boolean');
		}
     
		$_SESSION['auth'] = $authenticated;
	}
	
	public function setAdmin($admin = true)
	{
		if (!is_bool($admin))
		{
			throw new \InvalidArgumentException('La valeur spécifiée à la méthode User::setAdmin() doit être un boolean');
		}
     
		$_SESSION['admin'] = $admin;
	}
   
	public function setFlash($type, $title, $message, $timeout = 3500)
	{
		$_SESSION['flash'] = '<script>$.gritter.add({
										title: "'.$title.'",
										text: "'.$message.'",
										class_name: "'.$type.'",
										time: "'.$timeout.'"
							});</script>';
	}
	
	public function setQuery($query) {
		$_SESSION['query'] = $query;
	}
	
	public function delUser() {
		$_SESSION = array();
		setCookie('auth', null, time() - 3600, '/');
		$_SCOOKIE = array();
		session_destroy();
		session_start();
	}
}