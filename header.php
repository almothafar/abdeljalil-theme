<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">

	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	

	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->

<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />

	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />

	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />

	<script language="JavaScript" src="<?php bloginfo('template_directory'); ?>/files/qTip.js" type="text/JavaScript"></script>

	<script language="JavaScript" src="<?php bloginfo('template_directory'); ?>/files/scroll.js" type="text/JavaScript"></script>

	<script language="JavaScript" src="<?php bloginfo('template_directory'); ?>/files/jQuery162.js" type="text/JavaScript"></script>

	<script language="JavaScript" src="<?php bloginfo('template_directory'); ?>/files/Abdeljalil.js" type="text/JavaScript"></script>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_get_archives('type=monthly&format=link'); ?>

	<?php //comments_popup_script(); // off by default ?>

<?php wp_head(); ?>
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-984089-10']);
	  _gaq.push(['_trackPageview']);

	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
	<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
	  {lang: 'ar'}
	</script>

	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script>
		 (adsbygoogle = window.adsbygoogle || []).push({
			  google_ad_client: "ca-pub-1244440343559843",
			  enable_page_level_ads: true
		 });
	</script>
</head>

<body>

<div id="navbar">

	<div id="n-right">

		<?php wp_page_menu('show_home=1&sort_column=post_date'); ?>

	</div>

	<div id="n-left">

		<?php include(TEMPLATEPATH . '/searchform.php'); ?>

	</div>

</div>

<div id="header">

<div id="header-image">

	    <div id="blog-name"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></div>

	    <div id="description"><?php bloginfo('description'); ?></div>

</div>

</div>

<div id="wrapper">