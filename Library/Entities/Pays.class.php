<?php
namespace Library\Entities;
	
class Pays extends \Library\Entity
{
	protected $libelle,
	$continent;

	const INVALID_NAME = 1;
	
	public function isValid()
	{
		return !(empty($this->libelle) || empty($this->continent));
	}
	
	
	// SETTERS //
	
	public function setLibelle($libelle)
	{
		if (!is_string($libelle) || empty($libelle))
		{
			$this->erreurs["libelle"] = 'The name of a country cannot be empty!';
		}
		else
		{
			$this->libelle = $libelle;
		}
	}
	
	public function setContinent($continent)
	{
		$this->continent = $continent;
	}	
	
	// GETTERS //
	
	public function libelle() { return $this->libelle; }
	public function continent() { return $this->continent; }
}
?>