<?php

define('MODE', 'AJAX');
define('ROOT_PATH', str_replace('\\', '/',dirname(__FILE__)).'/');
set_include_path(ROOT_PATH);

require 'includes/common_ajax.php';

$sql	= 'SELECT * FROM %%USERS%% WHERE universe = :universe AND onlinetime > :onlineTime';
$onlineData	= databaseajax::get()->select($sql, array(
	':universe'		=> 1,
	':onlineTime'	=> TIMESTAMP - 15 * 60
));
	
echo count($onlineData);
