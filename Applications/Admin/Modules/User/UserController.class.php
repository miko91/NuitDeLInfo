<?php
namespace Applications\Admin\Modules\User;

class UserController extends \Library\BackController
{
	public function executeAdministrator(\Library\HTTPRequest $request)
	{
		$this->page->AddVar("title", "Administrators");
	}

	public function executeManager(\Library\HTTPRequest $request)
	{
		$this->page->AddVar("title", "Managers");
	}

	public function executeRefugee(\Library\HTTPRequest $request)
	{
		$this->page->AddVar("title", "Refugees");
	}
}