<?php	
	define('MODE', 'LOGIN');
	define('ROOT_PATH', str_replace('\\', '/',dirname(__FILE__)).'/');
	set_include_path(ROOT_PATH);
	require 'includes/common.php';
	header("Content-type: text/css; charset: UTF-8");
	
	if(isset($_COOKIE['lang']))
		$cookieLang = $_COOKIE['lang'];
	else{
		$LNG	= new Language();
		$LNG->getUserAgentLanguage();
		$LNG->includeData(array('L18N', 'INGAME', 'PUBLIC', 'CUSTOM'));	
	}
?>
* {padding:0; margin:0; position:relative; outline: none; list-style: none; outline:none;}

BODY, HTML {
	padding: 0;
	margin:0;
	background:#090606 url(styles/resource/css/login/images/background.png) no-repeat top center;
	font-family:Arial, Helvetica, sans-serif;
	color:#FFF;
	font-size:12px;
	height:100%;
	}
	center { height:100%;}
	
	img { border: none; background-color:transparent;}
	
	/* CSS Psuedo-classes have to come one after the other in order to work: */
	a {color:rgba(117, 199, 240, 0.80);text-shadow:0 0 5px rgba(0,0,0,.4), 1px 1px 1px rgba(0,0,0,.25); text-decoration: none;}
	a:hover {color:rgba(117, 199, 240, 0.95);}
	
	/* FORM */
	form .row {width:490px; height:34px; margin: 0 0 12px 0;}
	form .textarea-row { height:auto;}
	
	.row-fix { width:550px !important;}
	
	form .row label {
	height:26px;
	padding: 10px 0 0 18px;
	display:block;
	float:left;
	font-family: 'Ebrima';
	font-weight: normal;
	font-size:14px;
	color:rgba(117,199,240,0.50);
	text-shadow:0 0 5px rgba(0,0,0,.15), 1px 0px 1px rgba(0,0,0,.25);
	}
		
	input[type="text"], input[type="password"] {
	font-family: 'Ebrima';
	font-size:14px;
	text-shadow:0 0 5px rgba(0,0,0,.15), 1px 0px 1px rgba(0,0,0,.25);
	color:rgb(19, 81, 123);
	border:none;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
	width:290px; height:32px;
	padding:0 10px 2px 10px;
	background:rgba(0,0,0,.20);
	box-shadow: inset 1px 1px 2px rgba(0,0,0,.25), inset 0 0 10px rgba(0,0,0,.10), 1px 1px 0 rgba(54,45,40,.25);
	transition: all 300ms;-moz-transition: all 300ms;-webkit-transition: all 300ms;-o-transition: all 300ms;
	}
	
	*::-webkit-input-placeholder {
	  color: rgb(21, 101, 155);
	}
	*:-moz-placeholder {
	  color: rgb(21, 101, 155);
	}
	*:-ms-input-placeholder { /* IE10+ */
	  color: rgb(21, 101, 155);
	}
	
	form .row input[type="text"], form .row input[type="password"], textarea, .customfile {float:right;}
	
	input[type="text"]:focus, input[type="password"]:focus {
	color: rgb(21, 101, 155);
	background:rgba(0,0,0,.30);
	box-shadow: inset 1px 1px 2px rgba(0,0,0,.25), inset 0 0 6px rgba(61, 171, 255, 0.04), 1px 1px 0 rgba(40, 49, 54, 0.25)
	}
	
	input[type="text"].whrong, input[type="password"].whrong {
		box-shadow:inset 0 0 3px rgba(0,0,0,.2), inset 0 1px 1px rgba(0,0,0,.4), 0 1px 0 rgba(255,255,255,.02), 0 0 6px rgba(255,0,0,.2);
		}
		input[type="text"].whrong:focus, input[type="password"].whrong:focus {
		box-shadow:inset 0 0 3px rgba(0,0,0,.2), inset 0 1px 1px rgba(0,0,0,.4), 0 1px 0 rgba(255,255,255,.02), 0 0 9px rgba(255,0,0,.25), inset 0 0 4px rgba(255,255,255,.05);
		}
	
	input[type="text"].success, input[type="password"].success {
		box-shadow:inset 0 0 3px rgba(0,0,0,.2), inset 0 1px 1px rgba(0,0,0,.4), 0 1px 0 rgba(255,255,255,.02), 0 0 6px rgba(0,255,0,.15);
		}
		input[type="text"].success:focus, input[type="password"].success:focus {
		box-shadow:inset 0 0 3px rgba(0,0,0,.2), inset 0 1px 1px rgba(0,0,0,.4), 0 1px 0 rgba(255,255,255,.02), 0 0 9px rgba(0,255,0,.2), inset 0 0 4px rgba(255,255,255,.05);
		}
	
	textarea {
		resize: none !important;
		font-family: 'Ebrima';
		font-size:14px;
		text-shadow:0 0 5px rgba(0,0,0,.15), 1px 0px 1px rgba(0,0,0,.25);
		color:#40342e;
		border:none;
		-webkit-border-radius: 3px;
		-moz-border-radius: 3px;
		border-radius: 3px;
		width:auto; height:auto;
		padding:10px;
		background:rgba(0,0,0,.20);
		box-shadow: inset 1px 1px 2px rgba(0,0,0,.25), inset 0 0 6px rgba(61, 171, 255, 0.04), 1px 1px 0 rgba(40, 49, 54, 0.25)
		transition: all 300ms;-moz-transition: all 300ms;-webkit-transition: all 300ms;-o-transition: all 300ms;
		}
		textarea:focus {
		box-shadow:inset 0 0 3px rgba(0,0,0,.2), inset 0 1px 1px rgba(0,0,0,.4), 0 1px 0 rgba(255,255,255,.04), 0 0 7px rgba(255,255,102,.05), inset 0 0 4px rgba(255,255,255,.05);
		}
			
	.row textarea {width:290px;}
	
	input[type="submit"], .simple_button {
	width:auto; height:36px;
	border:none;
	cursor:pointer;
	line-height:0;
	text-transform:capitalize;
	padding:0 21px 2px 21px;
	vertical-align:top;
	margin:2px 0 0 0;
	background: url(styles/resource/css/login/images/misc/submit_gradient.jpg) repeat-x;
	font-family: 'Ebrima';
	font-size:13px;
	color:rgba(117, 199, 240, 0.57);
	text-transform:uppercase;
	font-weight: normal;
	border-radius:3px;
	text-shadow: 0 0 6px rgba(0,0,0,.1), 0 1px 2px rgba(0,0,0,.55);
	box-shadow: inset 0 2px 0 rgba(65, 111, 128, 0.5), inset 0 0 8px rgba(0, 15, 255, 0.1), 0 0 7px rgba(0,0,0,.35), 0 1px 2px rgba(0,0,0,.4);
	transition: all 500ms;-moz-transition: all 500ms;-webkit-transition: all 500ms;-o-transition: all 500ms;
	}
	input[type="submit"]:hover, .simple_button:hover {
	color:rgba(117, 199, 240, 1);
	background: url(styles/resource/css/login/images/misc/submit_gradient_hover.jpg) repeat-x;
	text-shadow: 0 0 3px rgba(255,203,103,.25), 0 1px 2px rgba(0,0,0,.55);
	}
	
	input[type="submit"].simple, .simple_button {
	height:34px;
	color: #886f52;
	background: rgba(31,23,20,.93);
	box-shadow: inset 0 2px 0 rgba(66,56,47,.25), 0 0 7px rgba(0,0,0,.35), 0 1px 2px rgba(0,0,0,.4);
	text-shadow: 0 0 6px rgba(0,0,0,.1), 0 1px 2px rgba(0,0,0,.55);
	margin: 0 0 0 11px;
	}
	input[type="submit"].simple:hover, .simple_button:hover {
	color: #c6aa89;
	background: #271f1a;
	text-shadow: 0 0 6px rgba(175,150,121,.25), 0 1px 2px rgba(0,0,0,.55);
	}
	
	.clearfix:after {
		content: ".";
		display: block;
		clear: both;
		visibility: hidden;
		line-height: 0;
		height: 0;
	}
	 
	.clearfix {
		display: inline-block;
	}
	 
	html[xmlns] .clearfix {
		display: block;
	}
	 
	* html .clearfix {
		height: 1%;
	}
	
	/* HUMAN TEST */
	.human-test {
		width:490px;
		background: rgba(255,255,255,.03);
		border-radius:4px;
		box-shadow:inset 0 0 0 1px rgba(255,255,255,.015), 0 0 5px rgba(0,0,0,.4), inset 0 1px 0 rgba(255,255,255,.025);
		text-align:left;
		margin:30px 0 30px 0;
		padding:0 0 10px 0;
		text-shadow:0 0 4px rgba(0,0,0,.5);
		overflow: hidden;
		}

		.human-test h3 {
			padding:7px 0 0 11px;
			font-family: 'Ropa Sans', sans-serif;
			text-transform: uppercase;
			letter-spacing:1px;
			color:#000;
			text-shadow:1px 1px 0 rgba(255,255,255,.04);
			z-index:2;
			}
		.human-test a#newq {
			display:block;
			position:absolute;
			top:8px; right:10px;
			font-weight:bold;
			font-size:11px;
			z-index:2;
			}
		.human-test #question-hodlder {
			margin:8px 10px 0 10px;
			padding:10px;
			background:rgba(0,0,0,.2);
			border-radius:4px;
			z-index:2;
			}
			.human-test #question-hodlder input {width:430px; background:rgba(0,0,0,.5);}
			.human-test #question-hodlder input:focus {
				box-shadow:inset 0 0 5px #000, 0 0 5px rgba(0,0,0,.4), 0 1px 0 rgba(255,255,255,.08);
				background:rgba(0,0,0,.3);
				color:#b07e39;
				box-shadow:inset 0 0 0 1px #b07e39, inset 0 0 0 1px rgba(255,255,255,.015), 0 0 5px rgba(0,0,0,.4), inset 0 1px 0 rgba(255,255,255,.025), 0 0 30px rgba(0,0,0,.5);
				}
		
		/* Captcha */
		.human-test #captcha-question {
			display: block;
			width:100%;
			padding:0 0 8px 1px;
			color: #938677;
			font-weight:bold;
			}
		
	/* SHIT FIX */
	/*for FireFox*/
    input[type="submit"]::-moz-focus-inner, input[type="button"]::-moz-focus-inner {border : 0px;} 
	/*for IE8 */
    input[type="submit"]:focus, input[type="button"]:focus {outline : none; }
	
	form .seperator {
		width:75%; height:1px; left:3px;
		margin: 18px auto;
		background:rgba(0,0,0,.3);
		box-shadow:0 0 1px rgba(255,255,255,.05), 2px 0 3px rgba(0,0,0,.20);
		clear:both;
		}
	
	/* sprites */
	.membership-bar .search input[type='submit'],
	.title_latest_news,
	.realmst_head .online, 
	.realmst_head .offline, 
	.realmst_head .more_rinfo, 
	#footer .left-side a.dmca,
	#footer td a.dmca,
	.logged_in_bar .acc-menu li a span, .logged_in_bar .acc-menu li a p, 
	.logged_in_bar .avatar span,
	.logged_in_bar .info .coints span#gold_c div, 
	.logged_in_bar .info .coints span#silver_c div,
	.logged_in_bar .info .messages a span.icon,
	.g-coin, .s-coin,
	.store-complete .items-list li p.success-i em,
	.store-complete .items-list li p.fail-i em,
	li.login-home a span, li.login-home a p, li.register-home a span, li.register-home a p,
	.new-design-left-part p.icon, .new-design-count-cont p.arrow,
	.logged_in_bar .info .won-a-charcater-ico a span#icon, .logged_in_bar .info .won-a-charcater-ico a p#icon, .recruit-link a, 
	.tele-back-btn a, #TpTooltip .tp-tooltip-inner #arrow, .vote-now-ico a span#icon, .vote-now-ico a p#icon,
	.logged_in_bar_bg 
	{background-image:url(styles/resource/css/login/images/misc/lang/misc_main_<?php echo $cookieLang; ?>.png); background-repeat:no-repeat; background-color:transparent;}
	
	#header .holder, #header .top-navigation li a p, .top-navigation li#support p
	{ background-image:url(styles/resource/css/login/images/misc/lang/header_<?php echo $cookieLang; ?>.png); background-color:transparent;}
	
	.clear { clear:both;}
	
	/* HEADER */
	#header {
		width:100%; height:121px; 
		position:absolute;
		z-index:9999;
		}	
   		#header .holder {width:1120px; height:185px;}

		/* TOP NAVIGATION */
		#header .top-navigation {
		float: left;
		width:1005px; height:76px;
		margin-top: 42px;
		margin-left: 60px;
		z-index:10;
		}
		#header .top-navigation li { display:block; float:left; margin:0 !important; left:0 !important; padding:0 !important; }
		
		#header .top-navigation li a { display:block; height:76px; margin:0 !important; left:0 !important;}
		
			.top-navigation li #home p { width:154px; background-position: -60px -227px;}
			.top-navigation li #forums p { width:152px; background-position: -214px -227px;}
			.top-navigation li #media p { width:134px; background-position: -366px -227px;}
			
			.top-navigation li#logo p { width: 118px; }
			
			.top-navigation li #features p { width:149px; background-position: -618px -227px;}
			.top-navigation li#support p { width:145px; background-position: -767px -227px; cursor: pointer; }
			
			.top-navigation li #goal p { width:148px; background-position: -912px -227px;}
			
			#header .top-navigation li a p, #header .top-navigation li p {
			display:block; height:76px;
			visibility:hidden;
  			opacity:0;
			transition:visibility 0s linear 0.5s,opacity 0.5s linear;
			-moz-transition:visibility 0s linear 0.5s,opacity 0.5s linear;
			-webkit-transition:visibility 0s linear 0.5s,opacity 0.5s linear;
			-o-transition:visibility 0s linear 0.5s,opacity 0.5s linear;
			}
			
			#header .top-navigation li a:hover p, #header .top-navigation li:hover p {
				opacity:1; visibility:visible; transition-delay:0s; -moz-transition-delay:0s; -webkit-transition-delay:0s;}
			
			.top-navigation li#logo a, .top-navigation li#logo p {
				transition: none;
				background: none;
				background-image: none !important;
			}
			.top-navigation li#logo a:hover {
				opacity:0;
			}
			
			/* Navigation Dropdown */
			.top-navigation li div.nddm-holder {
			position:absolute;
			width:260px; height:0;
			left:-53%; top:57px;
			overflow:hidden;
			transition: all ease-in-out 900ms;
			-webkit-transition: all ease-in-out 900ms;
			-moz-transition: all ease-in-out 900ms;
			-o-transition: all ease-in-out 900ms;
			opacity:0;
			}
			
			/* Fix the positins for dropdown under FEATURES */
			.top-navigation li .features div.navi-dropdown {left:8%;}
			.top-navigation li .media div.navi-dropdown {left:-2%;}
			
			.top-navigation li:hover div.nddm-holder {
				height:280px;
				opacity:1;
				}
			
				
			.top-navigation li div.navi-dropdown {
				width:196px; height:auto;
				border-radius:5px;
				background:#0c101a;
				box-shadow: inset 0px 0px 20px rgba(255,255,255,.05), 0px 0px 15px rgba(0,0,0,.7);
				border: rgba(26, 110, 163, 0.62) 1px solid;
				top:21px;
				}	
				.top-navigation li div.navi-dropdown span {
				height: 48px;
				display:block;
				text-align:left;
				background:url(styles/resource/css/login/images/misc/drop-down-sep.png) no-repeat bottom center;
				}
				.top-navigation li div.navi-dropdown span:last-child {
				background: none;
				}
				.top-navigation li div.navi-dropdown span a {
					width: 188px; height: 48px;
					padding: 15px 0 0 25px;
					display: block;
					color: rgba(117, 199, 240, 0.57);
					font-size: 14px;
					text-shadow: 0px 0px 5px rgba(0,0,0,.25), 1px 1px 1px rgba(0,0,0,.35);
					-moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;
					}
					.top-navigation li div.navi-dropdown span a:hover {
					color: rgb(117, 199, 240);
					background: url(styles/resource/css/login/images/misc/menu-dropdown-hover.png) no-repeat;
					}
	
	.title_overlay {
		display: block;
		height: 20px;
		width: 205px;
		background: url(styles/resource/css/login/images/misc/title_overlay.png) no-repeat;
		position: absolute;
		pointer-events: none;
	}
	
	/* BODY */
	.main_a_holder { width:100%; height:auto; background: url(styles/resource/css/login/images/body_top.png) no-repeat top center; padding-top: 25px; top:0px; font-size:12px; }
	.main_b_holder { width:100%; height:auto; min-height:100px; background: #07090b url(styles/resource/css/login/images/body_top_part2.jpg) no-repeat top center; }
	.sec_b_holder {width:100%; height:auto; background:url(styles/resource/css/login/images/footer.png) no-repeat bottom; padding:0 0 49px 0; margin:-64px 0 0 0; }
	#body { width:981px; height:auto; padding:0 0 0 0; min-height: 800px;}
	
	.space-fix { width:px; height:66px;}
	
    .content_holder {width:982px; height:auto; padding:0 0 0 0;}
	
	.main_side {width:671px; max-width:685px; float:left;}
	.sidebar {width:299px; max-width:299px; padding:0 0 0 12px; float:left;}
	
	
	.container {
	width:auto; height:auto;
	background:url(styles/resource/css/login/images/texture_one.gif) repeat;
	box-shadow: 0 0 6px #000, inset 0 0 0 1px rgba(107, 142, 255, 0.015), inset 0 1px 0 rgba(139, 151, 255, 0.05);
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	color:#3a3a39;
	text-shadow: 0 1px 0 #000, 0 0 6px #000;
	overflow:hidden;
	}
	.light_normal {
	width:auto; height:auto;
	background:url(styles/resource/css/login/images/misc/light_2_r.png) repeat-x;
	}
	.container5 {
	width:auto; height:auto;
	background:url(styles/resource/css/login/images/index_news_container.png) repeat;
	box-shadow: 0 0 6px #000, inset 0 0 0 1px rgba(107, 142, 255, 0.015), inset 0 1px 0 rgba(139, 151, 255, 0.05);
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	color:#3a3a39;
	text-shadow: 0 1px 0 #000, 0 0 6px #000;
	overflow:hidden;
	}
	.light_normal5 {
	width:auto; height:auto;
	background:url(styles/resource/css/login/images/misc/light_2_r.png) repeat-x;
	}
	
	.container_frame {
	background:#000;
	box-shadow:inset 0 0 0 1px rgba(36, 114, 167, 0.59), 0 0 6px #000;
	padding:2px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	overflow:hidden;
	transition: all 600ms;
	-webkit-transition: all 600ms;
	-moz-transition: all 600ms;
	-o-transition: all 600ms;
	}
	.container_frame:hover {box-shadow:inset 0 0 0 1px rgba(36, 114, 167, 1), 0 0 6px #000;}
	
	.cframe_inner {
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	overflow:hidden;
	display:block;
	background-size:105%;
	} 
	
	.container_2 {
	width:980px; height:auto; min-height:400px;
	background: rgba(24, 28, 42, 0.44);
	box-shadow: 0 0 6px #000,  inset 0 0 0 1px rgba(107, 142, 255, 0.015), inset 0 1px 0 rgba(139, 151, 255, 0.05);
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	padding:40px 0 40px 0;
	}
	
	.container_3 {
	width:633px; height:auto; min-height:40px;
	background: rgb(9, 13, 22);
	box-shadow: 0 0 4px rgba(0,0,0,.6), 0 1px 1px rgba(0,0,0,.5), inset 0 0 0 1px rgba(107, 142, 255, 0.015), inset 0 1px 0 rgba(139, 151, 255, 0.05);
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	margin:0 0 14px 0;
	padding:35px 0 25px 0;
	z-index:1;
	}
	
	div.gradient {
	z-index:1;
	background: -moz-linear-gradient(top,  rgba(255,255,255,0.04) 0%, rgba(255,255,255,0) 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,0.04)), color-stop(100%,rgba(255,255,255,0))); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  rgba(255,255,255,0.04) 0%,rgba(255,255,255,0) 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  rgba(255,255,255,0.04) 0%,rgba(255,255,255,0) 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  rgba(255,255,255,0.04) 0%,rgba(255,255,255,0) 100%); /* IE10+ */
	background: linear-gradient(top,  rgba(255,255,255,0.04) 0%,rgba(255,255,255,0) 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#33d5c194', endColorstr='#00d5c194',GradientType=0 ); /* IE6-9 */
	box-shadow:inset 0 -36px 0 rgba(0,0,0,.2);
	}
	
	.d-cont {
	width:auto; height:auto;
	background:rgba(0,0,0,.35);
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	padding:10px 0 10px 15px;
	box-shadow:inset 0 0 7px rgba(0,0,0,.6), 0 0 0 1px rgba(255,255,255,.01);
	text-shadow: 0 0 5px #000;
	}
	
	/* SUB PAGE TITLE */
	.sub-page-title {
	width:980px; height:125px;
	background:url(styles/resource/css/login/images/misc/sub_page_light.png) no-repeat left;
	margin-left: -20px;
	}
	.sub-page-title #title {display:block;	float:left;	height:39px; margin: 21px 0 0 20px;}
	
		.sub-page-title #title h1 {
			font-family: 'Ebrima';
			font-weight: bold;
			text-transform:uppercase;
			font-size:34px;
			color:#4d98fd;
			text-shadow:0 0 8px rgba(0,0,0,.35), 1px 1px 1px rgba(0,0,0,.25);
			margin:15px 0 0 30px;
			height:34px;
			padding:0;
			line-height:125%;
			}
			.sub-page-title #title h1 p {
				width:100%; height:30px; 
				background:url(styles/resource/css/login/images/misc/page-title-gradient.png) no-repeat;
				position:absolute;
				top:10px; right:0;
				}
			.sub-page-title #title h1 span {
				width:100%; height:30px;
				background:url(styles/resource/css/login/images/misc/page-title-effect.png) no-repeat;
				position:absolute;
				top:10px; right:0;
				}
		
	/* FOOTER */
	.footer-holder {
		width:100%; height:124px;
		margin:0px 0 0 0;
		}
		.bot-foot-border {
			width:100%; height:30px;
			position:absolute;
			top:102px;
			background:#0d121c;
			box-shadow:0 0 3px rgba(0, 153, 255, 0.42), 0 0 0 1px rgba(24, 113, 168, 0.81), inset 0 0 6px rgba(0, 0, 0, 0.7), inset 0 0 3px rgba(24, 113, 168, 0.59);
			z-index:1;
			text-align: center;
			-webkit-box-sizing: border-box; /* Safari/Chrome, other WebKit */
			-moz-box-sizing: border-box;    /* Firefox, other Gecko */
			box-sizing: border-box;         /* Opera/IE 8+ */
			padding: 7px 0 0 0;
			font-family: 'Ebrima';
			font-size: 11px;
			font-weight: bold;
			color: rgba(60, 141, 181, 0.57);
			text-transform: uppercase;
			text-shadow: 0 0 5px rgba(0,0,0,.5), 1px 1px 1px rgba(0,0,0,.45);
			}
			.bot-foot-border a {
			color: rgba(117, 199, 240, 0.50);
			}
			.bot-foot-border a:hover {
			color: rgba(117, 199, 240, 0.75);
			}
		#footer {width:980px; padding:20px 0 0 0; color:#313130; z-index:90; }
		
