<?php
$f_import_file = gpc_get_string( 'import_file' );
$f_separator = gpc_get_string('edt_cell_separator');     
# Check given parameters - File
$f_import_file = gpc_get_file( 'import_file', -1 ); 
$t_file_content = array();
$t_file_content = file( $f_import_file['tmp_name'] );
# Import file content
$t_first_run = true;
foreach( $t_file_content as $t_file_row ) 	{
	# Check if first row skipped
	if( $t_first_run  ) {
		$t_first_run = false;
		continue;
	}
	# Explode into elements
	$t_file_rows = explode( $f_separator, $t_file_row );

	# Variables
	$t_fields 	= count( $t_file_rows );
	if ( $t_fields < 2 ) {
		continue;
	}
	$t_data		= $t_fields -1;
	$f_user		= $t_file_rows[0];

	# first get user_id
	$uquery		= "select id from {user} where username = '$f_user' ";
	$uresult		= db_query( $uquery );
	$uresult2	= db_num_rows($uresult);
	if ( $uresult2 == 0 ) {
		continue;
	}
	$urow = db_fetch_array( $uresult );
	$t_userid = $urow['id'];

	# check number of data fields
	$dquery		= "select * from {plugin_Userdata_fields} order by userdata_seq ";
	$dresult		= db_query( $dquery );
	$dresult2	= db_num_rows($dresult);
	if ( $dresult2 <>  $t_data ) {
		# generate error, not enough fields
		trigger_error( 'ERROR_FIELD_MISMATCH', ERROR );
	}

	# loop through all the data fields
	$field=1;
	while ( $drow = db_fetch_array( $dresult ) ) {
		# fetch field_id
		$t_userdata_id = $drow['userdata_id'];
		$t_value = $t_file_rows[$field];
		$field ++;
		# check if user already has value, if so overwrite
		$sql		= "select * from {plugin_Userdata_data} where user_id= $t_userid and userdata_id = $t_userdata_id";
		$res		= db_query( $sql );
		$res2	  	= db_num_rows ($res );
		if ($res2 > 0){
			# update value
			$sql2 = "update {plugin_Userdata_data} set userdata_value= '$t_value' where user_id= $t_userid and userdata_id = $t_userdata_id";
		} else {
			# add value
			$sql2 = "INSERT INTO {plugin_Userdata_data} ( user_id,userdata_id, userdata_value ) values ($t_userid, $t_userdata_id, '$t_value' ) ";
		}
		db_query( $sql2 );
	}
}
print_header_redirect( 'plugin.php?page=Userdata/config' );