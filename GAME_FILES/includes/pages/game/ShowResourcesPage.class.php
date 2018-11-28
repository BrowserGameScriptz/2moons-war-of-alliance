<?php

/**
 *  2Moons 
 *   by Jan-Otto Kröpke 2009-2016
 *
 * For the full copyright and license information, please view the LICENSE
 *
 * @package 2Moons
 * @author Jan-Otto Kröpke <slaver7@gmail.com>
 * @copyright 2009 Lucky
 * @copyright 2016 Jan-Otto Kröpke <slaver7@gmail.com>
 * @licence MIT
 * @version 1.8.0
 * @link https://github.com/jkroepke/2Moons
 */

class ShowResourcesPage extends AbstractGamePage
{
	public static $requireModule = MODULE_RESSOURCE_LIST;

	function __construct() 
	{
		parent::__construct();
	}
	
	function AllPlanets()
	{
		global $resource, $USER, $PLANET, $LNG;
		
		$action = HTTP::_GP('action', "", true);
		
		if($action == "on"){
			$sql = "UPDATE %%PLANETS%% SET metal_mine_porcent = '11', crystal_mine_porcent = '11', deuterium_sintetizer_porcent = '11', solar_plant_porcent = '11', fusion_plant_porcent = '11', solar_satelit_porcent = '11', fund_mine_porcent = '11', university_porcent = '11', laboratory_porcent = '11', last_update = :last_update WHERE id_owner = :userID;";
			database::get()->update($sql, array(
				':last_update'	=> TIMESTAMP,
				':userID'		=> $USER['id']
			));	
			$PLANET['last_update']	= TIMESTAMP;
			$this->ecoObj->setData($USER, $PLANET);
			$this->ecoObj->ReBuildCache();
			list($USER, $PLANET)	= $this->ecoObj->getData();
			$PLANET['eco_hash'] = $this->ecoObj->CreateHash();
			$this->save();
			$this->redirectTo('game.php?page=resources');
		}elseif($action == "off"){
			$sql = "UPDATE %%PLANETS%% SET metal_mine_porcent = '0', crystal_mine_porcent = '0', deuterium_sintetizer_porcent = '0', solar_plant_porcent = '0', fusion_plant_porcent = '0', solar_satelit_porcent = '0', fund_mine_porcent = '0', university_porcent = '0', laboratory_porcent = '0', last_update = :last_update WHERE id_owner = :userID;";
			database::get()->update($sql, array(
				':last_update'	=> TIMESTAMP,
				':userID'		=> $USER['id']
			));	
			$this->ecoObj->setData($USER, $PLANET);
			$this->ecoObj->ReBuildCache();
			list($USER, $PLANET)	= $this->ecoObj->getData();
			$PLANET['eco_hash'] = $this->ecoObj->CreateHash();
			$this->save();
			$this->redirectTo('game.php?page=resources');
		}elseif($action == "offl"){
			$sql = "UPDATE %%PLANETS%% SET university_porcent = '0', laboratory_porcent = '0', last_update = :last_update WHERE id_owner = :userID;";
			database::get()->update($sql, array(
				':last_update'			=> TIMESTAMP,
				':userID'				=> $USER['id']
			));	
			$this->ecoObj->setData($USER, $PLANET);
			$this->ecoObj->ReBuildCache();
			list($USER, $PLANET)	= $this->ecoObj->getData();
			$PLANET['eco_hash'] = $this->ecoObj->CreateHash();
			$this->save();
			$this->redirectTo('game.php?page=resources');
		}else{
			$this->printMessage($LNG['playercar_27'], true, array('game.php?page=Resources', 2));
		}
	}
	
