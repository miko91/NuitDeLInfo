<?php
namespace Applications\Admin\Modules\Configuration;

class ConfigurationController extends \Library\BackController
{
	public function executeIndex(\Library\HTTPRequest $request)
	{
		if($request->postExists('save_prix')) {
			
			$this->page->addVar('complet', false);
			$this->app->httpResponse()->addHeader('Content-Type: application/json');
			
			$prix = $request->postData('prix_menu');
			$liv = $request->postData('prix_livraison');
			$tva = $request->postData('tva');
			
			$configs = array(
				new \Library\Entities\Configuration(array(
					'id' => 'prix_menu',
					'value' => $prix
				)),
				new \Library\Entities\Configuration(array(
					'id' => 'prix_livraison',
					'value' => $liv
				)),
				new \Library\Entities\Configuration(array(
					'id' => 'tva',
					'value' => $tva
				))
			);
			$result = array(
				'form' => array(),
				'not' => array(
					'type' => 'success',
					'title' => 'Opération réussie',
					'message' => 'Enregistrement des tarifs'
				)
			);
			foreach ($configs as $cf) {
				if(!($cf->isValid())) {
					$result['form'][] = array(
						'id' => $cf->id()
					);
				}
			}
			
			if(empty($result['form'])) {
				$result['result'] = 'true';
				foreach ($configs as $cf) {
					$this->managers->getManagerOf('Configuration')->save($cf);
				}
			} else {
				$result['result'] = 'false';
			}
			
			echo json_encode($result);
		} else if($request->postExists('save_info')) {
			$this->page->addVar('complet', false);
			$this->app->httpResponse()->addHeader('Content-Type: application/json');
			
			$info['tel'] = $request->postData('tel');
			$info['email'] = $request->postData('email');
			$info['message'] = $request->postData('message');
			
			$result = array(
				'form' => array(),
				'not' => array(
					'type' => 'success',
					'title' => 'Opération réussie',
					'message' => 'Enregistrement des informations'
				)
			);
			
			foreach ($info as $donnee => $value) {
				if(empty($value)) {
					$result['form'][] = array(
						'id' => $donnee
					);
				}
			}
			if(empty($erreur)) {
				$result['result'] = 'true';
				foreach ($info as $key => $value) {
					$this->app->config()->setVar('info_'.$key, base64_encode($value));
				}
				$this->app->config()->save();
			} else {
				$result['result'] = 'false';
			}

			echo json_encode($result);
		}
		$this->page->addVar('title', 'CALM - Configuration');
		$this->page->addVar('prix', $this->managers->getManagerOf('Configuration')->getUnique('prix_menu'));
		$this->page->addVar('supp', $this->managers->getManagerOf('Configuration')->getUnique('prix_livraison'));
		$this->page->addVar('tva', $this->managers->getManagerOf('Configuration')->getUnique('tva'));
		$this->page->addVar('tel', $this->app->config()->get('info_tel'));
		$this->page->addVar('email', $this->app->config()->get('info_email'));
		$this->page->addVar('message', $this->app->config()->get('info_message'));
	}
}
?>