<?php
date_default_timezone_set('Europe/Rome');
global $expire;$expire=time()+60*60*24*365*2;
$time=time();

if(strpos($_SERVER['REQUEST_URI'],'?')){
	$what=substr($_SERVER['REQUEST_URI'],0,strpos($_SERVER['REQUEST_URI'],'?'));
}else{
	$what=$_SERVER['REQUEST_URI'];
}

if(
	(isset($_GET['cookielaw'])&&$_GET['cookielaw']==='1')
){
	setcookie('cookielaw','1',$GLOBALS['expire'],'/','.jure.it');
	header('Location: '.$what.'?'.$time,TRUE,301);
}

$cookielaw=isset($_COOKIE['cookielaw'])?true:null;
?>
<?php @include $_SERVER[DOCUMENT_ROOT].'/minify.php'; ?>
<?php
	$protocol=(
		! empty($_SERVER['HTTP_X_FORWARDED_PROTO'])
		? $_SERVER['HTTP_X_FORWARDED_PROTO']
		: (!isset($_SERVER['HTTPS'])||$_SERVER['HTTPS']===''||$_SERVER['HTTPS']==='off'?'http':'https')
	);
	
	$canonical=implode('',array(
		$protocol,
		'://',
		$_SERVER['SERVER_NAME'],
		$what,
	));
	
	$uri=implode('',array(
		$protocol,
		'://',
		$_SERVER['SERVER_NAME'],
		$_SERVER['REQUEST_URI'],
	));
	
	function jure_analytics_cid(){
		$name='jure_analytics_cid';
		$value=isset($_COOKIE[$name])?$_COOKIE[$name]:mt_rand(0,2147483647);
		$expire=$GLOBALS['expire'];
		$path='/';
		$domain='.jure.it';
		setcookie($name,$value,$expire,$path,$domain);
		$_COOKIE[$name]=$value;
		return $value;
	}
	
