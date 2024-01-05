<?php
// authenticate
auth_reauthenticate();
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );
// Read results
$f_userdata_show_empty = gpc_get_int( 'show_empty', OFF );
$f_userdata_show_inline = gpc_get_int( 'show_inline', ON );
$f_userdata_self_maintain = gpc_get_int( 'self_maintain', ON );
$f_userdata_show_account = gpc_get_int( 'show_account', ON );
$f_userdata_show_user = gpc_get_int( 'show_user', ON );

// update results
plugin_config_set( 'userdata_show_empty',$f_userdata_show_empty );
plugin_config_set( 'userdata_show_inline',$f_userdata_show_inline );
plugin_config_set( 'userdata_self_maintain',$f_userdata_self_maintain );
plugin_config_set( 'userdata_show_account',$f_userdata_show_account );
plugin_config_set( 'userdata_show_user',$f_userdata_show_user );
// redirect
print_header_redirect( plugin_page( 'config',TRUE ) );