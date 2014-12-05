<?php
namespace Library\Models;
 
use \Library\Entities\Pays;
 
class PaysManager_PDO extends PaysManager
{
	public function getList()
	{
		$sql = 'SELECT id_pays AS id, libelle, continent FROM PAYS ORDER BY libelle DESC';
     
		$requete = $this->dao->query($sql);
		$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\Pays');
     
		$listePays = $requete->fetchAll();
     
		$requete->closeCursor();
     
		return $listePays;
	}
	
	public function getUnique($id)
	{
		$requete = $this->dao->prepare('SELECT id_pays AS id, libelle, continent FROM PAYS WHERE id_pays = :id');
		$requete->bindValue(':id', $id, \PDO::PARAM_INT);
		$requete->execute();
     
		$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\Pays');
     
		if ($pays = $requete->fetch())
			return $pays;
     
		return null;
	}
	
	public function count()
	{
		return $this->dao->query('SELECT COUNT(*) FROM news')->fetchColumn();
	}
	
	protected function add(Pays $pays)
	  {
	    $requete = $this->dao->prepare('INSERT INTO PAYS SET libelle = :libelle, continent = :continent');
	 
	    $requete->bindValue(':libelle', $pays->libelle());
	    $requete->bindValue(':continent', $pays->continent());
	 
	    $requete->execute();
	  }

	public function update(Pays $pays)
	{
		$requete = $this->dao->prepare('UPDATE PAYS SET libelle = :libelle, continent = :continent WHERE id_pays = :id');
		$requete->bindValue(':libelle', $pays->libelle());
	    $requete->bindValue(':continent', $pays->continent());
		$requete->bindValue(':id', $pays->id());
		$requete->execute();
	}

	public function delete(Pays $pays)
	{
		$this->dao->exec('DELETE FROM PAYS WHERE id_pays = '.$pays->id());
	}
}