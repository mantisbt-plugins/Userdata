<?PHP
$seq	= $_REQUEST['sequence'] ;
if ( !is_int( intval( $seq ) ) ) {
	$seq = 999;
}
$name	= htmlentities($_REQUEST['name'],ENT_COMPAT,'UTF-8');
if( $pub = @$_REQUEST['public'] ){ 
	$pub = 1;
} else {
	$pub = 0;
}
$query	= "INSERT INTO {plugin_Userdata_fields} ( userdata_seq, userdata_name, userdata_public ) VALUES ( '$seq','$name','$pub' )";
db_query($query);
print_header_redirect( 'plugin.php?page=Userdata/userdata_definition' );
