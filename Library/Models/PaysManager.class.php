<?php
namespace Library\Models;

use \Library\Entities\Pays;
 
abstract class PaysManager extends \Library\Manager
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
	abstract protected function add(Pays $pays);
   
	/**
	* Méthode permettant d'enregistrer une news.
	* @param $news News la news à enregistrer
	* @see self::add()
	* @see self::modify()
	* @return void
	*/
	public function save(Pays $pays)
	{
		if ($pays->isValid())
		{
			$pays->isNew() ? $this->add($pays) : $this->update($pays);
		}
		else
		{
			throw new \RuntimeException('Le pays doit être validé pour être enregistré');
		}
	}
}