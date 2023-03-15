<?PHP
$seq	= $_REQUEST['sequence'];
$name	= htmlentities($_REQUEST['name'],ENT_COMPAT,'UTF-8');
$pub	= $_REQUEST['public'];
if ($pub == 1) {
	$pub = 1;
} else {
	$pub = 0;
}
$query	= "INSERT INTO {plugin_Userdata_fields} ( userdata_seq, userdata_name, userdata_public ) VALUES ( '$seq','$name','$pub' )";
db_query($query);
print_header_redirect( 'plugin.php?page=Userdata/userdata_definition' );
