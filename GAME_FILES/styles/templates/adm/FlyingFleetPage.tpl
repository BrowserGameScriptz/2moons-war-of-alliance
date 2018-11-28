{include file="overall_header.tpl"}
{include file="overall_menu.tpl"}
 <!-- START PAGE CONTAINER -->
                    <div class="container">

                        <div class="block block-condensed">
                            <!-- START HEADING -->
                            <div class="app-heading app-heading-small">
                                <div class="title">
                                    <h5>Flying Fleets</h5>
                                </div>
                            </div>
                            <!-- END HEADING -->
                            
                            <div class="block-content">
                                
                                <table class="table table-striped table-bordered datatable-extended">
                                    <thead>
                                        <tr>
                                            <th>{$LNG.ff_fleetid}</th>
											<th>{$LNG.ff_mission}</th>
											<th>{$LNG.ff_starttime}</th>
											<th>{$LNG.ff_ships}</th>
											<th>{$LNG.ff_startuser}</th>
											<th>{$LNG.ff_startplanet}</th>
											<th>{$LNG.ff_arrivaltime}</th>
											<th>{$LNG.ff_targetuser}</th>
											<th>{$LNG.ff_targetplanet}</th>
											<th>{$LNG.ff_endtime}</th>
											<th>{$LNG.ff_holdtime}</th>
											<th>{$LNG.ff_lock}</th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                        {foreach $FleetList as $FleetRow}
										<tr>
											<td>{$FleetRow.fleetID}</td>
											<td><a href="#" data-tooltip-content="<table style='width:200px'>{foreach $FleetRow.resource as $resourceID => $resourceCount}<tr><td style='width:50%'>{$LNG.tech.$resourceID}</td><td style='width:50%'>{$resourceCount|number}</td></tr>{/foreach}</table>" class="tooltip">{$LNG.type_mission.{$FleetRow.missionID}}{if $FleetRow.acsID != 0}<br>{$FleetRow.acsID}<br>{$FleetRow.acsName}{/if}&nbsp;(R)</a></td>
											<td>{$FleetRow.starttime}</td>
											<td><a href="#" data-tooltip-content="<table style='width:200px'>{foreach $FleetRow.ships as $shipID => $shipCount}<tr><td style='width:50%'>{$LNG.tech.$shipID}</td><td style='width:50%'>{$shipCount|number}</td></tr>{/foreach}</table>" class="tooltip">{$FleetRow.count|number}&nbsp;(D)</a></td>
											<td>{$FleetRow.startUserName} (ID:&nbsp;{$FleetRow.startUserID})</td>
											<td>{$FleetRow.startPlanetName}&nbsp;[{$FleetRow.startPlanetGalaxy}:{$FleetRow.startPlanetSystem}:{$FleetRow.startPlanetPlanet}] (ID:&nbsp;{$FleetRow.startPlanetID})</td>
											<td>{if $FleetRow.state == 0}<span style="color:lime;">{/if}{$FleetRow.arrivaltime}{if $FleetRow.state == 0}</span>{/if}</td>
											<td>{if $FleetRow.targetUserID != 0}{$FleetRow.targetUserName} (ID:&nbsp;{$FleetRow.targetUserID}){/if}</td>
											<td>{$FleetRow.targetPlanetName}&nbsp;[{$FleetRow.targetPlanetGalaxy}:{$FleetRow.targetPlanetSystem}:{$FleetRow.targetPlanetPlanet}]{if $FleetRow.targetPlanetID != 0} (ID:&nbsp;{$FleetRow.targetPlanetID}){/if}</td>
											<td>{if $FleetRow.state == 1}<span style="color:lime;">{/if}{$FleetRow.endtime}{if $FleetRow.state == 0}</span>{/if}</td>
											<td>{if $FleetRow.stayhour != 0}{if $FleetRow.state == 2}<span style="color:lime;">{/if}{$FleetRow.staytime} ({$FleetRow.stayhour}&nbsp;h){if $FleetRow.state == 0}</span>{/if}{else}-{/if}</td>
											<td><a href="admin.php?page=fleets&amp;id={$FleetRow.fleetID}&amp;lock={if $FleetRow.lock}0" style="color:lime">{$LNG.ff_unlock}{elseif $FleetRow.error}2" style="color:red">{$LNG.ff_del}{else}1" style="color:red">{$LNG.ff_lock}{/if}</a></td>
										</tr>
										{foreachelse}
										<tr>
											<td colspan="12"><center>{$LNG.ff_no_fleets}</center></td>
										</tr>
										{/foreach}                                           
                                    </tbody>
                                </table>
                                
                            </div>
                            
                        </div>
                        
                    </div>
                    <!-- END PAGE CONTAINER -->
                    
                </div>
                <!-- END APP CONTENT -->
                                
            </div>
            <!-- END APP CONTAINER -->
		<!-- IMPORTANT SCRIPTS -->
        <script type="text/javascript" src="https://cdn.makeyourgame.pro/admin/js/vendor/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.makeyourgame.pro/admin/js/vendor/jquery/jquery-migrate.min.js"></script>
        <script type="text/javascript" src="https://cdn.makeyourgame.pro/admin/js/vendor/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="https://cdn.makeyourgame.pro/admin/js/vendor/bootstrap/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdn.makeyourgame.pro/admin/js/vendor/moment/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.makeyourgame.pro/admin/js/vendor/customscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <!-- END IMPORTANT SCRIPTS -->
        <!-- THIS PAGE SCRIPTS -->
		<script type="text/javascript" src="https://cdn.makeyourgame.pro/admin/js/vendor/datatables/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="https://cdn.makeyourgame.pro/admin/js/vendor/datatables/dataTables.bootstrap.min.js"></script>
		<!-- END THIS PAGE SCRIPTS -->			
        <!-- APP SCRIPTS -->
        <script type="text/javascript" src="https://cdn.makeyourgame.pro/admin/js/app.js"></script>
        <script type="text/javascript" src="https://cdn.makeyourgame.pro/admin/js/app_plugins.js"></script>
        <script type="text/javascript" src="https://cdn.makeyourgame.pro/admin/js/app_demo.js"></script>
        <!-- END APP SCRIPTS -->
        <script type="text/javascript" src="https://cdn.makeyourgame.pro/admin/js/app_demo_dashboard.js"></script>
{include file="overall_footer.tpl"}