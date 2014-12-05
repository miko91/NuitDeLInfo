<?php
namespace Applications\Admin;

class AdminApplication extends \Library\Application {
	
	public function __construct($start) {
		parent::__construct("Admin", $start);
		$this->mail = new \Library\Mailer($this);
	}
	
	public function run() {
		/*
		if ($this->user->isAuthenticated())
		{
			$controller = $this->getController();
			
		}
		else
		{
			$controller = new Modules\Connexion\ConnexionController($this, 'Connexion', 'index');
		}
		*/
		$controller = $this->getController();
		$controller->execute();
		$this->httpResponse->setPage($controller->page());
		$this->httpResponse->send();
	}
}
?>