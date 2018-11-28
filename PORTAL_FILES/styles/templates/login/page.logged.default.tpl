<div class="membership-holder">
  		<div class="membership-bar">           
            	<!-- Logged In -->
     			<div class="logged_in_bar member-side-left">
					<div class="logged_in_bar_bg">
						
						<div class="logout-btn-cont">
							<a id="logout" href="index.php?page=logout"><span></span><p></p></a>
						</div>
						
						<div class="avatar"><span></span><a href="index.php?page=avatars" style="background-image:url(./styles/resource/avatars/{$ShowUser.avatar}); no-repeat background-size: 100%;"></a></div>
		   
						<div class="info">
							<p>Welcome back, <font style="font-size: 13px;" color="#bf873f"><a href="index.php?page=account" class="username">{$ShowUser.username}</a></font>!</p>
							{*<div class="coints">
								<span id="gold_str">0</span> Gold &amp; 
								<span id="silver_str">0</span> Silver Coins
							</div>*}
						</div>
		   
						<ul class="acc-menu">
							<li class="go_ingame"><div></div></li><li><a id="acc-panel" href="index.php?page=play"><span></span><p></p></a></li>
							{*<li class="not-voted-yet-effect"><div></div></li>*}<li><a id="vote" href="index.php?page=vote"><span></span><p></p></a></li>
							<li><a id="buy-coins" href="index.php?page=account"><span></span><p></p></a></li>
							<li><a id="store" href="index.php?page=settings"><span></span><p></p></a></li>
						</ul>
					</div>
				</div>
            	<!-- Logged In.End -->
			<div class="memeber-side-right">
				<div class="bonus-m-links">
					{*<a href="#">Frequently Asked Questions</a>
					<a href="#">Connection Guide</a>*}
				</div>
				<div class="search" align="left">
					<form action="#" method="get" id="search">
						<input name="keywords" maxlength="128" title="{$LNG.custom_p13}" placeholder="{$LNG.custom_p13}" type="text"><input value="" type="submit">
<input value="search" name="page" type="hidden">
					</form>
				</div>
			</div>
			
		</div>
	</div>