<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php $path = sfConfig::get('sf_relative_url_root', preg_replace('#/[^/]+\.php5?$#', '', isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : (isset($_SERVER['ORIG_SCRIPT_NAME']) ? $_SERVER['ORIG_SCRIPT_NAME'] : ''))) ?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>International Hapkido Alliance - Internal Error</title>
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="stylesheet" type="text/css" media="screen"
	href="<?php echo $path ?>/css/layout.css" />
</head>
<body>
	<div id="Background"></div>
	<div class="clear"></div>
	<div id="HeaderBand"></div>
	<div id="Wrapper">
		<div id="Header">
			<div class="Navigation">
				<ul class="menu">
					<li class="first"><a href="<?php echo $path ?>/">HOME</a>
					</li>
					<li><a href="<?php echo $path ?>/MerchandiseDVDSeries.html">MERCHANDISE</a>
						<ul class="menu_level_1">
							<li class="first"><a href="<?php echo $path ?>/MerchandiseDVDSeries.html">DVD
									Series</a>
							</li>
							<li><a href="#">|&nbsp;</a>
							</li>
							<li><a href="<?php echo $path ?>/MerchandiseIHADanBong.html">IHA Dan Bong</a>
							</li>
							<li><a href="#">|&nbsp;</a>
							</li>
							<li class="last"><a href="<?php echo $path ?>/MerchandiseTShirts.html">T-Shirts</a>
							</li>
						</ul>
					</li>
					<li><a href="<?php echo $path ?>/instructors.html">INSTRUCTORS/BLACK BELT</a>
					</li>
					<li><a href="<?php echo $path ?>/forum.html">FORUM</a>
					</li>
					<li><a href="<?php echo $path ?>/knowledge_base.html">KNOWLEDGE BASE</a>
					</li>
					<li><a href="<?php echo $path ?>/dojang.html">DOJANG</a>
					</li>
					<li class="last"><a href="<?php echo $path ?>/contact_us.html">CONTACT</a>
					</li>
				</ul>
			</div>
			<div class="Navigation NavigationRight">
				<ul class="menu">
					<li class="first last"><a href="<?php echo $path ?>/wikikido.html">WIKIKIDO</a>
					</li>
				</ul>
			</div>

		</div>
		<div class="clear"></div>
		<div id="PageContent">
			<div id="ContentLeft" class="img_500">
				<div class="page_title">
					<h1 class="hspace">Oops! Something unexpected has happened</h1>
				</div>
				<div class="term_404">
					<p>Hmmm ...seems one of our pages hasn't returned from its break -
						is it a lesson back?</p>
					<p>Hit the <a href="javascript:history.go(-1)">back</a> button for now.</p>
				</div>
			</div>
			<div id="ContentRight"></div>
		</div>

	</div>
	<div id="Footer" class="tl">
		<div class="content">
			<ul>
				<li><a href="<?php echo $path ?>/about_iha.html">ABOUT INTERNATIONAL
						HAPKIDO ALLIANCE</a></li>
				<li><span>|</span></li>
				<li><a href="<?php echo $path ?>/privacy_policy.html">PRIVACY POLICY</a>
				</li>
				<li><span>|</span></li>
				<li><a href="<?php echo $path ?>/term_of_use.html">TERM OF USE</a></li>
				<li><span>|</span></li>
				<li><a href="<?php echo $path ?>/contact_us.html">CONTACT US</a></li>
				<li><span>|</span></li>
				<li><span><a href="http://www.dimitristangl.com/">&copy; 2012 DESIGN
							DIMITRI STANGL</a> </span></li>
				<li><span>|</span></li>
				<li><span><a href="" class="boldblue">SUBSCRIBE TO OUR NEWSLETTER</a>
				</span></li>
			</ul>
		</div>
	</div>

</body>
</html>
