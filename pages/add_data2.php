<?php
$t_userid	= $_REQUEST['user_id'];
# Pull all definition entries 
$query = "SELECT * FROM {plugin_Userdata_fields} ORDER BY userdata_seq";
$result = db_query($query);
while ($row = db_fetch_array($result)) {
	$id		= $row['userdata_id' ];
	$fieldname	= 'Name';
	$fieldname	.= $id;
	$value = $_REQUEST[$fieldname];
	$value	= htmlentities($value,ENT_COMPAT,'UTF-8');
	// do we need to add this value or update existing value
	$query2 = "SELECT userdata_value FROM {plugin_Userdata_data} where userdata_id=$id and user_id=$t_userid";
	$result2 = db_query($query2);
	if ( db_num_rows( $result2 ) > 0 ){
		$query3 = " update {plugin_Userdata_data} set userdata_value = '$value' where userdata_id=$id and user_id=$t_userid ";
	} else {
		$query3 = " insert into {plugin_Userdata_data} ( user_id, userdata_id, userdata_value ) values ( '$t_userid', '$id', '$value' ) ";
	}

	db_query($query3);
}

print_header_redirect( 'plugin.php?page=Userdata/editdata2' );