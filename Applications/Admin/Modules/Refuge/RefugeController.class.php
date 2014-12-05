<?php
namespace Applications\Admin\Modules\Refuge;

class RefugeController extends \Library\BackController
{
	public function executeIndex(\Library\HTTPRequest $request)
	{
		$this->page->AddVar("title", "Refuges");
	}
}