<?php
function get_locale_from_url($url){
	// I'm using .htaccess to redirect users to a language directory.
	// The language.php template handles the case of no detectable
	// language preference.
	
	// Extract the language and locale preference from the URL. It assumes
	// http(s)://sub.domain.tld:0000/en-US/path where 'sub.', '.tld', and
	// ':0000' are optional
	
	$locale_from_url = substr(
		preg_replace(
			'/^(http(s)?:\/\/)[A-z0-9@\.:ßàÁâãóôþüúðæåïçèõöÿýòäœêëìíøùîûñé]+/',
			'',
			$url),
		1, 5);
	
	// Echo the locale into the lang-attribute if there was one,
	// otherwise use en-US
	return ((preg_match('/[a-z]{2}-[A-Z]{2}/', $locale_from_url))?$locale_from_url:'en-US');
}
?>