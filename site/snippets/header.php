<html lang="de-DE">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<!-- Using Kirby CSS feature -->
		<?= css('assets/foundation.css') ?>
		<?= (isset($class)) ? css("assets/$class.css") : ''; ?>
		
		<!-- CONTAINS A COLOR THAT CANNOT BE REFERENCED FROM CSS COLOR VARIABLES, NEEDS TO BE MAINTAINED! -->
		<meta name="theme-color" media="(prefers-color-scheme: light)" content="#FCFDFB">
		<meta name="theme-color" media="(prefers-color-scheme: dark)" content="#1C1D1B">
	</head>
<body>
	<header>
		<a href="<?= $site->url() ?>" tabindex="1"><?= get_header_title_as_html($site) ?></a>
		<nav>
			<!--
					The input[type=checkbox]#nav-toggle triggers all .triggered-by-nav-toggle nodes to change the menu icon and show/hide the menu
				-->
			<input type="checkbox" value="false" id="nav-toggle">
			<label for="nav-toggle" class="triggered-by-nav-toggle">
				<svg class="icon" id="menu">
					<use href="/assets/iconSprite.svg#menu"></use>
				</svg>
				<svg class="icon" id="close">
					<use href="/assets/iconSprite.svg#error"></use>
				</svg>
			</label>
	
			<ul class="menu triggered-by-nav-toggle">
				<?php
					echo("<li><a href='". $site->homePage()->url() ."' class='button nav-button'>". $site->homePage()->title() ."</a></li>");
					foreach($site->children()->listed() as $navItem){
						echo("<li><a href='". $navItem->url() ."' class='button nav-button'>". $navItem->title() ."</a></li>");
					}
				?>
				<li><a href="<?= $site->contact_link() ?>" role="button" class="nav-button CTA"><svg class="icon inline">
					<use href="/assets/iconSprite.svg#letter-heart"></use>
				</svg><?= $site->contact_label() ?></a></li>
			</ul>
		</nav>
	</header>