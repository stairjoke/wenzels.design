
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
		<title></title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/style.css" rel="stylesheet">
	</head>
	<body>
		<?= $page->title() ?>
	</body>
</html>
