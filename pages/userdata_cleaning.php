<?php
// authenticate
auth_reauthenticate();
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );
// Read results
$query = " select  distinct user_id from {plugin_Userdata_data} " ;
$result = db_query( $query );
while ( $row = db_fetch_array( $result ) ) {
	$user	= $row['user_id'];
	// check is user still exists
	$query2		= " select  * from {user} where id=$user " ;
	$result2	= db_query($query2);
	if ( db_num_rows( $result2 ) <1 ){
		// we have orhan entries, let's delete them
		$query3		= " delete from {plugin_Userdata_data} where user_id = $user";
		$result3	= db_query( $query3 );
	}
}
// redirect
print_successful_redirect( plugin_page( 'config',TRUE ) );