?>
<!doctype html>
<html ⚡><head>
	<meta charset="utf-8">
	<link rel="canonical" href="<?php echo $canonical; ?>" />
	<title>Freelance Web Developer | PHP HTML5 FullStack FrontEnd BackEnd</title>
	<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
	<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
	<style amp-custom>
	<?php /*
	@font-face {
		font-family:'DiavloLight-Regular';
		src: url('fontie/DiavloLight-Regular_gdi.eot');
		src: url('fontie/DiavloLight-Regular_gdi.eot?#iefix') format('embedded-opentype'),
			url('fontie/DiavloLight-Regular_gdi.woff') format('woff'),
			url('fontie/DiavloLight-Regular_gdi.ttf') format('truetype'),
			url('fontie/DiavloLight-Regular_gdi.svg#DiavloLight-Regular') format('svg');
		font-weight: 300;
		font-style: normal;
		font-stretch: normal;
		unicode-range: U+0020-25CA;
	}
	*/ ?>
	<?php /*
	@font-face {
		font-family: 'diavlolight';
		src: url('fontsquirrel/diavlo_light_ii_37-webfont.eot');  / * IE9 Compat Modes * /
		src: local('?'),
			 url('fontsquirrel/diavlo_light_ii_37-webfont.eot?#iefix') format('embedded-opentype'), / * IE6-IE8 * /
			 url('fontsquirrel/diavlo_light_ii_37-webfont.woff') format('woff'), / * Modern Browsers * /
			 url('fontsquirrel/diavlo_light_ii_37-webfont.ttf') format('truetype'), / * Safari, Android, iOS * /
			 url('fontsquirrel/diavlo_light_ii_37-webfont.svg') format('svg'); / * Legacy iOS * /
		font-weight: normal;
		font-style: normal;
	}
	*/?>
	@font-face {
		font-family:'DiavloLight-Regular';
		src:url('/fontie/DiavloLight-Regular_gdi.woff') format('woff');
		font-weight:300;
		font-style:normal;
		font-stretch:normal;
		unicode-range:U+0020-25CA;
	}
	*{box-sizing:border-box;}
	HTML,BODY{
		min-height:100%;
	}
	BODY{margin:0;font-family:'DiavloLight-Regular',Trebuchet MS,Tahoma,Sans Serif;}
	BODY,h1,h2{
		color:#333;
	}
	A{
		text-decoration:none;
		color:#00f;
	}
	A:hover{
		text-shadow: 1px 1px 0 #fff, -1px 1px 0 #fff, 2px 0 0 #fff, -2px 0 0 #fff;
		box-shadow: inset 0 -1px 0 0 #fff, inset 0 -2px 0 0 #00f;
	}
	H1{
		background-color: #f8f8f8;
		padding: 20px 0;
	}
	FOOTER{
		margin-bottom:0.5em;
	}
	.table{display:table;}
	.tr{display:table-row;}
	.td{display:table-cell;vertical-align:middle;}
	.center{text-align:center;}
	.bottom{vertical-align:bottom;}
	.underline{}
	.h100p{height:100%;}
	.none{display:none;}
	.simpleList{line-height:1.8em;}
	.content{padding:0 4px;}
	
	#maintable{width:100%;height:100%;}
	
	#cookieBox{width:312px;margin:0 auto;padding:4px;border:2px solid #FF8800;border-width:1px 0;text-align:left;background-color:#FFEB9E;}
	#cookieImg{opacity:0.7;display:block;margin:0 5px;}
	#cookieBox:hover #cookieImg{opacity:1;}
	#cookieOk{margin-right:10px;background:#66AAFF;color:#fff;padding:0 1em;}
	#cookieInfo{color:#66AAFF;}
	A#cookieInfo:hover{
		text-shadow: 1px 1px 0 #FFEB9E, -1px 1px 0 #FFEB9E, 2px 0 0 #FFEB9E, -2px 0 0 #FFEB9E;
		box-shadow: inset 0 -1px 0 0 #FFEB9E, inset 0 -2px 0 0 #66AAFF;
	}
	A#cookieOk:hover{
		text-shadow:none;
		box-shadow:none;
	}
	<?php if($what==='/'){ ?>
	#jure #j{
		-webkit-transition-duration:0.4s;
		   -moz-transition-duration:0.4s;
		    -ms-transition-duration:0.4s;
		     -o-transition-duration:0.4s;
		        transition-duration:0.4s;
		-webkit-transition-delay:0s;
		   -moz-transition-delay:0s;
		    -ms-transition-delay:0s;
		     -o-transition-delay:0s;
		        transition-delay:0s;
		-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=30)";
				filter: alpha(opacity=30);
				opacity:0.3;
		font-size:80px;
	}
	#jure #u{
		-webkit-transition-duration:0.4s;
		   -moz-transition-duration:0.4s;
		    -ms-transition-duration:0.4s;
		     -o-transition-duration:0.4s;
		        transition-duration:0.4s;
		-webkit-transition-delay:0.1s;
		   -moz-transition-delay:0.1s;
		    -ms-transition-delay:0.1s;
		     -o-transition-delay:0.1s;
		        transition-delay:0.1s;
		-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=30)";
				filter: alpha(opacity=30);
				opacity:0.3;
		font-size:80px;
	}
	#jure #r{
		-webkit-transition-duration:0.4s;
		   -moz-transition-duration:0.4s;
		    -ms-transition-duration:0.4s;
		     -o-transition-duration:0.4s;
		        transition-duration:0.4s;
		-webkit-transition-delay:0.2s;
		   -moz-transition-delay:0.2s;
		    -ms-transition-delay:0.2s;
		     -o-transition-delay:0.2s;
		        transition-delay:0.2s;
		-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=30)";
				filter: alpha(opacity=30);
				opacity:0.3;
		font-size:80px;
	}
	#jure #e{
		-webkit-transition-duration:0.4s;
		   -moz-transition-duration:0.4s;
		    -ms-transition-duration:0.4s;
		     -o-transition-duration:0.4s;
		        transition-duration:0.4s;
		-webkit-transition-delay:0.3s;
		   -moz-transition-delay:0.3s;
		    -ms-transition-delay:0.3s;
		     -o-transition-delay:0.3s;
		        transition-delay:0.3s;
		-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=30)";
				filter: alpha(opacity=30);
				opacity:0.3;
		font-size:80px;
	}
	#jure:hover #j{
		-webkit-transition-duration:0.4s;
		   -moz-transition-duration:0.4s;
		    -ms-transition-duration:0.4s;
		     -o-transition-duration:0.4s;
		        transition-duration:0.4s;
		-webkit-transition-delay:0s;
		   -moz-transition-delay:0s;
		    -ms-transition-delay:0s;
		     -o-transition-delay:0s;
		        transition-delay:0s;
		-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
				filter: alpha(opacity=100);
		        opacity:1;
		font-size:100px;
		line-height:0.9em;
	}
	#jure:hover #u{
		-webkit-transition-duration:0.4s;
		   -moz-transition-duration:0.4s;
		    -ms-transition-duration:0.4s;
		     -o-transition-duration:0.4s;
		        transition-duration:0.4s;
		-webkit-transition-delay:0.1s;
		   -moz-transition-delay:0.1s;
		    -ms-transition-delay:0.1s;
		     -o-transition-delay:0.1s;
		        transition-delay:0.1s;
		-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
				filter: alpha(opacity=100);
		        opacity:1;
		font-size:100px;
		line-height:0.9em;
	}
	#jure:hover #r{
		-webkit-transition-duration:0.4s;
		   -moz-transition-duration:0.4s;
		    -ms-transition-duration:0.4s;
		     -o-transition-duration:0.4s;
		        transition-duration:0.4s;
		-webkit-transition-delay:0.2s;
		   -moz-transition-delay:0.2s;
		    -ms-transition-delay:0.2s;
		     -o-transition-delay:0.2s;
		        transition-delay:0.2s;
		-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
				filter: alpha(opacity=100);
		        opacity:1;
		font-size:100px;
		line-height:0.9em;
	}
	#jure:hover #e{
		-webkit-transition-duration:0.4s;
		   -moz-transition-duration:0.4s;
		    -ms-transition-duration:0.4s;
		     -o-transition-duration:0.4s;
		        transition-duration:0.4s;
		-webkit-transition-delay:0.3s;
		   -moz-transition-delay:0.3s;
		    -ms-transition-delay:0.3s;
		     -o-transition-delay:0.3s;
		        transition-delay:0.3s;
		-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
				filter: alpha(opacity=100);
		        opacity:1;
		font-size:100px;
		line-height:0.9em;
	}
	#jure .underline{
		-webkit-transition-duration:0.4s;
		   -moz-transition-duration:0.4s;
		    -ms-transition-duration:0.4s;
		     -o-transition-duration:0.4s;
		        transition-duration:0.4s;
		text-decoration:none;
		line-height:4.5em;
	}
	#jure:hover .underline{
		-webkit-transition-duration:0.4s;
		   -moz-transition-duration:0.4s;
		    -ms-transition-duration:0.4s;
		     -o-transition-duration:0.4s;
		        transition-duration:0.4s;
	}
	
	 #jure:hover .letter{
		display:inline-block;
	 }
	 #jure:hover .underline .letter{
		border-bottom:0.05em solid #333;
	 }
	<?php } ?>
	<?php /* if($what==='/info/'){
	
	#pdficon-container{
		margin-left:-9999px;
		position:absolute;
		top:10%;
		left:100%;
		height:80%;
	}
	#pdficon-container.enter,
	#pdficon-container.leave{
		margin-left:0;
	}
	#pdficon{
		height:100%;
		pointer-events:none;
	}
	#pdficon-container.enter #pdficon{
		
		-webkit-transition-duration:0.4s;
		   -moz-transition-duration:0.4s;
		    -ms-transition-duration:0.4s;
		     -o-transition-duration:0.4s;
		        transition-duration:0.4s;
				
		-webkit-transform: rotate(-38deg) scale(1) skew(0deg) translate(-100%) translateZ(0);
		   -moz-transform: rotate(-38deg) scale(1) skew(0deg) translate(-100%) translateZ(0);
		    -ms-transform: rotate(-38deg) scale(1) skew(0deg) translate(-100%) translateZ(0);
		     -o-transform: rotate(-38deg) scale(1) skew(0deg) translate(-100%) translateZ(0);
		        transform: rotate(-38deg) scale(1) skew(3deg) translate(-100%) translateZ(0);

	}
	#pdficon-container.leave #pdficon{
		
		-webkit-transition-duration:0.4s;
		   -moz-transition-duration:0.4s;
		    -ms-transition-duration:0.4s;
		     -o-transition-duration:0.4s;
		        transition-duration:0.4s;
	}
	} */ ?>
	<?php /*
	@media (max-width:767px) {
		FOOTER A{
			display:block;
			margin-top:0.5em;
		}
		FOOTER .hspacer{
			display:none;
		}
	}
	*/ ?>
	</style>
	<script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
    <script async src="https://cdn.ampproject.org/v0.js"></script>