	function send()
	{
		global $resource, $USER, $PLANET;
		if ($USER['urlaubs_modus'] == 0)
		{
			$updateSQL	= array();
			if(!isset($_POST['prod']))
				$_POST['prod'] = array();


			$param	= array(':planetId' => $PLANET['id']);
			
			foreach($_POST['prod'] as $resourceId => $Value)
			{
				$FieldName = $resource[$resourceId].'_porcent';
				if (!isset($PLANET[$FieldName]) || !in_array($Value, range(0, 10)))
					continue;
				
				$updateSQL[]	= $FieldName." = :".$FieldName;
				$param[':'.$FieldName]		= (int) $Value;
				$PLANET[$FieldName]			= $Value;
			}

			if(!empty($updateSQL))
			{
				$sql	= 'UPDATE %%PLANETS%% SET '.implode(', ', $updateSQL).' WHERE id = :planetId;';

				Database::get()->update($sql, $param);

				$this->ecoObj->setData($USER, $PLANET);
				$this->ecoObj->ReBuildCache();
				list($USER, $PLANET)	= $this->ecoObj->getData();
				$PLANET['eco_hash'] = $this->ecoObj->CreateHash();
			}
		}

		$this->save();
		$this->redirectTo('game.php?page=resources');
	}
	function show()
	{
		global $LNG, $ProdGrid, $resource, $reslist, $USER, $PLANET;
		$config	= Config::get();

		if($USER['urlaubs_modus'] == 1 || $PLANET['planet_type'] != 1)
		{
			$basicIncome[901]	= 0;
			$basicIncome[902]	= 0;
			$basicIncome[903]	= 0;
			$basicIncome[911]	= 0;
			$basicIncome[941]	= 0;
		}
		else
		{		
			$basicIncome[901]	= $config->{$resource[901].'_basic_income'};
			$basicIncome[902]	= $config->{$resource[902].'_basic_income'};
			$basicIncome[903]	= $config->{$resource[903].'_basic_income'};
			$basicIncome[911]	= $config->{$resource[911].'_basic_income'};
			$basicIncome[941]	= $config->{$resource[941].'_basic_income'};
		}
		
		$temp	= array(
			901	=> array(
				'plus'	=> 0,
				'minus'	=> 0,
			),
			902	=> array(
				'plus'	=> 0,
				'minus'	=> 0,
			),
			903	=> array(
				'plus'	=> 0,
				'minus'	=> 0,
			),
			911	=> array(
				'plus'	=> 0,
				'minus'	=> 0,
			),
			941	=> array(
				'plus'	=> 0,
				'minus'	=> 0,
			)
		);
		
		$ressIDs		= array_merge(array(), $reslist['resstype'][1], $reslist['resstype'][2]);

		$productionList	= array();

		if($PLANET['energy_used'] != 0) {
			$prodLevel	= min(1, $PLANET['energy'] / abs($PLANET['energy_used']));
		} else {
			$prodLevel	= 0;
		}

		/* Data for eval */
		$BuildEnergy		= $USER[$resource[113]];
		$BuildTemp          = $PLANET['temp_max'];
		$relistProd			= array(1,2,3,4,12,212,6,31,29);

		foreach($relistProd as $ProdID)
		{
			//if(isset($PLANET[$resource[$ProdID]]) && $PLANET[$resource[$ProdID]] == 0)
				//continue;

			//if(isset($USER[$resource[$ProdID]]) && $USER[$resource[$ProdID]] == 0)
				//continue;
			
			if(isset($PLANET[$resource[$ProdID]]))
				$WichTableChoose = $PLANET;
			elseif(isset($USER[$resource[$ProdID]]))
				$WichTableChoose = $USER;
					
			$productionList[$ProdID]	= array(
				'production'	=> array(901 => 0, 902 => 0, 903 => 0, 911 => 0, 941 => 0),
				'elementLevel'	=> $WichTableChoose[$resource[$ProdID]],
				'prodLevel'		=> $PLANET[$resource[$ProdID].'_porcent'],
			);

			/* Data for eval */
			$BuildLevel			= $WichTableChoose[$resource[$ProdID]];
			$BuildLevelFactor	= $PLANET[$resource[$ProdID].'_porcent'];

			foreach($ressIDs as $ID) 
			{
				if(!isset($ProdGrid[$ProdID]['production'][$ID]))
					continue;

				$Production	= eval(ResourceUpdate::getProd($ProdGrid[$ProdID]['production'][$ID]));

				if(in_array($ID, $reslist['resstype'][2]))
				{
					$Production	*= $config->energySpeed;
				}
				elseif($ID == 941)
				{
					$Production	= $Production;
				}else
				{
					$Production	*= $prodLevel * $config->resource_multiplier;
				}
				
				$productionList[$ProdID]['production'][$ID]	= $Production;
				
				if(isset($PLANET[$resource[$ID]]))
					$WichTableChoose = $PLANET;
				elseif(isset($USER[$resource[$ID]]))
					$WichTableChoose = $USER;
				
				
				if($Production > 0) {
					if($WichTableChoose[$resource[$ID]] == 0) continue;
					
					$temp[$ID]['plus']	+= $Production;
				} else {
					$temp[$ID]['minus']	+= $Production;
				}
			}
		}
				
		$storage	= array(
			901 => shortly_number($PLANET[$resource[901].'_max']),
			902 => shortly_number($PLANET[$resource[902].'_max']),
			903 => shortly_number($PLANET[$resource[903].'_max']),
		);
		
		$basicProduction	= array(
			901 => $basicIncome[901] * $config->resource_multiplier,
			902 => $basicIncome[902] * $config->resource_multiplier,
			903	=> $basicIncome[903] * $config->resource_multiplier,
			911	=> $basicIncome[911] * $config->energySpeed,
			941	=> $basicIncome[941],
		);
		
		$totalProduction	= array(
			901 => $PLANET[$resource[901].'_perhour'] + $basicProduction[901],
			902 => $PLANET[$resource[902].'_perhour'] + $basicProduction[902],
			903	=> $PLANET[$resource[903].'_perhour'] + $basicProduction[903],
			911	=> $PLANET[$resource[911]] + $basicProduction[911] + $PLANET[$resource[911].'_used'],
			941	=> $USER['research_perhour'] + $basicProduction[941],
		);
		
		$bonusProduction	= array(
			901 => $temp[901]['plus'] * ($USER['factor']['Resource'] + 0.05 * $USER[$resource[102]]),
			902 => $temp[902]['plus'] * ($USER['factor']['Resource'] + 0.05 * $USER[$resource[102]]),
			903	=> $temp[903]['plus'] * ($USER['factor']['Resource'] + 0.05 * $USER[$resource[102]]),
			911	=> $temp[911]['plus'] * ($USER['factor']['Energy'] + 0.05 * $USER[$resource[113]]),
			941	=> $temp[941]['plus'] * ($USER['factor']['Resource']),
		);
		
		$dailyProduction	= array(
			901 => $totalProduction[901] * 24,
			902 => $totalProduction[902] * 24,
			903	=> $totalProduction[903] * 24,
			911	=> $totalProduction[911],
			941	=> $totalProduction[941],
		);
		
		$weeklyProduction	= array(
			901 => $totalProduction[901] * 168,
			902 => $totalProduction[902] * 168,
			903	=> $totalProduction[903] * 168,
			911	=> $totalProduction[911],
			941 => $totalProduction[941],
		);
			
		$prodSelector	= array();
		
		foreach(range(10, 0) as $percent) {
			$prodSelector[$percent]	= ($percent * 10).'%';
		}
		
		$this->assign(array(
			'header'			=> sprintf($LNG['rs_production_on_planet'], $PLANET['name']),
			'prodSelector'		=> $prodSelector,
			'productionList'	=> $productionList,
			'basicProduction'	=> $basicProduction,
			'totalProduction'	=> $totalProduction,
			'bonusProduction'	=> $bonusProduction,
			'dailyProduction'	=> $dailyProduction,
			'weeklyProduction'	=> $weeklyProduction,
			'storage'			=> $storage,
		));
		
		$this->display('page.resources.default.tpl');
	}
}
