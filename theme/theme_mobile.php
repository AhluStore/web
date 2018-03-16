<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<title>Cigar Boss</title>
		
		<!-- Current Theme -->
		<script src="<?php echo site_url_lib("js/jquery-1.9.1.min.js");?>"></script>
		<script src="<?php echo site_url_lib("js/jquery-migrate-1.2.1.js");?>"></script>
		<script src="<?php echo site_url_lib("js/ahlu.js");?>"></script>

		<link rel="stylesheet"  href="<?php echo site_url_theme("ahlu.css");?>">
	
	
        <script src="<?php echo site_url_theme("assets/js/retina-1.1.0.min.js");?>"></script>
		<script src="<?php echo site_url_lib("js/jquery.validate.min.js");?>"></script>
		<script src="<?php echo site_url_lib("js/jquery.serializeObject.min.js");?>"></script>
        <script src="<?php echo site_url_theme("assets/js/scripts.js");?>"></script>
		

		<!-- Mobile -->
		<link rel="stylesheet" type="text/css" href="<?php echo site_url_theme("mobile/css/ahlu-ui.css");?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo site_url_theme("mobile/css/animations.css");?>" />
		<link rel="stylesheet"  href="<?php echo site_url_theme("mobile/css/bootstrap.min.css");?>">
		<link rel="stylesheet"  href="<?php echo site_url_theme("mobile/css/font-awesome.css");?>">
		<link rel="stylesheet" type="text/css" href="<?php echo site_url_theme("mobile/css/loader.css");?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo site_url_theme("mobile/css/sidebar.css");?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo site_url_theme("mobile/css/foundation-mobile.css");?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo site_url_theme("mobile/css/bar-ui.css");?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo site_url_theme("mobile/css/theme-ui.css");?>" />

		<script src="<?php echo site_url_theme("mobile/js/modernizr.custom.js");?>"></script>
		<script src="<?php echo site_url_theme("mobile/js/pagetransitions.js");?>"></script>
		<script src="<?php echo site_url_theme("mobile/js/Android.js");?>"></script>
		<script src="<?php echo site_url_theme("mobile/js/jquery.longpress.js");?>"></script>
		<script src="<?php echo site_url_theme("mobile/js/jgestures.js");?>"></script>
        <script src="<?php echo site_url_theme("mobile/js/ahlu-ui.js");?>"></script>
        <script src="<?php echo site_url_theme("mobile/js/ahlu-bar.js");?>"></script>
		
		<!-- Jquery mobile -->
		<script src="<?php echo site_url_theme("mobile/jquery/jquery.mobile-1.3.0-beta.1.js");?>"></script>
		<!--
		<link rel="stylesheet" type="text/css" href="<?php echo site_url_theme("mobile/jquery/jquery.mobile-1.1.0.min.css");?>" />
		-->
		
		<!-- More -->
		<script>
		var Ahlu_Plugin_URL ="<?php echo site_url_theme("mobile/plugins/");?>";
		</script>
		
        <script src="<?php echo site_url_theme("mobile/js/jquery.backstretch.min.js");?>"></script>
		<link rel="stylesheet"  href="<?php echo site_url_theme("mobile/plugins/notification/notification.css");?>">
        <script src="<?php echo site_url_theme("mobile/plugins/notification/jquery.notification.js");?>"></script>
		
		<script src="<?php echo site_url_theme("mobile/plugins/pullToRefresh/jquery.p2r.min.js");?>"></script>
        <script src="<?php echo site_url_theme("mobile/plugins/popup/popup.js");?>"></script>
	
		
		<!-- theme -->
		<link rel="stylesheet" href="<?php echo site_url_theme("assets/css/style.css");?>">
		<script src="<?php echo site_url_theme("assets/js/retina-1.1.0.min.js");?>"></script>
        <script src="<?php echo site_url_theme("assets/js/scripts.js");?>"></script>
		
		
		<script>
			var SOUND_NOTIFY ="<?php echo site_url_theme("mobile/plugins/notification/sound/tiny-bell-sms.mp3");?>";
			
			$(document).ready(function(e){
				$.backstretch("<?php echo site_url_theme("mobile/images/bg.jpg");?>");
				
				
				$(".fixed-bottom").hide();
				$(window).bind("resize",function(e){
					e.preventDefault(); 
					 $('.logo_screen').css({
						position: 'absolute',
						left: ($(window).width() - $('.logo_screen').outerWidth()) / 2,
						top: ($(window).height() - $('.logo_screen').outerHeight()) / 2
					  });

				});
				$(window).trigger("resize");
				
				setTimeout(function(){
					//reset pointer page
					window.ahluHistory.active = "home";
					
					window.Page.changePage("#home");
					$(".fixed-bottom").show();
					
				},2000);

	
				
				//$(document).foundation();
				//prevent loader url
				window.URLLOADER = false;
				
				if(window.AhluJSBrigde){
					window.AhluJSBrigde.ready(function(android){
						//call android
						//android.system.alert("");
						//android.system.File("file");
						//android.system.Folder("file");
						//android.system.SDCard("file");
						
						//alert("version :"+window.platformOS.version);
						//listen data from android
						android.Event.on("barcode",function(code){
							
						});
						
						$(".page-footer a.barcode").live("click",function(e){
								e.preventDefault();
								android.call("Barcode");

								$(".page-footer a").removeClass("active");
								
								$(this).addClass("active");

						});
						
						
					});
					
					
					//get event refresh
					window.System.listen("AhluRefresh",function(){
						alert("AhluRefresh");
					});
					
					window.System.listen("AhluBack",function(){
						window.ahluHistory.back();
					});
				}
				
				
				$("#test").live("click",function(e){
					//play notification
					if(window.AhluJSBrigde){
						Android().call("NotificationBar",JSON.stringify({
							time : (new Date()).getTime(),
							user : 001,
							message : "hello my friend"
						}));
					}	
					
					//notification from JS
					window.Notifycation.register("cigarApp",{icon:"",title:"Notifycation",content:"helloworld"},function(msg){
						alert("start window");
						
						//open new page
						//this.remove();
					});
					
					
					//reresh page, delete and still keeps
					//window.Page.changePage("page.php",{isURI:true,id_page:"demo",refresh:true});
					// don't refresh
					//window.Page.changePage("page.php",{isURI:true,id_page:"demo"});
					//pointer hash
					//<a id="getHash" href="#pagw-4" style="z-index: 100000;position: absolute;">Use hash pagw-4</a>
					
					//direct link just once
					//<a href="lien-he.html" data-page="true" data-page-id="demo" data-page-refresh="false" style="z-index: 100000;position: absolute;"><i class="fa fa-map-marker">&nbsp;</i></a>
					
					//direct link ref
					//<a href="lien-he.html" data-page="true" data-page-id="demo" style="z-index: 100000;position: absolute;"><i class="fa fa-map-marker">&nbsp;</i></a>
				});
				
				
				
				window.Page.events.on("pageBeforeChange",function(e,data){
					console.log(data);
					//check main page
					if(data.toPage && data.id_page==window.ahluHistory.active){
						$(".btn-back").hide();
					}else{
						$(".btn-back").show();
					}
				});
			});
		</script>
	</head>
	<body>
		
		<div class="navbar navbar-inverse navbar-no-bg" id="sidebar">

				<div class="navbar-header">
					
					<a class="" href="index.html" style="color: #fff;font-size: 2em;"><span>Ahlu<span style="font-size: 3em;position: relative;top: 26px;">S</span>hop</span><br /><span style="    font-size: 0.7em;
    line-height: 15px;
    position: relative;
    top: -16px;    left: 120px;">wing on your way</span></a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<span class="li-text">
								on <?php echo date("l F d, Y"); ?>.
							</span> 
							<span class="li-text">
								Follow us: 
							</span> 
							<span class="li-social">
								<a href="#"><i class="fa fa-facebook"></i></a> 
								<a href="#"><i class="fa fa-twitter"></i></a> 
								<a href="#"><i class="fa fa-envelope"></i></a> 
								<a href="#"><i class="fa fa-skype"></i></a>
							</span>
						</li>
					</ul>
				</div>
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Explore</a></li>
					<li><a href="#">Users</a></li>
					<li><a href="#">Sign Out</a></li>
				</ul>
		</div>
			<div id="intro" class="ahlu-page ahlu-page-current">
					<div class="logo_screen">
						<img src="<?php echo site_url_theme("mobile/images/logo-intro.png");?>" />
					</div>					
			</div>

			<div id="home" class="ahlu-page ahlu-page-1">
				<div class="ahlu-header"></div>
				<div class="ahlu-body">
					<!-- Top content -->
					<div class="top-content">
						
						<div class="inner-bg">
							<div class="container">
								<?php echo $theme->content; ?>
							</div>
						</div>
						
					</div>
				</div>
				<div class="ahlu-footer"></div>
			</div>

		