#footer .left-side {float:left; padding:0px 0 0 0; margin: -25px 0 0 0;}
	
				#footer .left-side a.dmca {
					display:block;
					width:66px; height:65px;
					float:left;
					text-indent:-999999px;
					background-position:-0px -149px;
					}
					#footer .left-side a.dmca:hover {background-position:-66px -149px;}
				
				#footer .left-side p {
					float:left;
					text-align:left;
					padding:11px 0 0 0px;
					color:rgba(60, 141, 181, 0.57);
					line-height:150%;
					font-family: 'Ebrima';
					font-size: 11px;
					text-shadow: 1px 1px 1px rgba(0,0,0,.55);
					}
					#footer .left-side p b { color:#656056;}
			
			#footer .right-side { float:right; margin: -10px 0 0 0;}
				
				#footer .right-side ul {
					float:right;
					text-align:left;
					padding:0 0 0 40px;
					}
					#footer .right-side ul li { display:block; margin:0 0 2px 0;}
					#footer .right-side ul li a { font-family: 'Ebrima'; font-size:11px; text-transform:uppercase; color: rgba(117, 199, 240, 0.50);}
					#footer .right-side ul li a:hover { color:rgba(117, 199, 240, 0.75);; }
	
	/* IMAGE HEADER */
	#image_header {width:100%; height:auto; top:0px; overflow:hidden;}
	
	
	/* SLIDER */
	.slider {width:100%; height:428px;}
	
	#html5-video {
		height: 394px;
		}
	
	/* Sub Page styles/resource/css/login/images */
	.sub_head_image { width:100%; height:285px;}
	  .sub_head_image div {
		  width:1600px; height:250px;
		  background-position:bottom;
		  background-repeat: no-repeat;
		  }
	/*.sub_head_image img { width:1300px; border: none; outline: none;}	*/
	
	.home_container {
	background:url(styles/resource/css/login/images/index_news_container.png) no-repeat top;
	box-shadow:0 0 6px rgba(0,0,0,.25), 2px 2px 1px rgba(0,0,0,.05), inset 0 0 2px rgba(70, 143, 167, 0.1), inset 0 0 15px rgba(75, 136, 136, 0.2);
	border-radius:4px;
	-webkit-border-radius:4px;
	-moz-border-radius:4px;
	}
	
	/* INDEX SOCIAL MEDIA */
	.social-media {
		width:671px;
		height:48px;
		margin:0 0 12px 0;
		overflow:hidden;
		}
		.social-media div.gradient {width:700px; height:70px; position:absolute; top:-10px; z-index:1;}
		.media-buttons-holder { z-index:2;}
		
		/* HOLDERS */
		.media-wrapp {
			float:left;
			height:37px;
			padding:8px 11px 0 11px;
			background: url(styles/resource/css/login/images/misc/social_separator.png) no-repeat right bottom;
			top:1px;
			}
			.media-wrapp-no-sep {
			background: none;
			}
		.media-button-holder {
			display:inline-block;
			height:26px; width:auto;
			margin: 2px 0 0 1px;
			}
		
		.media-new-design {
			height:26px; width:auto;
			}
			.new-design-left-part {
				display:inline-block;
				height:26px;
				line-height:100%;
				vertical-align:top;
				z-index:1;
				}
				.new-design-left-part p.icon { width:26px; height:26px; display:inline-block; vertical-align:top; margin:1px 0 0 1px;}
				.new-design-left-part span { 
				font-family: 'Ebrima';
				display:inline-block;
				padding:3px 0 0 0;
				font-size:12px;
				font-weight: 300;
				color: #514435;
				margin: 4px 30px 0 9px;
				}

			.button-container {
				display:inline-block;
				height:26px;
				overflow:hidden;
			}
				
			.new-design-count-cont {
				display:inline-block;
				height:20px; width:auto;
				line-height:100%;
				vertical-align:top;
				margin: 4px 30px 0 9px;
				}
				.new-design-count-cont span {
					font-family: 'Ebrima';
					display:inline-block;
					padding:3px 0 0 0;
					font-size:12px;
					font-weight:bold;
					color:#7a6d5e;
					}
					.new-design-count-cont span#text {
					font-weight: 300;
					color: #514435;
					}
						
			/* FACEBOOK */
			.facebook .button-container {
			width:26px;
			}
			.facebook .fb-like {
				position: absolute;
				top:-3px;
				left:0px;
				z-index:10;
				opacity:0;
				}
				.facebook .fb-active-hotfix {
				margin: 4px 0 0 0;
				width: 48px;
				}
			.facebook p.icon { background-position:-291px -120px;}
			.facebook p.icon.active { background-position:-291px -120px;}
		
			/* TWITTER */
			.twitter .button-container {
			width:26px;
			}
			.twitter .twitter-follow-button {
				position: absolute;
				top:-3px;
				left:0px;
				z-index:10;
				opacity:0;
				}
				.twitter .twitter-active-hotfix {
					margin: 4px 0 0 0;
					width: 60px;
				}
			.twitter p.icon { background-position:-327px -120px;}
			.twitter p.icon.active { background-position:-327px -120px;}
			
			/* GOOGLE */
			.google-plus p.icon { background-position:-35px -120px;}
			
			/* YOUTUBE */
			.youtube p.icon { background-position:-363px -120px;}
					
		
	/* REALMS Status */
	.realmlist { /* Realmlist */
		font-size:14px;
		text-align:center;
		margin:0 0 12px 0;
		width: 297px; height: 42px;
		font-family: 'Ebrima';
		color: #52493f;
		text-shadow: 1px 0 1px rgba(0,0,0,.45);
		}
		.realmlist p {padding:12px 0 13px 0;}
	
	.realm_st {
		width:297px; height:69px;
		overflow: hidden;
		margin-top: -2px;
		}
		.realm_st:first-child {
		margin-top: 0 !important;
		}
		.realm_st_wotlk {
		background: url(styles/resource/css/login/images/realm_bg_wotlk.png) no-repeat;
		}
		.realm_st_pandaria {
		background: url(styles/resource/css/login/images/realm_bg_pandaria.png) no-repeat;
		}
		.realm_st_cataclysm {
		background: url(styles/resource/css/login/images/realm_bg_cata.png) no-repeat;
		}
		
		.realm_st a {
			display:block;
			border-radius:5px 5px 0 0;
			top:1px; left:1px;
			width:297px; height:66px;
			transition: all 400ms; -moz-transition: all 400ms; -webkit-transition: all 400ms; -o-transition: all 400ms;
			}
			.realm_st a:hover { background:rgba(255,255,255,.03)}
			
		.realmst_head { 
			height:49px; 
			padding:13px 0 0 5px;
			}
			.realmst_head .realm_name {
			font-family: 'Ebrima';
			font-size:14px;
			color:rgba(117, 199, 240, 0.80);
			font-weight:bold;
			padding: 0 0 0 35px;
			text-shadow:0 0 5px rgba(0,0,0,.15), 1px 1px 1px rgba(0,0,0,.25);
			}
			.realmst_head p {
			padding: 2px 0 0 17px;
			letter-spacing:normal;
			}
			
			.realmst_head .online, .realmst_head .offline, .realmst_head .closed {
			width:23px; height:26px; 
			display:inline-block;
			position:absolute;
			line-height:0%;
			top: -3px; left:9px;
			}
			
			.realmst_head .online {background-position: 0px -0px; }
			.realmst_head .offline {background-position: -23px -0px; }
			.realmst_head .closed {background-position: -46px -0px; }
			
			.realm_st p {
			padding:6px 0 0 8px;
			font-family: 'Ebrima';
			font-size:11px;
			font-style: italic;
			color: rgba(117, 199, 240, 0.50);
			text-shadow:0 0 3px rgba(0,0,0,.25), 1px 1px 0 rgba(0,0,0,.30);
			}
			.realm_st p.realm-desc { padding:3px 0 0 14px;}
			
				
	/* TEAMSPEAK */
	.ts-status {
		width:288px; height:38px;
		background:url(styles/resource/css/login/images/misc/status-grad.png) repeat-x top rgba(255,255,255,.008);
		padding:9px 0 0 11px;
		box-shadow:inset 0 -1px 0 rgba(0,0,0,.5), 0 1px 0 rgba(255,255,255,.07);
		text-shadow:0 1px 1px rgba(0,0,0,.8), 0 0 4px rgba(0,0,0,.8);
		}
		
		.ts-status h3 { font-family:calibrib; font-size:13px; color:rgba(117, 199, 240, 0.77);}
		.ts-status h3 p.status { display:inline-block;}
			
			.ts-status h3 p.status.online { color:#66822a;}
			.ts-status h3 p.status.offline { color:#a91811;}
		
		.ts-status a#download-ts, .ts-status a#download-htc {
			font-size:11px;
			color:rgba(117, 199, 240, 0.47);
			display:inline-block;
			padding:1px 0 2px 9px;
			margin:0 8px 0 0;
			font-weight: bold;
			background:url(styles/resource/css/login/images/misc/link-arrow.png) no-repeat left;
			transition: none; -moz-transition: none; -webkit-transition: none; -o-transition: none;
			}
			.ts-status a#download-ts:hover, .ts-status a#download-htc:hover {
			color:rgba(117, 199, 240, 0.67);
			background:url(styles/resource/css/login/images/misc/link-arrow-hover.png) no-repeat left;
			}
			
	/* LOGON STATUS */
	.logon-status {
		width:297px; height:46px;
		background:rgba(0,0,0,.008);
		}
		
		.logon-status #logon-status {float:left; margin:10px 0 0 11px;}
			#logon-status p {font-size:11px; font-style:italic; color:#302d27;}
			
			#logon-status h3 {font-family: 'Ebrima'; text-transform: uppercase; font-size:11px; color:rgba(117, 199, 240, 0.57); text-shadow: 0 0 3px rgba(0,0,0,.55), 1px 1px 0 rgba(0,0,0,.45); font-weight: 300;}
			#logon-status h3 p.status {font-family: 'Ebrima'; display:inline-block; font-weight: bold; font-style: normal; font-size:11px;}
			
			#logon-status h3 p.status.online { color:#66822a;}
			#logon-status h3 p.status.offline { color:#a91811;}
			
		.logon-status #server-time {
			float:right;
			width:60px; height:30px;
			text-align:right;
			margin:4px 10px 0 0;
			}
			#server-time p {
				font-family:'Ebrima';
				font-weight: bold;
				font-size:13px;
				color:rgb(61, 103, 128);
				}
			#server-time span {
				font-family: 'Ebrima';
				font-size:9px;
				top:2px; left:-1px;
				color:rgb(61, 103, 128);
				text-shadow: 0 0 3px rgba(0,0,0,.55), 1px 1px 0 rgba(0,0,0,.45);
				}
	
	logon
	
	/* Media */
	.media {
	width:685px;
	}
	
	/* Trailers */
	.trailer { width:396px !important; height:223px !important; }
	.trailer .image-thumb-preview { width:396px !important; height:223px !important; }
	.trailer.media-video-thumb a { width:396px !important; height:223px !important; }
			
	.quck_nav {
	float:right;
	margin: 0px 22px 0 12px ;
	height:25px; width:273px;
	padding:0px 0 0 0;
	text-align: right;
	background:rgba(0,0,0,.6);
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	box-shadow: 0 0 0 1px rgba(255,255,255,.02),inset 0 0 5px #000, 0 1px 0 rgba(255,255,255,.02);
	}
	.quck_nav a {
		font-size:11px; 
		text-shadow: 0 1px 0 #000, 0 0 5px #000; 
		padding:5px 10px 3px 10px;
		display:inline-block;
		}			
				
	/* MEMBERSHIP Bar 
	---------------------------------------------------------*/
	.membership-holder {
		width:100%; height:78px;
		background:url(styles/resource/css/login/images/membership_bar.png) no-repeat top center;
		z-index:999;
		top:-76px;
		overflow:hidden;
		}
	    .membership-bar {width:1010px; height:60px; top:13px;}
		
		.member-side-left {
			width:550px; height:60px;
			float:left;
			}
			
			ul.not-logged-menu {width:560px; height:54px; float:left; margin:0px 0 0 10px; }
				ul.not-logged-menu li { display:block; float:left;}
				ul.not-logged-menu li a {display:block; height:54px;}
				ul.not-logged-menu li a span {display:block; height:54px; z-index:1;}
				ul.not-logged-menu li a p {
					display:block; height:54px;
					position:absolute;
					top:0; left:0;
					visibility:hidden;
		  			opacity:0;
					transition:visibility 0s linear 0.5s,opacity 0.5s linear;
					-moz-transition:visibility 0s linear 0.5s,opacity 0.5s linear;
					-webkit-transition:visibility 0s linear 0.5s,opacity 0.5s linear;
					-o-transition:visibility 0s linear 0.5s,opacity 0.5s linear;
					pointer-events:none;
					z-index:2;
					}
				
				ul.not-logged-menu li.login-home a { width:268px;}
				ul.not-logged-menu li.register-home a {width:285px;}
				
				ul.not-logged-menu li.login-home a span { width:268px; background-position:0px -272px;}
				ul.not-logged-menu li.register-home a span {width:285px; background-position:-268px -272px; left: -15px;}
				
				ul.not-logged-menu li.login-home a p { width:268px; background-position:1px -326px;}
				ul.not-logged-menu li.register-home a p {width:285px; background-position:-268px -326px; left: -15px;}
							
				ul.not-logged-menu li a:hover p {
					opacity:1; 
					visibility:visible; 
					transition-delay:0s; 
					-moz-transition-delay:0s; 
					-webkit-transition-delay:0s;
					}
				/* Old Shit
				ul.not-logged-menu li a#login:hover { width:214px; background-position:-2px -331px;}
				ul.not-logged-menu li a#register:hover {width:241px; background-position:-215px -331px;}
				*/
			
		.memeber-side-right {
			float:left;
			margin: 0;
			width: 450px;
			}
			.memeber-side-right .search { width: 265px; height:57px; float: left; }
			.memeber-side-right .search input[type='text'] {
				width:184px; height:35px;
				box-shadow: none;
				margin: 10px 0 0 7px;
				background: none;
				color:rgb(21, 101, 155);
				text-shadow: 0 0 5px rgba(0,0,0,.4), 1px 1px 1px rgba(0,0,0,.25);
				font-family: Tahoma, Geneva, sans-serif;
				font-size:12px;
				padding-left: 12px;
				}
				.memeber-side-right .search input[type='text']::-webkit-input-placeholder { /* WebKit browsers */
				color:rgb(21, 101, 155);
				text-shadow: 0 0 5px rgba(0,0,0,.4), 1px 1px 1px rgba(0,0,0,.25);
				}
				.memeber-side-right .search input[type='text']:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
				color:rgb(21, 101, 155);
				text-shadow: 0 0 5px rgba(0,0,0,.4), 1px 1px 1px rgba(0,0,0,.25);
				}
				.memeber-side-right .search input[type='text']::-moz-placeholder { /* Mozilla Firefox 19+ */
				color:rgb(21, 101, 155);
				text-shadow: 0 0 5px rgba(0,0,0,.4), 1px 1px 1px rgba(0,0,0,.25);
				}
				.memeber-side-right .search input[type='text']:-ms-input-placeholder { /* Internet Explorer 10+ */
				color:rgb(21, 101, 155);
				text-shadow: 0 0 5px rgba(0,0,0,.4), 1px 1px 1px rgba(0,0,0,.25);
				}
				.memeber-side-right .search input[type='submit'] {
				width:22px; height:17px;
				background-position: -578px -0px;
				box-shadow: none;
				border: none;
				position:absolute;
				top:17px; right:23px;
				z-index:99;
				padding:0;
				transition: none;
				}
				.memeber-side-right .search input[type='submit']:hover {background-position: -553px -0px;}
				
				.memeber-side-right .bonus-m-links {
					width:180px; height:48px;
					text-align:left;
					padding:9px 0 0 0;
					margin: 0;
					float: left;
					}
					.bonus-m-links a {
					font-family: 'Ebrima';
					display:block;
					font-size:12px;
					color:#63503c;
					text-shadow: 0 0 5px rgba(0,0,0,.4), 1px 1px 1px rgba(0,0,0,.25);
					line-height:165%;
					}
					.bonus-m-links a:hover { 
					color:#fbc88b;
					text-shadow: 0 0 4px #000, 0 0 6px #000, 0 1px 0 #000, 0 1px 1px #000, 0 0 1px #dfcc9b;
					}
					.bonus-m-links a:last-child {
					margin-left: 7px;
					}
		
		.logged_in_bar_bg {
		width: 537px; height: 53px;
		margin: 1px 0 0 9px;
		background-position: -142px -59px;
		}
		
		.logout-btn-cont {
			width: 24px; height: 19px;
			float: left;
			margin: 28px 0 0 8px;
			}
			.logout-btn-cont #logout {
			display: block;
			width: 24px; height: 19px;
			background: url(styles/resource/css/login/images/misc/misc_main.png) no-repeat;
			background-position: -142px -120px;
			}
			.logout-btn-cont #logout:hover {
			background-position: -166px -120px;
			}
			




		.logged_in_bar .avatar {
		width:43px; height:43px;
		background:rgba(0,0,0,.55);
		-webkit-border-radius: 3px;
		-moz-border-radius: 3px;
		border-radius: 3px;
		box-shadow: 0 0 3px rgba(209,196,110,.3);
		overflow:hidden;
		float:left;
		margin: 5px 5px 0 5px;
		}
	    .logged_in_bar .avatar span {
	    	width:39px; height:39px;
			background-position: -206px -120px;
			display:block;
			top:2px; left:2px;
			z-index:999;
			position:absolute;
			pointer-events: none;
	    	}
	    	.logged_in_bar .avatar a {
			width:39px; height:39px;
			display:block;
			top:2px;
			background-size:120% !important;
			}
		.logged_in_bar .info {
		width:167px; height:40px;
		float:left;
		padding:8px 0 0 3px;
		}
	    .logged_in_bar .info p {
			font-family: 'Ebrima';
			float:left;
			color:rgba(117, 199, 240, 0.57);
			font-size:12px;
			text-shadow: 0 0 5px rgba(0,0,0,.25), 1px 1px 1px rgba(0,0,0,.45);
			margin: 0 0 3px 0;
			text-align:left;
			width:250px;
			overflow:hidden;
			}
	    .logged_in_bar .info .coints {
			width:auto; height:26px;
			color:#655643;
			font-family: 'Ebrima';
			font-size: 11px;
			text-shadow:0 1px 1px rgba(0,0,0,1);
			float:left;
			padding:0 8px 0 0;
			}
	    	.logged_in_bar .info .coints span#gold_str {
			color: #d29f4e;
			}
	    	.logged_in_bar .info .coints span#silver_str {
			color: #959595;
			}
								
			/* VOTE NOW Icon 
			----------------------------------------------------------*/
			.logged_in_bar .info .vote-now-ico {
				float:left;
				width:83px; height:31px;
				top:-3px;
				}
				.logged_in_bar .info .vote-now-ico a {
				display:block;
				width:83px; height:31px;
				}
				.vote-now-ico a span#icon, .vote-now-ico a p#icon  {
					display:block;
					width:83px; height:31px;
					position:absolute;
					top:0; left:0;
					
					}
					.vote-now-ico a span#icon {
					z-index:1;
					background-position:-253px -0px;
					opacity:1;
					transition:all 700ms;
					-moz-transition:all 700ms;
					-webkit-transition:all 700ms;
					-o-transition:all 700ms;
					}
					.vote-now-ico a p#icon {
					z-index:1;
					background-position:-336px -0px;
					opacity:0;
					transition:all 400ms;
					-moz-transition:all 400ms;
					-webkit-transition:all 400ms;
					-o-transition:all 400ms;
					}
					.vote-now-ico a:hover span#icon {opacity:.6;}
					.vote-now-ico a:hover p#icon {opacity:1;}
		
		/* BETTER "Not voted yet" solution */		
		li.not-voted-yet-effect {
			width:52px; height:38px;
			display:block;
			float:none;
			position:absolute;
			left:75px;
			top: 2px;
			z-index:99;
			pointer-events: none;
			box-shadow:0 0 3px rgba(255,204,102,1), inset 0 0 4px rgba(255,204,102,1), inset 0 0 2px 1px rgba(255,204,102,.6);
			background:rgba(255,235,148,.25);
			animation: bring-ate 3s;
			-moz-animation: bring-ate 3s; /* Firefox */
			-webkit-animation: bring-ate 3s; /* Safari and Chrome */
			animation-iteration-count:infinite;
			-moz-animation-iteration-count:infinite; 
			-webkit-animation-iteration-count:infinite;
			}
			@keyframes bring-ate { 0% { opacity:.1; } 25% { opacity:.5; } 50% { opacity:1; } 75% { opacity:.5; } 100% { opacity:.1; } }
			@-moz-keyframes bring-ate { 0% { opacity:.1; } 25% { opacity:.5; } 50% { opacity:1; } 75% { opacity:.5; } 100% { opacity:.1; } }
			@-webkit-keyframes bring-ate { 0% { opacity:.1; } 25% { opacity:.5; } 50% { opacity:1; } 75% { opacity:.5; } 100% { opacity:.1; } }
			
			li.not-voted-yet-effect :hover { opacity:0; display:none;}
			
			
		.logged_in_bar .acc-menu {
		list-style:none;
		width:282px; height:42px;
		float:right;
		margin:5px 0 0 0;
		left: -9px;
		}
	    .logged_in_bar .acc-menu li {display:block; float:left;}
	    .logged_in_bar .acc-menu li a {height:42px; width:auto; display:block;}
		.logged_in_bar .acc-menu li a span {height:42px; width:auto; display:block;}
		.logged_in_bar .acc-menu li a p {
		height:42px; width:auto; 
		display:block;
		position:absolute;
		top:0; left:0;
		visibility:hidden;
		opacity:0;
		transition:visibility 0s linear 0.5s,opacity 0.5s linear;
		-moz-transition:visibility 0s linear 0.5s,opacity 0.5s linear;
		-webkit-transition:visibility 0s linear 0.5s,opacity 0.5s linear;
		-o-transition:visibility 0s linear 0.5s,opacity 0.5s linear;
		pointer-events:none;
		z-index:2;
		}
			
	    .logged_in_bar .acc-menu li a#acc-panel {width:76px;}
	    .logged_in_bar .acc-menu li a#vote {width:52px;}
	    .logged_in_bar .acc-menu li a#buy-coins {width:78px;}
	    .logged_in_bar .acc-menu li a#store {width:76px;}
		
		.logged_in_bar .acc-menu li a#acc-panel span {width:76px; background-position: 0px -485px;}
	    .logged_in_bar .acc-menu li a#vote span {width:52px; background-position:-76px -485px;}
	    .logged_in_bar .acc-menu li a#buy-coins span {width:78px; background-position:-128px -485px;}
	    .logged_in_bar .acc-menu li a#store span {width:76px; background-position:-206px -485px;}
		
		.logged_in_bar .acc-menu li a#acc-panel p {width:76px; background-position: 0px -535px;}
	    .logged_in_bar .acc-menu li a#vote p {width:52px; background-position:-76px -535px;}
	    .logged_in_bar .acc-menu li a#buy-coins p {width:78px; background-position:-128px -535px;}
	    .logged_in_bar .acc-menu li a#store p {width:76px; background-position:-206px -535px;}
		.logged_in_bar .acc-menu li a:hover p {
			opacity:1; 
			visibility:visible; 
			transition-delay:0s; 
			-moz-transition-delay:0s; 
			-webkit-transition-delay:0s;
			}
			
	/* Account sub pages 
	---------------------------------------------------------*/
	
	.account_sub_header {
	width:843px; height:57px;
	padding:0;
	overflow:hidden;
	background-image: url(styles/resource/css/login/images/misc/account_subhead_bg.png);
	background-repeat: no-repeat;
	}
	.account_sub_header .grad {
		width:100%; height:57px;
		background: -moz-linear-gradient(top,  rgba(255,255,255,.0090) 52%, rgba(255,255,255,0) 30%, rgba(255,255,255,0) 80%); /* FF3.6+ */
		background: -webkit-gradient(linear, left top, left bottom, color-stop(52%,rgba(255,255,255,.01)), color-stop(30%,rgba(255,255,255,0)), color-stop(100%,rgba(255,255,255,0))); /* Chrome,Safari4+ */
		background: -webkit-linear-gradient(top,  rgba(255,255,255,.01) 52%,rgba(255,255,255,0) 30%,rgba(255,255,255,0) 100%); /* Chrome10+,Safari5.1+ */
		background: -o-linear-gradient(top,  rgba(255,255,255,.01) 52%,rgba(255,255,255,0) 30%,rgba(255,255,255,0) 100%); /* Opera 11.10+ */
		background: -ms-linear-gradient(top,  rgba(255,255,255,.01) 52%,rgba(255,255,255,0) 30%,rgba(255,255,255,0) 100%); /* IE10+ */
		background: linear-gradient(top,  rgba(255,255,255,.01) 52%,rgba(255,255,255,0) 30%,rgba(255,255,255,0) 100%); /* W3C */
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#00ffffff',GradientType=0 ); /* IE6-9 */
		}
		.account_sub_header .page-title {
		float:left;
		font-family: 'Ebrima';
		font-weight: bold;
		color:#4d98fd;
		font-size:19px;
		letter-spacing:1px;
		text-transform:uppercase;
		margin: 15px 0 0 20px;
		text-shadow: 0 0 7px rgba(0,0,0,.57), 1px 1px 1px rgba(0,0,0,.35);
		}
		
		/* ACTIVE TITLE */
		div.sub-active-page {
			float:left;
			font-family: 'Ropa Sans', sans-serif;
			color:#918979;
			font-size:22px;
			letter-spacing:1px;
			text-transform:uppercase;
			text-shadow: 0 3px 1px rgba(0,0,0,.6), 0 0 5px rgba(0,0,0,.2);
			height:41px;
			padding:16px 0 0 32px;
			margin:0 0 0 7px;
			background:url(styles/resource/css/login/images/misc/sub-page-title-bg.png) no-repeat left;
			}
		
		.account_sub_header a {
		color: rgba(117,199,240,0.75);
		font-family: 'Ebrima';
		font-size: 11px;
		text-transform: uppercase;
		text-shadow: 1px 1px 1px rgba(0,0,0,.25);
		display:block;
		float:right;
		border: 1px solid rgba(0,0,0,.35);
		background: url(styles/resource/css/login/images/misc/back_to_acc_bg.png) no-repeat left rgba(255,255,255,.03);
		-webkit-border-radius: 3px;
		-moz-border-radius: 3px;
		border-radius: 3px;
		margin: 12px 13px 0 0;
		padding:9px 12px 10px 39px;
		box-shadow: inset 0 1px 0 rgba(194,181,132,.05), inset 0 0 3px rgba(255,255,255,.02), 0 0 10px rgba(0,0,0,.25);
		}
		.account_sub_header a:hover {background: url(styles/resource/css/login/images/misc/back_to_acc_bg.png) no-repeat left rgba(255,255,255,.04);}
		
	.page-desc-holder {
		width:843px;
		padding:25px 0 25px 0;
		font-size:14px;
		color:rgba(117,199,240,0.65);
		line-height:150%;
		text-shadow:0 0 4px rgba(0,0,0,.8), 0 1px 1px rgba(0,0,0,.5);
		}

