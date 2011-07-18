<?php
	$js = array("general.js", "jquery.easing-1.3.pack.js", "jquery.fancybox-1.3.4.pack.js");
	$css = array("general.css", "jquery.fancybox-1.3.4.css");
	
	if(isset($javascripts) && count($javascripts) > 0) $js = array_merge($js, $javascripts);
	if(isset($stylesheets) && count($stylesheets) > 0) $css = array_merge($css, $stylesheets);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>APNS Console<?=((isset($sub_title))? ' | '.$sub_title : '')?></title>
		<link rel="shortcut icon" href="/assets/images/icons/favicon.ico" type="image/x-icon" />
		<script src="/assets/js/jquery-1.6.1.min.js" type="text/javascript"></script>
		<?php foreach($js as $file): ?>
			<script src="/assets/js/<?=$file?>" type="text/javascript"></script>
		<?php endforeach;?>
		
		<?php foreach($css as $file): ?>
			<link rel="stylesheet" href="/assets/css/<?=$file?>" type="text/css" />
		<?php endforeach;?>
		<?php if(isset($google_analytics_id)): ?>
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', '<?= $google_analytics_id ?>']);
			_gaq.push(['_trackPageview']);
			(function() { 
				var ga = document.createElement('script');
				ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(ga, s);
			})();
		</script>
		<?php endif; ?>
	</head>
	<body>
		<div id="top_banner">
			<h1>APNS Console</h1>
		</div>