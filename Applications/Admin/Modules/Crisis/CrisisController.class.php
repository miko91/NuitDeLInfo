<?php
namespace Applications\Admin\Modules\Crisis;

class CrisisController extends \Library\BackController
{
	public function executeIndex(\Library\HTTPRequest $request)
	{
		$this->page->AddVar("title", "Crisis");
	}
}