/* GENERAL GAME STUFF */
	.poor {color:#2a2a2a;}			/* Poor */
	.common {color:#8d8d8d;} 		/* Common */
	.uncommon {color:#2f8d00;} 		/* Uncommon */
	.rare {color:#366281;} 			/* Rare */
	.epic {color:#643681;} 			/* Epic */
	.legendary {color:#ba6c2d;} 	/* Legendary */
	.artifact {color:#6b6139;} 		/* Artifact */
	.heirloom {color:#6b6139;} 		/* Heirloom */

	/* CLASS ICONS COLORS */
		
	.deathk {border-color:#c41e3b !important;}
	.druid {border-color:#ff7c0a !important;}
	.hunter {border-color:#95d357 !important;}
	.mage {border-color:#4d98b3 !important;}
	.paladin {border-color:#f48cba !important;}
	.priest {border-color:#FFF !important;}
	.rogue {border-color:#fff468 !important;}
	.shaman {border-color:#2359e4 !important;}
	.warlock {border-color:#9382c9 !important;}
	.warrior {border-color:#c69b6d !important;}

	/* ITEMS QUALITY */
		
	.items_results ul li div.poor .item-ico {border-color:#2a2a2a;}		/* Poor */
	.items_results ul li div.common .item-ico {border-color:#8d8d8d;} 	/* Common */
	.items_results ul li div.uncommon .item-ico {border-color:#2f8d00;} 	/* Uncommon */
	.items_results ul li div.rare .item-ico {border-color:#366281;} 		/* Rare */
	.items_results ul li div.epic .item-ico {border-color:#643681;} 		/* Epic */
	.items_results ul li div.legendary .item-ico {border-color:#ba6c2d;} 	/* Legendary */
	.items_results ul li div.artifact .item-ico {border-color:#6b6139;} 	/* Artifact */
	.items_results ul li div.heirloom .item-ico {border-color:#6b6139;} 	/* Heirloom */

	#poor span, .poor  {border-color:#2a2a2a !important;}				/* Poor */
	#common span, .common {border-color:#8d8d8d !important;} 			/* Common */
	#uncommon span, .uncommon {border-color:#2f8d00 !important;} 		/* Uncommon */
	#rare span, .rare {border-color:#366281 !important;} 				/* Rare */
	#epic span, .epic {border-color:#643681 !important;} 				/* Epic */
	#legendary span, .legendary {border-color:#ba6c2d !important;} 		/* Legendary */
	#artifact span, .artifact {border-color:#6b6139 !important;} 		/* Artifact */
	#heirloom span, .heirloom {border-color:#6b6139 !important;} 		/* Heirloom */	
			
	/* Select currency */
	.select-currency {
		text-shadow:0 0 3px #000; 
		left:120px;
		width:300px;
		padding:11px 0 8px 10px;
		background:rgba(0,0,0,.2);
		border-radius:4px;
		}
		
		.select-currency span {color:#616059; margin:0 7px 0 0; vertical-align: top; top: 4px; }
		.select-currency label { margin:0 7px 0 0;}
		.select-currency label p#sc {color:#656563;}
		.select-currency label p#gc {color:#a7863e;}
	
	/* Description */
	
	.description-small {
		font-size:12px;
		font-style:italic;
		color:#6b6761;
		text-shadow:0 0 5px #000;
		padding:0 0 20px 0;
		}
		
	/* ERROR PAGES */
	
	.under-construction {
		text-align:center;
		text-shadow:0 0 25px rgba(0,0,0,.9), 3px 4px 0 rgba(0,0,0,.5);
		}
		
		.under-construction span {  /* FONT OVERLAY */
			background:url(styles/resource/css/login/images/misc/font-overlay-grunge-1.png) no-repeat;
			display:block;
			width:100%; min-width:121; height:100%;
			position:absolute;
			top:-10px; left:0;
			}
		
		.under-construction .holder {
			padding:100px;
			}
			.under-construction h5 {
				font-family: guatami;
				font-size:90px;
				line-height:80%;
				margin:0 0 10px 0;
				color:#bf8839;
				}
			.under-construction h4 {
				font-family: guatami;
				font-size:27px;
				line-height:110%;
				text-transform:uppercase;
				color:#645c53;
				font-weight: bolder;
				}
	
	
	/* HOW TO EARN COINS */
	
	.how-coins {}
	
		.how-coins h2 {
			font-family: guatami;
			font-size:21px;
			text-transform:uppercase;
			font-weight:normal;
			text-shadow:0 0 8px rgba(0,0,0,.5), 2px 2px 0 rgba(0,0,0,.3);
			margin:0 0 10px 0;
			}
			.how-coins h2 span {  /* FONT OVERLAY */
			background:url(styles/resource/css/login/images/misc/font-overlay-grunge-1.png) no-repeat;
			display:block;
			width:100%; min-width:121; height:100%;
			position:absolute;
			top:-10px; left:0;
			}
			
			.how-coins h2#gold {color:#cb983f;}
			.how-coins h2#silver {color:#b7ae8e;}
			
			.how-coins h2#gold p {
				display:inline-block;
				background:url(styles/resource/css/login/images/misc/g-coin.png) no-repeat;
				width:21px; height:21px;
				top:4px; margin:0 10px 0 0;
				}
			.how-coins h2#silver p {
				display:inline-block;
				background:url(styles/resource/css/login/images/misc/s-coin.png) no-repeat;
				width:21px; height:21px;
				top:4px; margin:0 10px 0 0;
				}
			
			.how-coins ul {
				padding:0 0 20px 30px ;
				}
				.how-coins ul li {
					margin:0 0 20px 0;
					color:#554f48;
					text-shadow:0 0 4px rgba(0,0,0,.6);
					}
					.how-coins ul li a {
					font-family: 'Ropa Sans', sans-serif;
					font-size:14px;
					font-weight:bold;
					color:#766f66;
					}
					.how-coins ul li a:hover {color:#ebb533;}
				
				
	/* FEATURES Page */

	.features-bg-dark {
		width:980px; height:840px;
		background:url(styles/resource/css/login/images/page-backgrounds/features-bg-2.png) no-repeat top right, url(styles/resource/css/login/images/page-backgrounds/shadow-bot.png) no-repeat bottom left;
		background-color:rgba(0,0,0,.2);
		position:absolute;
		z-index:0;
		top:390px; left:0;
		box-shadow:inset 0 2px 1px rgba(0,0,0,.3), inset 0 -2px 1px rgba(0,0,0,.3), 0 1px 0 rgba(255,255,255,.03);
		border-radius:6px;
		overflow:hidden;
		}
		
	.features {}
	
	h1.features-row-title {
		color: #ca9916;
		display: block;
		font-family: guatami;
		font-size: 22px;
		font-weight: normal;
		text-shadow: 0 0 8px rgba(0,0,0,.8), 0 0 8px rgba(0,0,0,.3);
		text-transform: uppercase;
		z-index:1;
		text-align:left;
		padding:0 0 0 80px;
		}
			
			/* ADDON Row */
			.features ul {}
			
			.features ul li.w-addons {
			box-shadow: 0 0 4px rgba(0,0,0,.6), 0 1px 1px rgba(0,0,0,.5), inset 0 0 12px rgba(255,202,77,.05), inset 0 1px 0 rgba(255,202,77,.05), inset 0 0 0 1px rgba(255,202,77,.05);
			margin:20px 0 40px 0;
			text-align:left;
			}
			
			.features ul li.w-addons:first-child {margin:20px 0 50px 0;}
			
			.w-addon-row { margin:0;}
				.w-addon-row img { border-radius:4px; box-shadow:0 0 15px rgba(0,0,0,1); float:left; width:268px;}
				.addon-info {
					width:475px; 
					float:left; 
					margin:0 0 0 30px;
					text-shadow:0 0 14px rgba(0,0,0,.4), 2px 3px 0 rgba(0,0,0,.4);
					}
					.addon-info h1 {
						margin:0 0 18px 0;
						color:#afa288;
						font-size:21px;
						text-transform:uppercase;
						}
					.addon-info p {
						font-size:13px;
						height:78px;
						text-shadow:0 0 14px rgba(0,0,0,.4), 1px 1px 0 rgba(0,0,0,.4);
						color:#867f72;
						}
					.addon-info .war-links {
						margin:13px 0 0 0;
						}
						.addon-info .war-links a.download {
							display:inline-block;
							padding:7px 15px;
							border-radius:3px;
							background:#355c35;
							box-shadow:inset 0 0 0 1px rgba(0,255,0,.05),inset 0 1px 0 rgba(0,255,0,.1), 0 0 6px rgba(0,0,0,.4);
							color:#1f1f17;
							text-shadow:1px 1px 0 rgba(0,255,0,.1);
							font-weight:bold;
							text-transform:uppercase;
							}
							.addon-info .war-links a.download:hover {
							color:#e0bb28;
							text-shadow:0 0 4px rgba(0,0,0,.5), 0 1px 1px rgba(0,0,0,.5);
							background:#2c4e2c;
							}
				
				.feature-row {
					width:723px;
					margin:15px 0 0 0;
					z-index:2;
					}
					.feature-row img {border-radius:4px; box-shadow:0 0 15px rgba(0,0,0,1), 0 2px 3px rgba(0,0,0,1); float:left; width:90px;}
					
					.feature-row .info {
						text-shadow:0 0 14px rgba(0,0,0,.4), 1px 1px 0 rgba(0,0,0,.4);
						text-align:left;
						margin:0 0 0 20px;
						float:left;
						width:570px;
						}
						.feature-row .info h1 {margin:0 0 5px 0; color:#897f6b; font-size:16px; font-weight:bold; text-transform:uppercase; }
						.feature-row .info h2 {font-size:13px; height:78px; color:#6a6458; font-weight:normal; }
						
				
				
				/* WOTLK REALM */
				
				.wotlk-realm-banner {
					margin:60px 0 0 0;
					}
					.wotlk-realm-banner a {
						display:block;
						width:843px; height:92px;
						border-radius:4px;
						box-shadow:0 0 32px rgba(0,0,0,.8), 0 2px 3px rgba(0,0,0,.8);
						background:url(styles/resource/css/login/images/media/wotlk-banner.jpg) no-repeat;
						text-align:left;
						overflow: hidden;
						text-shadow:0 0 9px rgba(0,0,0,.6), 2px 2px 0 rgba(0,0,0,.2);
						transition:all 600ms;
						-moz-transition:all 600ms;
						-webkit-transition:all 600ms;
						-o-transition:all 600ms;
						}
						
						.wotlk-realm-banner a h1 , .wotlk-realm-banner a h2, .wotlk-realm-banner a p {margin:0; line-height:100%;}
						
						.wotlk-realm-banner a h1 {
						font-family: guatami;
						font-weight:normal;
						text-transform:uppercase;
						color:#d3a426;
						margin: 28px 0 0 330px;
						font-size:29px;
						}
						.wotlk-realm-banner a h2 {
						font-family: guatami;
						color:#b6b09f;
						font-size:18px;
						font-weight:normal;
						display:block;
						margin: 0 0 0 340px;
						}
						
					.wotlk-realm-banner a:hover { opacity:.8;}
	
	
	/* Gold Coins */
	
	.g-coin, .s-coin {
		width:21px; height:20px;
		display:inline-block;
		margin:0 0 0 0;
		top:5px;
		}
		.g-coin {background-position:-814px 0;}
		.s-coin {background-position:-835px 0;}
		
	/* Store Pagination */
	
	.pagination { list-style: none; float:right;}
		.pagination li {
		display:inline-block;
		color:#888172;
		text-shadow:0 1px 0 #000, 0 0 3px #000;
		}
		.pagination li a {
		color:#a47927;
		display:inline-block;
		padding:0 4px;
		}
		.pagination li p {
		display:inline-block;
		padding: 0px 2px;
		color:#2d2a25;
		text-shadow: 0 0 3px #000, 0 0 2px #000;
		top:-1px
		}
		.pagination li a:hover {color:#eeb041;}
		
/* Tooltip */
#tooltip, .tooltip {
	background-color:#070c21;
	background-color: rgba(7,12,33,0.9);
	border:1px solid #777777;
	border-top:1px solid #cfcfcf;
	-webkit-box-shadow: 0px 0px 3px #000;
	-moz-box-shadow: 0px 0px 3px #000;
	box-shadow: 0px 0px 3px #000;
	color: #fff;
	max-width: 400px;
	width: auto;
	position: absolute;
	display: none;
	z-index: 99999;
	padding: 7px;
	background-color:#070c21;
	background-color: rgba(7,12,33,0.9);
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
	border:1px solid #777777;
	border-top:1px solid #cfcfcf;
	-webkit-box-shadow: 0px 0px 3px #000;
	-moz-box-shadow: 0px 0px 3px #000;
	box-shadow: 0px 0px 3px #000;
	color: #fff;
	font-size: 12px;
	line-height:1.5;
}

/* Item quality colors */
.q  { color: #ffd100; }
.q0, .q0 a { color: #9d9d9d; border-color: #9d9d9d; }
.q1, .q1 a { color: #ffffff; border-color: #ffffff; }
.q2, .q2 a, .q2:hover { color: #1eff00; border-color: #1eff00; }
.q3, .q3 a { color: #0070dd; border-color: #0070dd; }
.q4, .q4 a { color: #a335ee; border-color: #a335ee; }
.q5, .q5 a { color: #ff8000; border-color: #ff8000; }
.q6, .q6 a { color: #e5cc80; border-color: #e5cc80; }
.q7, .q7 a { color: #e5cc80; border-color: #e5cc80; }
.q8, .q8 a { color: #ffff98; border-color: #ffff98; }
.q9, .q9 a { color: #71D5FF; border-color: #71D5FF; }
.q10, .q10 a { color: #ffd100; border-color: #ffd100; }

/* Sockets */
.socket-meta   { padding-left: 26px; background: url(../style/styles/resource/css/login/images/misc/sockets/socket_meta.gif) no-repeat left center }
.socket-red    { padding-left: 26px; background: url(../style/styles/resource/css/login/images/misc/sockets/socket_red.gif) no-repeat left center }
.socket-yellow { padding-left: 26px; background: url(../style/styles/resource/css/login/images/misc/sockets/socket_yellow.gif) no-repeat left center }
.socket-blue   { padding-left: 26px; background: url(../style/styles/resource/css/login/images/misc/sockets/socket_blue.gif) no-repeat left center }
.top_ranked_container {
    background: url(https://heroes-wow.com/wotlk/template/style/styles/resource/css/login/images/index_news_container.png) repeat top;
    box-shadow: 0 0 6px rgba(0,0,0,.25), 2px 2px 1px rgba(0,0,0,.05), inset 0 0 2px rgba(68,51,31,.35), inset 0 0 15px rgba(88,71,63,.20);
    border-radius: 4px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
}

.top_ranked {
    width:97.5%; 
    height:auto; 
    float:left;
    margin:0 0 0 12px;
    margin-right:12px;
    overflow:hidden;
}

.top_ranked .sub_header {
    width:100%; 
    height:55px;
    background:url(styles/resource/css/login/images/index_top_voters_bg.png) repeat top;
    margin: 0;
}

.top_ranked .sub_header h1 {
    width: auto;
    font-family:'Ebrima';
    font-weight: bold;
    float:left;
    font-size:15px;
    color:#a87c41;
    text-transform: uppercase;
    text-shadow:1px 1px 1px rgba(0,0,0,.25), 0 0 6px rgba(0,0,0,.25);
    margin:15px 0 0 16px;
}

.top_ranked .sub_header h2 {
    float:right;
    font-family: 'Ebrima';
    color:#493f34;
    text-shadow:1px 1px 1px rgba(0,0,0,.25);
    text-transform: uppercase;
    font-size:10px;
    margin:19px 16px 0 0;
}

.top_ranked .sub_header .title_overlay {
    margin: 15px 0 0 0;
    width: auto;
}

.ranking_container {
    width:auto;
    margin:0 auto;
}

ul.top_ranked_list {
    display:block; 
    margin:5px 0 0 0;
}

ul.top_ranked_list li {
    display:block;
    width: 100%;
    height:42px;
    background:url(styles/resource/css/login/images/misc/top_voters_line.png) no-repeat bottom;
    text-align:left;
    font-family: 'Ebrima';
    text-shadow: 1px 1px 1px rgba(0,0,0,.45);
}

ul.top_ranked_list li:last-child { 
    background: none;
}

ul.top_ranked_list li p {
    display:inline-block;
    color:#463c31;
    font-size:14px;
    margin:10px 0px 0 15px;
}

ul.top_ranked_list li .team-members
{
    width: 20%;
}

ul.top_ranked_list li .team-name
{
    width: 18%;
}

ul.top_ranked_list li .team-rank
{
    width: 2%;
}

ul.top_ranked_list li .team-rating
{
    width: 15%;
}

ul.top_ranked_list li .team-seasongames
{
    width: 20%;
}

ul.top_ranked_list li .team-seasonwins
{
    width: 10%;
}

ul.top_ranked_list li .team-seasonloses
{
    width: 10%;
}

ul.top_ranked_list li a {
    display:inline-block;
    color:#55493f;
    font-size:16px;
    margin:10px 0px 0 0;
}

ul.top_ranked_list li a:hover { 
    color:#817262;
}

ul.top_ranked_list li span {
    display:inline-block;
    color:#55493f;
    font-size:15px;
    font-weight: bold;
    margin:10px 0px 0 0;
}

ul.top_ranked_list li span i {
    font-style:normal;
    font-weight:normal;
    font-size:15px;
    color:#55493f;
}

.tooltipcus {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}

.tooltipcus .tooltiptext {
    visibility: hidden;
    width: 200px;
    background: rgba(33,25,20,.55);
    box-shadow: 0 0 6px #000, inset 0 0 0 1px rgba(255,255,255,.015), inset 0 1px 0 rgba(255,255,255,.05);
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    color: #fff;
    text-align: center;
    padding: 5px 0;
    border-radius: 6px;
    position: absolute;
    z-index: 1;
}

.tooltipcus .tooltiptext {
    top: -5px;
    left: 105%; 
}

.tooltipcus:hover .tooltiptext {
    visibility: visible;
}

.container_ranking {
	width:980px; height:auto; min-height:500px;
	background: rgba(33,25,20,.55);
	box-shadow: 0 0 6px #000, inset 0 0 0 1px rgba(255,255,255,.015), inset 0 1px 0 rgba(255,255,255,.05);
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	padding:40px 0 40px 0;
}

.statistics_note {
    background: rgba(0,0,0,.2);
    padding: 20px 10px;
    margin-top: 20px;
    width: 910px;
    border-radius: 8px;
    box-shadow: inset 0 0 8px rgba(0,0,0,.4);
}

.statistics_note h3 {
    font-size: 12px;
    font-family: calibrib;
    color: #3a352e;
    text-shadow: 0 0 3px rgba(0,0,0,.4), 1px 1px 1px rgba(0,0,0,.4);
}

.team-members img
{
    margin-left: 5px;
}
