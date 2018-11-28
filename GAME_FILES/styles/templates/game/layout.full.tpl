{include file="main.header.game.tpl" bodyclass="full"}
{block name="content"}{/block}
{foreach $cronjobs as $cronjob}<img src="cronjob.php?cronjobID={$cronjob}" alt="">{/foreach}
