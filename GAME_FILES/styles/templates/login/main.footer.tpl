<!-- Footer -->
    <div class="footer-holder">
        <div id="footer">
		
            <div class="left-side">
                <p>
                	{$LNG.custom_p12}
                </p>
            </div>
            
            <div class="right-side">
                <ul>
                	<li><a href="index.php?page=allwallpapers">{$LNG.custom_p2}</a></li>
                    <li><a href="index.php?page=allvideos">{$LNG.custom_p3}</a></li>
                    <li><a href="index.php?page=allscreenshots">{$LNG.siteTitleScreens}</a></li>
                </ul>
                
                <ul>
                	<li><a href="index.php?page=references">{$LNG.custom_p6}</a></li>
                    <li><a href="index.php?page=rules">{$LNG.siteTitleRules}</a></li>
                    <li><a href="index.php?page=terms">{$LNG.custom_p5}</a></li>
                </ul>
                
            	<ul>
                	<li><a href="index.php">{$LNG.siteTitleIndex}</a></li>
                    <li><a href="index.php?page=changelogs">{$LNG.custom_p7}</a></li>
                    <li><a href="forums/">{$LNG.forum}</a></li>
                </ul>
            </div>
            
        </div>
        <div class="bot-foot-border">
			Design by <a href="http://evil-s.deviantart.com/">EvilSystem</a><br>
		</div>

    </div>
 <!-- Footer.End -->
 </center>
 
 <div id="temp-login-form" style="display: none;">
	<div class="login-box" align="left">
		<form id="login" name="login" action="index.php?page=login" data-action="index.php?page=login" method="post">
            <input name="url_bl" id="js-login-box_urlbl" type="hidden">
            <p>{$LNG.custom_p8}</p>
            <input name="username" autocomplete="on" type="text"> <br>
            <p>{$LNG.loginPassword}</p>
            <input name="password" autocomplete="on" type="password"><br>
            <div class="login-box-row">
            	<input value="Login" type="submit">
                <label class="label_check">
                    <div></div>
                    <input value="1" id="rememberme" name="rememberme" type="checkbox">
                    <p>{$LNG.custom_p9}</p>
            	</label>
            </div>
    	</form>
    	<div class="login-box-options">
     		<a href="index.php?page=password_recovery">{$LNG.custom_p10}</a><br>
     		<span>{$LNG.custom_p11}</span>
    	</div>
  	</div>
 </div>

<script type="text/javascript" src="styles/resource/scripts/login/jquery.blueberry.js"></script>
<script type="text/javascript" src="styles/resource/scripts/login/page.homepage.js"></script>
<script type="text/javascript" src="styles/resource/scripts/login/shadowbox.js"></script>
<script type="text/javascript" src="styles/resource/scripts/login/init.custom.shadowbox.js"></script>
<script type="text/javascript" src="styles/resource/scripts/login/footer_include.js"></script>
</body>
</html>