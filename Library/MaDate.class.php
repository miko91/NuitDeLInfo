<?php
namespace Library;

class MaDate extends \DateTime implements \ArrayAccess
{
	
	public $has53,
	$erreurs;
	
	public function __construct($semaine, $annee, $jour = 2)
	{
		$this->test53($semaine, $annee);
		if ($this->has53() == "false" && $semaine == 53)
		{
			$this->erreurs = "true";
		}
		else
		{
			parent::__construct(date("Y-m-d", strtotime($annee.'W'.$semaine.'-'.$jour)));
		}
	}
	
	public function isValid()
	{
		return (empty($this->erreurs));
	}
	
	public function has53()
	{
		return $this->has53;
	}
	
	public function setHas53($has53)
	{
		$this->has53 = $has53;
	}
	
	
	
	/**
	*	Cette méthode permet de voir si en fonction d'une date, l'année comporte 52 ou 53 semaines.
	*	@param $semaine
	*	@param $annee
	*	@see self::setHas53()
	*	@return void
	**/
	public function test53($semaine, $annee)
	{
		list($day, $month, $year) = explode('/', date('d/m/Y', strtotime($annee.'W52-7')));
		if ($day <= 27 && $year == $annee)
		{
			$this->setHas53("true");
		}
		else
		{
			$this->setHas53("false");
		}
	}
	
	
	
	
	
	public function offsetGet($var)
	{
		if (isset($this->$var) && is_callable(array($this, $var)))
		{
			return $this->$var();
		}
	}
   
	public function offsetSet($var, $value)
	{
		$method = 'set'.ucfirst($var);
     
		if (isset($this->$var) && is_callable(array($this, $method)))
		{
			$this->$method($value);
		}
	}
   
	public function offsetExists($var)
	{
		return isset($this->$var) && is_callable(array($this, $var));
	}
   
	public function offsetUnset($var)
	{
		throw new \Exception('Impossible de supprimer une quelconque valeur');
	}
}
?>