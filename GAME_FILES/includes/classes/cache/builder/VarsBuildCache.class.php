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

class VarsBuildCache implements BuildCache
{
	function buildCache()
	{
		$resource		= array();
		$requeriments	= array();
		$pricelist		= array();
		$CombatCaps		= array();
		$reslist		= array();
		$ProdGrid		= array();

		$reslist['prod']		= array();
		$reslist['storage']		= array();
		$reslist['bonus']		= array();
		$reslist['one']			= array();
		$reslist['build']		= array();
		$reslist['allow'][1]	= array();
		$reslist['allow'][3]	= array();
		$reslist['tech']		= array();
		$reslist['fleet']		= array();
		$reslist['defense']		= array();
		$reslist['missile']		= array();
		$reslist['officier']	= array();
		$reslist['dmfunc']		= array();
		$reslist['achievements']= array();
		
		$db	= Database::get();
		
		$reqResult		= $db->nativeQuery('SELECT * FROM %%VARS_REQUIRE%%;');
		foreach($reqResult as $reqRow)
		{
			$requeriments[$reqRow['elementID']][$reqRow['requireID']]	= $reqRow['requireLevel'];
		}

		$varsResult		= $db->nativeQuery('SELECT * FROM %%VARS%%;');
		foreach($varsResult as $varsRow)
		{
			$resource[$varsRow['elementID']]	= $varsRow['name'];
			$CombatCaps[$varsRow['elementID']]	= array(
				'attack'	=> $varsRow['attack'],
				'shield'	=> $varsRow['defend'],
			);
			
			$pricelist[$varsRow['elementID']]	= array(
				'cost'		=> array(
					901	=> $varsRow['cost901'],
					902	=> $varsRow['cost902'],
					903	=> $varsRow['cost903'],
					911	=> $varsRow['cost911'],
					921	=> $varsRow['cost921'],
					941	=> $varsRow['cost941'],
					800	=> $varsRow['cost800'],
				),
				'factor'			=> $varsRow['factor'],
				'arbrePosition'		=> $varsRow['arbrePosition'],
				'arbrePositionSec'	=> $varsRow['arbrePositionSec'],
				'max'				=> $varsRow['maxLevel'],
				'consumption'		=> $varsRow['consumption1'],
				'consumption2'		=> $varsRow['consumption2'],
				'speed'				=> $varsRow['speed1'],
				'speed2'			=> $varsRow['speed2'],
				'capacity'			=> $varsRow['capacity'],
				'tech'				=> $varsRow['speedTech'],
				'time'				=> $varsRow['timeBonus'],
				'bonus800'			=> $varsRow['bonus800'],
				'bonusExpe'			=> $varsRow['bonusExpe'],
				'bonus921'			=> $varsRow['bonus921'],
				'bonusText'			=> $varsRow['bonusText'],
				'bonusText2'		=> $varsRow['bonusText2'],
				'bonus'				=> array(
					'Attack'			=> array($varsRow['bonusAttack'], $varsRow['bonusAttackUnit']),
					'Defensive'			=> array($varsRow['bonusDefensive'], $varsRow['bonusDefensiveUnit']),
					'Shield'			=> array($varsRow['bonusShield'], $varsRow['bonusShieldUnit']),
					'BuildTime'			=> array($varsRow['bonusBuildTime'], $varsRow['bonusBuildTimeUnit']),
					'ResearchTime'		=> array($varsRow['bonusResearchTime'], $varsRow['bonusResearchTimeUnit']),
					'ShipTime'			=> array($varsRow['bonusShipTime'], $varsRow['bonusShipTimeUnit']),
					'DefensiveTime'		=> array($varsRow['bonusDefensiveTime'], $varsRow['bonusDefensiveTimeUnit']),
					'Resource'			=> array($varsRow['bonusResource'], $varsRow['bonusResourceUnit']),
					'Energy'			=> array($varsRow['bonusEnergy'], $varsRow['bonusEnergyUnit']),
					'ResourceStorage'	=> array($varsRow['bonusResourceStorage'], $varsRow['bonusResourceStorageUnit']),
					'ShipStorage'		=> array($varsRow['bonusShipStorage'], $varsRow['bonusShipStorageUnit']),
					'FlyTime'			=> array($varsRow['bonusFlyTime'], $varsRow['bonusFlyTimeUnit']),
					'FleetSlots'		=> array($varsRow['bonusFleetSlots'], $varsRow['bonusFleetSlotsUnit']),
					'Planets'			=> array($varsRow['bonusPlanets'], $varsRow['bonusPlanetsUnit']),
					'SpyPower'			=> array($varsRow['bonusSpyPower'], $varsRow['bonusSpyPowerUnit']),
					'Expedition'		=> array($varsRow['bonusExpedition'], $varsRow['bonusExpeditionUnit']),
					'GateCoolTime'		=> array($varsRow['bonusGateCoolTime'], $varsRow['bonusGateCoolTimeUnit']),
					'MoreFound'			=> array($varsRow['bonusMoreFound'], $varsRow['bonusMoreFoundUnit']),
					'MoonCreat'			=> array($varsRow['bonusMoonCreat'], $varsRow['bonusMoonCreat']),
					'AccuracyShot'		=> array($varsRow['bonusAccuracyShot'], $varsRow['bonusAccuracyShot']),
					'Armor'				=> array($varsRow['bonusArmor'], $varsRow['bonusArmor']),
					'ArmorActive'		=> array($varsRow['bonusArmorActive'], $varsRow['bonusArmorActive']),
					'ShieldReg'			=> array($varsRow['bonusShieldReg'], $varsRow['bonusShieldReg']),
					'Resource941'		=> array($varsRow['bonusResource941'], $varsRow['bonusResource941']),
					'SpeedFleet'		=> array($varsRow['bonusSpeedFleet'], $varsRow['bonusSpeedFleet']),
					'MotorEconomy'		=> array($varsRow['bonusMotorEconomy'], $varsRow['bonusMotorEconomy']),
					'Espionage'			=> array($varsRow['bonusEspionage'], $varsRow['bonusEspionage']),
				),
			);
			
			$ProdGrid[$varsRow['elementID']]['production']	= array(
				901	=> $varsRow['production901'],
				902	=> $varsRow['production902'],
				903	=> $varsRow['production903'],
				911	=> $varsRow['production911'],
				941	=> $varsRow['production941'],
			);
			
			$ProdGrid[$varsRow['elementID']]['storage']	= array(
				901	=> $varsRow['storage901'],
				902	=> $varsRow['storage902'],
				903	=> $varsRow['storage903'],
				941	=> $varsRow['storage941'],
			);
			
			if(array_filter($ProdGrid[$varsRow['elementID']]['production']))
				$reslist['prod'][]		= $varsRow['elementID'];
				
			if(array_filter($ProdGrid[$varsRow['elementID']]['storage']))
				$reslist['storage'][]	= $varsRow['elementID'];
				
			if(($varsRow['bonusAttack'] + $varsRow['bonusDefensive'] + $varsRow['bonusShield'] + $varsRow['bonusBuildTime'] + 
				$varsRow['bonusResearchTime'] + $varsRow['bonusShipTime'] + $varsRow['bonusDefensiveTime'] + $varsRow['bonusResource'] + 
				$varsRow['bonusEnergy'] + $varsRow['bonusResourceStorage'] + $varsRow['bonusShipStorage'] + $varsRow['bonusFlyTime'] + 
				$varsRow['bonusFleetSlots'] + $varsRow['bonusPlanets'] + $varsRow['bonusSpyPower'] + $varsRow['bonusExpedition'] + 
				$varsRow['bonusGateCoolTime'] + $varsRow['bonusMoreFound'] + $varsRow['bonusEspionage'] + $varsRow['bonusMotorEconomy'] + $varsRow['bonusSpeedFleet'] + $varsRow['bonusResource941'] + $varsRow['bonusShieldReg'] + $varsRow['bonusArmorActive'] + $varsRow['bonusArmor'] + $varsRow['bonusAccuracyShot'] + $varsRow['bonusMoonCreat']) != 0)
			{
				$reslist['bonus'][]		= $varsRow['elementID'];
			}
			if($varsRow['onePerPlanet'] == 1)
				$reslist['one'][]		= $varsRow['elementID'];
			
			switch($varsRow['class']) {
				case 0: 
					$reslist['build'][]	= $varsRow['elementID'];
					$tmp	= explode(',', $varsRow['onPlanetType']);
					foreach($tmp as $type) 
						$reslist['allow'][$type][]	= $varsRow['elementID'];
				break;
				case 100: 
					$reslist['tech'][]	= $varsRow['elementID'];
				break;
				case 200: 
					$reslist['fleet'][]	= $varsRow['elementID'];
				break;
				case 400: 
					$reslist['defense'][]	= $varsRow['elementID'];
				break;
				case 500: 
					$reslist['missile'][]	= $varsRow['elementID'];
				break;
				case 600: 
					$reslist['officier'][]	= $varsRow['elementID'];
				break;
				case 700: 
					$reslist['dmfunc'][]	= $varsRow['elementID'];
				break;
				case 800: 
					$reslist['achievements'][]	= $varsRow['elementID'];
				break;
			}
		}

		$rapidResult		= $db->nativeQuery('SELECT * FROM %%VARS_RAPIDFIRE%%;');
		foreach($rapidResult as $rapidRow)
		{
			$CombatCaps[$rapidRow['elementID']]['sd'][$rapidRow['rapidfireID']]	= $rapidRow['shoots'];
		}
		
		return array(
			'reslist'		=> $reslist,
			'ProdGrid'		=> $ProdGrid,
			'CombatCaps'	=> $CombatCaps,
			'resource'		=> $resource,
			'pricelist'		=> $pricelist,
			'requeriments'	=> $requeriments,
		);
	}
}