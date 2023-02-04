
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
			<?php
				// Display different site-titles depending on availability
				$hasTabletTitle = $site->title_tablet()->exists();
				$hasMobileTitle = $site->title_mobile()->exists();

				// If there is only one title display it to all viewport sizes
				if(!$hasTabletTitle && !$hasMobileTitle) {
					echo("<h1>".$site->title()."</h1>");

				// If there is n additional mobile but no tablet title, use the
				// desktop title for desktop and tablet, but mobile for mobile
				}elseif(!$hasTabletTitle && $hasMobileTitle){
					echo("<h1 class='desktop tablet'>".$site->title()."</h1>");
					echo("<h1 class=mobile>".$site->title_mobile()."</h1>");

				// If there is an additional title for tablet, but no mobile-
				// title, use the desktop-title for desktop, and the tablet-
				// title for tablet and mobile
				}elseif($hasTabletTitle && !$hasMobileTitle) {
					echo("<h1 class='desktop'>".$site->title()."</h1>");
					echo("<h1 class='tablet mobile'>".$site->title_tablet()."</h1>");

				// If there is a desktop-, tablet-, and mobile-title, use them
				// respectively
				}elseif($hasTabletTitle && $hasMobileTitle){
					echo("<h1 class=desktop>".$site->title()."</h1>");
					echo("<h1 class=tablet>".$site->title_tablet()."</h1>");
					echo("<h1 class=mobile>".$site->title_mobile()."</h1>");
				}
			?>
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
