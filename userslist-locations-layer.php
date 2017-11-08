<?php

/*
	Plugin Name: Users-List Location
	Plugin URI: http://www.q2apro.com/plugins
	Plugin Description: Add Location to users list
	Plugin Version: 0.1
	Plugin Date: 2014-03-15
	Plugin Author: q2apro.com
	Plugin Author URI: http://www.q2apro.com/
	Plugin Minimum Question2Answer Version: 1.5
	Plugin Update Check URI: 

	Licence: Copyright © q2apro.com - All rights reserved
	
*/

class qa_html_theme_layer extends qa_html_theme_base
{

	function ranking($ranking) {
		
		if(@$ranking['type']=='users') {
			foreach($ranking['items'] as $idx => $item) {
				$handle = preg_replace('/ *<[^>]+> */', '', $item['label']);
				
				if(isset($ranking['items'][$idx]['score'])) {
					$ranking['items'][$idx]['score'] .= '</td><td class="qa-users-location-cell">'.q2apro_get_userlocation($handle);
				}
			}
		}
		
		qa_html_theme_base::ranking($ranking);
	}

}