<!--Top bar-->	
<div class="fixed-bottom" style="top:0;width:100%;bottom: initial;">
	<nav class="top-bar simple-bar">
		<div class="page-footer row" style="text-align: left;background:#3450db;margin:0;">
			<div class="col-m5-4 col-xs-4"><a href="#" class="btn-back" style="display:none;"><span>Back</span></a></div>
			<div class="col-m5-4 col-xs-4 page-title"></div>
			<div class="col-m5-4 col-xs-4"><a href="product/cart" mvc="true"  data-before="0" class=" btn-cart btn-cart-icon  fa fa-shopping-cart" style="position: relative;float: right;"></a></div>
		</div>
	</nav>
</div>
<!--Bottom bar-->		
<div class="fixed-bottom">
    <nav class="top-bar bottom-bar">
      <div class="page-footer">
				<a href="#home" class="active page-url"><i class="fa fa-home">&nbsp;</i></a>
				<a href="product/category" mvc="true" class="page-url"><i class="fa fa-photo">&nbsp;</i></a>
				<a href="map/" mvc="true" class="page-url"><i class="fa fa-map-marker">&nbsp;</i></a>
				<a href="setting/" mvc="true" class="page-url"><i class="fa fa-th">&nbsp;</i></a>
				<a href="#barcode" data-to="barcode" class="barcode"><i class="fa fa-qrcode">&nbsp;</i></a>
		</div>
    </nav>
  </div>
	</body>
</html>