
<!--
- Header
- Default page — use Atomic Design
- Footer snippet
-->

<!DOCTYPE html>
<html lang="<?php
// I'm Using .htaccess to redirect users to a language directory.
// The language.php template handles the case of no detectable
// language preference.

// Extract the language and locale preference from the URL. It assumes
// http(s)://sub.domain.tld:0000/en-US/path where 'sub.', '.tld', and
// ':0000' are optional
$locale = substr(
	preg_replace(
		'/^(http(s)?:\/\/)[A-z0-9@\.:ßàÁâãóôþüúðæåïçèõöÿýòäœêëìíøùîûñé]+/',
		'',
		$page->url()),
	1, 6);

// Echo the locale into the lang-attribute if there was one,
// otherwise use en-US
echo ((preg_match('/[a-z]{2}-[A-Z]{2}/', $locale))?$locale:'en-US');
?>">
	<head>
		<meta charset="UTF-8">
		
		<!-- Using Kirby CSS feature -->
		<?= css('assets/foundation.css') ?>
		
		<!-- CONTAINS A COLOR THAT CANNOT BE REFERENCED FROM CSS COLOR VARIABLES, NEEDS TO BE MAINTAINED! -->
		<meta name="theme-color" media="(prefers-color-scheme: light)" content="#FCFDFB">
		<meta name="theme-color" media="(prefers-color-scheme: dark)" content="#1C1D1B">
		
	</head>
	<body>
		<header>
			<h1 class="desktop"><span class="accent">Wenzel&nbsp;Massag</span>&nbsp;&mdash; <nobr>UX-, UI-,</nobr>
				<nobr>Web-Designer,</nobr> Technologist, Eierlegende Wollmilchsau.
			</h1>
			<h1 class="tablet"><span class="accent">Wenzel&nbsp;Massag</span>&nbsp;&mdash; <nobr>UX-, UI-,</nobr>
				<nobr>Web-Designer,</nobr> Technologist.
			</h1>
			<h1 class="mobile"><span class="accent">Wenzel&nbsp;Massag</span>&nbsp;&mdash; <nobr>UX-, UI-,</nobr>
				<nobr>Web-Design & Code</nobr>
			</h1>
			
			<nav>
				<!--
						The input[type=checkbox] triggers all .triggered nodes to change the menu icon and show/hide the menu
					-->
				<input type="checkbox" value="false" id="nav-toggle">
				<label for="nav-toggle" class="triggered">
					<svg class="icon" id="menu">
						<use href="/assets/iconSprite.svg#menu"></use>
					</svg>
					<svg class="icon" id="close">
						<use href="/assets/iconSprite.svg#error"></use>
					</svg>
				</label>
		
				<ul class="menu triggered">
					<li><a href="/" class="current">Projekte</a></li>
					<li><a href="/cv/">Vita</a></li>
					<li><a href="mailto:hello@wenzels.design?subject=Eierlegende Wollmilchsau&body=Hallo Wenzel!" role="button">Kontakt</a></li>
				</ul>
			</nav>
		</header>
		<?= $page->title() ?>
	</body>
</html>
