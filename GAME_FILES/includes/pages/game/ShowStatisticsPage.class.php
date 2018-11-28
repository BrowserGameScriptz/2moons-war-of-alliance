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


class ShowStatisticsPage extends AbstractGamePage
{
    public static $requireModule = MODULE_STATISTICS;

	function __construct() 
	{
		parent::__construct();
	}

    function show()
    {
        global $USER, $LNG;
        $who   	= HTTP::_GP('who', 1);
        $type  	= HTTP::_GP('type', 1);
        $range 	= HTTP::_GP('range', 1);

        switch ($type)
        {
			case 2:
                $Order   = "armement_rank";
                $Points  = "armement_points";
                $Rank    = "armement_rank";
                $OldRank = "armement_old_rank";
            break;
			case 3:
                $Order   = "build_rank";
                $Points  = "build_points";
                $Rank    = "build_rank";
                $OldRank = "build_old_rank";
            break;
			 case 4:
                $Order   = "defs_rank";
                $Points  = "defs_points";
                $Rank    = "defs_rank";
                $OldRank = "defs_old_rank";
            break;
            case 5:
                $Order   = "fleet_rank";
                $Points  = "fleet_points";
                $Rank    = "fleet_rank";
                $OldRank = "fleet_old_rank";
            break;
			case 6:
                $Order   = "achiev_rank";
                $Points  = "achiev_points";
                $Rank    = "achiev_rank";
                $OldRank = "achiev_old_rank";
            break;
			case 7:
                $Order   = "total_rank";
                $Points  = "total_points";
                $Rank    = "total_rank";
                $OldRank = "total_old_rank";
            break;
            default:
                $Order   = "warpoint_rank";
                $Points  = "warpoint_points";
                $Rank    = "warpoint_rank";
                $OldRank = "warpoint_old_rank";
            break;
        }

        $RangeList  = array();

		$db 	= Database::get();
		$config	= Config::get();
		
		$sql	= "SELECT user.*, stat.total_points, stat.defs_points, stat.fleet_points FROM %%USERS%% as user LEFT JOIN %%STATPOINTS%% as stat ON stat.id_owner = user.id WHERE user.id = :userId AND stat.stat_type = 1;";
		$CurrentUserPoints	= $db->selectSingle($sql, array(
			':userId'	=> $USER['id']
		));
		
		$sql =  "SELECT nextTime FROM %%CRONJOBS%% WHERE cronjobID = :cronId;";
		$nextTime = $db->selectSingle($sql, array(
			':cronId'			=> 2
		), 'nextTime');

        switch($who)
        {
            case 1:
                $MaxUsers 	= $config->users_amount;
                $range		= min($range, $MaxUsers);
                $LastPage 	= max(1, ceil($MaxUsers / 100));

                for ($Page = 0; $Page < $LastPage; $Page++)
                {
                    $PageValue      				= ($Page * 100) + 1;
                    $PageRange      				= $PageValue + 99;
                    $Selector['range'][$PageValue] 	= $PageValue."-".$PageRange;
                }

                $start = max(floor(($range - 1) / 100) * 100, 0);

				if ($config->stat == 2) {
					$sql = "SELECT DISTINCT s.*, u.id, u.username, u.ally_id, u.commanderLevel, u.banaday, u.urlaubs_modus, u.onlinetime, a.ally_name, usett.displayname FROM %%STATPOINTS%% as s
					INNER JOIN %%USERS%% as u ON u.id = s.id_owner
					INNER JOIN %%USETT%% as usett ON u.id = usett.id
					LEFT JOIN %%ALLIANCE%% as a ON a.id = s.id_ally
					WHERE s.universe = :universe AND s.stat_type = 1 AND u.authlevel < :authLevel
					ORDER BY ".$Order." ASC LIMIT :offset, :limit;";
					$query = $db->select($sql, array(
						':universe'	=> Universe::current(),
						':authLevel'=> $config->stat_level,
						':offset'	=> $start,
						':limit'	=> 100,
					));
				} else {
					$sql = "SELECT DISTINCT s.*, u.id, u.username, u.ally_id, u.commanderLevel, u.banaday, u.urlaubs_modus, u.onlinetime, a.ally_name, usett.displayname FROM %%STATPOINTS%% as s
					INNER JOIN %%USERS%% as u ON u.id = s.id_owner
					INNER JOIN %%USETT%% as usett ON u.id = usett.id
					LEFT JOIN %%ALLIANCE%% as a ON a.id = s.id_ally
					WHERE s.universe = :universe AND s.stat_type = 1
					ORDER BY ".$Order." ASC LIMIT :offset, :limit;";
					$query = $db->select($sql, array(
						':universe'	=> Universe::current(),
						':offset'	=> $start,
						':limit'	=> 100,
					));
				}

				$RangeList	= array();
			
                foreach ($query as $StatRow)
                {
					
					$sqld =  "SELECT * FROM %%ENNEMIES%% WHERE playerId = :playerId AND ennemiePid = :ennemiePid;";
					$isEnnemie = $db->selectSingle($sqld, array(
						':playerId'		=> $USER['id'],
						':ennemiePid'	=> $StatRow['id'],
					));
					
					$sql =  "SELECT * FROM %%BUDDY%% WHERE (sender = :userID AND owner = :targetID) OR (sender = :targetID AND owner = :userID);";
					$isFriend = $db->selectSingle($sql, array(
						':userID'		=> $USER['id'],
						':targetID'		=> $StatRow['id']
					));
					
					$IsNoobProtec		= CheckNoobProtec($CurrentUserPoints, $StatRow, $StatRow);
					$Class				= "";
					$displayShort		= "";
					
					//SHORT TAGS
					if ($StatRow['urlaubs_modus'] == 1)
					{
						//$Class		 	= "gl-username-vacation";
						$displayShort	.= '<span class="gl-short gl-short-vacation">'.$LNG['gl_short_vacation'].'</span>';
					}
					if (!empty($isEnnemie))
					{
						//$Class		 	= "gl-username-longinactive";
						$displayShort	.= ' <span class="gl-short gl-short-enemie">'.$LNG['statis_2'].'</span> ';
					}elseif (!empty($isFriend))
					{
						//$Class		 	= "gl-username-longinactive";
						$displayShort	.= ' <span class="gl-short gl-short-friend">'.$LNG['statis_3'].'</span> ';
					}
					if ($StatRow['onlinetime'] < TIMESTAMP - 2419200)
					{
						//$Class		 	= "gl-username-longinactive";
						$displayShort	.= '<span class="gl-short gl-short-longinactive">'.$LNG['gl_short_long_inactive'].'</span> ';
					}
					if ($StatRow['onlinetime'] < TIMESTAMP - 604800)
					{
						//$Class		 	= "gl-username-inactive";
						$displayShort	.= '<span class="gl-short gl-short-inactive">'.$LNG['gl_short_inactive'].'</span> ';
					}
					if ($IsNoobProtec['NoobPlayer'])
					{
						//$Class		 	= "gl-username-noob";
						$displayShort	.= '<span class="gl-short gl-short-noob">'.$LNG['gl_short_newbie'].'</span> ';
					}
					elseif ($IsNoobProtec['StrongPlayer'])
					{
						//$Class		 	= "gl-username-strong";
						$displayShort	.= '<span class="gl-short gl-short-strong">'.$LNG['gl_short_strong'].'</span> ';
					}
					//END SHORT TAGS
					
					//USERNAME COLOR
					if ($StatRow['urlaubs_modus'] == 1)
					{
						$Class		 	= " gl-username-vacation";
						//$displayShort	.= '<span class="gl-short gl-short-vacation">i</span>';
					}elseif (!empty($isEnnemie))
					{
						$Class		 	= " gl-username-enemie";
						//$displayShort	.= '<span class="gl-short gl-short-enemie">'.$LNG['gl_short_enemy'].'</span>';
					}elseif (!empty($isFriend))
					{
						$Class		 	= " gl-username-friend";
						//$displayShort	.= ' <span class="gl-short gl-short-friend">f</span> ';
					}elseif ($StatRow['onlinetime'] < TIMESTAMP - 2419200)
					{
						$Class		 	= " gl-username-longinactive";
						//$displayShort	.= '<span class="gl-short gl-short-longinactive">I</span>';
					}elseif ($StatRow['onlinetime'] < TIMESTAMP - 604800)
					{
						$Class		 	= " gl-username-inactive";
						//$displayShort	.= '<span class="gl-short gl-short-inactive">i</span>';
					}elseif ($IsNoobProtec['NoobPlayer'])
					{
						$Class		 	= " gl-username-noob";
						//$displayShort	.= '<span class="gl-short gl-short-noob">n</span>';
					}
					elseif ($IsNoobProtec['StrongPlayer'])
					{
						$Class		 	= " gl-username-strong";
						//$displayShort	.= '<span class="gl-short gl-short-strong">s</span>';
					}
					
					//END USERNAME COLOR
                    $RangeList[]	= array(
                        'id'			=> $StatRow['id'],
                        'name'			=> $StatRow['displayname'],
                        'commanderLevel'=> $StatRow['commanderLevel'],
                        'points'		=> pretty_number($StatRow[$Points]),
                        'allyid'		=> $StatRow['ally_id'],
                        'rank'			=> $StatRow[$Rank],
                        'allyname'		=> $StatRow['ally_name'],
                        'ranking'		=> $StatRow[$OldRank] - $StatRow[$Rank],
						'class'			=> $Class,
						'displayShort'	=> empty($displayShort) ? "" : "(".$displayShort.")",
                    );
                }

            break;
            case 2:
                $sql = "SELECT COUNT(*) as state FROM %%ALLIANCE%% WHERE `ally_universe` = :universe;";
				$MaxAllys = $db->selectSingle($sql, array(
					':universe'	=> Universe::current(),
				), 'state');

				$range		= min($range, $MaxAllys);
                $LastPage 	= max(1, ceil($MaxAllys / 100));
				
                for ($Page = 0; $Page < $LastPage; $Page++)
                {
                    $PageValue      				= ($Page * 100) + 1;
                    $PageRange      				= $PageValue + 99;
                    $Selector['range'][$PageValue] 	= $PageValue."-".$PageRange;
                }

                $start = max(floor(($range - 1) / 100) * 100, 0);

                $sql = 'SELECT DISTINCT s.*, a.id, a.ally_members, a.allianceLevel, a.ally_name FROM %%STATPOINTS%% as s
                INNER JOIN %%ALLIANCE%% as a ON a.id = s.id_owner
                WHERE universe = :universe AND stat_type = 2
                ORDER BY '.$Order.' ASC LIMIT :offset, :limit;';
				$query = $db->select($sql, array(
					':universe'	=> Universe::current(),
					':offset'	=> $start,
					':limit'	=> 100,
				));

				foreach ($query as $StatRow)
                {
                    $RangeList[]	= array(
                        'id'		=> $StatRow['id'],
                        'name'		=> $StatRow['ally_name'],
                        'members'	=> $StatRow['ally_members'],
                        'allianceLevel'	=> $StatRow['allianceLevel'],
                        'rank'		=> $StatRow[$Rank],
                        'mppoints'	=> pretty_number(floor($StatRow[$Points] / $StatRow['ally_members'])),
                        'points'	=> pretty_number($StatRow[$Points]),
                        'ranking'	=> $StatRow[$OldRank] - $StatRow[$Rank],
                    );
                }

            break;
        }

        $Selector['who'] 	= array(1 => $LNG['st_player'], 2 => $LNG['st_alliance']);
        $Selector['type']	= array(1 => $LNG['st_points'], 2 => $LNG['st_fleets'], 3 => $LNG['st_researh'], 4 => $LNG['st_buildings'], 5 => $LNG['st_defenses']);


		require_once 'includes/classes/Cronjob.class.php';

        $this->assign(array(
            'Selectors'				=> $Selector,
            'who'					=> $who,
            'type'					=> $type,
            'range'					=> floor(($range - 1) / 100) * 100 + 1,
            'RangeList'				=> $RangeList,
            'CUser_ally'			=> $USER['ally_id'],
            'CUser_id'				=> $USER['id'],
			'nextStatUpdate' 		=> abs(TIMESTAMP - $nextTime),
            'stat_date'				=> _date($LNG['php_tdformat'], Cronjob::getLastExecutionTime('statistic'), $USER['timezone']),
        ));

        $this->display('page.statistics.default.tpl');
    }
}