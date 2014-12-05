<?php
namespace Library;

class Ldap extends ApplicationComponent
{
	private $dn,
	$host,
	$user,
	$pass,
	$suffix,
	$port,
	$ldap;

	public function __construct(Application $app)
	{
		parent::__construct($app);
		$this->setDn("DC=dom-uf,DC=local");
		$this->setSuffix("@dom-uf.local");
		$this->setHost(array("srv02-uf.dom-uf.local"));
		$this->setUser("admin");
		$this->setPass("uf2005HP");
		try {
			$this->ldap = new \adLDAP\adLDAP(array(
				'admin_username'	=> $this->user,
				'admin_password'	=> $this->pass,
				'account_suffix'	=> $this->suffix,
				'base_dn' 			=> $this->dn,
				'domain_controllers'=> $this->host,
				//'ad_port'			=> "3268",
				//'use_ssl'			=> true
			));
		} catch (\adLDAP\adLDAPException $e) {
			echo $e;
			exit();
		}
	}

	// SETTERS //

	public function setDn($dn)
	{
		$this->dn = $dn;
	}

	public function setHost($host)
	{
		$this->host = $host;
	}

	public function setUser($user)
	{
		$this->user = $user;
	}

	public function setPass($pass)
	{
		$this->pass = $pass;
	}
	
	public function setSuffix($suffix)
	{
		$this->suffix = $suffix;
	}

	public function authenticate($username, $password)
	{
		try {
			return $this->ldap->user()->authenticate($username, $password) ? $this->ldap->user()->info($username) : NULL;
		} catch (\adLDAP\adLDAPException $e) {
			return $e;
		}
	}
	
	public function ldap() { return $this->ldap; }
}
?>