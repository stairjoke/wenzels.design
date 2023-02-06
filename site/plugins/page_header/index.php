<?php
	function get_header_title_as_html($site){
		// Display different site-titles depending on availability
		$has_default_title = $site->header_title()->exists();
		$has_tablet_title = $site->header_title_tablet()->exists();
		$has_mobile_title = $site->header_title_mobile()->exists();
	
		if(!$has_default_title && !$has_tablet_title && $has_mobile_title) {
			return("<h1>".$site->title()."</h1>");
		}else{
			// At least one of the header_titles is set
			if($has_default_title){
				// At least the desktop title is set
				if($has_tablet_title) {
					// At least desktop and tablet title available
					if($has_mobile_title) {
						// All three title are set
						$title = '<h1 class=desktop>' . $site->header_title() . '</h1>';
						$title .= '<h1 class=tablet>' . $site->header_title_tablet() . '</h1>';
						$title  .= '<h1 class=mobile>' . $site->header_title_mobile() . '</h1>';
					}else{
						// No mobile title, but tablet and desktop
						$title = '<h1 class=desktop>' . $site->header_title() . '</h1>';
						$title .= '<h1 class="tablet mobile">' . $site->header_title_tablet() . '</h1>';
					}
				}else{
					if($has_mobile_title) {
						// Desktop and mobile, no tablet
						$title = '<h1 class="desktop tablet">' . $site->header_title() . '</h1>';
						$title  .= '<h1 class=mobile>' . $site->header_title_mobile() . '</h1>';
					}else{
						// No mobile title, no tablet, but desktop
						$title = '<h1>' . $site->header_title() . '</h1>';
					}
				}
			}else{
				//No desktop
				if($has_tablet_title){
					//no desktop, but tablet
					if($has_mobile_title){
						// tablet and mobile, no desktop
						$title = '<h1 class="tablet desktop">' . $site->header_title_tablet() . '</h1>';
						$title  .= '<h1 class=mobile>' . $site->header_title_mobile() . '</h1>';
					}else{
						// only tablet
						$title = '<h1>' . $site->header_title_tablet() . '</h1>';
					}
				}else{
					//no desktop no tablet
					if($has_mobile_title){
						// only mobile title
						$title  = '<h1>' . $site->header_title_mobile() . '</h1>';
					}
				}
			}
		}
		return $title;
	}
?>