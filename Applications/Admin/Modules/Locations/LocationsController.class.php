<?php
namespace Applications\Admin\Modules\Locations;

class LocationsController extends \Library\BackController
{
	public function executeCountry(\Library\HTTPRequest $request)
	{
		$this->page->AddVar("title", "Countries");
		$listPays = $this->managers->getManagerOf("Pays")->getList();
		$this->page->AddVar("listePays", $listPays);
	}

	public function executeAdd_country(\Library\HTTPRequest $request)
	{
		$this->page->AddVar("title", "Add a country");

		$cont = array(
			"Africa" => base64_encode("Africa"),
			"Asia" => base64_encode("Asia"),
			"Europe" => base64_encode("Europe"),
			"North america" => base64_encode("North america"),
			"South america" => base64_encode("South america"),
			"Oceania" => base64_encode("Oceania")
		);
		$this->page->AddVar("cont", $cont);

		if ($request->postExists('submit'))
		{
			
			$pays = new \Library\Entities\Pays(array(
				'libelle' => $request->postData('name'),
				'continent' => base64_decode($request->postData('continent'))
			));

			if($pays->isValid()) {
				$this->managers->getManagerOf('Pays')->save($pays);
				$this->app->user()->setFlash('success','Success', 'Country added successfully');
				$this->app->httpResponse()->redirect('/admin/country');
			} else {				
				$this->page->addvar('pays', $pays);
				$this->page->addVar('erreurs', $pays->erreurs());
			}
		}
	}

	public function executeUpdate_country(\Library\HTTPRequest $request)
	{
		$pays = $this->managers->getManagerOf("Pays")->getUnique($request->getData("id"));
		$this->page->addvar('pays', $pays);

		if ($pays)
		{
			$this->page->AddVar("title", "Modify a country");
			$cont = array(
				"Africa" => base64_encode("Africa"),
				"Asia" => base64_encode("Asia"),
				"Europe" => base64_encode("Europe"),
				"North america" => base64_encode("North america"),
				"South america" => base64_encode("South america"),
				"Oceania" => base64_encode("Oceania")
			);
			$this->page->AddVar("cont", $cont);

			if ($request->postExists('submit'))
			{
				
				$pays = new \Library\Entities\Pays(array(
					'id' => $pays->id(),
					'libelle' => $request->postData('name'),
					'continent' => base64_decode($request->postData('continent'))
				));

				if($pays->isValid()) {
					$this->managers->getManagerOf('Pays')->save($pays);
					$this->app->user()->setFlash('success','Success', 'Country modified successfully');
					$this->app->httpResponse()->redirect('/admin/country');
				} else {				
					$this->page->addvar('pays', $pays);
					$this->page->addVar('erreurs', $pays->erreurs());
				}
			}
		}
		else
		{
			$this->app->user()->setFlash('danger','Error', 'Country not found');
			$this->app->httpResponse()->redirect('/admin/country');
		}
			
	}

	public function executeDelete_country(\Library\HTTPRequest $request)
	{
		for ($i=0; $i < $request->postData('count'); $i++) {
			$pays = unserialize(base64_decode($request->postData('suppr_'.$i)));
			$this->managers->getManagerOf('Pays')->delete($pays);
		}
		$this->app->user()->setFlash('success', 'Success', 'Item(s) deleted successfully');		
		$this->app->httpResponse()->redirect('/admin/country');
	}

	public function executeZone(\Library\HTTPRequest $request)
	{
		$this->page->AddVar("title", "Zones");
		$listeZone = $this->managers->getManagerOf("Zone")->getList();
		$this->page->AddVar('pMan', $this->managers->getManagerOf("Pays"));
		$this->page->AddVar("listeZone", $listeZone);
	}

	public function executeAdd_zone(\Library\HTTPRequest $request)
	{
		$this->page->AddVar("title", "Add a country");

		$cont = array(
			"Africa" => base64_encode("Africa"),
			"Asia" => base64_encode("Asia"),
			"Europe" => base64_encode("Europe"),
			"North america" => base64_encode("North america"),
			"South america" => base64_encode("South america"),
			"Oceania" => base64_encode("Oceania")
		);
		$this->page->AddVar("cont", $cont);

		if ($request->postExists('submit'))
		{
			
			$pays = new \Library\Entities\Pays(array(
				'libelle' => $request->postData('name'),
				'continent' => base64_decode($request->postData('continent'))
			));

			if($pays->isValid()) {
				$this->managers->getManagerOf('Pays')->save($pays);
				$this->app->user()->setFlash('success','Success', 'Country added successfully');
				$this->app->httpResponse()->redirect('/admin/country');
			} else {				
				$this->page->addvar('pays', $pays);
				$this->page->addVar('erreurs', $pays->erreurs());
			}
		}
	}

	public function executeUpdate_zone(\Library\HTTPRequest $request)
	{
		$pays = $this->managers->getManagerOf("Pays")->getUnique($request->getData("id"));
		$this->page->addvar('pays', $pays);

		if ($pays)
		{
			$this->page->AddVar("title", "Modify a country");
			$cont = array(
				"Africa" => base64_encode("Africa"),
				"Asia" => base64_encode("Asia"),
				"Europe" => base64_encode("Europe"),
				"North america" => base64_encode("North america"),
				"South america" => base64_encode("South america"),
				"Oceania" => base64_encode("Oceania")
			);
			$this->page->AddVar("cont", $cont);

			if ($request->postExists('submit'))
			{
				
				$pays = new \Library\Entities\Pays(array(
					'id' => $pays->id(),
					'libelle' => $request->postData('name'),
					'continent' => base64_decode($request->postData('continent'))
				));

				if($pays->isValid()) {
					$this->managers->getManagerOf('Pays')->save($pays);
					$this->app->user()->setFlash('success','Success', 'Country modified successfully');
					$this->app->httpResponse()->redirect('/admin/country');
				} else {				
					$this->page->addvar('pays', $pays);
					$this->page->addVar('erreurs', $pays->erreurs());
				}
			}
		}
		else
		{
			$this->app->user()->setFlash('danger','Error', 'Country not found');
			$this->app->httpResponse()->redirect('/admin/country');
		}
			
	}

	public function executeDelete_zone(\Library\HTTPRequest $request)
	{
		for ($i=0; $i < $request->postData('count'); $i++) {
			$pays = unserialize(base64_decode($request->postData('suppr_'.$i)));
			$this->managers->getManagerOf('Pays')->delete($pays);
		}
		$this->app->user()->setFlash('success', 'Success', 'Item(s) deleted successfully');		
		$this->app->httpResponse()->redirect('/admin/country');
	}

	public function executeZone(\Library\HTTPRequest $request)
	{
		$this->page->AddVar("title", "Zones");
	}
}