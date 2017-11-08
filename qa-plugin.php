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

if ( !defined('QA_VERSION') )
{
	header('Location: ../../');
	exit;
}

// layer
qa_register_plugin_layer('userslist-locations-layer.php', 'Users-List Locations Layer');

function q2apro_get_userlocation($handle) {
	
	$userids = qa_handles_to_userids(array($handle));
	$userid = $userids[$handle];

	// no such user exists
	if ( $userid === null || $userid < 1 ) {
		return;
	}

	$userLocation = qa_db_read_one_value(qa_db_query_sub('SELECT content FROM ^userprofile
															WHERE userid=#
															AND title="location"
															', $userid), true);
	return $userLocation;
}

/*
	Omit PHP closing tag to help avoid accidental output
*/