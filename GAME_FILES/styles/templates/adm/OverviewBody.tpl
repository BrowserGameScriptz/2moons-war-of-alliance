{include file="overall_header.tpl"}
{include file="overall_menu.tpl"}
<!-- PAGE TEMPLATE'S CONTENT START -->
    <div id="content" class="container-fluid">
        <div growl limit-messages="1"></div>

<div class="row">
    <div id="main" class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
        

<div ng-controller="applicationListController">

    <div id="boxes" application-list-filter search-text="searchText" collapsed-groups="collapsedGroups">
        <div drop-area drop="handleDrop" id="top-drop-area" class="drop-area"></div>
        
        <div id="server-container">
            <div id="server-group" data-group-name="server" class="panel panel-widget icon-menu-section" role="category">
                <div class="panel-heading widget-heading" ng-dblclick="toggleGroup(server)">
                    <span id="server-header" class="group-header">Website Settings</span>
                    <span id="server-collapsed-indicator" class="ng-cloak group-header-indicator pull-right fa fa-minus"
                        ng-click='toggleGroup("server")' data-collapsed-indicator></span>
                </div>
                <div id="server-body" data-group-body="server" class="panel-body widget-collapsible ">
                    <div class="icon-container-body">
                        <div class="item" data-item-group="server">
                            <a id="icon-website" class="itemImageWrapper integrations_icon spriteicon_img icon-website" href="?page=generalset"></a>
							<a id="item_website" class="itemTextWrapper link" href="?page=generalset">General <small>(done)</small></a>
                        </div>
						<div class="item" data-item-group="server">
                            <a id="icon-meta" class="itemImageWrapper integrations_icon spriteicon_img icon-meta" href="?page=metaset"></a>
							<a id="item_meta" class="itemTextWrapper link" href="?page=metaset">Site Meta <small>(done)</small></a>
                        </div> 
						<div class="item" data-item-group="server">
                            <a id="icon-socialset" class="itemImageWrapper integrations_icon spriteicon_img icon-socialset" href="cpanelpro/social.html"></a>
							<a id="item_socialset" class="itemTextWrapper link" href="cpanelpro/social.html">Social Settings</a>
                        </div>
						<div class="item" data-item-group="server">
                            <a id="icon-social_login" class="itemImageWrapper integrations_icon spriteicon_img icon-social_login" href="#"></a>
							<a id="item_social_login" class="itemTextWrapper link" href="#">Social Login Settings</a>
                        </div>
                    </div>
                </div>
            </div>
            <div drop-area drop="handleDrop" data-group-name="server" id="server-drop-area" class="drop-area"></div>
        </div>
        
        <div id="games-container">
            <div id="games-group" data-group-name="games" class="panel panel-widget icon-menu-section" role="category">
                <div class="panel-heading widget-heading" ng-dblclick="toggleGroup(games)">
                    <span id="games-header" class="group-header">Game Settings</span>
                    <span id="games-collapsed-indicator" class="ng-cloak group-header-indicator pull-right fa fa-minus"
                        ng-click='toggleGroup("games")' data-collapsed-indicator></span>
                </div>
                <div id="games-body" data-group-body="games" class="panel-body widget-collapsible ">
                    <div class="icon-container-body">
						<div class="item" data-item-group="games">
                            <a id="icon-universe" class="itemImageWrapper integrations_icon spriteicon_img icon-universe" href="?page=universeset"></a>
							<a id="item_universe" class="itemTextWrapper link" href="?page=universeset">Univers Settings <small>(done)</small></a>
                        </div>
						<div class="item" data-item-group="games">
                            <a id="icon-architect" class="itemImageWrapper integrations_icon spriteicon_img icon-architect" href="?page=queuset"></a>
							<a id="item_architect" class="itemTextWrapper link" href="?page=queuset">Queue Settings <small>(done)</small></a>
                        </div>
						<div class="item" data-item-group="games">
                            <a id="icon-referal" class="itemImageWrapper integrations_icon spriteicon_img icon-referal" href="?page=referalset"></a>
							<a id="item_referal" class="itemTextWrapper link" href="?page=referalset">Referal Settings <small>(done)</small></a>
                        </div>
						<div class="item" data-item-group="games">
                            <a id="icon-colonies" class="itemImageWrapper integrations_icon spriteicon_img icon-colonies" href="?page=colonyset"></a>
							<a id="item_colonies" class="itemTextWrapper link" href="?page=colonyset">Colonisation Settings <small>(done)</small></a>
                        </div>
						<div class="item" data-item-group="games">
                            <a id="icon-planet_set" class="itemImageWrapper integrations_icon spriteicon_img icon-planet_set" href="?page=planetset"></a>
							<a id="item_planet_set" class="itemTextWrapper link" href="?page=planetset">Planet Settings <small>(done)</small></a>
                        </div>
						<div class="item" data-item-group="games">
                            <a id="icon-debris" class="itemImageWrapper integrations_icon spriteicon_img icon-debris" href="?page=debrisset"></a>
							<a id="item_debris" class="itemTextWrapper link" href="?page=debrisset">Debris Settings <small>(done)</small></a>
                        </div>
						<div class="item" data-item-group="games">
                            <a id="icon-newbie" class="itemImageWrapper integrations_icon spriteicon_img icon-newbie" href="?page=noobset"></a>
							<a id="item_newbie" class="itemTextWrapper link" href="?page=noobset">Noob Settings <small>(done)</small></a>
                        </div>
						{*<div class="item" data-item-group="games">
                            <a id="icon-proxy" class="itemImageWrapper integrations_icon spriteicon_img icon-proxy" href="?page=proxyset"></a>
							<a id="item_proxy" class="itemTextWrapper link" href="?page=proxyset">Proxy Settings</a>
                        </div>*}
						<div class="item" data-item-group="games">
                            <a id="icon-module" class="itemImageWrapper integrations_icon spriteicon_img icon-module" href="?page=module"></a>
							<a id="item_module" class="itemTextWrapper link" href="?page=module">Module Settings <small>(done)</small></a>
                        </div>
						<div class="item" data-item-group="games">
                            <a id="icon-stastic" class="itemImageWrapper integrations_icon spriteicon_img icon-stastic" href="?page=statsconf"></a>
							<a id="item_stastic" class="itemTextWrapper link" href="?page=statsconf">Statistics Settings <small>(done)</small></a>
                        </div>
						<div class="item" data-item-group="games">
                            <a id="icon-cron" class="itemImageWrapper integrations_icon spriteicon_img icon-cron" href="?page=cronjob"></a>
							<a id="item_cron" class="itemTextWrapper link" href="?page=cronjob">Cronjob Settings</a>
                        </div>
						<div class="item" data-item-group="games">
                            <a id="icon-various" class="itemImageWrapper integrations_icon spriteicon_img icon-various" href="?page=variousset"></a>
							<a id="item_various" class="itemTextWrapper link" href="?page=variousset">Various Settings  <small>(done)</small></a>
                        </div>
                    </div>
                </div>
            </div>
            <div drop-area drop="handleDrop" data-group-name="games" id="games-drop-area" class="drop-area"></div>
        </div>
        
        <div id="support-container">
            <div id="support-group" data-group-name="support" class="panel panel-widget icon-menu-section" role="category">
                <div class="panel-heading widget-heading" ng-dblclick="toggleGroup(support)">
                    <span id="support-header" class="group-header">Support System</span>
                    <span id="support-collapsed-indicator" class="ng-cloak group-header-indicator pull-right fa fa-minus"
                        ng-click='toggleGroup("support")' data-collapsed-indicator></span>
                </div>
                <div id="support-body" data-group-body="support" class="panel-body widget-collapsible ">
                    <div class="icon-container-body">
						<div class="item" data-item-group="support">
                            <a id="icon-suport_open" class="itemImageWrapper integrations_icon spriteicon_img icon-suport_open" href="#"></a>
							<a id="item_suport_open" class="itemTextWrapper link" href="#">New Tickets</a>
                        </div>
						<div class="item" data-item-group="support">
                            <a id="icon-suport_halt" class="itemImageWrapper integrations_icon spriteicon_img icon-suport_halt" href="#"></a>
							<a id="item_suport_halt" class="itemTextWrapper link" href="#">Pending Tickets</a>
                        </div>	
						<div class="item" data-item-group="support">
                            <a id="icon-suport_all" class="itemImageWrapper integrations_icon spriteicon_img icon-suport_all" href="#"></a>
							<a id="item_suport_all" class="itemTextWrapper link" href="#">All Tickets</a>
                        </div>	
                    </div>
                </div>
            </div>
            <div drop-area drop="handleDrop" data-group-name="support" id="support-drop-area" class="drop-area"></div>
        </div>
        
        <div id="various-container">
            <div id="various-group" data-group-name="various" class="panel panel-widget icon-menu-section" role="category">
                <div class="panel-heading widget-heading" ng-dblclick="toggleGroup(various)">
                    <span id="various-header" class="group-header">Various</span>
                    <span id="various-collapsed-indicator" class="ng-cloak group-header-indicator pull-right fa fa-minus"
                        ng-click='toggleGroup("various")' data-collapsed-indicator></span>
                </div>
                <div id="various-body" data-group-body="various" class="panel-body widget-collapsible ">
                    <div class="icon-container-body">
                        <div class="item" data-item-group="various">
                            <a id="icon-user_list" class="itemImageWrapper integrations_icon spriteicon_img icon-user_list" href="?page=playerlist"></a>
							<a id="item_user_list" class="itemTextWrapper link" href="?page=playerlist">Player List</a>
                        </div>
						<div class="item" data-item-group="various">
                            <a id="icon-planet_list" class="itemImageWrapper integrations_icon spriteicon_img icon-planet_list" href="?page=planetlist"></a>
							<a id="item_planet_list" class="itemTextWrapper link" href="?page=planetlist">Planet List</a>
                        </div>	
						<div class="item" data-item-group="various">
                            <a id="icon-login" class="itemImageWrapper integrations_icon spriteicon_img icon-login" href="?page=planetalist"></a>
							<a id="item_login" class="itemTextWrapper link" href="?page=planetalist">Planet List (Active)</a>
                        </div>	
						<div class="item" data-item-group="various">
                            <a id="icon-messages" class="itemImageWrapper integrations_icon spriteicon_img icon-messages" href="?page=messagelist"></a>
							<a id="item_messages" class="itemTextWrapper link" href="?page=messagelist">Message List <small>(done)</small></a>
                        </div>
						<div class="item" data-item-group="various">
                            <a id="icon-multi" class="itemImageWrapper integrations_icon spriteicon_img icon-multi" href="#"></a>
							<a id="item_multi" class="itemTextWrapper link" href="?page=metaset">Multi Detector</a>
                        </div>
						<div class="item" data-item-group="various">
                            <a id="icon-tracking" class="itemImageWrapper integrations_icon spriteicon_img icon-tracking" href="?page=tracking"></a>
							<a id="item_tracking" class="itemTextWrapper link" href="?page=tracking">Tracking Module</a>
                        </div>
						<div class="item" data-item-group="various">
                            <a id="icon-translate" class="itemImageWrapper integrations_icon spriteicon_img icon-translate" href="?page=translate"></a>
							<a id="item_translate" class="itemTextWrapper link" href="?page=translate">Translation Help</a>
                        </div>
						<div class="item" data-item-group="various">
                            <a id="icon-clearcache" class="itemImageWrapper integrations_icon spriteicon_img icon-clearcache" href="?page=clearcache"></a>
							<a id="item_clearcache" class="itemTextWrapper link" href="?page=clearcache">Clear Cache <small>(done)</small></a>
                        </div>
                    </div>
                </div>
            </div>
            <div drop-area drop="handleDrop" data-group-name="various" id="various-drop-area" class="drop-area"></div>
        </div>
    </div>
</div>


    </div><!-- end main -->

</div>

            </div>
    <!-- PAGE TEMPLATE'S CONTENT END -->
{include file="overall_footer.tpl"}