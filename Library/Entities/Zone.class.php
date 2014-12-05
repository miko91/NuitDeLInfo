<?php
namespace Library\Entities;
	
class Zone extends \Library\Entity
{
	protected $libelle,
	$pays;

	const INVALID_NAME = 1;
	
	public function isValid()
	{
		return !(empty($this->libelle));
	}
	
	
	// SETTERS //
	
	public function setLibelle($libelle)
	{
		if (!is_string($libelle) || empty($libelle))
		{
			$this->erreurs["libelle"] = 'The name of a zone cannot be empty!';
		}
		else
		{
			$this->libelle = $libelle;
		}
	}
	
	public function setPays($pays)
	{
		$this->payspays = $pays;
	}	
	
	// GETTERS //
	
	public function libelle() { return $this->libelle; }
	public function pays() { return $this->pays; }
}
?>