</head><body>
<?php if($what==='/info/'){ ?>
<?php /*<div id="pdficon-container"><img id="pdficon" src="/Adobe_PDF_Icon_optimised.svg"></div>*/ ?>
<?php } ?>
<div class="table" id="maintable">
	<div class="tr"><div class="td center bottom">
		<header>
			<br>
			<a href="/?<?php echo $time; ?>">Home</a>
			<span class="hspacer">&nbsp;&nbsp;&nbsp;</span>
			<a href="/articoli/?<?php echo $time; ?>">Articoli</a>
			<span class="hspacer">&nbsp;&nbsp;&nbsp;</span>
			<a href="/gruppi/?<?php echo $time; ?>">Gruppi</a>
			<span class="hspacer">&nbsp;&nbsp;&nbsp;</span>
			<a href="/whishlist/?<?php echo $time; ?>">Whishlist</a>
			<span class="hspacer">&nbsp;&nbsp;&nbsp;</span>
			<a href="/info/?<?php echo $time; ?>">Info</a>
		</header>
	</div></div>
	<div class="tr"><div class="td center h100p content">
		<?php
		      switch($what){ 
		      case '/':
		?>
			<br>
			<br>
			<br>
			<br>
			<span id="jure">
				<span id="j" class="letter">j</span>
				<span class="underline">
					<span id="u" class="letter">u</span>
					<span id="r" class="letter">r</span>
					<span id="e" class="letter">e</span>
				</span>
			</span>
		<?php break; ?>
		<?php case '/articoli/': ?>
			<h1>Articoli</h1>
			<p class="simpleList">
				<a href="http://www.yourinspirationweb.com/author/giorgio-beggiora/">Your Inspiration Web</a><br>
				<a href="http://blog.artigianidelweb.it/search/label/giorgiobeggiora" target="_blank">Artigiani del Web blog</a><br>
				<a href="http://venezia.grusp.org/author/gbeggiora/" target="_blank">PUG Venezia</a><br>
				<a href="http://blog.sitebysite.it/author/giorgio-beggiora/" target="_blank">Site by Site blog</a><br>
				<a href="http://jure.wordpress.com" target="_blank">JS Power!</a><br>
			</p>
		<?php break; ?>
		<?php case '/gruppi/': ?>
			<h1>Gruppi</h1>
			<p class="simpleList">
				<a href="http://treviso.grusp.org/" target="_blank">PUG TV</a><br>
				<a href="http://venezia.grusp.org/" target="_blank">PUG VE</a><br>
				<a href="http://treviso.js.org" target="_blank">TrevisoJS</a><br>
				<a href="https://www.meetup.com/it/The-Ember-js-Treviso-Meetup/" target="_blank">EmberJS</a><br>
				<a href="https://www.meetup.com/it-IT/Padova-WordPress-Meetup/" target="_blank">WordPress PD</a><br>
				<a href="https://www.meetup.com/it-IT/Treviso-WordPress-Meetup/" target="_blank">WordPress TV</a><br>
			</p>
		<?php break; ?>
		<?php case '/info/': ?>
			<h1>Contatti</h1>
			<p>
				<a href="/cv/Giorgio Beggiora - cv.pdf"<?php /* onmouseenter="var p=document.getElementById('pdficon-container');p.className='enter';" onmouseleave="document.getElementById('pdficon-container').className='leave';"*/ ?>>
					Scarica Curriculum Vitae
				</a>
			</p>
			<h2>Info</h2>
			<p>
				<a href="/cookie-policy/?<?php echo $time; ?>">Cookie Policy</a>
			</p>
			<p>
				Questo sito è stato sviluppato osservando le specifiche&#32;<a href="https://www.ampproject.org/" target="_blank">Google AMP</a>&#32;per ottenere la maggior velocità di visualizzazione possibile.
			</p>
			<p>
				Ironicamente, ciò comporta una penalizzazione nel punteggio di PageSpeed Insights, comunque alto.
			</p>
			<p>
				Ultima modifica:&#32;<?php echo date('d-m-Y',filemtime(__FILE__)); ?><br>
				Velocità:&#32;<&#32;1s<br>
				PageSpeed:&#32;<a href="https://developers.google.com/speed/pagespeed/insights/?url=https%3A%2F%2Fjure.it%2F&tab=mobile" target="_blank">90/100</a><br>
			</p>
			<?php /*è volutamente molto semplice,<br>solo testo e poco più.<br>Niente framework o cms.<br>Così facendo ho ottenuto con poco sforzo<br>un sito che si carica in meno di un secondo<br>e con il <a href="https://developers.google.com/speed/pagespeed/insights/?url=https%3A%2F%2Fjure.it&tab=mobile">massimo punteggio di PageSpeed</a><br>possibile usando Google Analytics<br>(integrarlo costa 1 punto).<br>Questi due obiettivi per me<br>sono la priorità in qualunque progetto,<br>da quello in Wordpress<br>a quello personalizzato.<br>In un certo senso, è come<br>se avessi aderito<br>al progetto <a href="https://www.ampproject.org/" target="_blank">AMP</a> di Google<br>
			*/?>
		<?php break; ?>
		<?php case '/whishlist/': ?>
			<h1>Whishlist</h1>
			<p>
			<?php
				$whishlist=array(
					'http://www.amazon.it/registry/wishlist/1R7DT7MDNPCXC',
					'http://www.amazon.it/registry/wishlist/1KUMAGUCEV21F',
					'http://www.giochiuniti.it/index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=473&virtuemart_category_id=11&lang=it',
					'http://www.amazon.com/Nuop-Design-Black-Pizza-Cutter/dp/B008N3FFQ0/ref=sr_1_1/175-5250925-2217608?ie=UTF8&qid=1447375412&sr=8-1&keywords=pizza+pi+cutter',
					'https://wikimediafoundation.org/wiki/Ways_to_Give/it',
				);
				foreach($whishlist as $i=>$url){
					echo'<a href="'.$url.'" target="_blank">'.($i+1).'</a>&#32;';
				}
			?>
			</p>
		<?php break; ?>
		<?php case '/cookie-policy/': ?>
			<h1>Cookie Policy</h1>
			<p>
				<a href="http://www.garanteprivacy.it/cookie" target="_blank">Normativa EU in materia di cookie</a>
			</p>
			<p>
				Questo sito usa i seguenti cookie.
			</p>
			<h2>Tecnici</h2>
			<p>
				<strong>_cfduid</strong> per il servizio <a href="https://support.cloudflare.com/hc/en-us/articles/200170156-What-does-the-CloudFlare-cfduid-cookie-do-" target="_blank">Cloudflare</a><br>
				<strong>cookielaw</strong> per ricordare la scelta se si accettano o meno i cookie di profilazione<br>
			</p>
			<h2>Profilazione</h2>
			<p>
				<strong>jure_analytics_cid</strong> per <a href="https://www.google.com/intl/it_it/analytics/" target="_blank">Google Analytics</a>
			</p>
		<?php break; ?>
		<?php default: ?>
			<h1>404</h1>
			<p>Pagina non trovata</p>
			<?php header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found"); ?>
		<?php break; ?>
		<?php } ?>
		<?php if(is_null($cookielaw)){ ?>
		<div id="cookieBox" class="table">
			<div class="tr">
				<div class="td">
					<figure id="cookieImg"><amp-img src="/Emojione_1F36A_optimised.svg" attribution="https://github.com/Ranks/emojione" layout="fixed" width="36" height="36"></amp-img></figure>
				</div>
				<div class="td">
					jure vorrebbe usare i cookie<br>
					di profilazione, sei d'accordo?<br>
					<div>
						<a id="cookieOk" href="?<?php echo $time; ?>&amp;cookielaw=1">OK</a>
						<a id="cookieInfo" href="/cookie-policy/?<?php echo $time; ?>">informativa sui cookie</a>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	</div></div>
</div>
<?php /*<script>
var page_curr=null;
function menu(pathname,href){
	var components=pathname.split('/').splice(1);
	if(components.length>1)components.splice(-1,1);
	
	if(components.length){
		if(components.length==1){
			if(components[0]==='')components[0]='home';
			var collection=document.querySelectorAll('#menu-'+components[0]);
		}else{
			var collection=[];
		};
		if(collection.length){
			if(page_curr!=null){
				document.querySelectorAll('#menu-'+page_curr)[0].classList.add('none');
			};
			page_curr=components[0];
			history.pushState({},"",href);
			collection[0].classList.remove('none');
		};
	}
};
(function(){
	var footerLinks=document.querySelectorAll('footer a'),i=footerLinks.length;
	while(i--){
		var a=footerLinks[i];
		if(!a.target){
			a.addEventListener('click',function(event){
				event.preventDefault();
				menu(this.getAttribute('href'),this.href);
			},false);
		};
	};
	menu(location.pathname,location.href);
})();
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-27181692-3', 'jure.it');
  ga('send', 'pageview');

</script>
*/?>
<?php if($cookielaw){ ?>
<amp-analytics type="googleanalytics">
<script type="application/json">
{
  "vars": {
    "account": "UA-27181692-3"
  },
  "triggers": {
    "trackPageview": {
      "on": "visible",
      "request": "pageview"
    }
  }
}
</script>
</amp-analytics>
<?php /*
<amp-pixel src="https://ssl.google-analytics.com/collect?v=1&amp;tid=UA-27181692-3&amp;t=pageview&amp;cid=<?php echo jure_analytics_cid(); ?>&amp;dt=$TITLE&amp;dl=$CANONICAL_URL&amp;z=$RANDOM"></amp-pixel>
*/ ?>
<?php } ?>
</body></html>