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

class PlayerUtil
{
	static public function cryptPassword($action, $password)
	{
		$output = false;

		$encrypt_method = "AES-256-CBC";
		$secret_key = 'tJIf0jxbPX';
		$secret_iv = 'MeIAknxcdm';

		// hash
		$key = hash('sha256', $secret_key);
		
		// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		$iv = substr(hash('sha256', $secret_iv), 0, 16);

		if( $action == 'encrypt' ) {
			$output = openssl_encrypt($password, $encrypt_method, $key, 0, $iv);
			$output = base64_encode($output);
		}
		else if( $action == 'decrypt' ){
			$output = openssl_decrypt(base64_decode($password), $encrypt_method, $key, 0, $iv);
		}

		return $output;
	}

	static public function isNameValid($name)
	{
		if(UTF8_SUPPORT) {
			return preg_match('/^[\p{L}\p{N}_\-. ]*$/u', $name);
		} else {
			return preg_match('/^[A-z0-9_\-. ]*$/', $name);
		}
	}

	static public function isMailValid($address) {
		
		if(function_exists('filter_var')) {
			return filter_var($address, FILTER_VALIDATE_EMAIL) !== FALSE;
		} else {
			return preg_match('^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$', $address);
		}
	}
	
	static public function createPlayer($universe, $userName, $userPassword, $userMail, $userLanguage = NULL, $displayname, $secretQuestion, $secretAnswer, $birthday, $referalId, $authlevel = 0, $userIpAddress = NULL)
	{
		$config	= Config::get($universe);
		$params			= array(
			':username'				=> $userName,
			':email'				=> $userMail,
			':email2'				=> $userMail,
			':authlevel'			=> $authlevel,
			':universe'				=> $universe,
			':language'				=> $userLanguage,
			':registerAddress'		=> !empty($userIpAddress) ? $userIpAddress : Session::getClientIp(),
			':onlinetime'			=> TIMESTAMP,
			':registerTimestamp'	=> TIMESTAMP,
			':password'				=> $userPassword,
			':dpath'				=> DEFAULT_THEME,
			':timezone'				=> $config->timezone,
			':ref_id'				=> $referalId,
			':securityCode'			=> md5(uniqid('2m')),
			':nameLastChanged'		=> 0,
		);

		$sql = 'INSERT INTO %%USERS%% SET
		username		= :username,
		email			= :email,
		email_2			= :email2,
		authlevel		= :authlevel,
		universe		= :universe,
		lang			= :language,
		ip_at_reg		= :registerAddress,
		onlinetime		= :onlinetime,
		register_time	= :registerTimestamp,
		password		= :password,
		dpath			= :dpath,
		timezone		= :timezone,
		ref_id			= :ref_id,
		securityCode	= :securityCode,
		uctime			= :nameLastChanged;';

		$db = Database::get();

		$db->insert($sql, $params);
		
		$params			= array(
			':displayname'		=> $displayname,
			':secretQuestion'	=> $secretQuestion,
			':secretAnswer'		=> $secretAnswer,
			':securityEncodage'	=> md5(uniqid('2m')),
			':birthday'			=> $birthday,
		);

		$sql = 'INSERT INTO %%USETT%% SET
		displayname		= :displayname,
		secretQuestion	= :secretQuestion,
		secretAnswer	= :secretAnswer,
		securityEncodage= :securityEncodage,
		birthday		= :birthday;';

		$db = Database::get();

		$db->insert($sql, $params);
		
		$userId		= $db->lastInsertId();
				
		$currentUserAmount		= $config->users_amount + 1;
		$config->users_amount	= $currentUserAmount;

		$config->save();

		return $userId;
	}
	
	static public function deletePlayer($userId)
	{
		if(ROOT_USER == $userId)
		{
			// superuser can not be deleted.
			throw new Exception("Superuser #".ROOT_USER." can't be deleted!");
		}

		$db			= Database::get();
		$sql		= 'SELECT universe, ally_id FROM %%USERS%% WHERE id = :userId;';
		$userData	= $db->selectSingle($sql, array(
			':userId'	=> $userId
		));

		if (empty($userData))
		{
			return false;
		}

		if (!empty($userData['ally_id']))
		{
			$sql			= 'SELECT ally_members FROM %%ALLIANCE%% WHERE id = :allianceId;';
			$memberCount	= $db->selectSingle($sql, array(
				':allianceId'	=> $userData['ally_id']
			), 'ally_members');
			
			if ($memberCount > 1)
			{
				$sql	= 'UPDATE %%ALLIANCE%% SET ally_members = ally_members - 1 WHERE id = :allianceId;';
				$db->update($sql, array(
					':allianceId'	=> $userData['ally_id']
				));
			}
			else
			{
				$sql	= 'DELETE FROM %%ALLIANCE%% WHERE id = :allianceId;';
				$db->delete($sql, array(
					':allianceId'	=> $userData['ally_id']
				));

				$sql	= 'DELETE FROM %%STATPOINTS%% WHERE stat_type = :type AND id_owner = :allianceId;';
				$db->delete($sql, array(
					':allianceId'	=> $userData['ally_id'],
					':type'			=> 2
				));

				$sql	= 'UPDATE %%STATPOINTS%% SET id_ally = :resetId WHERE id_ally = :allianceId;';
				$db->update($sql, array(
				  	':allianceId'	=> $userData['ally_id'],
				  	':resetId'		=> 0
			 	));
			}
		}

		$sql	= 'DELETE FROM %%ALLIANCE_REQUEST%% WHERE userID = :userId;';
		$db->delete($sql, array(
			':userId'	=> $userId
	 	));

		$sql	= 'DELETE FROM %%BUDDY%% WHERE owner = :userId OR sender = :userId;';
		$db->delete($sql, array(
			':userId'	=> $userId
		));

		$sql	= 'DELETE %%FLEETS%%, %%FLEETS_EVENT%%
		FROM %%FLEETS%% LEFT JOIN %%FLEETS_EVENT%% on fleet_id = fleetId
		WHERE fleet_owner = :userId;';
		$db->delete($sql, array(
			':userId'	=> $userId
		));

		$sql	= 'DELETE FROM %%MESSAGES%% WHERE message_owner = :userId;';
		$db->delete($sql, array(
			':userId'	=> $userId
		));

		$sql	= 'DELETE FROM %%NOTES%% WHERE owner = :userId;';
		$db->delete($sql, array(
			':userId'	=> $userId
		));

		$sql	= 'DELETE FROM %%PLANETS%% WHERE id_owner = :userId;';
		$db->delete($sql, array(
		   	':userId'	=> $userId
	  	));

		$sql	= 'DELETE FROM %%USERS%% WHERE id = :userId;';
		$db->delete($sql, array(
			':userId'	=> $userId
		));

		$sql	= 'DELETE FROM %%STATPOINTS%% WHERE stat_type = :type AND id_owner = :userId;';
		$db->delete($sql, array(
			':userId'	=> $userId,
			':type'		=> 1
		));
		
		$fleetIds	= $db->select('SELECT fleet_id FROM %%FLEETS%% WHERE fleet_target_owner = :userId;', array(
			':userId'	=> $userId
		));

		foreach($fleetIds as $fleetId)
		{
			FleetFunctions::SendFleetBack(array('id' => $userId), $fleetId['fleet_id']);
		}

        /*
		$sql	= 'UPDATE %%UNIVERSE%% SET userAmount = userAmount - 1 WHERE universe = :universe;';
		$db->update($sql, array(
			':universe' => $userData['universe']
		));
		
		Cache::get()->flush('universe');
        */

		return true;
	}
}
