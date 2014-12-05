<?php
namespace Library\Models;
 
use \Library\Entities\Zone;
 
class ZoneManager_PDO extends ZoneManager
{
	public function getList()
	{
		$sql = 'SELECT id_zone AS id, libelle, id_pays AS pays FROM ZONE ORDER BY libelle DESC';
     
		$requete = $this->dao->query($sql);
		$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\Zone');
     
		$listePays = $requete->fetchAll();
     
		$requete->closeCursor();
     
		return $listePays;
	}
	
	public function getUnique($id)
	{
		$requete = $this->dao->prepare('SELECT id_pays AS id, libelle, id_pays AS pays FROM ZONE WHERE id_zone = :id');
		$requete->bindValue(':id', $id, \PDO::PARAM_INT);
		$requete->execute();
     
		$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\Zone');
     
		if ($zone = $requete->fetch())
			return $zone;
     
		return null;
	}
	
	public function count()
	{
		return $this->dao->query('SELECT COUNT(*) FROM ZONE')->fetchColumn();
	}
	
	protected function add(Zone $zone)
	  {
	    $requete = $this->dao->prepare('INSERT INTO ZONE SET libelle = :libelle, id_pays = :pays');
	 
	    $requete->bindValue(':libelle', $zone->libelle());
	    $requete->bindValue(':pays', $zone->pays());
	 
	    $requete->execute();
	  }

	public function update(Zone $zone)
	{
		$requete = $this->dao->prepare('UPDATE ZONE SET libelle = :libelle, id_pays = :pays WHERE id_zone = :id');
		$requete->bindValue(':libelle', $zone->libelle());
	    $requete->bindValue(':pays', $zone->pays());
		$requete->bindValue(':id', $zone->id());
		$requete->execute();
	}

	public function delete(Zone $zone)
	{
		$this->dao->exec('DELETE FROM ZONE WHERE id_zone = '.$zone->id());
	}
}