<?php
namespace Applications\Admin\Modules\Dashboard;

class DashboardController extends \Library\BackController
{
	public function executeIndex(\Library\HTTPRequest $request)
	{
		/*
		$dash = $this->managers->getManagerOf('Commande')->dashboard();

    	$saleChart = '<script>$(".sp1").sparkline([';
    	for ($i=0; $i < count($dash['Ventes']['liste']); $i++) { 
    		$saleChart .= $dash['Ventes']['liste'][$i];
    		if($i < count($dash['Ventes']['liste'])-1)
    		{
    			$saleChart .= ',';
    		}
    	}
    	$saleChart .= "], { type: 'bar', width: '130px', barColor: '#4A8CF7'});</script>";
		$this->page->updateVar('js', $saleChart);

		$menuChart = '<script>$(".sp2").sparkline([';
		for ($i=0; $i < count($dash['Menus']['liste']); $i++) { 
    		$menuChart .= $dash['Menus']['liste'][$i];
    		if($i < count($dash['Menus']['liste'])-1)
    		{
    			$menuChart .= ',';
    		}
    	}
    	$menuChart .= "], { type: 'discrete', width: '130', lineColor: '#4A8CF7',thresholdValue: 4,thresholdColor: '#ff0000'});</script>";
		$this->page->updateVar('js', $menuChart);

		$comChart = '<script>$(".sp3").sparkline([';
		for ($i=0; $i < count($dash['Menus']['liste']); $i++) { 
    		$comChart .= $dash['Commandes']['liste'][$i];
    		if($i < count($dash['Commandes']['liste'])-1)
    		{
    			$comChart .= ',';
    		}
    	}
    	$comChart .= "], {type: 'line', lineColor: '#258FEC', fillColor: '#4A8CF7', spotColor: false, width: '130px', minSpotColor: false, maxSpotColor: false, highlightSpotColor: '#1e7ac6', highlightLineColor: '#1e7ac6'});</script>";
		$this->page->updateVar('js', $comChart);
		$this->page->addVar('resume', $dash);

		$this->page->addVar('commandes', $this->managers->getManagerOf('Commande')->getList(date('Y-m-d')));

		$this->page->addVar('commande', $this->managers->getManagerOf('Commande'));
		$this->page->addVar('menu', $this->managers->getManagerOf('Menu'));
		$this->page->addVar('client', $this->managers->getManagerOf('Client'));
		$this->page->addVar('reg', $this->managers->getManagerOf('Regulier'));
		$jours = $this->managers->getManagerOf('Commande')->getListDayJo();
		$specials = $this->managers->getManagerOf('Commande')->getListDaySp();
		
		$j_em = $j_li = $s_em = $s_li = 0;
		
		if($jours != NULL) {
			foreach ($jours as $jour) {
				if($jour['mode'] == "on") {
					$j_li += $jour['prix'];
				} else {
					$j_em += $jour['prix'];
				}
			}
			$this->page->addVar('jours', $jours);
		}
		
		if($specials != NULL) {
			foreach ($specials as $special) {
				if($special['mode'] == "on") {
					$j_li += $special['prix'];
				} else {
					$j_em += $special['prix'];
				}
			}
		}
		$this->page->addVar('j_em', $j_em);
		$this->page->addVar('j_li', $j_li);
		$this->page->addVar('s_em', $s_em);
		$this->page->addVar('s_li', $s_li);
		$this->page->addVar('title', 'CALM - Tableau de bord');
		*/
	}
	
	/*
		select AVG(commandes) FROM (select (SELECT count(quantite) from commande where id_menu = m.id_menu) AS "commandes" from menu m inner join commande c ON c.id_menu = m.id_menu group by m.id_menu) AS resume;

	
	SELECT CONCAT(MONTH(dateMenu),' -',YEAR(dateMenu)) AS "Période", count(id_menu)
	FROM MENU
	WHERE dateMenu BETWEEN
		( SELECT CONCAT('01', SUBSTR(DATE_SUB(curdate(), INTERVAL 1 YEAR), 2)) ) 
	AND CURDATE()
	GROUP BY CONCAT(MONTH(dateMenu),' -',YEAR(dateMenu))
	ORDER BY dateMenu DESC


	SELECT CONCAT(MONTH(m.dateMenu),' -',YEAR(m.dateMenu)) AS "Période", SUM(c.tarif)
	FROM MENU m
	INNER JOIN COMMANDE c ON c.id_menu = m.id_menu
	WHERE dateMenu BETWEEN
		( SELECT CONCAT('01', SUBSTR(DATE_SUB(curdate(), INTERVAL 1 YEAR), 2)) ) 
	AND CURDATE()
	GROUP BY CONCAT(MONTH(m.dateMenu),' -',YEAR(m.dateMenu))
	ORDER BY m.dateMenu DESC
	*/
}
?>