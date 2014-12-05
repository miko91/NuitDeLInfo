<?php
namespace Library\Models;

use \Library\Entities\Zone;
 
abstract class ZoneManager extends \Library\Manager
{
	/**
	* Méthode retournant une liste de news demandée
	* @param $debut int La première news à sélectionner
	* @param $limite int Le nombre de news à sélectionner
	* @return array La liste des news. Chaque entrée est une instance de News.
	*/
	abstract public function getList();
	
	/**
	* Méthode retournant une news précise.
	* @param $id int L'identifiant de la news à récupérer
	* @return News La news demandée
	*/
	abstract public function getUnique($id);
	
	/**
	* Méthode renvoyant le nombre de news total.
	* @return int
	*/
	abstract public function count();
	
	/**
	* Méthode permettant d'ajouter une news.
	* @param $news News La news à ajouter
	* @return void
	*/
	abstract protected function add(Zone $zone);
   
	/**
	* Méthode permettant d'enregistrer une news.
	* @param $news News la news à enregistrer
	* @see self::add()
	* @see self::modify()
	* @return void
	*/
	public function save(Zone $zone)
	{
		if ($zone->isValid())
		{
			$zone->isNew() ? $this->add($zone) : $this->update($zone);
		}
		else
		{
			throw new \RuntimeException('La zone doit être validée pour être enregistrée');
		}
	}
}