<?php

class ShowArsenalPage extends AbstractGamePage
{
	function __construct()
	{
		parent::__construct();
	}

	function show()
	{
		global $USER, $LNG;
		$this->printMessage("This page is under development");
		$this->assign(array(
			'priceFent'		=> 250 * $USER['arsenalFente'],
			'arsenalFente'	=> $USER['arsenalFente'] 
		));

		$this->display('page.arsenal.default.tpl');
	}
	
	function upgrade()
	{
		global $USER, $LNG;

		$this->assign(array(

		));

		$this->display('page.arsenal.upgrade.tpl');
	}
	
	function blueprints()
	{
		global $USER, $LNG;

		$this->assign(array(

		));

		$this->display('page.arsenal.blueprints.tpl');
	}
	
	function details()
	{
		global $USER, $LNG, $USETT;

		$sql = "SELECT * FROM %%ARSENAL_DETAILS%% ORDER BY arsenalClass ASC;";
		$arsenalDetails = database::get()->select($sql, array());
		
		$Detaillas = array();
		
		foreach($arsenalDetails as $data){
			$arsenalText = $LNG['arsenal_6'];
			if($data['arsenalClass'] == "d999") $arsenalText = $LNG['arsenal_7'];
			
			$arsenalText2 = $LNG['arsenal_8'];
			if($data['arsenalClass'] == "d5" || $data['arsenalClass'] == "d6") $arsenalText2 = $LNG['arsenal_9'];
			elseif($data['arsenalClass'] == "d7" || $data['arsenalClass'] == "d8") $arsenalText2 = $LNG['arsenal_10'];
			elseif($data['arsenalClass'] == "d999") $arsenalText2 = "";
			
			$Detaillas[$data['arsenalId']] = array(
				'arsenalClass'	=> $data['arsenalClass'],
				'arsenalName'	=> $LNG['arsenal'][$data['arsenalId']],
				'arsenalText'	=> $arsenalText,
				'arsenalText2'	=> $arsenalText2,
				'arsenalAvaila'	=> $USETT[$data['arsenalClass']]
			);
		}
		
		$this->assign(array(
			'Detaillas'		=> $Detaillas,
		));

		$this->display('page.arsenal.details.tpl');
	}
}