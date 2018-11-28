{include file="main.header.tpl" bodyclass="full"}
{include file="main.navigation.tpl"}
{include file="main.topnav.tpl"}
{block name="content"}{/block}
{foreach $cronjobs as $cronjob}<img src="cronjob.php?cronjobID={$cronjob}" alt="">{/foreach}
{include file="main.footer.tpl" nocache}